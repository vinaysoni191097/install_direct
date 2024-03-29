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
    <!-- end page title -->
    <div class="mt-12 flex gap-2">
        <a href="{{ route('home') }}">
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#16a34a">
                <path d="M0 0h24v24H0V0z" fill="none"></path>
                <path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"></path>
            </svg>
        </a>
        <h3 class="font-bold text-xl text-gray-800 leading-tight mb-2">
            {{ __('Account Details') }}
        </h3>
    </div>
    <form action="{{ route('admin.profile.update', $user) }}" method="POST" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="bg-white rounded-lg p-6 mt-6">
            <div class="md:flex gap-8">
                <div class="flex justify-between w-full">
                    <div class="flex items-center justify-center w-2/6">
                        @if ($user->userData->profile_picture)
                            <img class="inline-block h-72 w-72 shadow-lg rounded-xl ring-2 ring-white"
                                src="{{ asset('storage/' . $user->userData->profile_picture) }}" id="profile-image"
                                alt="profile-image">
                        @else
                            <span
                                class="h-64 w-64 rounded-xl shadow-lg ring-2 ring-white bg-[#252b3b] text-white font-bold text-center items-center py-8 text-6xl flex justify-center"
                                id="setLogo">{{ $user->nameInitials }}
                            </span>
                            <img class="h-64 w-64 rounded-xl shadow-lg hidden" src="" alt=""
                                id="featuredImage">
                        @endif
                    </div>

                    <table class="text-sm w-4/6">
                        <tbody>
                            <tr class="border border-gray-100 odd:bg-violet-50/25">
                                <td class="text-sm px-6 py-3 text-left border-r w-64">
                                    <div class="font-bold"> {{ __('First Name') }}</div>
                                </td>
                                <td class="text-sm px-6 py-3 text-left">
                                    <input class="p-2 border border-green-500 outline-green-500 rounded-md w-full"
                                        type="text" name="first_name" id=""
                                        value="{{ $user->userData->first_name ?? '' }}">
                                </td>
                            </tr>
                            <tr class="border border-gray-100 odd:bg-violet-50/25">
                                <td class="text-sm px-6 py-3 text-left border-r">
                                    <div class="font-bold"> {{ __('Last Name') }}</div>
                                </td>
                                <td class="text-sm px-6 py-3 text-left">
                                    <input class="p-2 border border-green-500 outline-green-500 rounded-md w-full"
                                        type="text" name="last_name" id=""
                                        value=" {{ $user->userData->last_name ?? '' }}">
                                </td>
                            </tr>
                            <tr class="border border-gray-100 odd:bg-violet-50/25">
                                <td class="text-sm px-6 py-3 text-left border-r">
                                    <div class="font-bold"> {{ __('Email') }}</div>
                                </td>
                                <td class="text-sm px-6 py-3 text-left">
                                    <input class="p-2 border border-green-500 outline-green-500 rounded-md w-full"
                                        type="email" name="email" id="" value=" {{ $user->email }}">
                                </td>
                            </tr>
                            <tr class="border border-gray-100 odd:bg-violet-50/25">
                                <td class="text-sm px-6 py-3 text-left border-r">
                                    <div class="font-bold"> {{ __('Phone Number') }} </div>
                                </td>
                                <td class="text-sm px-6 py-3 text-left">
                                    <input class="p-2 border border-green-500 outline-green-500 rounded-md w-full"
                                        type="text" name="phone" id="" value=" {{ $user->phone_number }}">
                                </td>
                            </tr>
                            <tr class="border border-gray-100 odd:bg-violet-50/25">
                                <td class="text-sm px-6 py-3 text-left border-r">
                                    <div class="font-bold"> {{ __('Account Type') }}</div>
                                </td>
                                <td class="text-sm px-6 py-3 text-left">
                                    {{ $user->accountType() }}
                                </td>
                            </tr>
                            <tr class="border border-gray-100 odd:bg-violet-50/25">
                                <td class="text-sm px-6 py-3 text-left border-r">
                                    <div class="font-bold"> {{ __('Status') }} </div>
                                </td>
                                <td class="text-sm px-6 py-3 text-left">
                                    Activate
                                </td>
                            </tr>
                            <tr class="border border-gray-100 odd:bg-violet-50/25">
                                <td class="text-sm px-6 py-3 text-left border-r">
                                    <div class="font-bold"> {{ __('Upload Profile Picture') }} </div>
                                </td>
                                <td class="text-sm px-6 py-3 text-left">
                                    <input class="p-2 border border-green-500 outline-green-500 rounded-md w-full"
                                        type="file" name="profile_picture" onchange="fileChosen(event)">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="flex justify-content-end">
                <button @click.prevent="tagDataModal = true ,url='{{ route('admin.tag.store') }}'"
                    class="rounded-md bg-[#252b3b] px-3 py-2 text-sm font-semibold text-white shadow-sm mt-3">{{ 'Update' }}
                </button>
            </div>
        </div>
    </form>
@endsection

@push('scripts')
    <script>
        function fileChosen(event) {
            const image = document.getElementById("featuredImage");
            const noImage = document.getElementById('setLogo');
            noImage.classList.add('hidden');
            image.classList.remove('hidden');
            const reader = new FileReader();
            reader.onload = function() {
                image.src = reader.result;
            };
            image.classList.remove("hidden");
            reader.readAsDataURL(event.target.files[0]);

        }
    </script>
@endpush
