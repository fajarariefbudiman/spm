<div class="bg-white shadow-md px-6 py-4 flex justify-between items-center">
    <h1 class="text-2xl font-bold">Dashboard</h1>
    <div class="relative flex items-center space-x-4">
        <!-- Icon Notification -->
        <a href="#" class="text-blue-500 hover:text-blue-700">
            <i class="fas fa-bell"></i>
        </a>

        <!-- User Dropdown -->
        <div class="relative">
            <button class="flex items-center space-x-2 focus:outline-none" id="user-menu-button">
                <i class="fas fa-user-circle text-gray-500"></i>
                <span class="font-medium">{{ auth()->user()->username }}</span>
                <svg class="w-4 h-4 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <!-- Dropdown Content -->
            <div id="dropdown-menu"
                class="hidden absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg">
                <a href="/profile"
                    class="block px-4 py-2 text-gray-700 hover:bg-gray-100 hover:text-gray-900">Profile</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="block w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    const userMenuButton = document.getElementById('user-menu-button');
    const dropdownMenu = document.getElementById('dropdown-menu');

    userMenuButton.addEventListener('click', () => {
        dropdownMenu.classList.toggle('hidden');
    });

    document.addEventListener('click', (e) => {
        if (!userMenuButton.contains(e.target) && !dropdownMenu.contains(e.target)) {
            dropdownMenu.classList.add('hidden');
        }
    });
</script>
