@extends('admin.partials.main')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">{{ __('Team member') }}</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.team.members') }}">{{ __('All members') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ 'View member' }}</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="mt-2 flex gap-2">
        <a href="{{ route('admin.team.members') }}">
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#16a34a">
                <path d="M0 0h24v24H0V0z" fill="none"></path>
                <path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"></path>
            </svg>
        </a>
        <h3 class="font-bold text-xl text-gray-800 leading-tight mb-2">
            {{ __('Member Details') }}
        </h3>
    </div>

    <div class="bg-white rounded-lg p-6 mt-2">
        <div class="md:flex gap-8">
            <div class="flex justify-between w-full gap-10">
                <table class="text-sm w-2/4">
                    <tbody>
                        <tr class="border border-gray-100 odd:bg-violet-50/25">
                            <td class="text-sm px-6 py-3 text-left border-r w-64">
                                <div class="font-bold"> {{ __('First Name') }}</div>
                            </td>
                            <td class="text-sm px-6 py-3 text-left">
                                {{ $member->first_name }}
                            </td>
                        </tr>
                        <tr class="border border-gray-100 odd:bg-violet-50/25">
                            <td class="text-sm px-6 py-3 text-left border-r">
                                <div class="font-bold"> {{ __('Last Name') }}</div>
                            </td>
                            <td class="text-sm px-6 py-3 text-left">
                                {{ $member->last_name }}
                            </td>
                        </tr>
                        <tr class="border border-gray-100 odd:bg-violet-50/25">
                            <td class="text-sm px-6 py-3 text-left border-r">
                                <div class="font-bold"> {{ __('Email') }}</div>
                            </td>
                            <td class="text-sm px-6 py-3 text-left">
                                {{ $member->email }}
                            </td>
                        </tr>
                        <tr class="border border-gray-100 odd:bg-violet-50/25">
                            <td class="text-sm px-6 py-3 text-left border-r">
                                <div class="font-bold"> {{ __('Phone Number') }} </div>
                            </td>
                            <td class="text-sm px-6 py-3 text-left">
                                {{ $member->phone_number }}
                            </td>
                        </tr>
                        <tr class="border border-gray-100 odd:bg-violet-50/25">
                            <td class="text-sm px-6 py-3 text-left border-r">
                                <div class="font-bold"> {{ __('Profile Picture') }} </div>
                            </td>
                            <td class="text-sm px-6 py-3 text-left">
                                @if ($member->profile_picture)
                                    <img class="inline-block h-32 w-32 shadow "
                                        src="{{ asset('storage/' . $member->profile_picture) }}" id="profile-image"
                                        alt="Featured Image">
                                @else
                                {{__('No image uploaded yet!')}}

                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="text-sm w-2/4">
                    <tbody>
                        <tr class="border border-gray-100odd:bg-violet-50/25">
                            <td class="text-sm px-6 py-3 text-left border-r">
                                <div class="font-bold"> {{ __('Designation') }}</div>
                            </td>
                            <td class="text-sm px-6 py-3 text-left">
                                {{ $member->designation }}
                            </td>
                        </tr>
                        <tr class="border border-gray-100 odd:bg-violet-50/25">
                            <td class="text-sm px-6 py-3 text-left border-r">
                                <div class="font-bold"> {{ __('Description') }}</div>
                            </td>
                            <td class="text-sm px-6 py-3 text-left">
                                {{ $member->description }}
                            </td>
                        </tr>
                        <tr class="border border-gray-100 odd:bg-violet-50/25">
                            <td class="text-sm px-6 py-3 text-left border-r">
                                <div class="font-bold"> {{ __('Linked Profile') }} </div>
                            </td>
                            <td class="text-sm px-6 py-3 text-left">
                                {{ $member->linkedIn_url }}
                            </td>
                        </tr>
                        <tr class="border border-gray-100 odd:bg-violet-50/25">
                            <td class="text-sm px-6 py-3 text-left border-r">
                                <div class="font-bold"> {{ __('Twitter Profile') }} </div>
                            </td>
                            <td class="text-sm px-6 py-3 text-left">
                                {{ $member->twitter_url }}
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
