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
                        <li class="breadcrumb-item active">{{ 'View user' }}</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="mt-12 flex gap-2">
        <a href="{{ route('admin.users') }}">
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#16a34a">
                <path d="M0 0h24v24H0V0z" fill="none"></path>
                <path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"></path>
            </svg>
        </a>
        <h3 class="font-bold text-xl text-gray-800 leading-tight mb-2">
            {{ __('User Details') }}
        </h3>
    </div>

    <div class="bg-white rounded-lg p-6 mt-6">
        <div class="md:flex gap-8">
            <div class="flex justify-between w-full gap-10">
                <table class="text-sm w-2/4">
                    <tbody>
                        <tr class="border border-gray-100 odd:bg-violet-50/25">
                            <td class="text-sm px-6 py-3 text-left border-r w-64">
                                <div class="font-bold"> {{ __('First Name') }}</div>
                            </td>
                            <td class="text-sm px-6 py-3 text-left">
                                {{ $user->userData->first_name ?? '' }}
                            </td>
                        </tr>
                        <tr class="border border-gray-100 odd:bg-violet-50/25">
                            <td class="text-sm px-6 py-3 text-left border-r">
                                <div class="font-bold"> {{ __('Last Name') }}</div>
                            </td>
                            <td class="text-sm px-6 py-3 text-left">
                                {{ $user->userData->last_name ?? '' }}
                            </td>
                        </tr>
                        <tr class="border border-gray-100 odd:bg-violet-50/25">
                            <td class="text-sm px-6 py-3 text-left border-r">
                                <div class="font-bold"> {{ __('Email') }}</div>
                            </td>
                            <td class="text-sm px-6 py-3 text-left">
                                {{ $user->email }}
                            </td>
                        </tr>
                        <tr class="border border-gray-100 odd:bg-violet-50/25">
                            <td class="text-sm px-6 py-3 text-left border-r">
                                <div class="font-bold"> {{ __('Phone Number') }} </div>
                            </td>
                            <td class="text-sm px-6 py-3 text-left">
                                {{ $user->phone_number }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="text-sm w-2/4">
                    <tbody>
                        <tr class="border border-gray-100odd:bg-violet-50/25">
                            <td class="text-sm px-6 py-3 text-left border-r">
                                <div class="font-bold"> {{ __('Default Address') }}</div>
                            </td>
                            <td class="text-sm px-6 py-3 text-left">
                                {{ $user->getUserFullAddress($user->userData->defaultAddress) }}
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
                                {{ $user->account_status }}
                            </td>
                        </tr>
                        <tr class="border border-gray-100 odd:bg-violet-50/25">
                            <td class="text-sm px-6 py-3 text-left border-r">
                                <div class="font-bold"> {{ __('Reset Password') }} </div>
                            </td>
                            <td class="text-sm px-6 py-3 text-left">
                                <a href="{{ route('admin.user.password.reset', $user) }}"
                                    class="p-2 bg-green-600 text-white rounded-md">{{ __('Reset Password and Send Link') }}
                                </a>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>


    {{-- Sent Notifications --}}
    <div class="mt-6">
        <h3 class="font-bold text-xl text-gray-800 leading-tight mb-2">
            {{ __('Sent Notifications') }}
        </h3>
    </div>
    <div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">

                        <thead class="table-light">
                            <tr>
                                <th>{{ __('S No.') }}</th>
                                <th>{{ __('Email') }}</th>
                                <th>{{ __('Subject') }}</th>
                                <th>{{ __('Sent at') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($user->userEmailNotifications()->count() > 0)
                                @foreach ($user->userEmailNotifications as $key => $email)
                                    <tr>
                                        <th> {{ $key + 1 }}</th>
                                        <td>{!! json_decode($email->data, true)['type'] !!}</td>

                                        <td>{!! json_decode($email->data, true)['subject'] ?? 'NA' !!}</td>
                                        <td>{{ $email->created_at->format('M d Y ( H:i:s A )') }}</td>
                                        <td>
                                            <a
                                                href="{{ route('admin.user.email.view', ['user' => $user, 'notification' => $email]) }}">
                                                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" width="16"
                                                    height="16" fill="#16a34a" viewBox="0 0 16 16">
                                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"></path>
                                                    <path
                                                        d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z">
                                                    </path>
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <x-no-record-found />
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
