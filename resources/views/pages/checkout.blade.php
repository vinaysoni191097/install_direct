@extends('layouts.inner')
@section('content')
    <header class="fixed inset-x-0 bg-secondary-100 border-b z-10 bg-white">
        <button type="button" id="exitModal-{{ 1 }}" onclick="exitModal(event)">
            <svg width="48" height="48" viewBox="0 0 48 48" class="absolute right-1 top-4" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_285_2978)">
                    <path
                        d="M25.8801 23.9999L36.9335 12.9466C37.1519 12.6915 37.266 12.3634 37.2531 12.0279C37.2401 11.6923 37.101 11.374 36.8635 11.1365C36.6261 10.899 36.3078 10.7599 35.9722 10.747C35.6366 10.734 35.3085 10.8482 35.0535 11.0666L24.0001 22.1199L12.9468 11.0533C12.6957 10.8022 12.3552 10.6611 12.0001 10.6611C11.6451 10.6611 11.3045 10.8022 11.0535 11.0533C10.8024 11.3043 10.6613 11.6449 10.6613 11.9999C10.6613 12.355 10.8024 12.6955 11.0535 12.9466L22.1201 23.9999L11.0535 35.0533C10.9139 35.1728 10.8005 35.3199 10.7205 35.4853C10.6405 35.6507 10.5955 35.8309 10.5884 36.0145C10.5813 36.1981 10.6122 36.3813 10.6793 36.5524C10.7463 36.7235 10.848 36.8789 10.9779 37.0088C11.1079 37.1387 11.2633 37.2404 11.4344 37.3074C11.6055 37.3745 11.7886 37.4054 11.9722 37.3983C12.1558 37.3912 12.336 37.3463 12.5014 37.2662C12.6668 37.1862 12.8139 37.0728 12.9335 36.9333L24.0001 25.8799L35.0535 36.9333C35.3085 37.1517 35.6366 37.2658 35.9722 37.2529C36.3078 37.2399 36.6261 37.1008 36.8635 36.8633C37.101 36.6259 37.2401 36.3076 37.2531 35.972C37.266 35.6364 37.1519 35.3083 36.9335 35.0533L25.8801 23.9999Z"
                        fill="#878686" />
                </g>
                <defs>
                    <clipPath id="clip0_285_2978">
                        <rect width="48" height="48" fill="white" />
                    </clipPath>
                </defs>
            </svg>
        </button>

        <nav aria-label="Progress" class="pt-8 md:pt-10 md:pb-12 pb-6">
            <ol role="list" class="flex items-center justify-center">
                <li class="relative pr-8 md:pr-48 xl:pr-80">
                    <span class="absolute text-lg hidden md:block font-semibold -left-14" style="margin-top: 32px;">Property
                        Information</span>
                    <div class="md:absolute hidden md:block  inset-0 flex items-center" aria-hidden="true">
                        <svg class="w-full" width="107" height="8" viewBox="0 0 107 8" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M1 3.5C0.723858 3.5 0.5 3.72386 0.5 4C0.5 4.27614 0.723858 4.5 1 4.5V3.5ZM106.354 4.35355C106.549 4.15829 106.549 3.84171 106.354 3.64645L103.172 0.464466C102.976 0.269204 102.66 0.269204 102.464 0.464466C102.269 0.659728 102.269 0.976311 102.464 1.17157L105.293 4L102.464 6.82843C102.269 7.02369 102.269 7.34027 102.464 7.53553C102.66 7.7308 102.976 7.7308 103.172 7.53553L106.354 4.35355ZM1 4.5H106V3.5H1V4.5Z"
                                fill="#009A4F" />
                        </svg>
                    </div>
                    <a href="#" class="relative flex  h-10 w-10 items-center justify-center " aria-current="step">
                        <svg width="70" class="mb-5" height="70" viewBox="0 0 53 54" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <circle cx="26.5" cy="27" r="26.5" fill="#009A4F" />
                            <path
                                d="M26.5 16.5569L16.7778 24.3347V35.2222H23.7222V29.6667H29.2778V35.2222H36.2222V25.0028C36.2223 24.7945 36.1755 24.5889 36.0854 24.4011C35.9952 24.2133 35.864 24.0482 35.7014 23.9181L26.5 16.5569ZM26.5 13L37.4361 21.75C37.9238 22.1401 38.3175 22.6349 38.5882 23.1976C38.8589 23.7604 38.9997 24.3769 39 25.0014V35.2222C39 35.9589 38.7073 36.6655 38.1864 37.1864C37.6655 37.7073 36.9589 38 36.2222 38H16.7778C16.0411 38 15.3345 37.7073 14.8136 37.1864C14.2927 36.6655 14 35.9589 14 35.2222V24.3347C14.0001 23.9184 14.0937 23.5074 14.274 23.1321C14.4543 22.7568 14.7167 22.4269 15.0417 22.1667L26.5 13Z"
                                fill="white" />
                        </svg>
                        <span class="sr-only">step 1</span>
                    </a>
                </li>
                <li class="relative pr-8 md:pr-48 xl:pr-80">
                    <span class="absolute text-lg hidden md:block font-semibold -left-14"
                        style="margin-top: 30px;">Recommended Panels</span>
                    <div class="md:absolute  hidden md:block  inset-0 flex items-center" aria-hidden="true">
                        <svg class="w-full" width="107" height="8" viewBox="0 0 107 8" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M1 3.5C0.723858 3.5 0.5 3.72386 0.5 4C0.5 4.27614 0.723858 4.5 1 4.5V3.5ZM106.354 4.35355C106.549 4.15829 106.549 3.84171 106.354 3.64645L103.172 0.464466C102.976 0.269204 102.66 0.269204 102.464 0.464466C102.269 0.659728 102.269 0.976311 102.464 1.17157L105.293 4L102.464 6.82843C102.269 7.02369 102.269 7.34027 102.464 7.53553C102.66 7.7308 102.976 7.7308 103.172 7.53553L106.354 4.35355ZM1 4.5H106V3.5H1V4.5Z"
                                fill="#009A4F" />
                        </svg>
                    </div>
                    <a href="#" class="relative flex   h-10 w-10 items-center justify-center " aria-current="step">
                        <svg class="mb-5" width="54" height="54" viewBox="0 0 54 54" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <circle cx="27" cy="27" r="26.5" fill="#009A4F" />
                            <path
                                d="M26.4167 11V13.8102L24.4526 11.8797L22.9641 13.3692L24.8913 15.3333H22.0833V17.5H24.8935L22.9641 19.4641L24.4526 20.9526L26.4167 19.0253V21.8333H28.5833V19.0232L30.5474 20.9526L32.037 19.4641L30.1054 17.5H32.9167V15.3333H30.1065L32.037 13.3692L30.5474 11.8797L28.5833 13.8112V11H26.4167ZM27.5 14.25C28.6938 14.25 29.6667 15.2228 29.6667 16.4167C29.6667 17.6105 28.6938 18.5833 27.5 18.5833C26.3062 18.5833 25.3333 17.6105 25.3333 16.4167C25.3333 15.2228 26.3062 14.25 27.5 14.25ZM16.9039 24L14.5 33.6146V37H40.5V33.6146L38.0961 24H16.9039ZM18.5961 26.1667H36.405L38.3333 33.8854V34.8333H16.6667V33.8854L18.5961 26.1667ZM19.9167 27.25L19.4768 29.2141H21.7453L22.0833 27.25H19.9167ZM24.25 27.25L24.0463 29.2141H26.3148L26.4167 27.25H24.25ZM28.5833 27.25L28.6852 29.2141H30.9526L30.75 27.25H28.5833ZM32.9167 27.25L33.2558 29.2141H35.5232L35.0833 27.25H32.9167ZM19.0359 31.3808L18.6318 33.75H21.1018L21.4409 31.3797L19.0359 31.3808ZM23.9109 31.3808L23.7083 33.75H26.2141L26.3148 31.3797L23.9109 31.3808ZM28.6852 31.3808L28.7859 33.75H31.2917L31.088 31.3797L28.6852 31.3808ZM33.5602 31.3808L33.8982 33.75H36.3703L35.9641 31.3797L33.5602 31.3808Z"
                                fill="white" />
                        </svg>
                        <span class="sr-only">step 2</span>
                    </a>
                </li>
                <li class="relative">
                    <span class="absolute text-lg text-gray-600 hidden md:block font-normal -left-5"
                        style="margin-top: 30px;">Reservation</span>
                    <a href="#" class="relative flex   h-10 w-10 items-center justify-center">
                        <svg class="mb-5" width="70" height="70" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_317_326)">
                                <path
                                    d="M10.5 6V7.5H6V6H10.5ZM6 10.5V9H10.5V10.5H6ZM6 13.5V12H9V13.5H6ZM4.5 6V7.5H3V6H4.5ZM4.5 9V10.5H3V9H4.5ZM3 13.5V12H4.5V13.5H3ZM4.5 1.5C2.84315 1.5 1.5 2.84315 1.5 4.5V19.5C1.5 21.1569 2.84315 22.5 4.5 22.5H9V24H4C1.79086 24 0 22.2091 0 20V4C0 1.79086 1.79086 0 4 0H13.0664L19.5 6.43359V9H18V7.5H12V1.5H4.5ZM13.5 2.56641V6H16.9336L13.5 2.56641ZM21 12H24V20C24 22.2091 22.2091 24 20 24H10.5V12H13.5V10.5H15V12H19.5V10.5H21V12ZM19.5 22.5C21.1569 22.5 22.5 21.1569 22.5 19.5V16.5H12V22.5H19.5ZM22.5 15V13.5H12V15H22.5Z"
                                    fill="#009A4F" />
                            </g>
                            <defs>
                                <clipPath id="clip0_317_326">
                                    <rect width="24" height="24" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                        <span class="sr-only">step 3</span>
                    </a>
                </li>
            </ol>
        </nav>
    </header>



    <form action="{{ route('customer.place.order') }}" method="POST" id="paymentForm">
        @csrf
        <main class="pt-32 md:pt-[165px] space-y-8 lg:h-screen">
            <section class="mx-auto max-w-7xl 2xl:max-w-screen-2xl px-4 lg:px-12  h-full">
                <div class="mb-3 flex gap-3 cursor-pointer">
                    <a href="{{ route('customer.property.recommendedProduct') }}" class="flex gap-3">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor" stroke="none"
                            viewBox="0 0 24 24">
                            <path d="M21 11H6.414l5.293-5.293-1.414-1.414L2.586 12l7.707 7.707 1.414-1.414L6.414 13H21z">
                            </path>
                        </svg>
                        <div class="text-green-600 font-semibold">Back to Products</div>
                    </a>
                </div>
                <!--Billing Information-->
                <div class="md:flex w-full gap-20 pb-20">
                    <div class="md:flex-1 md:w-1/2">
                        <div class="border md:px-12 px-6 py-6 w-full rounded" x-data="{ billinginfo: true }">
                            <div class="flex justify-between">
                                <div class="text-xl font-medium">Billing Information</div>
                                <svg class="cursor-pointer" @click.prevent="billinginfo = ! billinginfo"
                                    :class="billinginfo && 'rotate-180'" width="32" height="32"
                                    viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8 12L16 20L24 12" stroke="#667085" stroke-width="1.67"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>

                            <div x-show="billinginfo" x-transition>
                                @if ($user->userBillingAddresses->isNotEmpty())
                                    @foreach ($user->userBillingAddresses as $key => $address)
                                        <div class="mt-5  gap-3  p-3 text-sm relative">
                                            <input type="radio"
                                                class="absolute left-[-20px] my-1 w-5 h-5 border-2 border-gray-300 accent-green-600 focus:text-green-600 peer/savedaddress"
                                                name="addressId" value="{{ $address->id }}" checked id="savedaddress"
                                                name="paymentMethod">
                                            <label for="savedaddress" class="block text-secondary-600 flex-1">
                                                <div class="font-medium text-lg">{{ $address->new_address_full_name }}
                                                </div>
                                                <div class="font-light text-lg">
                                                    {{ $address->fullAddress }}
                                                </div>
                                                <div class="font-light text-lg">{{ $address->phone_number }}</div>
                                            </label>
                                        </div>
                                    @endforeach
                                @endif
                                <div class="mt-5 gap-3 items-center rounded p-3 text-sm relative">
                                    <input type="radio"
                                        class="absolute left-[-20px] my-1 w-5 h-5 border-2 border-gray-300 accent-green-600 text-primary focus:ring-primary peer/addnewaddress"
                                        id="addnewaddress" name="addressId" value="">
                                    <label for="addnewaddress"
                                        class="block text-secondary-600 flex-1 font-medium text-lg">{{ __('Add New Address') }}</label>
                                    <div
                                        class="text-secondary-600 text-lg  flex-1 hidden peer-checked/addnewaddress:block">
                                        <div class="mt-2 grid  grid-cols-1 gap-y-3 sm:grid-cols-2 sm:gap-x-4 ">
                                            <div class="sm:col-span-2">
                                                <label for="shippingFullName"
                                                    class="block text-secondary-600">{{ __('Full Name') }}</label>
                                                <div class="mt-1">
                                                    <input type="text" id="shippingFullName" name="shippingFullName"
                                                        value="{{ Auth::user()->name ?? old('shippingFullName') }}"
                                                        class="block w-full py-3 px-4 border border-secondary-200 rounded-md placeholder:text-sm placeholder:text-secondary-500"
                                                        placeholder="Enter First Name">
                                                </div>
                                                @error('shippingFullName')
                                                    <p class="text-red-600 mt-2 ">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="sm:col-span-2">
                                                <label for="phone_number"
                                                    class="block text-secondary-600">{{ __('Phone Number') }}</label>
                                                <div class="mt-1">
                                                    <input type="text" name="phone_number" id="phone_number"
                                                        maxlength="15" value="{{ old('phone_number') }}"
                                                        class="block w-full py-3 px-4 border border-secondary-200 rounded-md placeholder:text-sm placeholder:text-secondary-500"
                                                        placeholder="Phone number">
                                                </div>
                                            </div>
                                            <div>
                                                <label for="country"
                                                    class="block text-secondary-600">{{ __('Country') }}</label>
                                                <div class="mt-1">
                                                    <select id="country" name="country" onchange="getCities()"
                                                        class="block w-full py-3 px-4 border border-secondary-200 rounded-md placeholder:text-sm placeholder:text-secondary-500">
                                                        <option value="" selected disabled>Select</option>
                                                        <option value="England">England</option>
                                                        <option value="Scotland">Scotland</option>
                                                        <option value="Wales">Wales</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div>
                                                <label for="city"
                                                    class="block text-secondary-600">{{ __('City') }}</label>
                                                <div class="mt-1">
                                                    <select id="city" name="city"
                                                        class="block w-full py-3 px-4 border border-secondary-200 rounded-md placeholder:text-sm placeholder:text-secondary-500">
                                                        <option value="" selected disabled>Select</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="sm:col-span-2">
                                                <label for="zip"
                                                    class="block text-secondary-600">{{ __('Postal Code') }}</label>
                                                <div class="mt-1">
                                                    <input type="text" name="zip" id="zip" maxlength="8"
                                                        value="{{ old('zip') }}"
                                                        class="block w-full py-3 px-4 border border-secondary-200 rounded-md placeholder:text-sm placeholder:text-secondary-500 mb-2"
                                                        placeholder="Enter postal code">
                                                    @error('zip')
                                                        <p class="text-red-600 font-semibold mt-2">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="sm:col-span-2">
                                                <label for="shippingAddress2"
                                                    class="block text-secondary-600">{{ __('Address') }}
                                                </label>
                                                <div class="mt-1">
                                                    <textarea
                                                        class="block w-full py-3 px-4 border border-secondary-200 rounded-md placeholder:text-sm placeholder:text-secondary-500 resize-none"
                                                        name="shippingAddress2" placeholder="Enter Address" maxlength="20">{{ old('shippingAddress2') }}</textarea>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- installation Address  --}}
                        <div class="border md:px-12 px-6 py-6 w-full rounded mt-4" x-data="{ installationAddress: true }">
                            <div class="flex justify-between">
                                <div class="text-xl font-medium">Installation Address</div>
                                <svg class="cursor-pointer" @click.prevent="installationAddress = ! installationAddress"
                                    :class="installationAddress && 'rotate-180'" width="32" height="32"
                                    viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8 12L16 20L24 12" stroke="#667085" stroke-width="1.67"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>


                            <div x-show="installationAddress" x-transition>
                                @if ($user->userInstallationAddress)
                                    <div class="gap-3  p-3 text-sm relative">
                                        <label for="savedaddress" class="block text-secondary-600 flex-1">
                                            <div class="font-light text-lg">{{ $user->userInstallationAddress->address }}
                                            </div>
                                            <div class="font-light text-lg">
                                                {{ $user->userInstallationAddress->zip }}
                                            </div>
                                            <div class="font-light text-lg">
                                                <p class="text-medium font-medium">Installation Timeframe</p>
                                                {{ $user->userInstallationAddress->installation_timeframe }}
                                            </div>
                                        </label>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <!--Payment Method-->
                        {{-- <div class="border mt-10  md:px-12 px-6 py-6 w-full rounded" x-data="{ paymentmethod: true }">
                            <div class="flex justify-between">
                                <div class="text-xl font-medium">Payment Method</div>
                                <svg class="cursor-pointer" @click="paymentmethod = ! paymentmethod"
                                    :class="paymentmethod && 'rotate-180'" width="32" height="32"
                                    viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8 12L16 20L24 12" stroke="#667085" stroke-width="1.67"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div x-show="paymentmethod" x-transition>
                                <div class="mt-5 flex items-center gap-3 border border-secondary-200 rounded p-3 text-sm">
                                    <input type="radio" name="status"
                                        class="w-5 h-5 border-2 border-gray-300 text-primary accent-green-600 focus:ring-primary peer/creditCard"
                                        id="creditCard" checked name="paymentMethod">
                                    <svg width="46" height="32" viewBox="0 0 46 32" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect x="0.5" y="0.5" width="45" height="31" rx="5.5"
                                            fill="white" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M22.9053 22.4392C21.3266 23.7699 19.2787 24.5732 17.0409 24.5732C12.0478 24.5732 8 20.5736 8 15.6399C8 10.7061 12.0478 6.70654 17.0409 6.70654C19.2787 6.70654 21.3266 7.50987 22.9053 8.8406C24.484 7.50987 26.5319 6.70654 28.7697 6.70654C33.7628 6.70654 37.8106 10.7061 37.8106 15.6399C37.8106 20.5736 33.7628 24.5732 28.7697 24.5732C26.5319 24.5732 24.484 23.7699 22.9053 22.4392Z"
                                            fill="#ED0006" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M22.9062 22.4392C24.8502 20.8006 26.0828 18.3625 26.0828 15.6399C26.0828 12.9173 24.8502 10.4791 22.9062 8.8406C24.485 7.50987 26.5329 6.70654 28.7706 6.70654C33.7638 6.70654 37.8115 10.7061 37.8115 15.6399C37.8115 20.5736 33.7638 24.5732 28.7706 24.5732C26.5329 24.5732 24.485 23.7699 22.9062 22.4392Z"
                                            fill="#F9A000" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M22.905 22.4393C24.8489 20.8008 26.0815 18.3627 26.0815 15.6401C26.0815 12.9175 24.8489 10.4794 22.905 8.84082C20.9611 10.4794 19.7285 12.9175 19.7285 15.6401C19.7285 18.3627 20.9611 20.8008 22.905 22.4393Z"
                                            fill="#FF5E00" />
                                        <rect x="0.5" y="0.5" width="45" height="31" rx="5.5"
                                            stroke="#F2F4F7" />
                                    </svg>
                                    <label for="creditCard"
                                        class="block text-secondary-600 text-lg font-medium flex-1">Mastercard ending in
                                        1234
                                        <div class="text-gray-500">Expiry 06/2024</div>
                                    </label>
                                </div>

                                <div class="mt-5 gap-3 border border-secondary-200 rounded p-3 text-sm relative">
                                    <input type="radio"
                                        class="absolute left-3 my-1 w-5 h-5 border-2 border-gray-300 accent-green-600 text-primary focus:ring-primary peer/newcard"
                                        id="newcard" name="status">
                                    <label for="newcard" class="font-medium  text-secondary-600 text-lg ml-8">Pay with
                                        Debit/Credit
                                        Card</label>
                                    <div for="newcard"
                                        class="text-secondary-600 text-lg  flex-1 hidden peer-checked/newcard:block">
                                        <div class="mt-2 grid  grid-cols-1 gap-y-3 p-4 sm:grid-cols-2 sm:gap-x-4 ">

                                            <div class="sm:col-span-2">

                                                <div class="mt-1">
                                                    <input type="text"
                                                        class="block w-full py-3 px-4 border border-secondary-200 rounded-md placeholder:text-sm placeholder:text-secondary-500"
                                                        placeholder="Card Holder Number" name="card_holder_name">
                                                </div>
                                            </div>
                                            <div class="sm:col-span-2">
                                                <div class="mt-1">
                                                    <div id="card-element"
                                                        class="block w-full py-3 px-1 border border-secondary-200 rounded-md placeholder:text-sm placeholder:text-secondary-500">
                                                        <!-- A Stripe Element will be inserted here. -->
                                                    </div>
                                                    <div id="card-errors" role="alert"></div>
                                                </div>
                                            </div>
                                            <div class="flex items-center mr-4">
                                                <input id="save_card" type="checkbox" value="" name="save_card"
                                                    class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:text-green-500">
                                                <label for="inline-checkbox"
                                                    class="ml-2 text-sm font-normal text-gray-500">Save
                                                    this card</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    <!-- Order summary -->
                    <article class="pt-6 md:w-1/2 xl:pt-0">
                        <div class="md:flex w-full  shadow-lg sticky top-36">
                            <div class="md:p-12 p-6 w-full rounded">
                                <div class="text-center mb-10">
                                    <div class="text-2xl font-semibold">Reserve your order</div>
                                    <p class="text-base">Confirm your booking by paying <span class="font-semibold">@ £
                                            {{ __('99.00') }}</span> </p>
                                </div>
                                @if ($cartProducts->isNotEmpty())
                                    <div class="flex justify-between border-b pb-4 mb-4">
                                        <div class="text-lg">{{ $panels->panel_quantity }} X
                                            {{ $panels->solarPanels->watts . 'W' . ' ' . 'Solar Panels' }}
                                        </div>
                                        <div class="font-semibold text-lg flex gap-2 items-center">
                                            {{ '£' . number_format($panels->solar_panels_price, 2) }}
                                        </div>
                                    </div>
                                    @foreach ($cartProducts as $cart)
                                        <div class="flex justify-between border-b pb-4 mb-4">
                                            <div class="text-lg">{{ $cart->quantity }} X
                                                {{ $cart->products->title ?? '' }}
                                            </div>
                                            <div class="font-semibold text-lg flex gap-2 items-center">
                                                {{ '£' . number_format($cart->products->price, 2) }}
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="flex justify-between border-b pb-4 mb-4">
                                        <div class="text-lg">Total Amount</div>
                                        <div class="font-semibold text-lg"> £ {{ $cart->total_price ?? '' }} </div>

                                    </div>
                                    <div class="flex justify-between border-b pb-4 mb-4">
                                        <div class="text-lg">Booking Amount</div>
                                        <div class="font-semibold text-lg">
                                            {{ __('-£ ' . $cart->booking_amount_price) ?? '' }}
                                        </div>
                                    </div>
                                    <div class="flex justify-between border-b pb-4 mb-4">
                                        <div class="text-lg">Installation Charges</div>
                                        <div class="font-semibold text-lg">
                                            {{ __('£ ' . 4000) ?? '' }}
                                        </div>
                                    </div>
                                    <div class="flex justify-between  pb-4 mb-4">
                                        <div class="text-lg">Due Amount</div>
                                        <div class="font-semibold text-lg">£ {{ $cart->payable_amount ?? '' }} </div>

                                    </div>
                                    <input type="hidden" name="paymentMethodId" id="paymentMethodId" value="">
                                    <div class="text-center text-gray-500 text-base mt-10">Prices and quantity can vary as
                                        per
                                        further inspection of the residence</div>

                                    <div class="sm:col-span-2">
                                        <x-primary-button class="w-full py-3 mt-5 text-xl text-center"
                                            onclick="submitForm(event)">
                                            {{ __('Pay Booking Amount ' . '£ ' . $cart->booking_amount_price) ?? '' }}
                                        </x-primary-button>
                                    </div>
                                @else
                                    <div class="items-center text-center">
                                        <h1>No Products in the cart. Please <a
                                                href="{{ route('customer.property.recommendedProduct') }}"
                                                class="text-green-600 font-medium">click here</a> to add products in the
                                            cart.</h1>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </article>
                </div>
            </section>
        </main>
    </form>
@endsection
@push('modals')
    <!-- Exit Modal -->
    <x-confirmation-modal name="exitModal">
        <x-slot name="body" class="relative">
            <!-- Body of the modal -->
            <div class="cursor-pointer" @click.prevent="show= false">
                <svg width="31" height="31" class="absolute right-2 top-2" viewBox="0 0 31 31" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M15.3125 0C6.78125 0 0 6.78125 0 15.3125C0 23.8438 6.78125 30.625 15.3125 30.625C23.8438 30.625 30.625 23.8438 30.625 15.3125C30.625 6.78125 23.8438 0 15.3125 0ZM21.2188 22.9688L15.3125 17.0625L9.40625 22.9688L7.65625 21.2188L13.5625 15.3125L7.65625 9.40625L9.40625 7.65625L15.3125 13.5625L21.2188 7.65625L22.9688 9.40625L17.0625 15.3125L22.9688 21.2188L21.2188 22.9688Z"
                        fill="#434343" />
                </svg>
            </div>
            <div class="font-semibold text-2xl text-center">Alert</div>

            <div class="text-center mb-4">
                <div class="text-lg text-gray-400">Are you sure you want to exit? All changes will be undone.</div>
            </div>
            <div class="flex justify-center gap-4 mb-3 pt-5">
                <button class="rounded-md text-gray-500 border border-1 border-gray-400 p-2 font-medium w-36"
                    @click.prevent="show=false">Cancel</button>
                <a href="{{ route('customer.cart.delete') }}">
                    <button class="rounded-md text-white bg-red-600 p-2 w-36 shadow-sm">Exit Anyway</button>
                </a>
            </div>

        </x-slot>
    </x-confirmation-modal>
@endpush
@push('scripts')
    <script src="https://js.stripe.com/v3/"></script>

    {{-- Get State names and countries  --}}
    <script type="text/javascript">
        function getCities() {
            const countrySelect = document.getElementById("country");
            const citySelect = document.getElementById("city");
            const citiesByCountry = {
                England: {!! json_encode($englandCities) !!},
                Scotland: {!! json_encode($scotlandCities) !!},
                Wales: {!! json_encode($walesCities) !!},
            };

            // Function to update the city options based on the selected country
            function updateCityOptions() {
                // Clear existing city options
                citySelect.innerHTML = "";

                const selectedCountry = countrySelect.value;
                const cities = citiesByCountry[selectedCountry] || [];

                // Add new city options
                cities.forEach((city) => {
                    const option = document.createElement("option");
                    option.value = city.city_name;
                    option.textContent = city.city_name;
                    citySelect.appendChild(option);
                });
            }

            // Add an event listener to the "Country" select element
            countrySelect.addEventListener("change", updateCityOptions);

            // Initial update of city options based on the default selected country
            updateCityOptions();
        }
    </script>


    {{-- Payment Gateway Integration  --}}
    <script>
        // const stripe = Stripe('{{ config('services.stripePayment.publish_key') }}');
        // const elements = stripe.elements();
        // const style = {
        //     base: {
        //         fontSize: '16px',
        //         color: '#32325d',
        //     },
        // };
        // const card = elements.create('card', {
        //     hidePostalCode: true,
        //     style
        // });
        // card.mount('#card-element');

        // async function submitForm(event) {
        function submitForm(event) {
            event.preventDefault();
            var input = document.querySelector('input[name="addressId"]:checked');
            // const {
            //     paymentMethod,
            //     error
            // } = await stripe.createPaymentMethod({
            //     type: 'card',
            //     card: card,
            // });
            if (!input) {
                toastr.error('Please add address details to proceed further!');
                return;
            }
            // if (error) {
            //     toastr.error('Please enter card details to proceed further!');
            //     return;
            // } 
            else {
                const form = document.getElementById('paymentForm');
                // const paymentMethodId = document.getElementById('paymentMethodId');
                // const saveCardCheckbox = document.getElementById('save_card');
                // const saveCardValue = saveCardCheckbox.checked ? true : false;
                // saveCardCheckbox.value = saveCardValue;
                // paymentMethodId.value = paymentMethod.id;
                form.submit();

            }
        }
    </script>

    <script>
        window.$modals = {
            show(name, id) {
                window.dispatchEvent(
                    new CustomEvent('modal', {
                        detail: name,
                        id: id
                    })
                );
            }
        }
        // Exit Modal
        let exitModal = (e) => {
            const id = e.currentTarget.getAttribute('id');
            modal = id.split('-');
            if (modal.length === 2) {
                $modals.show(modal[0], id);
            }
        }
    </script>
@endpush
