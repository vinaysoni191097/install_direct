@extends('admin.partials.main')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">{{ __('Settings') }}</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item active">{{ 'Settings' }}</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="grid grid-cols-1 gap-x-8 gap-y-8 pt-10 md:grid-cols-3">


        <form action="{{ route('admin.settings.update', $companyData->id) }}" method="POST" id="settingsForm"
            enctype="multipart/form-data" class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2">
            @method('put')
            @csrf
            <div class="px-4 py-6 sm:p-8">
                <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                        <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">
                            {{ __('Company Name') }}
                            <sup class="text-red-500">*</sup>
                        </label>
                        <div class="mt-2">
                            <input type="text" name="company_name"
                                value="{{ $companyData->company_name ?? old('company_name') }}" required maxlength="20"
                                class="block px-2 w-full rounded-md border-1 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                        <x-input-error :messages="$errors->get('company_name')" class="mt-1" />
                        <span id="company_name-error" class="error"></span>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="last-name"
                            class="block text-sm font-medium leading-6 text-gray-900">{{ __('Company Email') }}
                            <sup class="text-red-500">*</sup>
                        </label>
                        <div class="mt-2">
                            <input type="email" name="company_email"
                                value="{{ $companyData->company_email ?? old('company_email') }}" required
                                class="block px-2 w-full rounded-md border-1 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                        <x-input-error :messages="$errors->get('company_email')" class="mt-1" />
                        <span id="company_email-error" class="error"></span>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="email"
                            class="block text-sm font-medium leading-6 text-gray-900">{{ __('Phone Number') }}
                            <sup class="text-red-500">*</sup>
                        </label>
                        <div class="mt-2">
                            <input type="tel" name="company_phone_number" required maxlength="10" minlength="10"
                                value="{{ $companyData->company_phone_number ?? old('company_phone_number') }}"
                                class="block px-2 w-full rounded-md border-1 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                        <x-input-error :messages="$errors->get('company_phone_number')" class="mt-1" />
                        <span id="company_phone_number-error" class="error"></span>
                    </div>
                    <div class="sm:col-span-3">
                        <label for="email"
                            class="block text-sm font-medium leading-6 text-gray-900">{{ __('Site URL') }}
                            <sup class="text-red-500">*</sup>
                        </label>
                        <div class="mt-2">
                            <input type="text" name="site_url" value="{{ $companyData->site_url ?? old('site_url') }}"
                                class="block px-2 w-full rounded-md border-1 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                        <x-input-error :messages="$errors->get('site_url')" class="mt-1" />
                        <span id="site_url-error" class="error"></span>
                    </div>
                    <div class="sm:col-span-3">
                        <label for="email"
                            class="block text-sm font-medium leading-6 text-gray-900">{{ __('Facebook') }}</label>
                        <div class="mt-2">
                            <input type="text" name="facebook_url"
                                value="{{ $companyData->facebook_url ?? old('facebook_url') }}"
                                class="block px-2 w-full rounded-md border-1 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="sm:col-span-3">
                        <label for="email"
                            class="block text-sm font-medium leading-6 text-gray-900">{{ __('Instagram') }}</label>
                        <div class="mt-2">
                            <input type="text" name="instagram_url"
                                value="{{ $companyData->instagram_url ?? old('instagram_url') }}"
                                class="block px-2 w-full rounded-md border-1 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="sm:col-span-3">
                        <label for="email"
                            class="block text-sm font-medium leading-6 text-gray-900">{{ __('X (Twitter)') }}</label>
                        <div class="mt-2">
                            <input type="text" name="x_url" value="{{ $companyData->x_url ?? old('x_url') }}"
                                class="block w-full rounded-md border-1 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="sm:col-span-3">
                        <label for="email"
                            class="block text-sm font-medium leading-6 text-gray-900">{{ __('LinkedIn') }}</label>
                        <div class="mt-2">
                            <input type="text" name="linkedIn_url"
                                value="{{ $companyData->linkedIn_url ?? old('linkedIn_url') }}"
                                class="block w-full rounded-md border-1 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                </div>
            </div>
            <div class="flex items-center justify-end gap-x-6 border-t border-gray-900/10 px-4 py-4 sm:px-8">
                <button type="submit"
                    class="bg-green-500 p-2 text-white font-semibold rounded-md">{{ __('Save') }}</button>
            </div>
        </form>
    </div>
@endsection
