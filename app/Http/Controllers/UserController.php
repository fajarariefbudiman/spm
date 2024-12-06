<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Report;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index($level)
    {
        if (!in_array($level, ['user', 'petugas'])) {
            return abort(404);
        }

        $users = User::where('level', $level)->paginate(7);
        return view('user.index', compact('users', 'level'));
    }

    public function updateOrCreateView(Request $request, $level, $userId = null)
    {
        if (!in_array($level, ['user', 'petugas'])) {
            return abort(404);
        }

        $user = null;

        if ($userId) {
            $user = User::find($userId);
            if (!$user) {
                return abort(404);
            }
        }

        return view('user.create', compact('level', 'user'));
    }


    public function updateOrCreate(Request $request, $level)
    {
        if (!in_array($level, ['user', 'petugas'])) {
            return abort(404);
        }

        $lastPhoneNumber = substr($request->no_hp, -3);
        $defaultPassword  = '#spm123' . $lastPhoneNumber;
        $firstname = explode(' ', trim($request->fullname))[0];
        $randomdigit = rand(1000, 9999);
        $defaultUsername = $firstname . $randomdigit;

        $request->validate([
            'username' => 'string|max:255',
            'fullname' => 'required|string|max:255',
            'nik' => 'string',
            'no_hp' => 'required|string|max:15',
            'email' => 'required|string|email|max:255|',
            'password' => 'string|min:8|confirmed',
        ]);

        // dd($request);
        $user = User::updateOrCreate(
            ['id' => $request->id],
            [
                'username' => $request->username ?: $defaultUsername,
                'fullname' => $request->fullname,
                'email' => $request->email,
                'nik' => $request->nik ?: null,
                'no_hp' => $request->no_hp,
                'password' => bcrypt($request->password ?: $defaultPassword),
                'level' => $request->level,
            ]
        );

        if ($user->wasRecentlyCreated) {
            event(new Registered($user));
        }

        return redirect()->route('user.index', ['level' => $level])
            ->with('success', ucfirst($level) . ' berhasil ditambahkan atau diperbarui!');
    }


    public function destroy($level, $id)
    {
        if (!in_array($level, ['user', 'petugas'])) {
            return abort(404);
        }

        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index', ['level' => $level])->with('success', ucfirst($level) . ' berhasil dihapus!');
    }


    public function dashboard()
    {
        $jumlahPengaduan = Report::count();

        $sedangDiproses = Report::where('status', 'Sedang Diproses')->count();

        $selesai = Report::where('status', 'Selesai')->count();

        $jumlahMasyarakat = User::where('level', 'user')->count();

        $jumlahPetugas = User::where('level', 'petugas')->count();
        $level = Auth::user()->level;
        $reports = null;

        if ($level == 'user') {
            # code...
            $userId = Auth::id();
            $reports = Report::where('user_id', $userId)->paginate(7);
        }
        return view('dashboard', compact('level', 'reports', 'jumlahPengaduan', 'sedangDiproses', 'selesai', 'jumlahMasyarakat', 'jumlahPetugas'));
    }
}
