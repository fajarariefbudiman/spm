<x-app-layout>
    <div class="flex h-100">
        <!-- Sidebar -->
        <x-sidebar-dashboard :level="$level" />

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Top Bar -->
            <x-topbar-dashboard />


            <!-- Dashboard Content -->
            @if (auth()->user() && auth()->user()->hasRole('admin'))
                <x-dashboard-admin :reports="$reports" :jumlahPengaduan="$jumlahPengaduan" :sedangDiproses="$sedangDiproses" :selesai="$selesai"
                    :jumlahMasyarakat="$jumlahMasyarakat" :jumlahPetugas="$jumlahPetugas" />
            @else
                <x-detail-pengaduan-user :reports="$reports" />
            @endif
        </div>
    </div>

</x-app-layout>
