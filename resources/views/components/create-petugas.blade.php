@props(['level', 'user'])
<!-- Content -->
<div class="flex justify-start ms-10 my-10 items-center flex-1">
    <div class="w-full max-w-xl bg-white rounded-lg shadow-md border border-gray-600">
        <div class="w-full bg-gray-500 py-4 px-6 rounded-t-lg shadow-md">
            <h4 class="text-2xl font-semibold text-start text-white">Form Petugas</h4>
        </div>

        <!-- Form Section -->
        <form
            action="{{ $user ? route('user.update', ['level' =>'petugas', 'id' => $user->id]) : route('user.store', ['level' =>'petugas', 'id' => null]) }}"
            method="POST" class="px-12 py-10">
            @csrf
            @if ($user)
                @method('PUT')
            @endif

            <input type="hidden" name="id" value="{{ $user ? $user->id : null }}">
            <!-- Fullname -->
            <div class="mb-6">
                <x-input-label for="fullname" :value="__('Fullname')" class="block text-gray-700 font-semibold mb-1 text-sm" />
                <x-text-input id="fullname" type="text" name="fullname" :value="old('fullname', $user ? $user->fullname : '')" required autofocus
                    placeholder="Enter full name"
                    class="shadow appearance-none border border-gray-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                <x-input-error :messages="$errors->get('fullname')" class="mt-2 text-sm text-red-500" />
            </div>

            <!-- Username -->
            <div class="mb-6">
                <x-input-label for="username" :value="__('Username')"
                    class="block text-gray-700 font-semibold mb-1 text-sm" />
                <x-text-input id="username" type="text" name="username" :value="old('username', $user ? $user->username : '')" required autofocus
                    placeholder="Enter full name"
                    class="shadow appearance-none border border-gray-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                <x-input-error :messages="$errors->get('fullname')" class="mt-2 text-sm text-red-500" />
            </div>

            <!-- No. HP -->
            <div class="mb-6">
                <x-input-label for="no_hp" :value="__('No. HP')"
                    class="block text-gray-700 font-semibold mb-1 text-sm" />
                <x-text-input id="no_hp" type="text" name="no_hp" :value="old('no_hp', $user ? $user->no_hp : '')" required
                    placeholder="Enter phone number"
                    class="shadow appearance-none border border-gray-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                <x-input-error :messages="$errors->get('no_hp')" class="mt-2 text-sm text-red-500" />
            </div>

            <!-- Email -->
            <div class="mb-6">
                <x-input-label for="email" :value="__('Email')"
                    class="block text-gray-700 font-semibold mb-1 text-sm" />
                <x-text-input id="email" type="email" name="email" :value="old('email', $user ? $user->email : '')" required
                    placeholder="Enter your email"
                    class="shadow appearance-none border border-gray-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-500" />
            </div>

            <!-- Level -->
            <div class="mb-6">
                <label for="level" class="block text-sm font-medium text-gray-700">Level</label>
                <select id="level"
                    class="mt-1 block w-full p-2 border border-gray-600 rounded-md focus:ring-blue-500 focus:border-blue-500"
                    name="level" required>
                    <option value="admin">Admin</option>
                    <option value="petugas">Petugas</option>
                </select>
            </div>

            <!-- Submit Button -->
            <div class="flex items-center justify-between">
                <x-primary-button>
                    {{ $user ? 'Update' : 'Create' }} Petugas
                </x-primary-button>
            </div>
        </form>
    </div>
</div>
