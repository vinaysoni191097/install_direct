@extends('admin.partials.main')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">{{ __('Team Member') }}</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.team.members') }}">{{ __('All Members') }}</a>
                        </li>
                        <li class="breadcrumb-item">{{ __('Add Member') }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <h3 class="font-bold text-xl text-gray-800 leading-tight mb-2">
        {{ __('Add New Member') }}
    </h3>

    <div class="space-y-10 divide-y divide-gray-900/10">
        <div class="grid grid-cols-1 gap-x-8 gap-y-8 pt-2 md:grid-cols-3">
            <form action="{{ route('admin.team.member.store') }}" method="post" enctype="multipart/form-data"
                class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2" id="memberRegistrationForm">
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
                            <label for="phone"
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
                            <label for="designation"
                                class="block text-sm font-medium leading-6 text-gray-900">{{ __('Designation') }}
                                <sup class="text-red-600">*</sup>
                            </label>
                            <div class="mt-2">
                                <input type="text" value="{{ old('designation') }}" id="designation" name="designation"
                                    required maxlength="50"
                                    class="block w-full rounded-md border-1 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <x-input-error :messages="$errors->get('designation')" class="mt-2 font-semibold" />
                                <span id="designation-error" class="error"></span>

                            </div>

                        </div>
                        <div class="col-span-full">
                            <label for="description"
                                class="block text-sm font-medium leading-6 text-gray-900">{{ __('Description') }}
                                <sup class="text-red-600">*</sup>
                            </label>
                            <div class="mt-2">
                                <textarea id="description" name="description" required rows="3" maxlength="100"
                                    class="block w-full rounded-md border-1 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ old('description') }}</textarea>
                                <x-input-error :messages="$errors->get('description')" class="mt-2 font-semibold" />
                                <span id="description-error" class="error"></span>

                            </div>
                        </div>
                        <div class="col-span-full">
                            <div class="mb-3">
                                <label for="featured_image"
                                    class="form-label text-black">{{ __('Profile Image') }}</label>
                                <input id="featured_image" name="featured_image" type="file" style="display: block;"
                                    onchange="fileChosen(event)" accept="image/x-png,image/gif,image/jpeg">

                                <div class="image-preview-container w-2/6 mt-2">
                                    <span id="closeImagePreview" class="close-icon hidden">&times;</span>
                                    <img id="featuredImage" src="#" alt="Uploaded Image" class="hidden" />
                                </div>
                            </div>
                        </div>
                        <div class="sm:col-span-2 sm:col-start-1">
                            <label for="linkedIn_url"
                                class="block text-sm font-medium leading-6 text-gray-900">{{ __('LinkedIn Profile') }}
                            </label>
                            <div class="mt-2">
                                <input name="linkedIn_url" type="text" value="{{ old('linkedIn_url') }}"
                                    id="linkedIn_url"
                                    class="block w-full rounded-md border-1 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <x-input-error :messages="$errors->get('linkedIn_url')" class="mt-2 font-semibold" />
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="region"
                                class="block text-sm font-medium leading-6 text-gray-900">{{ __('Twitter') }}
                            </label>
                            <div class="mt-2">
                                <input type="text" value="{{old('twitter_url')}}" id="twitter_url" name="twitter_url"
                                    class="block w-full rounded-md border-1 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <x-input-error :messages="$errors->get('twitter_url')" class="mt-2 font-semibold" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-end gap-x-6 border-t border-gray-900/10 px-4 py-4 sm:px-8">
                    <a href="{{ route('admin.team.members') }}"
                        class="rounded-md bg-gray-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600 mb-3">
                        {{ __('Cancel') }}
                    </a>
                    <button type="submit"
                        class="rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 mb-3">
                        {{ __('Save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
<style>
    .image-preview-container {
        position: relative;
        display: inline-block;
    }

    .close-icon {
        position: absolute;
        top: 5px;
        right: 5px;
        cursor: pointer;
        font-size: 20px;
        color: red;
        z-index: 1;
    }

    .hidden {
        display: none;
    }
</style>
@push('scripts')
    {{-- Image Loader --}}
    <script type="text/javascript">
        function fileChosen(event) {
            const image = document.getElementById("featuredImage");
            const closeButton = document.getElementById("closeImagePreview");

            const reader = new FileReader();
            reader.onload = function() {
                image.src = reader.result;
                closeButton.classList.remove("hidden"); // Show close button when an image is selected
            };

            image.classList.remove("hidden");
            reader.readAsDataURL(event.target.files[0]);

            closeButton.addEventListener("click", function() {
                // Hide the image and reset its source
                image.classList.add("hidden");
                image.src = "#";

                // Hide the close button after closing the image preview
                closeButton.classList.add("hidden");
            });
        }
    </script>
@endpush
