<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Http\Requests\StoreReportRequest;
use App\Http\Requests\UpdateReportRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $report = Report::all();
        return view('report.index', compact('report'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function updateOrCreateView(Request $request, $id = null)
    {
        $report = $id ? Report::findOrFail($id) : null;

        return view('report.create', compact('report'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function updateOrCreate(Request $request)
    {
        $request->validate([
            'id' => 'nullable|exists:reports,id',
            'jenis_pengaduan' => 'required|string',
            'tempat_kejadian' => 'required|string',
            'sent_time' => 'required|date',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        try {
            $report = Report::find($request->id);
            $path = null;

            if ($request->hasFile('foto')) {

                if ($report && $report->foto) {
                    Storage::disk('public')->delete($report->foto);
                }

                $path = $request->file('foto')->store('uploads', 'public');
            } elseif ($report && $report->foto) {
                $path = $report->foto;
            }
            $report = Report::updateOrCreate(
                [
                    'id' => $request->id
                ],
                [
                    'user_id' => $request->user_id,
                    'jenis_pengaduan' => $request->jenis_pengaduan,
                    'tanggapan' => null,
                    'tempat_kejadian' => $request->tempat_kejadian,
                    'sent_time' => $request->sent_time,
                    'deskripsi' => $request->deskripsi,
                    'foto' => $path
                ]
            );

            return redirect(route('dashboard'))->with('success', 'Data berhasil ' . ($request->id ? 'diperbarui' : 'ditambahkan'));
        } catch (\Throwable $th) {
            // Menangani kesalahan
            return response()->json([
                'status' => 500,
                'message' => "Terjadi kesalahan: " . $th->getMessage(),
                'code' => 0,
                'data' => null,
            ], 500);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $report = Report::where('id', $id)
            ->where('user_id', Auth::id())
            ->first();

        if (!$report) {
            abort(404, 'Laporan tidak ditemukan atau Anda tidak memiliki akses.');
        }

        return view('report.detail', compact('report'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Report $report)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Request $request)
    {
        $report = Report::where('id', $request->id)
            ->where('user_id', Auth::id())
            ->first();

        if (!$report) {
            return redirect()->route('dashboard')->with('error', 'Laporan tidak ditemukan atau Anda tidak memiliki izin.');
        }

        $report->delete();

        return redirect()->route('dashboard')->with('success', 'Laporan berhasil dihapus.');
    }



    public function getComplaintById(Report $report, Request $request,$id)
    {
        //
        $report = Report::findOrFail($id);
        return view('report.complaint', compact('report'));
    }

    public function getComplaint(Report $report)
    {
        //
        $reports = Report::paginate(7);
        return view('report.complaints', compact('reports'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $report = Report::findOrFail($id);
        $report->update([
            'status' => $request->input('status'),
            'tanggapan' => $request->input('tanggapan'),
        ]);

        return redirect()->route('complaint.index')->with('success', 'Laporan berhasil diperbarui.');
    }
}
