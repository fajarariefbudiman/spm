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
                <x-create-user :level="$level" :user="$user"/>
            @elseif (Route::current()->parameters()['level'] === 'petugas')
                <x-create-petugas :level="$level" :user="$user"/>
            @endif
        </div>
    </div>

</x-app-layout>
