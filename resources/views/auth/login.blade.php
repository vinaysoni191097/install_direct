<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf


        <div class="font-body lg:text-3xl text-2xl font-bold text-dark-charcoal">Log in</div>
        <p class="gray-text text-lg font-normal mb-6 mt-1">Welcome back! Please enter your details.</p>

        {{-- <div class="flex gap-4">
            <div
                class="bg-white border flex gap-3 py-2 px-6 rounded-lg  shadow text-center text-base text-black w-full items-center justify-center">
                <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M25.4404 11.715H24.5007V11.6666H14.0007V16.3333H20.5941C19.6322 19.0498 17.0474 20.9999 14.0007 20.9999C10.1349 20.9999 7.00065 17.8657 7.00065 13.9999C7.00065 10.1342 10.1349 6.99992 14.0007 6.99992C15.7851 6.99992 17.4085 7.67309 18.6446 8.77267L21.9445 5.47275C19.8608 3.53084 17.0737 2.33325 14.0007 2.33325C7.55773 2.33325 2.33398 7.557 2.33398 13.9999C2.33398 20.4428 7.55773 25.6666 14.0007 25.6666C20.4436 25.6666 25.6673 20.4428 25.6673 13.9999C25.6673 13.2177 25.5868 12.4541 25.4404 11.715Z"
                        fill="#FFC107"></path>
                    <path
                        d="M3.67773 8.56967L7.51082 11.3808C8.54798 8.81292 11.0598 6.99992 13.9992 6.99992C15.7837 6.99992 17.4071 7.67309 18.6432 8.77267L21.9431 5.47275C19.8594 3.53084 17.0722 2.33325 13.9992 2.33325C9.51807 2.33325 5.6319 4.86317 3.67773 8.56967Z"
                        fill="#FF3D00"></path>
                    <path
                        d="M13.9995 25.6666C17.013 25.6666 19.7512 24.5133 21.8214 22.6379L18.2106 19.5824C16.9999 20.5031 15.5205 21.0011 13.9995 20.9999C10.965 20.9999 8.38845 19.065 7.41778 16.3647L3.61328 19.296C5.54411 23.0742 9.46528 25.6666 13.9995 25.6666Z"
                        fill="#4CAF50"></path>
                    <path
                        d="M25.4398 11.7152H24.5V11.6667H14V16.3334H20.5934C20.1333 17.6263 19.3045 18.7561 18.2093 19.5832L18.2111 19.582L21.8219 22.6375C21.5664 22.8697 25.6667 19.8334 25.6667 14.0001C25.6667 13.2178 25.5862 12.4542 25.4398 11.7152Z"
                        fill="#1976D2"></path>
                </svg>
                <div class="font-body text-xs text-center text-dark-charcoal font-medium">Sign In
                    with Google</div>
            </div>
            <div class="bg-white border flex gap-3 py-2 px-6 rounded-lg shadow text-center text-base text-black">
                <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_389_6213)">
                        <path
                            d="M26 13C26 5.82034 20.1797 0 13 0C5.82034 0 0 5.82024 0 13C0 19.4886 4.75394 24.8669 10.9688 25.8421V16.7578H7.66797V13H10.9688V10.1359C10.9688 6.87781 12.9096 5.07812 15.879 5.07812C17.3014 5.07812 18.7891 5.33203 18.7891 5.33203V8.53125H17.1498C15.5348 8.53125 15.0312 9.53337 15.0312 10.5615V13H18.6367L18.0604 16.7578H15.0312V25.8421C21.2461 24.8669 26 19.4887 26 13Z"
                            fill="#1877F2"></path>
                        <path
                            d="M18.0604 16.7578L18.6367 13H15.0312V10.5615C15.0312 9.53327 15.5349 8.53125 17.1498 8.53125H18.7891V5.33203C18.7891 5.33203 17.3014 5.07812 15.879 5.07812C12.9096 5.07812 10.9688 6.87781 10.9688 10.1359V13H7.66797V16.7578H10.9688V25.8421C11.6407 25.9474 12.3198 26.0002 13 26C13.6802 26.0002 14.3593 25.9474 15.0312 25.8421V16.7578H18.0604Z"
                            fill="white"></path>
                    </g>
                    <defs>
                        <clipPath id="clip0_389_6213">
                            <rect width="26" height="26" fill="white"></rect>
                        </clipPath>
                    </defs>
                </svg>
                <div class="justify-center font-body m-auto text-xs text-center text-dark-charcoal font-medium">Sign In
                    with Facebook</div>
            </div>

        </div>
        <div class="relative justify-center mb-10 mt-12">
            <div class="border-t border-gray-200 w-full z-10">
                <div class="text-center absolute flex justify-center items-center left-0 right-0 -top-3 "><span
                        class=" inline-block w-12 bg-white">OR</span></div>
            </div>
        </div> --}}

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" :astrick="true"/>
            <x-text-input id="email" class="block mt-1 w-full h-11 " type="email" name="email" :value="old('email') ?: Cookie::get('email')"
                placeholder="olivia@untitledui.com" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4" x-data="{showPassword: true }">
            <x-input-label for="password" :value="__('Password')" :astrick="true"/>
            <div class="mt-1 flex items-center relative">
                <x-text-input id="password" class="block h-11 mt-1 w-full" placeholder="Create a password"
                    x-bind:type="showPassword ? 'password' : 'text'" name="password" required
                    autocomplete="current-password" :value="old('password') ?: Cookie::get('password')" />
                <div class="absolute right-2 top-1/2 -translate-y-1/2">
                    <svg class="h-5 text-gray-500" fill="none" @click.prevent="showPassword = !showPassword"
                        x-bind:class="{ 'hidden': !showPassword, 'block': showPassword }"
                        xmlns="http://www.w3.org/2000/svg" viewbox="0 0 576 512">
                        <path fill="currentColor"
                            d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                        </path>
                    </svg>

                    <svg class="h-5 text-gray-500" fill="none" @click.prevent="showPassword = !showPassword"
                        x-bind:class="{ 'block': !showPassword, 'hidden': showPassword }"
                        xmlns="http://www.w3.org/2000/svg" viewbox="0 0 640 512">
                        <path fill="currentColor"
                            d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                        </path>
                    </svg>
                </div>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex justify-between mt-4">
            <label for="remember" class="inline-flex items-center">
                <input id="remember" type="checkbox" {{ Cookie::get('email') ? 'checked' : '' }}
                    class="rounded w-5 h-5 border-gray-300 accent-green-600" name="remember">
                <span class="ml-2 text-sm font-medium">{{ __('Remember for 30 days') }}</span>
            </label>
            @if (Route::has('password.request'))
                <a class="text-sm text-green-600 font-semibold hover:text-grenn-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot Password') }}
                </a>
            @endif
        </div>

        <div class="flex items-center  mt-4">
            <x-primary-button class="w-full py-3 mt-4">
                {{ __('Log In') }}
            </x-primary-button>
        </div>
        <div class="font-body text-center text-primary mt-5">Don’t have an account?
            <a class="font-medium text-sm text-green-600 " href="/register">Sign Up</a>
        </div>
    </form>
</x-guest-layout>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const rememberData = JSON.parse(localStorage.getItem('remember'));
        if (rememberData) {
            document.querySelector('input[name="email"]').value = rememberData.email;
            document.querySelector('input[name="password"]').value = rememberData.password;
            document.querySelector('input[name="remember"]').checked = true;
        }
    });
</script>
