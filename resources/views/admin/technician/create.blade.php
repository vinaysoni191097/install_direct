@extends('admin.partials.main')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">{{ __('Technicians') }}</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.technicians') }}">{{ __('Technicians') }}</a>
                        </li>
                        <li class="breadcrumb-item">{{ __('Create technician') }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <h3 class="font-bold text-xl text-gray-800 leading-tight mb-2">
        {{ __('Technician Details') }}
    </h3>

    <div class="space-y-10 divide-y divide-gray-900/10">
        <div class="grid grid-cols-1 gap-x-8 gap-y-8 pt-10 md:grid-cols-3">
            <form action="{{ route('admin.technician.store') }}" method="post"
                class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2" id="userRegistrationForm">
                @csrf
                <div class="px-4 py-6 sm:p-8">
                    <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-3">
                            <label for="first-name"
                                class="block text-sm font-medium leading-6 text-gray-900">{{ __('First name') }}
                                <sup class="text-red-600">*</sup>
                            </label>
                            <div class="mt-2">
                                <input type="text" name="first_name" value="{{ old('first_name') }}" id="first_name"
                                    required
                                    class="block w-full rounded-md border-1 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <x-input-error :messages="$errors->get('first_name')" class="mt-2 font-semibold" />
                                <span id="name-error" class="error"></span>
                            </div>
                        </div>
                        <div class="sm:col-span-3">
                            <label for="last-name"
                                class="block text-sm font-medium leading-6 text-gray-900">{{ __('Last name') }}
                                <sup class="text-red-600">*</sup>
                            </label>
                            <div class="mt-2">
                                <input type="text" name="last_name" value="{{ old('last_name') }}" id="last_name"
                                    required
                                    class="block w-full rounded-md border-1 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <x-input-error :messages="$errors->get('last_name')" class="mt-2 font-semibold" />
                                <span id="last_name-error" class="error"></span>

                            </div>
                        </div>
                        <div class="sm:col-span-3">
                            <label for="first-name"
                                class="block text-sm font-medium leading-6 text-gray-900">{{ __('Email address') }}
                                <sup class="text-red-600">*</sup>
                            </label>
                            <div class="mt-2">
                                <input type="email" name="email" id="email" value="{{ old('email') }}" required
                                    class="block w-full rounded-md border-1 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <x-input-error :messages="$errors->get('email')" class="mt-2 font-semibold" />
                                <span id="email-error" class="error"></span>

                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="last-name"
                                class="block text-sm font-medium leading-6 text-gray-900">{{ __('Phone Number') }}
                                <sup class="text-red-600">*</sup>
                            </label>
                            <div class="mt-2">
                                <input type="text" name="phone" value="{{ old('phone') }}" required maxlength="15"
                                    class="block w-full rounded-md border-1 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <x-input-error :messages="$errors->get('phone')" class="mt-2 font-semibold" />
                                <span id="phone-error" class="error"></span>

                            </div>
                        </div>
                        <div class="col-span-full">
                            <label for="street-address"
                                class="block text-sm font-medium leading-6 text-gray-900">{{ __('Street address') }}
                                <sup class="text-red-600">*</sup>
                            </label>
                            <div class="mt-2">
                                <input type="text" value="" id="address" name="address" required maxlength="20"
                                    class="block w-full rounded-md border-1 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <x-input-error :messages="$errors->get('address')" class="mt-2 font-semibold" />
                            </div>
                        </div>
                        <div class="sm:col-span-4">
                            <label for="country"
                                class="block text-sm font-medium leading-6 text-gray-900">{{ __('Country') }}
                                <sup class="text-red-600">*</sup>
                            </label>
                            <div class="mt-2">
                                <input type="text" value="{{ old('country') }}" id="country" name="country" required
                                    maxlength="10"
                                    class="block w-full rounded-md border-1 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <x-input-error :messages="$errors->get('country')" class="mt-2 font-semibold" />
                            </div>
                        </div>

                        <div class="sm:col-span-2 sm:col-start-1">
                            <label for="city"
                                class="block text-sm font-medium leading-6 text-gray-900">{{ __('City') }}
                                <sup class="text-red-600">*</sup>
                            </label>
                            <div class="mt-2">
                                <input name="city" type="text" value="{{ old('city') }}" id="city"
                                    required maxlength="10"
                                    class="block w-full rounded-md border-1 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <x-input-error :messages="$errors->get('address')" class="mt-2 font-semibold" />
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="region"
                                class="block text-sm font-medium leading-6 text-gray-900">{{ __('State / Province') }}
                                <sup class="text-red-600">*</sup>
                            </label>
                            <div class="mt-2">
                                <input type="text" value="{{ old('state') }}" id="state" name="state"
                                    required maxlength="10"
                                    class="block w-full rounded-md border-1 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <x-input-error :messages="$errors->get('state')" class="mt-2 font-semibold" />
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="postal-code"
                                class="block text-sm font-medium leading-6 text-gray-900">{{ __('Postal code') }}
                                <sup class="text-red-600">*</sup>
                            </label>
                            <div class="mt-2">
                                <input type="text" value="{{ old('zip') }}" id="zip" name="zip"
                                    required maxlength="8"
                                    class="block w-full rounded-md border-1 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <x-input-error :messages="$errors->get('zip')" class="mt-2 font-semibold" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-end gap-x-6 border-t border-gray-900/10 px-4 py-4 sm:px-8">
                    <a href="{{ route('admin.technicians') }}" type="button"
                        class="rounded-md bg-gray-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600 mb-3">Cancel</a>
                    <button type="submit"
                        class="rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 mb-3">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
