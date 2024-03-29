@extends('admin.partials.main')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">{{ __('My Account') }}</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item active">{{ 'View profile' }}</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>


    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.password.update', Auth::user()) }}" method="post" id="updatePasswordForm">
                @method('put')
                @csrf
                <div class="md:flex justify-between items-end">
                    <div>
                        <div class="md:text-xl text-md font-medium text-gray-700">Update Password</div>
                        <div class="md:text-md text-base text-gray-800">Fill the details below to continue.</div>
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

                <div class="mt-6 md:w-1/2 grid  grid-cols-1 gap-y-3 sm:grid-cols-2 sm:gap-x-4 " x-data="{
                    showOldPassword: true,
                    showNewPassword: true
                }"
                    x-cloak>
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
    </div>
@endsection
