<x-guest-layout>
    <div class="flex items-center justify-center mx-auto mt-32">
        <img src="your-logo.png" alt="SPM Logo" class="w-16" />
        <span class="text-spm-blue font-bold text-4xl pb-1">SPM</span>
    </div>

    <div class="flex justify-center items-center my-4">
        <div class="bg-white shadow-md rounded px-6 pt-4 pb-6 mb-4 w-full max-w-lg border border-gray-400">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Input -->
                <div class="mb-4">
                    <x-input-label for="email" :value="__('Email')"
                        class="block text-gray-700 font-semibold mb-1 text-sm" />
                    <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus
                        placeholder="Enter your email"
                        class="shadow appearance-none border border-gray-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-500" />
                </div>

                <!-- Password Input -->
                <div class="mb-6">
                    <x-input-label for="password" :value="__('Password')"
                        class="block text-gray-700 font-semibold mb-1 text-sm" />
                    <x-text-input id="password" type="password" name="password" required
                        placeholder="Enter your password"
                        class="shadow border border-gray-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-500" />
                </div>

                <!-- Remember Me Checkbox -->
                <div class="mb-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" name="remember"
                            class="form-checkbox h-4 w-4 text-blue-500" />
                        <span class="ml-2 text-gray-700 text-sm">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <!-- Forgot Password and Login Button -->
                <div class="flex items-end justify-end mb-4">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}"
                            class="underline text-gray-700 underline-offset-1 mx-4 text-sm">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                    <x-primary-button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 text-sm rounded focus:outline-none focus:shadow-outline">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>

            <!-- Register Link -->
            <div class="mt-4 text-start">
                <a class="inline-block align-baseline text-sm text-secondary-500 hover:text-secondary-800"
                    href="{{ route('register') }}">
                    {{ __('Register Here!') }}
                </a>
            </div>
        </div>


        <!-- Background Wave -->
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="fixed bottom-0 left-0 w-full h-auto z-[-1]">
            <path fill="#0099ff" fill-opacity="1" d="M0,128L80,133.3C160,139,320,149,480,128C640,107,800,53,960,42.7C1120,32,1280,64,1360,80L1440,96L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"/>
        </svg>
    </div>
</x-guest-layout>
