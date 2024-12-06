<x-app-layout>
    <div class="flex h-full">
        <!-- Sidebar -->
        <x-sidebar-dashboard />

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Top Bar -->
            <x-topbar-dashboard />

            <!-- Content -->
            <div class="flex flex-wrap justify-around p-8 gap-8">
                <!-- Pengaduan Masyarakat Section -->
                <div class="w-full max-w-lg bg-white rounded-lg shadow-md border border-gray-300">
                    <div class="bg-gray-600 py-4 px-6 rounded-t-lg">
                        <h4 class="text-xl font-semibold text-white">Pengaduan Masyarakat</h4>
                    </div>
                    <div class="px-8 py-6 space-y-4">
                        <div class="border-t border-b py-4">
                            <p class="text-sm font-medium text-gray-700 flex">
                                <span class="w-1/3">NIK</span>
                                <span class="w-2/3">: {{ $report->user->nik ?? '-' }}</span>
                            </p>
                        </div>

                        <div class="border-t border-b py-4">
                            <p class="text-sm font-medium text-gray-700 flex">
                                <span class="w-1/3">Nama Masyarakat</span>
                                <span class="w-2/3">: {{ $report->user->fullname ?? '-' }}</span>
                            </p>
                        </div>

                        <div class="border-t border-b py-4">
                            <p class="text-sm font-medium text-gray-700 flex">
                                <span class="w-1/3">Tanggal Pengaduan</span>
                                <span class="w-2/3">: {{ $report->sent_time ?? '-' }}</span>
                            </p>
                        </div>

                        <div class="border-t border-b py-4">
                            <p class="text-sm font-medium text-gray-700 flex">
                                <span class="w-1/3">Jenis Pengaduan</span>
                                <span class="w-2/3">: {{ $report->jenis_pengaduan ?? '-' }}</span>
                            </p>
                        </div>

                        <div class="flex items-center gap-4">
                            <h3 class="text-sm text-start font-semibold text-gray-800">Foto :</h3>
                            @if ($report && $report->foto)
                                <img src="{{ asset('storage/' . $report->foto) }}" alt="Foto User"
                                    class="rounded-lg shadow-md border ms-24 max-w-xs max-h-40 object-cover">
                            @else
                                <img src="https://via.placeholder.com/150" alt="Foto User"
                                    class="rounded-lg shadow-md border ms-24 max-w-xs max-h-40 object-cover">
                            @endif
                        </div>


                    </div>

                </div>

                <!-- Tanggapan Petugas Section -->
                <div class="w-full max-w-lg bg-white rounded-lg shadow-md border border-gray-300">
                    <div class="bg-gray-600 py-4 px-6 rounded-t-lg">
                        <h4 class="text-xl font-semibold text-white">Tanggapan Petugas</h4>
                    </div>
                    <form action="{{ route('complaint.update', ['id' => $report->id]) }}" method="POST"
                        enctype="multipart/form-data" class="px-8 py-6 space-y-4">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="user_id" value="{{ $report->user->id }}">
                        <div class="mb-6">
                            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                            <select id="status" name="status"
                                class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                                required>
                                <option value="Belum Diproses"
                                    {{ old('status', $report->status ?? '') === 'Belum Diproses' ? 'selected' : '' }}>
                                    Belum Diproses
                                </option>
                                <option value="Sedang Diproses"
                                    {{ old('status', $report->status ?? '') === 'Sedang Diproses' ? 'selected' : '' }}>
                                    Sedang Diproses
                                </option>
                                <option value="Ditolak"
                                    {{ old('status', $report->status ?? '') === 'Ditolak' ? 'selected' : '' }}>
                                    Ditolak
                                </option>
                                <option value="Selesai"
                                    {{ old('status', $report->status ?? '') === 'Selesai' ? 'selected' : '' }}>
                                    Selesai
                                </option>
                            </select>
                        </div>

                        <div class="mb-6">
                            <label for="tanggapan" class="block text-sm font-medium text-gray-700">Tanggapan</label>
                            <textarea id="tanggapan" name="tanggapan" rows="4"
                                class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Berikan tanggapan..." required>{{ old('tanggapan', $report->tanggapan ?? '') }}</textarea>
                        </div>


                        <button type="submit"
                            class="w-full py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            SIMPAN
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
