@extends('admin.partials.main')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">{{ __('Users') }}</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.users') }}">{{ __('Users') }}</a></li>
                        <li class="breadcrumb-item active">{{ 'Edit user' }}</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div>
        <h3 class="font-bold text-xl text-gray-800 leading-tight mb-4">
            {{ __('User Details') }}
        </h3>
    </div>

    <div class="space-y-10 divide-y divide-gray-900/10">
        <div class="grid grid-cols-1 gap-x-8 gap-y-8 md:grid-cols-3">
            <form action="{{ route('admin.user.update', $user) }}" method="post" id="userRegistrationForm"
                class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2">
                @method('put')
                @csrf
                <div class="px-4 py-6 sm:p-8">
                    <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-3">
                            <label for="first_name"
                                class="block text-sm font-medium leading-6 text-gray-900">{{ __('First name') }}
                                <sup class="text-red-500">*</sup>
                            </label>
                            <div class="mt-2">
                                <input type="text" type="text" name="first_name"
                                    value="{{ $user->userData->first_name ?? '' }}" id="first_name" required
                                    class="block w-full rounded-md border-1 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <x-input-error :messages="$errors->get('first_name')" class="mt-2 font-semibold" />
                            </div>
                            <span id="name-error" class="error"></span>
                        </div>
                        <div class="sm:col-span-3">
                            <label for="last_name"
                                class="block text-sm font-medium leading-6 text-gray-900">{{ __('Last name') }}
                                <sup class="text-red-500">*</sup>
                            </label>
                            <div class="mt-2">
                                <input type="text" name="last_name" value="{{ $user->userData->last_name ?? '' }}"
                                    id="last_name" required
                                    class="block w-full rounded-md border-1 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <x-input-error :messages="$errors->get('last_name')" class="mt-2 font-semibold" />
                                <span id="last_name-error" class="error"></span>
                            </div>
                        </div>
                        <div class="sm:col-span-3">
                            <label for="email"
                                class="block text-sm font-medium leading-6 text-gray-900">{{ __('Email address') }}
                                <sup class="text-red-500">*</sup>
                            </label>
                            <div class="mt-2">
                                <input type="email" name="email" id="email" value="{{ $user->email }}" required
                                    class="block w-full rounded-md border-1 py-1.5  px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <x-input-error :messages="$errors->get('email')" class="mt-2 font-semibold" />
                            </div>
                            <span id="email-error" class="error"></span>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="phone"
                                class="block text-sm font-medium leading-6 text-gray-900">{{ __('Phone Number') }}
                                <sup class="text-red-500">*</sup>
                            </label>
                            <div class="mt-2">
                                <input type="text" name="phone_number" value="{{ $user->phone_number }}" required
                                    maxlength="15"
                                    class="block w-full rounded-md border-1 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">

                                <x-input-error :messages="$errors->get('phone_number')" class="mt-2 font-semibold" />
                            </div>
                            <span id="phone-error" class="error"></span>
                        </div>

                    </div>
                </div>
                <div class="flex items-center justify-end gap-x-6 border-t border-gray-900/10 px-4 py-4 sm:px-8">
                    <a href="{{ route('admin.users') }}" type="button"
                        class="rounded-md bg-gray-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600 mb-3">Cancel</a>
                    <button type="submit"
                        class="rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 mb-3">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
