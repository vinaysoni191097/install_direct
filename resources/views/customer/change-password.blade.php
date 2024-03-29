@extends('layouts.main')
@section('content')
    <main class="pt-16 md:pt-[96px] space-y-8">
        <div class="tab-wrapper" x-data="{ activeTab: 2 }" x-cloak>
            <div class="footer-bg ">
                <section class="mx-auto max-w-6xl lg:max-w-8xl px-4 lg:px-8  h-full">
                    <div class="md:text-2xl text-xl pt-6 pb-2 font-medium">Welcome {{ Auth::user()->name }}!</div>
                </section>
            </div>
            <section class="mx-auto max-w-6xl lg:max-w-8xl px-4 lg:px-8 md:mt-20 mt-10 mb-20  h-full">
                <div class="tab-panel" :class="{ 'active': activeTab === 0 }"
                    x-show.transition.in.opacity.duration.600="activeTab === 0">

                    <form action="{{ route('customer.profile.update', Auth::user()) }}" method="post">
                        @method('put')
                        @csrf
                        <div class="md:flex justify-between items-end">
                            <div>
                                <div class="md:text-2xl text-lg font-medium">Personal info</div>
                                <div class="md:text-lg text-base text-gray-500">Update your photo and personal details here.
                                </div>
                            </div>
                            <div class="mt-5 md:mt-0">
                                <a href="{{ route('dashboard') }}">
                                    <x-secondary-button class="text-center mr-2">
                                        {{ __('Cancel') }}
                                    </x-secondary-button>
                                </a>
                                <x-primary-button class=" text-lg text-center">
                                    {{ __('Update') }}
                                </x-primary-button>
                            </div>
                        </div>

                        <div>
                            <div class="md:flex gap-20 -space-x-2 p-4 mt-14 overflow-hidden ">
                                <div class="relative text-center h-32">
                                    @if (Auth::user()->userData->profile_picture)
                                        <img class="inline-block h-32 w-32  shadow rounded-full ring-2 ring-white"
                                            src="{{ asset('storage/' . Auth::user()->userData->profile_picture) }}"
                                            id="profile-image" alt="">
                                    @else
                                        <span
                                            class="block h-32 w-32 shadow rounded-full ring-2 ring-white bg-green-100 text-green-500 font-bold text-center items-center py-8 text-6xl">{{ Auth::user()->nameInitials }}
                                        </span>
                                    @endif
                                    <div
                                        class="items-center absolute bottom-0 md:right-0 right-20 text-blue rounded-full bg-gray-200 shadow-lg tracking-wide cursor-pointer hover:bg-blue hover:text-black">

                                        <label for="logo"
                                            class="w-full text-center cursor-pointer px-3 py-3 block font-bold">
                                            <svg width="18" height="16" viewBox="0 0 18 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M2.33268 2.33366H4.83268L6.49935 0.666992H11.4993L13.166 2.33366H15.666C16.108 2.33366 16.532 2.50925 16.8445 2.82181C17.1571 3.13437 17.3327 3.5583 17.3327 4.00033V14.0003C17.3327 14.4424 17.1571 14.8663 16.8445 15.1788C16.532 15.4914 16.108 15.667 15.666 15.667H2.33268C1.89065 15.667 1.46673 15.4914 1.15417 15.1788C0.84161 14.8663 0.666016 14.4424 0.666016 14.0003V4.00033C0.666016 3.5583 0.84161 3.13437 1.15417 2.82181C1.46673 2.50925 1.89065 2.33366 2.33268 2.33366ZM8.99935 4.83366C7.89428 4.83366 6.83447 5.27265 6.05307 6.05405C5.27167 6.83545 4.83268 7.89526 4.83268 9.00033C4.83268 10.1054 5.27167 11.1652 6.05307 11.9466C6.83447 12.728 7.89428 13.167 8.99935 13.167C10.1044 13.167 11.1642 12.728 11.9456 11.9466C12.727 11.1652 13.166 10.1054 13.166 9.00033C13.166 7.89526 12.727 6.83545 11.9456 6.05405C11.1642 5.27265 10.1044 4.83366 8.99935 4.83366ZM8.99935 6.50033C9.66239 6.50033 10.2983 6.76372 10.7671 7.23256C11.236 7.7014 11.4993 8.33728 11.4993 9.00033C11.4993 9.66337 11.236 10.2993 10.7671 10.7681C10.2983 11.2369 9.66239 11.5003 8.99935 11.5003C8.33631 11.5003 7.70042 11.2369 7.23158 10.7681C6.76274 10.2993 6.49935 9.66337 6.49935 9.00033C6.49935 8.33728 6.76274 7.7014 7.23158 7.23256C7.70042 6.76372 8.33631 6.50033 8.99935 6.50033Z"
                                                    fill="black" />
                                            </svg>

                                            <input accept="image/jpg,image/png,image/jpeg"
                                                class="w-full cursor-pointer hidden" type="file" name="profile_picture"
                                                id="logo" onchange="fileChosen(event)">
                                        </label>
                                    </div>
                                </div>
                                <div class="md:w-3/5">
                                    <div class="flex gap-3">
                                        <div>
                                            <x-input-label for="first_name" :value="__('First Name')" />
                                            <x-text-input id="first_name" class="block mt-1 w-full h-11" type="text"
                                                name="first_name" :value="old('first_name')" required autofocus
                                                autocomplete="first_name" placeholder="Enter your First name"
                                                x-bind:value="`{{ Auth::user()->userData->first_name }}`" />
                                            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                                        </div>
                                        <div>
                                            <x-input-label for="last_name" :value="__('Last Name')" />
                                            <x-text-input id="last_name" class="block mt-1 w-full h-11" type="text"
                                                name="last_name" :value="old('name')" required autofocus autocomplete="name"
                                                placeholder="Enter your name"
                                                x-bind:value="`{{ Auth::user()->userData->last_name }}`" />
                                            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="mt-4 relative">
                                        <svg width="20" height="20"
                                            class="w-5 h-5 absolute left-4 inset-9 items-center justify-center"
                                            viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M18.3327 4.99967C18.3327 4.08301 17.5827 3.33301 16.666 3.33301H3.33268C2.41602 3.33301 1.66602 4.08301 1.66602 4.99967M18.3327 4.99967V14.9997C18.3327 15.9163 17.5827 16.6663 16.666 16.6663H3.33268C2.41602 16.6663 1.66602 15.9163 1.66602 14.9997V4.99967M18.3327 4.99967L9.99935 10.833L1.66602 4.99967"
                                                stroke="#667085" stroke-width="1.66667" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>

                                        <x-input-label for="email" :value="__('Email')" />
                                        <x-text-input id="email"
                                            class="block mt-1 w-full h-11 pl-12 cursor-not-allowed " disabled readonly
                                            type="email" name="email" :value="old('email')" required autocomplete="username"
                                            x-bind:value="`{{ Auth::user()->email }}`" />
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>

                                    <div class="mt-4 relative">
                                        <x-input-label for="email" :value="__('Phone number')" />
                                        <x-text-input id="phone" type="tel" class="block mt-2 w-full h-11"
                                            placeholder="+1 (555) 000-0000" name="phone"
                                            x-bind:value="`{{ Auth::user()->phone_number }}` ?? old('phone')" required
                                            autocomplete="off" maxlength="10" onkeypress="return onlyNumberKey(event)" />
                                        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                                        <x-text-input id="telCode" type="hidden" class="block mt-1 w-full" name="telCode"
                                            :value="+1" required autocomplete="off" />
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-panel" :class="{ 'active': activeTab === 1 }"
                    x-show.transition.in.opacity.duration.600="activeTab === 1">
                    <div class="flex-1">
                        <ul class="space-y-3">
                            <li class="md:flex flex-col sm:flex-row gap-3 p-4 border rounded-md border-secondary-200 group">
                                <div class="flex-shrink-0 m-auto w-40 h-40">
                                    <img src="images/panel.png" alt="Front of men's Basic Tee in black."
                                        class="w-full h-full object-contain m-auto rounded-md border-secondary-200">
                                </div>

                                <div class="sm:ml-6 flex flex-1 flex-col justify-between">
                                    <div class="md:flex justify-between">
                                        <div>
                                            <div class="text-gray-500 text-lg md:mb-4">October 19, 2023</div>
                                            <h3 class="text-sm">
                                                <a href="#" class="md:text-2xl text-lg font-bold">425W panels and
                                                    6.2kWh battery</a>
                                            </h3>
                                            <p class="mt-2 text-lg text-gray-500">Number of Panels</p>
                                            <p class="mt-2 text-lg text-gray-500 mb-5 md:mb-0">15 </p>
                                        </div>
                                        <div>
                                            <div class="md:text-2xl text-xl text-gray-500 font-medium mb-4">Total Payable
                                            </div>
                                            <div class="md:text-2xl text-xl font-bold">£ 10,601.00 </div>
                                        </div>
                                        <div class="text-amber-500 text-xl mt-5 md:mt-0 font-medium">In- Progress</div>
                                    </div>
                                    <a href="order-detail"
                                        class="text-right text-lg underline flex-shrink-0 font-medium text-green-600">View
                                        Details</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div>
                    <form action="{{ route('customer.profile.update.password', Auth::user()) }}" method="post"
                        id="updatePasswordForm">
                        @method('put')
                        @csrf
                        <div class="md:flex justify-between items-end">
                            <div>
                                <div class="md:text-2xl text-lg font-medium">Update Password</div>
                                <div class="md:text-lg text-base text-gray-500">Fill the details below to continue.</div>
                            </div>
                            <div class="mt-5 md:mt-0">
                                <a href="{{ route('dashboard') }}">
                                    <x-secondary-button class="text-center mr-2">
                                        {{ __('Cancel') }}
                                    </x-secondary-button>
                                </a>
                                <x-primary-button class=" text-lg text-center">
                                    {{ __('Save') }}
                                </x-primary-button>
                            </div>
                        </div>

                        <div class="mt-6 md:w-1/2 grid  grid-cols-1 gap-y-3 sm:grid-cols-2 sm:gap-x-4 "
                            x-data="{ showOldPassword: true, showNewPassword: true }">
                            <div class="sm:col-span-2">
                                <label for="old_password" class="block text-secondary-600 text-sm font-medium">Old
                                    Password</label>
                                <div class="mt-1 flex items-center relative">
                                    <input x-bind:type="showOldPassword ? 'password' : 'text'" name="old_password"
                                        class="block w-full py-3 px-4 border border-secondary-200 rounded-md placeholder:text-sm placeholder:text-secondary-500"
                                        placeholder="Enter old password here...">
                                    <div class="absolute right-2 top-1/2 -translate-y-1/2">
                                        <svg class="h-6 text-gray-700" fill="none"
                                            @click.prevent="showOldPassword = !showOldPassword"
                                            x-bind:class="{ 'hidden': !showOldPassword, 'block': showOldPassword }"
                                            xmlns="http://www.w3.org/2000/svg" viewbox="0 0 576 512">
                                            <path fill="currentColor"
                                                d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                                            </path>
                                        </svg>

                                        <svg class="h-6 text-gray-700" fill="none"
                                            @click.prevent="showOldPassword = !showOldPassword"
                                            x-bind:class="{ 'block': !showOldPassword, 'hidden': showOldPassword }"
                                            xmlns="http://www.w3.org/2000/svg" viewbox="0 0 640 512">
                                            <path fill="currentColor"
                                                d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                                @error('old_password')
                                    <p class="text-red-600 font-semibold mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="sm:col-span-2">
                                <label for="new_password" class="block text-secondary-600">New Password</label>
                                <div class="mt-1 flex items-center relative">
                                    <input x-bind:type="showNewPassword ? 'password' : 'text'" name="new_password"
                                        class="block w-full py-3 px-4 border border-secondary-200 rounded-md placeholder:text-sm placeholder:text-secondary-500 mb-2"
                                        placeholder="Enter new password here...">
                                    <div class="absolute right-2 top-1/2 -translate-y-1/2">
                                        <svg class="h-6 text-gray-700" fill="none"
                                            @click.prevent="showNewPassword = !showNewPassword"
                                            x-bind:class="{ 'hidden': !showNewPassword, 'block': showNewPassword }"
                                            xmlns="http://www.w3.org/2000/svg" viewbox="0 0 576 512">
                                            <path fill="currentColor"
                                                d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                                            </path>
                                        </svg>

                                        <svg class="h-6 text-gray-700" fill="none"
                                            @click.prevent="showNewPassword = !showNewPassword"
                                            x-bind:class="{ 'block': !showNewPassword, 'hidden': showNewPassword }"
                                            xmlns="http://www.w3.org/2000/svg" viewbox="0 0 640 512">
                                            <path fill="currentColor"
                                                d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                                @error('new_password')
                                    <p class="text-red-600 font-semibold mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="sm:col-span-2">
                                <label for="confirm_password" class="block text-secondary-600">Confirm New
                                    Password</label>
                                <div class="mt-1">
                                    <input type="password" name="confirm_password"
                                        class="block w-full py-3 px-4 border border-secondary-200 rounded-md placeholder:text-sm placeholder:text-secondary-500 mb-2"
                                        placeholder="Re-enter new password">
                                    @error('confirm_password')
                                        <p class="text-red-600 font-semibold mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>


                        </div>
                    </form>

                </div>
            </section>
        </div>
    </main>
@endsection
