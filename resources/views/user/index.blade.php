<x-app-layout>
    <div class="flex h-100">
        <!-- Sidebar -->
        <x-sidebar-dashboard />

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Top Bar -->
            <x-topbar-dashboard />


            <!-- Dashboard Content -->
            @if (Route::current()->parameters()['level'] === 'user')
                <x-data-user :level="$level" :users="$users" />
            @elseif (Route::current()->parameters()['level'] === 'petugas')
                <x-data-petugas :level="$level" :users="$users" />
            @endif
        </div>
    </div>

</x-app-layout>
