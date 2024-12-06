<x-guest-layout>
    <div class="w-full overflow-hidden">
        <!-- Logo di atas form -->
        <div class="flex items-center justify-center mx-auto mt-28">
            <img src="your-logo.png" alt="SPM Logo" class="w-16" />
            <span class="text-blue-500 font-bold text-4xl pb-1">SPM</span>
        </div>

        <!-- Form Register -->
        <div class="flex justify-center items-center my-4">
            <div class="bg-white shadow-md rounded px-6 pt-4 pb-6 mb-4 w-full max-w-lg border border-gray-400">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <!-- NIK Input -->
                    <div class="mb-3">
                        <x-input-label for="nik" :value="__('NIK')" />
                        <x-text-input id="nik"
                            class="shadow appearance-none border border-gray-400 rounded w-full py-2 px-2 text-sm text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            type="text" name="nik" :value="old('nik')" placeholder="Enter your NIK" required
                            autofocus autocomplete="nik" />
                        <x-input-error :messages="$errors->get('nik')" class="mt-2" />
                    </div>

                    <!-- Fullname Input -->
                    <div class="mb-3">
                        <x-input-label for="fullname" :value="__('Fullname')" />
                        <x-text-input id="fullname"
                            class="shadow appearance-none border border-gray-400 rounded w-full py-2 px-2 text-sm text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            type="text" name="fullname" :value="old('fullname')" placeholder="Enter your Fullname" required
                            autofocus autocomplete="fullname" />
                        <x-input-error :messages="$errors->get('fullname')" class="mt-2" />
                    </div>

                    <!-- Username Input -->
                    <div class="mb-3">
                        <x-input-label for="username" :value="__('Username')" />
                        <x-text-input id="username"
                            class="shadow appearance-none border border-gray-400 rounded w-full py-2 px-2 text-sm text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            type="text" name="username" :value="old('username')" placeholder="Enter your Username" required
                            autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('username')" class="mt-2" />
                    </div>

                    <!-- Email Input -->
                    <div class="mb-3">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email"
                            class="shadow border border-gray-400 rounded w-full py-2 px-2 text-sm text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            type="email" name="email" :value="old('email')" placeholder="Enter your Email" required
                            autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- No. HP Input -->
                    <div class="mb-3">
                        <x-input-label for="no_hp" :value="__('No. HP')" />
                        <x-text-input id="no_hp"
                            class="shadow appearance-none border border-gray-400 rounded w-full py-2 px-2 text-sm text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            type="text" name="no_hp" :value="old('no_hp')" placeholder="Enter your No. HP" required
                            autofocus autocomplete="no_hp" />
                        <x-input-error :messages="$errors->get('no_hp')" class="mt-2" />
                    </div>

                    <!-- Password Input -->
                    <div class="mb-3">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password"
                            class="shadow border border-gray-400 rounded w-full py-2 px-2 text-sm text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            type="password" name="password" placeholder="Enter your Password" required
                            autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password Input -->
                    <div class="mb-4">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                        <x-text-input id="password_confirmation"
                            class="shadow border border-gray-400 rounded w-full py-2 px-2 text-sm text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            type="password" name="password_confirmation" placeholder="Confirm Password" required
                            autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <!-- Register Button -->
                    <div class="flex items-end justify-end">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-600 text-white font-semibold text-sm py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            {{ __('Register') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Background Wave -->
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="fixed bottom-0 left-0 w-full h-auto z-[-1]">
            <path fill="#0099ff" fill-opacity="1" d="M0,128L80,133.3C160,139,320,149,480,128C640,107,800,53,960,42.7C1120,32,1280,64,1360,80L1440,96L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"/>
        </svg>
    </div>
</x-guest-layout>
