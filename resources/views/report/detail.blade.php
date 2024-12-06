<x-app-layout>
    <div class="flex h-100">
        <!-- Sidebar -->
        <x-sidebar-dashboard />

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Top Bar -->
            <x-topbar-dashboard />

            <main class="p-6">
                <!-- Data User -->
                <section class="col-span-12 bg-white shadow-md rounded-lg p-4 mb-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Data User</h2>
                    <div>
                        <!-- Jika ada data -->
                        <p class="text-gray-600">Nama: <span
                                class="font-medium text-gray-800">{{ $report->user->fullname }}</span></p>
                        <p class="text-gray-600">Email: <span
                                class="font-medium text-gray-800">{{ $report->user->email }}</span></p>
                        <p class="text-gray-600">No. Telepon: <span
                                class="font-medium text-gray-800">{{ $report->user->no_hp }}</span></p>
                    </div>
                </section>

                <!-- Foto -->
                <section
                    class="col-span-12 grid grid-cols-1 md:grid-cols-2 rounded-lg shadow-md bg-gray-50 gap-6 mb-6 py-9">
                    <div class="bg-gray-50 rounded-lg p-4 ms-9">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4 text-start">Foto</h3>
                        <div class="flex items-center justify-start">
                            <img src="{{ $report->foto ? asset('storage/' . $report->foto) : 'https://via.placeholder.com/150' }}"
                                alt="Foto User" class="rounded-lg max-h-60">
                        </div>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Keterangan</h3>
                        <p class="text-gray-600">
                            {{ $report->deskripsi ?? 'Belum ada keterangan yang tersedia.' }}</p>
                    </div>
                </section>

                <!-- Tanggapan -->
                <section class="col-span-12 text-center py-9 bg-white shadow-md rounded-lg p-4">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Tanggapan</h3>
                    <p class="text-gray-600">Tanggapan Petugas: <span
                            class="font-medium text-gray-800">{{ $report->tanggapan ?? 'Belum ada tanggapan yang tersedia.' }}</span>
                    </p>
                </section>
            </main>

        </div>
    </div>

</x-app-layout>

