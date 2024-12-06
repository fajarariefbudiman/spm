<x-app-layout>
    <div class="flex h-100">
        <!-- Sidebar -->
        <x-sidebar-dashboard />

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Top Bar -->
            <x-topbar-dashboard />

            <!-- Report Content -->
            <main class="p-6">
                <h3 class="text-3xl font-bold my-11 text-center">Silahkan Ajukan Pengajuan Anda!</h3>
                <section class="col-span-12 bg-white shadow-md rounded-lg p-4 mb-6">
                    <form method="POST"
                        action="{{ isset($report) ? route('report.update', $report->id) : route('report.store') }}"
                        enctype="multipart/form-data">
                        @csrf

                        @if (isset($report))
                            @method('PUT')
                        @endif
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        <!-- Jenis Pengaduan -->
                        <div class="mb-3">
                            <x-input-label for="jenis_pengaduan" :value="__('Jenis Pengaduan')" />
                            <select id="jenis_pengaduan"
                                class="shadow appearance-none border border-gray-400 rounded w-full py-2 px-2 text-sm text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                name="jenis_pengaduan" required>
                                <option value="" disabled selected>Pilih Jenis Pengaduan</option>
                                <option value="pelayan_publik">Pelayanan Publik</option>
                                <option value="kesehatan">Kesehatan</option>
                                <option value="pendidikan">Pendidikan</option>
                                <option value="keamanan">Keamanan</option>
                                <option value="administrasi">Administrasi</option>
                                <option value="lainnya">Lainnya</option>
                            </select>
                            <x-input-error :messages="$errors->get('jenis_pengaduan')" class="mt-2" />
                        </div>

                        <!-- Tempat Kejadian -->
                        <div class="mb-3">
                            <x-input-label for="tempat_kejadian" :value="__('Tempat Kejadian')" />
                            <x-text-input id="tempat_kejadian"
                                class="shadow appearance-none border border-gray-400 rounded w-full py-2 px-2 text-sm text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                type="text" name="tempat_kejadian" :value="old('tempat_kejadian', $report ? $report->tempat_kejadian : '')" placeholder="Tempat Kejadian"
                                required autofocus autocomplete="tempat_kejadian" />
                            <x-input-error :messages="$errors->get('tempat_kejadian')" class="mt-2" />
                        </div>

                        <!-- Tanggal Kejadian -->
                        <div class="mb-3">
                            <x-input-label for="sent_time" :value="__('Tanggal Kejadian')" />
                            <x-text-input id="sent_time"
                                class="shadow border border-gray-400 rounded w-full py-2 px-2 text-sm text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                type="date" name="sent_time" :value="old(
                                    'sent_time',
                                    $report ? $report->sent_time : \Illuminate\Support\Carbon::now()->format('Y-m-d'),
                                )" placeholder="Tanggal Kejadian"
                                required autocomplete="sent_time" />
                            <x-input-error :messages="$errors->get('sent_time')" class="mt-2" />
                        </div>

                        <!-- Deskripsi Kejadian -->
                        <div class="mb-3">
                            <x-input-label for="deskripsi" :value="__('Deskripsi Kejadian')" />
                            <x-text-input id="deskripsi"
                                class="shadow appearance-none border border-gray-400 rounded w-full py-2 pb-16 px-2 text-sm text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                type="text" name="deskripsi" :value="old('deskripsi', $report ? $report->deskripsi : '')" placeholder="Deskripsi Kejadian"
                                required autocomplete="deskripsi" />
                            <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
                        </div>

                        <!-- Foto -->
                        <div class="mb-3">
                            <x-input-label for="foto" :value="__('Foto')" />

                            <x-text-input id="foto"
                                class="shadow border border-gray-400 rounded w-full py-2 px-2 text-sm text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                type="file" name="foto" accept=".jpg,.jpeg,.png" />

                            <x-input-error :messages="$errors->get('foto')" class="mt-2" />
                        </div>

                        <!-- Register Button -->
                        <div class="flex items-end justify-end">
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold text-sm py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                {{ __('Send') }}
                            </button>
                        </div>
                    </form>
                </section>
            </main>
        </div>
    </div>
</x-app-layout>
