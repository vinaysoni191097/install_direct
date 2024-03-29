@extends('admin.partials.main')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">{{ __('Technician') }}</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item active">{{ 'View user' }}</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="mt-12 flex gap-2">
        <a href="{{ route('admin.technicians') }}">
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#16a34a">
                <path d="M0 0h24v24H0V0z" fill="none"></path>
                <path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"></path>
            </svg>
        </a>
        <h3 class="font-bold text-xl text-gray-800 leading-tight mb-2">
            {{ __('Technician Details') }}
        </h3>
    </div>

    <div class="bg-white rounded-lg p-6 mt-6">
        <div class="flex justify-content-end">
            <a href="{{ route('admin.user.edit', $technician->slug) }}"
                class="rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 mb-3">{{ 'Edit Details' }}
            </a>
        </div>
        <div class="md:flex gap-8">
            <div class="flex justify-between w-full gap-10">
                <table class="text-sm w-2/4">
                    <tbody>
                        <tr class="border border-gray-100 odd:bg-violet-50/25">
                            <td class="text-sm px-6 py-3 text-left border-r w-64">
                                <div class="font-bold"> {{ __('First Name') }}</div>
                            </td>
                            <td class="text-sm px-6 py-3 text-left">
                                {{ $technician->technicianData->first_name ?? '' }}
                            </td>
                        </tr>
                        <tr class="border border-gray-100 odd:bg-violet-50/25">
                            <td class="text-sm px-6 py-3 text-left border-r">
                                <div class="font-bold"> {{ __('Last Name') }}</div>
                            </td>
                            <td class="text-sm px-6 py-3 text-left">
                                {{ $technician->technicianData->last_name ?? '' }}
                            </td>
                        </tr>
                        <tr class="border border-gray-100 odd:bg-violet-50/25">
                            <td class="text-sm px-6 py-3 text-left border-r">
                                <div class="font-bold"> {{ __('Email') }}</div>
                            </td>
                            <td class="text-sm px-6 py-3 text-left">
                                {{ $technician->email }}
                            </td>
                        </tr>
                        <tr class="border border-gray-100 odd:bg-violet-50/25">
                            <td class="text-sm px-6 py-3 text-left border-r">
                                <div class="font-bold"> {{ __('Phone Number') }} </div>
                            </td>
                            <td class="text-sm px-6 py-3 text-left">
                                {{ $technician->phone_number }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="text-sm w-2/4">
                    <tbody>
                        <tr class="border border-gray-100odd:bg-violet-50/25">
                            <td class="text-sm px-6 py-3 text-left border-r">
                                <div class="font-bold"> {{ __('Address') }}</div>
                            </td>
                            <td class="text-sm px-6 py-3 text-left">
                                {{ $technician->full_address }}
                            </td>
                        </tr>
                        <tr class="border border-gray-100 odd:bg-violet-50/25">
                            <td class="text-sm px-6 py-3 text-left border-r">
                                <div class="font-bold"> {{ __('Account Type') }}</div>
                            </td>
                            <td class="text-sm px-6 py-3 text-left">
                                {{ $technician->accountType() }}
                            </td>
                        </tr>
                        <tr class="border border-gray-100 odd:bg-violet-50/25">
                            <td class="text-sm px-6 py-3 text-left border-r">
                                <div class="font-bold"> {{ __('Assigned Order') }} </div>
                            </td>
                            <td class="text-sm px-6 py-3 text-left">

                            </td>
                        </tr>
                        <tr class="border border-gray-100 odd:bg-violet-50/25">
                            <td class="text-sm px-6 py-3 text-left border-r">
                                <div class="font-bold"> {{ __('Account Status') }} </div>
                            </td>
                            <td class="text-sm px-6 py-3 text-left">
                                {{ $technician->account_status }}
                            </td>
                        </tr>
                        <tr class="border border-gray-100 odd:bg-violet-50/25">
                            <td class="text-sm px-6 py-3 text-left border-r">
                                <div class="font-bold"> {{ __('Availability Status') }} </div>
                            </td>
                            <td class="text-sm px-6 py-3 text-left">
                                {{ $technician->availability_status }}
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
