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
                    <!-- Current Step -->
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
                    <a href="#" class="relative flex   h-10 w-10 items-center justify-center " aria-current="step">
                        <svg width="70" height="70" class="mb-5" viewBox="0 0 25 25" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.5 3.55694L2.77778 11.3347V22.2222H9.72222V16.6667H15.2778V22.2222H22.2222V12.0028C22.2223 11.7945 22.1755 11.5889 22.0854 11.4011C21.9952 11.2133 21.864 11.0482 21.7014 10.9181L12.5 3.55694ZM12.5 0L23.4361 8.75C23.9238 9.14011 24.3175 9.63485 24.5882 10.1976C24.8589 10.7604 24.9997 11.3769 25 12.0014V22.2222C25 22.9589 24.7073 23.6655 24.1864 24.1864C23.6655 24.7073 22.9589 25 22.2222 25H2.77778C2.04107 25 1.33453 24.7073 0.813592 24.1864C0.292658 23.6655 0 22.9589 0 22.2222V11.3347C5.19412e-05 10.9184 0.0936926 10.5074 0.273998 10.1321C0.454303 9.75682 0.716659 9.42688 1.04167 9.16667L12.5 0Z"
                                fill="#009A4F" />
                        </svg>
                        <span class="sr-only">step 1</span>
                    </a>
                </li>
                <li class="relative pr-8 md:pr-48 xl:pr-80">
                    <span class="absolute text-lg text-gray-600 hidden md:block font-normal -left-14"
                        style="margin-top: 30px;">Recommended Panels</span>
                    <!-- Upcoming Step -->
                    <div class="md:absolute hidden md:block  inset-0 flex items-center" aria-hidden="true">
                        <svg class="w-full" width="107" height="8" viewBox="0 0 107 8" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M1 3.5C0.723858 3.5 0.5 3.72386 0.5 4C0.5 4.27614 0.723858 4.5 1 4.5V3.5ZM106.354 4.35355C106.549 4.15829 106.549 3.84171 106.354 3.64645L103.172 0.464466C102.976 0.269204 102.66 0.269204 102.464 0.464466C102.269 0.659728 102.269 0.976311 102.464 1.17157L105.293 4L102.464 6.82843C102.269 7.02369 102.269 7.34027 102.464 7.53553C102.66 7.7308 102.976 7.7308 103.172 7.53553L106.354 4.35355ZM1 4.5H106V3.5H1V4.5Z"
                                fill="#E4E4E4" />
                        </svg>
                    </div>
                    <a href="#" class="relative flex h-10 w-10 items-center justify-center " aria-current="step">
                        <svg class="mb-5" width="54" height="54" viewBox="0 0 54 54" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <circle cx="27" cy="27" r="26.5" fill="#009A4F"></circle>
                            <path
                                d="M26.4167 11V13.8102L24.4526 11.8797L22.9641 13.3692L24.8913 15.3333H22.0833V17.5H24.8935L22.9641 19.4641L24.4526 20.9526L26.4167 19.0253V21.8333H28.5833V19.0232L30.5474 20.9526L32.037 19.4641L30.1054 17.5H32.9167V15.3333H30.1065L32.037 13.3692L30.5474 11.8797L28.5833 13.8112V11H26.4167ZM27.5 14.25C28.6938 14.25 29.6667 15.2228 29.6667 16.4167C29.6667 17.6105 28.6938 18.5833 27.5 18.5833C26.3062 18.5833 25.3333 17.6105 25.3333 16.4167C25.3333 15.2228 26.3062 14.25 27.5 14.25ZM16.9039 24L14.5 33.6146V37H40.5V33.6146L38.0961 24H16.9039ZM18.5961 26.1667H36.405L38.3333 33.8854V34.8333H16.6667V33.8854L18.5961 26.1667ZM19.9167 27.25L19.4768 29.2141H21.7453L22.0833 27.25H19.9167ZM24.25 27.25L24.0463 29.2141H26.3148L26.4167 27.25H24.25ZM28.5833 27.25L28.6852 29.2141H30.9526L30.75 27.25H28.5833ZM32.9167 27.25L33.2558 29.2141H35.5232L35.0833 27.25H32.9167ZM19.0359 31.3808L18.6318 33.75H21.1018L21.4409 31.3797L19.0359 31.3808ZM23.9109 31.3808L23.7083 33.75H26.2141L26.3148 31.3797L23.9109 31.3808ZM28.6852 31.3808L28.7859 33.75H31.2917L31.088 31.3797L28.6852 31.3808ZM33.5602 31.3808L33.8982 33.75H36.3703L35.9641 31.3797L33.5602 31.3808Z"
                                fill="white"></path>
                        </svg>
                        <span class="sr-only">step 2</span>
                    </a>
                </li>
                <li class="relative">
                    <span class="absolute text-lg text-gray-600 hidden md:block font-normal -left-5"
                        style="margin-top: 30px;">Reservation</span>
                    <a href="#" class="relative flex   h-10 w-10 items-center justify-center">
                        <svg width="70" height="70" class="mb-5" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_317_326)">
                                <path
                                    d="M10.5 6V7.5H6V6H10.5ZM6 10.5V9H10.5V10.5H6ZM6 13.5V12H9V13.5H6ZM4.5 6V7.5H3V6H4.5ZM4.5 9V10.5H3V9H4.5ZM3 13.5V12H4.5V13.5H3ZM4.5 1.5C2.84315 1.5 1.5 2.84315 1.5 4.5V19.5C1.5 21.1569 2.84315 22.5 4.5 22.5H9V24H4C1.79086 24 0 22.2091 0 20V4C0 1.79086 1.79086 0 4 0H13.0664L19.5 6.43359V9H18V7.5H12V1.5H4.5ZM13.5 2.56641V6H16.9336L13.5 2.56641ZM21 12H24V20C24 22.2091 22.2091 24 20 24H10.5V12H13.5V10.5H15V12H19.5V10.5H21V12ZM19.5 22.5C21.1569 22.5 22.5 21.1569 22.5 19.5V16.5H12V22.5H19.5ZM22.5 15V13.5H12V15H22.5Z"
                                    fill="#A1A1A1" />
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
    <main class="pt-28 md:pt-[150px] space-y-8 lg:h-screen" x-data="productDetailsData">

        <div x-data="formDataHandler" x-ref="formDataRef">
            <section class="mx-auto max-w-7xl 2xl:max-w-screen-2xl px-6 lg:px-12  h-full">
                <div class="md:flex justify-between items-end mt-10">
                    <div>
                        <div class="md:text-4xl text-2xl font-bold mb-3">Choose your products</div>
                        <div class="text-xl gray-text">Based on the information you have given, <b class="text-black">your
                                roof fits around {{ $maximumPanels ?? 0 }} panels.</b>
                        </div>
                    </div>
                </div>
                <div>
                    <p class="text-green-600 font-medium mt-5 text-lg">
                        Based on the informaiton you have given us, we have made an assumption of how many panels will fit on
                        your roof, and a choice of battery brands and sizes below. There are also some extra products you
                        can add on further down the page
                    </p>
                </div>
                <div class="md:flex-1 mt-5">
                    <div>
                        <ul x-data="recommendedPanelData({{ $maximumPanels ?? 0 }}, {{ $filteredProducts }})" x-cloak x-init="batteryDetail">
                            <li class="px-6 py-6 mt-4 rounded-lg border border-gray-200 bg-white shadow-sm">
                                <div class="md:flex ">
                                    <div class="flex-shrink-0">
                                        <img src="{{ asset('images/panel.png') }}" alt=""
                                            class=" m-auto rounded-md ">
                                    </div>
                                    <div class="md:ml-6 ml-0 flex flex-1 flex-col">
                                        <div class="md:flex">
                                            <div class="min-w-0 flex-1">
                                                <h3 class="md:text-2xl text-xl mb-2">
                                                    <a href="#"
                                                        class="font-bold text-secondary-600 hover:text-secondary-600"
                                                        x-text="`The selected panel is ${panelValue}W, and the capacity of the selected panel is ${batteryValue} kWh system.`">
                                                    </a>
                                                </h3>
                                                <p class="mt-1 text-lg text-secondary-400  text-gray-500 ">If you know the
                                                    exact amount of panels you are looking for you can enter it below, if
                                                    not, stick with our estimate and we will confirm this once our experts
                                                    have had a look at your proposal.
                                                </p>
                                            </div>

                                        </div>
                                        <div class="flex gap-6 justify-between flex-wrap items-end mt-5">
                                            <div class="flex gap-5">
                                                <div class="space-y-1">
                                                    <label for="ringSize1"
                                                        class="capitalize text-secondary-600 font-medium text-base">Number
                                                        of Panels</label>
                                                    <div
                                                        class="border rounded px-4 py-2 w-36 flex items-center gap-4 justify-between">
                                                        <button @click.prevent=decrement()>
                                                            <svg width="15" height="15" viewBox="0 0 13 2"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M0.665039 1H12.665" stroke="#16a34a"
                                                                    stroke-width="1.5">
                                                                </path>
                                                            </svg>
                                                        </button>
                                                        <input type="text"
                                                            class="w-2/4 border-none outline-none border-white text-center"
                                                            id="panel_count" name="panel_count" x-text="count"
                                                            x-model="count" x-on:change="batteryDetail()" />
                                                        <button @click.prevent="increment()">
                                                            <svg width="15" height="15" viewBox="0 0 13 12"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M0.665039 6H12.665" stroke="#16a34a"
                                                                    stroke-width="1.5">
                                                                </path>
                                                                <path d="M6.66504 12L6.66504 0" stroke="#16a34a"
                                                                    stroke-width="1.5">
                                                                </path>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </div>
                                                @if ($panels->isNotEmpty())
                                                    <div class="space-y-1 text-secondary-600 text-sm">
                                                        <label for="count1"
                                                            class="capitalize text-secondary-600 text-base font-medium">{{ __('Panel Type') }}</label>
                                                        <div class="font-medium relative text-secondary-600">
                                                            <svg class="absolute right-2 top-5" width="14"
                                                                height="8" viewBox="0 0 14 8" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M1.5 1.25L7 6.75L12.5 1.25" stroke="#434343"
                                                                    stroke-width="2" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                            </svg>
                                                            <div class="md:w-40 w-32">
                                                                <select name="quantity" id="panelCount"
                                                                    x-on:change="panelCount()" x-model="panelValue"
                                                                    class="rounded border border-secondary-200 h-[42px] text-gray-500 w-full  bg-gray-100 appearance-none py-2 pl-4 pr-4 ">
                                                                    @foreach ($panels as $panel)
                                                                        <option value="{{ $panel->watts }}"
                                                                            name="panelId-{{ $panel->id }}"
                                                                            {{ $filteredProducts == $panel->watts ? 'selected' : '' }}>
                                                                            {{ $panel->watts . ' ' . 'W' }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif

                                            </div>
                                            <div class="text-green-600 text-xl font-medium flex md:justify-center items-center gap-2 cursor-pointer"
                                                x-on:click="open = ! open">
                                                See what’s included
                                                <svg width="37" height="37" viewBox="0 0 37 37" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M9.25 13.875L18.5 23.125L27.75 13.875" stroke="#009A4F"
                                                        stroke-width="2.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <ul x-show="open" x-transition>
                                    <li class="flex items-center py-3 border-t mt-9">
                                        <div class="flex-shrink-0">
                                            <svg width="76" height="76" viewBox="0 0 66 66" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <rect x="5" y="5" width="56" height="56" rx="28"
                                                    fill="#009A4F" fill-opacity="0.12" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M21.1867 19.706C20.449 20.4855 20.2193 22.7576 20.7878 23.6497C20.9939 23.9736 20.8852 24.1924 20.3973 24.4338C18.9769 25.1371 18.9154 25.6813 19.0461 36.3853C19.1787 47.2545 19.1329 46.99 20.8764 47C21.96 47.0059 22.5538 46.1026 22.8164 44.0486C22.9261 43.1929 23.106 41.9327 23.2163 41.2481C23.399 40.1146 23.4372 40.0729 23.6465 40.7814C23.7731 41.2092 23.8903 42.5528 23.9076 43.767C23.932 45.4837 24.0664 46.0892 24.512 46.4897C25.2688 47.1699 26.5347 47.144 27.1806 46.4355C27.9069 45.6386 27.8615 42.0936 27.0725 37.9809C26.7278 36.1846 26.4458 33.9797 26.4458 33.0807C26.4458 31.6671 26.5285 31.4465 27.0574 31.4465C27.5892 31.4465 27.6816 31.7013 27.7625 33.3913L27.8559 35.336H33.0263H38.1967L38.2901 33.3913C38.3709 31.7013 38.4634 31.4465 38.9951 31.4465C39.5241 31.4465 39.6068 31.6671 39.6068 33.0807C39.6068 33.9797 39.3248 36.1846 38.9801 37.9809C38.1597 42.2569 38.1375 45.7805 38.9265 46.4897C39.6833 47.1699 40.9492 47.144 41.5951 46.4355C41.9642 46.0304 42.1228 45.2466 42.145 43.7128C42.1623 42.5286 42.2794 41.2092 42.406 40.7814C42.6154 40.0729 42.6536 40.1146 42.8363 41.2481C42.9466 41.9327 43.1265 43.1929 43.2361 44.0486C43.4987 46.1026 44.0925 47.0059 45.1761 47C46.8968 46.9903 46.8911 47.0149 46.9798 39.3373C47.0632 32.1392 46.9172 31.0271 45.989 31.7919C45.7533 31.9861 45.5606 32.478 45.5606 32.8847C45.5606 33.5932 45.4679 33.6246 43.3671 33.6246H41.1736V32.5533C41.1736 31.8221 41.3798 31.3382 41.8229 31.0302C42.6041 30.4869 43.844 26.817 43.3966 26.3727C42.7996 25.7799 42.2199 26.4387 41.8348 28.1476C41.3717 30.2022 41.2203 30.2731 37.569 30.1387C35.5918 30.0659 35.0631 29.9479 35.0631 29.5795C35.0631 29.2176 35.6463 29.0698 37.6584 28.9211C39.086 28.8159 40.3003 28.6759 40.3573 28.6099C40.4143 28.5443 40.6685 27.8604 40.9217 27.0902L41.3826 25.69H43.3931H45.4039L45.5606 26.7791C45.68 27.6089 45.8665 27.8681 46.344 27.8681C47.3117 27.8681 47.1522 25.6355 46.1215 24.7553C45.4331 24.1672 45.3685 23.9123 45.4876 22.2504C45.6064 20.5935 45.5393 20.3252 44.844 19.6805C44.2298 19.1108 43.7823 18.981 42.699 19.0582C41.4644 19.1459 41.3015 19.2524 41.0364 20.1457C40.8747 20.6905 40.487 21.2024 40.1746 21.2836C39.515 21.4548 39.3987 22.4228 40.0377 22.4228C40.6932 22.4228 40.9621 24.2845 40.3962 24.9056C40.1386 25.1884 39.8378 25.8655 39.7281 26.4107C39.589 27.1014 39.3505 27.4014 38.9409 27.4014C38.3954 27.4014 38.3534 27.1005 38.3534 23.2007V19H33.0263H27.6992V23.2007C27.6992 27.1005 27.6572 27.4014 27.1116 27.4014C26.7021 27.4014 26.4636 27.1014 26.3245 26.4107C26.2148 25.8655 25.914 25.1884 25.6564 24.9056C25.0905 24.2845 25.3593 22.4228 26.0149 22.4228C26.6538 22.4228 26.5376 21.4548 25.8779 21.2836C25.5655 21.2024 25.1779 20.6905 25.0162 20.1457C24.7483 19.243 24.5966 19.1475 23.3018 19.0635C22.1433 18.9885 21.7535 19.1067 21.1867 19.706ZM22.0587 20.7114C21.7241 21.1115 21.8303 21.1781 22.8039 21.1781C23.6039 21.1781 23.9389 21.0403 23.9389 20.7114C23.9389 20.4273 23.6471 20.2447 23.1937 20.2447C22.7842 20.2447 22.2734 20.4547 22.0587 20.7114ZM28.9526 20.7114C28.9526 21.0017 29.2484 21.1781 29.736 21.1781C30.2236 21.1781 30.5194 21.0017 30.5194 20.7114C30.5194 20.4211 30.2236 20.2447 29.736 20.2447C29.2484 20.2447 28.9526 20.4211 28.9526 20.7114ZM31.7729 20.7114C31.7729 21.0375 32.1038 21.1781 32.8696 21.1781C33.6355 21.1781 33.9664 21.0375 33.9664 20.7114C33.9664 20.3853 33.6355 20.2447 32.8696 20.2447C32.1038 20.2447 31.7729 20.3853 31.7729 20.7114ZM35.5332 20.7114C35.5332 21.0017 35.829 21.1781 36.3166 21.1781C36.8041 21.1781 37.0999 21.0017 37.0999 20.7114C37.0999 20.4211 36.8041 20.2447 36.3166 20.2447C35.829 20.2447 35.5332 20.4211 35.5332 20.7114ZM42.1137 20.7114C42.1137 21.0403 42.4487 21.1781 43.2487 21.1781C44.2223 21.1781 44.3285 21.1115 43.9938 20.7114C43.7792 20.4547 43.2684 20.2447 42.8588 20.2447C42.4054 20.2447 42.1137 20.4273 42.1137 20.7114ZM22.0587 23.0548C22.0587 24.2839 23.9505 24.1768 24.1968 22.934C24.2757 22.5364 24.0492 22.4228 23.1784 22.4228C22.2618 22.4228 22.0587 22.5376 22.0587 23.0548ZM28.9526 23.0451C28.9526 23.5016 29.1616 23.6674 29.736 23.6674C30.3104 23.6674 30.5194 23.5016 30.5194 23.0451C30.5194 22.5886 30.3104 22.4228 29.736 22.4228C29.1616 22.4228 28.9526 22.5886 28.9526 23.0451ZM31.9819 22.6303C31.4238 23.1842 31.8374 23.6674 32.8696 23.6674C33.7574 23.6674 33.9664 23.5489 33.9664 23.0451C33.9664 22.5693 33.7574 22.4228 33.0786 22.4228C32.5901 22.4228 32.0966 22.5161 31.9819 22.6303ZM35.5332 23.0451C35.5332 23.5016 35.7422 23.6674 36.3166 23.6674C36.8909 23.6674 37.0999 23.5016 37.0999 23.0451C37.0999 22.5886 36.8909 22.4228 36.3166 22.4228C35.7422 22.4228 35.5332 22.5886 35.5332 23.0451ZM41.8003 22.6745C41.8003 22.813 41.9858 23.1783 42.2127 23.4863C42.7583 24.2269 43.8102 24.0035 43.9374 23.1198C44.0249 22.5096 43.8983 22.4228 42.919 22.4228C42.3036 22.4228 41.8003 22.5361 41.8003 22.6745ZM28.9526 25.3788C28.9526 25.6691 29.2484 25.8456 29.736 25.8456C30.2236 25.8456 30.5194 25.6691 30.5194 25.3788C30.5194 25.0885 30.2236 24.9121 29.736 24.9121C29.2484 24.9121 28.9526 25.0885 28.9526 25.3788ZM31.7729 25.3788C31.7729 25.7049 32.1038 25.8456 32.8696 25.8456C33.6355 25.8456 33.9664 25.7049 33.9664 25.3788C33.9664 25.0527 33.6355 24.9121 32.8696 24.9121C32.1038 24.9121 31.7729 25.0527 31.7729 25.3788ZM35.5332 25.3788C35.5332 25.6691 35.829 25.8456 36.3166 25.8456C36.8041 25.8456 37.0999 25.6691 37.0999 25.3788C37.0999 25.0885 36.8041 24.9121 36.3166 24.9121C35.829 24.9121 35.5332 25.0885 35.5332 25.3788ZM20.7141 25.7286C20.5919 25.8499 20.4919 27.6761 20.4919 29.7871V33.6246H22.6855H24.879V32.5533C24.879 31.8221 24.6728 31.3382 24.2297 31.0302C23.4485 30.4869 22.2085 26.817 22.656 26.3727C23.2529 25.7799 23.8327 26.4387 24.2178 28.1476C24.6809 30.2022 24.8323 30.2731 28.4835 30.1387C30.4608 30.0659 30.9895 29.9479 30.9895 29.5795C30.9895 29.2176 30.4063 29.0698 28.3942 28.9211C26.9666 28.8159 25.7523 28.6759 25.6953 28.6099C25.6382 28.5443 25.3847 27.8604 25.1322 27.0902L24.6725 25.69L22.8045 25.5991C21.777 25.549 20.8363 25.6072 20.7141 25.7286ZM28.9526 27.4014C28.9526 27.5725 29.4148 27.7126 29.9795 27.7126C31.3987 27.7126 32.3996 28.4761 32.3996 29.559C32.3996 30.6661 31.7575 31.1991 30.1005 31.468C29.3092 31.5965 30.4608 31.6799 33.0263 31.6799C35.5918 31.6799 36.7433 31.5965 35.9521 31.468C34.2951 31.1991 33.653 30.6661 33.653 29.559C33.653 28.4761 34.6539 27.7126 36.0731 27.7126C36.6377 27.7126 37.0999 27.5725 37.0999 27.4014C37.0999 27.21 35.5332 27.0902 33.0263 27.0902C30.5194 27.0902 28.9526 27.21 28.9526 27.4014ZM45.7173 29.5795C45.4616 29.9903 45.8041 30.513 46.329 30.513C46.7874 30.513 47.196 29.7513 46.8968 29.4544C46.6047 29.1641 45.9313 29.2357 45.7173 29.5795ZM28.9526 33.6246C28.9526 34.0811 29.1616 34.247 29.736 34.247C30.3104 34.247 30.5194 34.0811 30.5194 33.6246C30.5194 33.1682 30.3104 33.0023 29.736 33.0023C29.1616 33.0023 28.9526 33.1682 28.9526 33.6246ZM31.8308 33.5469C31.8991 33.9056 32.2814 34.1247 32.9505 34.1888C33.7997 34.2703 33.9664 34.181 33.9664 33.6442C33.9664 33.1156 33.7689 33.0023 32.8467 33.0023C31.9496 33.0023 31.7475 33.1106 31.8308 33.5469ZM35.5332 33.6246C35.5332 34.0811 35.7422 34.247 36.3166 34.247C36.8909 34.247 37.0999 34.0811 37.0999 33.6246C37.0999 33.1682 36.8909 33.0023 36.3166 33.0023C35.7422 33.0023 35.5332 33.1682 35.5332 33.6246ZM20.5311 38.681C20.5872 40.7773 20.5176 43.2277 20.3763 44.1264C20.1613 45.4949 20.1974 45.76 20.5982 45.76C21.2995 45.76 21.5 44.8081 21.7118 40.4743L21.9021 36.5807L22.7124 36.487C23.158 36.4357 23.6663 36.5757 23.8421 36.7982C24.3898 37.4918 24.9714 40.202 25.1641 42.9595C25.3083 45.0216 25.4527 45.6044 25.819 45.6044C26.5777 45.6044 26.5673 42.658 25.7943 38.5388L25.1052 34.8693H22.7672H20.4296L20.5311 38.681ZM40.2583 38.5388C39.4852 42.658 39.4749 45.6044 40.2335 45.6044C40.5998 45.6044 40.7443 45.0216 40.8885 42.9595C41.0812 40.202 41.6628 37.4918 42.2105 36.7982C42.3863 36.5757 42.8946 36.4357 43.3402 36.487L44.1505 36.5807L44.3407 40.4743C44.5526 44.8081 44.7531 45.76 45.4544 45.76C45.8552 45.76 45.8912 45.4949 45.6763 44.1264C45.5349 43.2277 45.4654 40.7773 45.5215 38.681L45.623 34.8693H43.2853H40.9474L40.2583 38.5388Z"
                                                    fill="#009A4F" />
                                                <rect x="5" y="5" width="56" height="56" rx="28"
                                                    stroke="#C2E7D5" stroke-opacity="0.13" stroke-width="10" />
                                            </svg>
                                        </div>
                                        <div class="ml-6 flex flex-1 flex-col">
                                            <div class="flex">
                                                <div class="min-w-0 flex-1">
                                                    <h4 class="text-lg">
                                                        <a href="#"
                                                            class="font-medium text-secondary-600 hover:text-secondary-600">
                                                            {{ __('Installation in as little as two Weeks') }} </a>
                                                    </h4>
                                                    <p class=" text-lg text-gray-500">
                                                        {{ __('We will be in touch to bring your design to life in the next 48 hours from checkout') }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="flex items-center py-3">
                                        <div class="flex-shrink-0">
                                            <svg width="76" height="76" viewBox="0 0 76 76" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <rect x="10" y="10" width="56" height="56" rx="28"
                                                    fill="#009A4F" fill-opacity="0.12" />
                                                <path
                                                    d="M25.167 28.6668V35.6668M25.167 35.6668H32.167M25.167 35.6668L30.5803 30.5802C31.8342 29.3257 33.3854 28.4092 35.0893 27.9164C36.7931 27.4236 38.594 27.3704 40.324 27.7618C42.054 28.1532 43.6566 28.9765 44.9823 30.1548C46.308 31.3331 47.3136 32.8281 47.9053 34.5002M50.8337 47.3335V40.3335M50.8337 40.3335H43.8337M50.8337 40.3335L45.4203 45.4202C44.1665 46.6747 42.6152 47.5911 40.9114 48.0839C39.2075 48.5768 37.4066 48.63 35.6767 48.2385C33.9467 47.8471 32.3441 47.0238 31.0184 45.8455C29.6926 44.6672 28.687 43.1723 28.0953 41.5002"
                                                    stroke="#009A4F" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <rect x="5" y="5" width="66" height="66" rx="33"
                                                    stroke="#C2E7D5" stroke-opacity="0.13" stroke-width="10" />
                                            </svg>
                                        </div>
                                        <div class="ml-6 flex flex-1 flex-col">
                                            <div class="flex">
                                                <div class="min-w-0 flex-1">
                                                    <h4 class="text-lg">
                                                        <a href="#"
                                                            class="font-medium text-secondary-600 hover:text-secondary-600">
                                                            {{ __('Scaffolding and Access equipment') }} </a>
                                                    </h4>
                                                    <p class=" text-lg text-gray-500">
                                                        {{ __('Safety is important, so will provide scaffolding and access equipment for our team to facilitate the installation.') }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="flex items-center py-3">
                                        <div class="flex-shrink-0">
                                            <svg width="76" height="76" viewBox="0 0 76 76" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <rect x="10" y="10" width="56" height="56" rx="28"
                                                    fill="#009A4F" fill-opacity="0.12" />
                                                <path
                                                    d="M29.7513 29.7518L46.248 46.2485M49.6663 38.0002C49.6663 44.4435 44.443 49.6668 37.9997 49.6668C31.5564 49.6668 26.333 44.4435 26.333 38.0002C26.333 31.5568 31.5564 26.3335 37.9997 26.3335C44.443 26.3335 49.6663 31.5568 49.6663 38.0002Z"
                                                    stroke="#009A4F" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <rect x="5" y="5" width="66" height="66" rx="33"
                                                    stroke="#C2E7D5" stroke-opacity="0.13" stroke-width="10" />
                                            </svg>
                                        </div>
                                        <div class="ml-6 flex flex-1 flex-col">
                                            <div class="flex">
                                                <div class="min-w-0 flex-1">
                                                    <h4 class="text-lg">
                                                        <a href="#"
                                                            class="font-medium text-secondary-600 hover:text-secondary-600">
                                                            {{ __('Fully MCS Compliant Installation') }}</a>
                                                    </h4>
                                                    <p class=" text-lg text-gray-500">
                                                        {{ __('We work to MCS specifications and once the work is completed you will receive a MCS certificate by email.') }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="flex items-center py-3">
                                        <div class="flex-shrink-0">
                                            <svg width="76" height="76" viewBox="0 0 76 76" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <rect x="10" y="10" width="56" height="56" rx="28"
                                                    fill="#009A4F" fill-opacity="0.12" />
                                                <path
                                                    d="M36.25 38.5162L33.9837 36.25L32.75 37.4837L36.25 40.9837L43.25 33.9837L42.0163 32.75L36.25 38.5162Z"
                                                    fill="#009A4F" />
                                                <path
                                                    d="M38 50.25L32.596 47.3686C31.0554 46.549 29.7671 45.3254 28.8693 43.829C27.9715 42.3326 27.4982 40.62 27.5 38.875V27.5C27.5005 27.036 27.685 26.5912 28.0131 26.2631C28.3412 25.935 28.786 25.7505 29.25 25.75H46.75C47.214 25.7505 47.6588 25.935 47.9869 26.2631C48.315 26.5912 48.4995 27.036 48.5 27.5V38.875C48.5019 40.62 48.0285 42.3326 47.1307 43.829C46.2329 45.3254 44.9446 46.549 43.404 47.3686L38 50.25ZM29.25 27.5V38.875C29.2486 40.3028 29.636 41.7041 30.3707 42.9284C31.1054 44.1527 32.1596 45.1538 33.4203 45.8242L38 48.2664L42.5798 45.8251C43.8405 45.1546 44.8949 44.1534 45.6296 42.9289C46.3643 41.7044 46.7516 40.303 46.75 38.875V27.5H29.25Z"
                                                    fill="#009A4F" />
                                                <rect x="5" y="5" width="66" height="66" rx="33"
                                                    stroke="#C2E7D5" stroke-opacity="0.13" stroke-width="10" />
                                            </svg>
                                        </div>
                                        <div class="ml-6 flex flex-1 flex-col">
                                            <div class="flex">
                                                <div class="min-w-0 flex-1">
                                                    <h4 class="text-lg">
                                                        <a href="#"
                                                            class="font-medium text-secondary-600 hover:text-secondary-600">
                                                            {{ __('Mobile Phone App') }}
                                                        </a>
                                                    </h4>
                                                    <p class=" text-lg text-gray-500">
                                                        {{ __('You can view all your solar data on the smart app that comes with all of our systems, you can also use this app to adjust your settings and optimize your system') }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <p class="mt-2 text-lg text-secondary-400  text-gray-500 font-medium "> You are using
                    {{ session('powerConsumption') }} kWH in a year, which is {{ $dailyUsage }}kWh
                    per day, therefore we would
                    recommend a battery which is between 20% to 50% of your daily consumption, this is so that you
                    have enough storage space to keep your powered from when the sun goes down, to when the
                    sun comes back up, and a little extra if it a dull day!
                </p>

                @if ($categories->isNotEmpty() && $products->count() > 0)
                    <div>
                        <form action="{{ route('customer.cart') }}" method="POST" id="productDataForm">
                            @csrf
                            <!--Solar Battery-->
                            @forelse ($categories as $category)
                                @if ($category->products->isNotEmpty())
                                    <div class="font-medium text-gray-600 text-xl uppercase mt-5 mb-2">
                                        {{ $category->title }}
                                    </div>
                                    <div class="grid md:grid-cols-2 gap-10 md:justify-center">
                                        @foreach ($category->products as $key => $product)
                                            <div class="flex" x-data="productData({{ $product->productVariations }}, {{ $key }})" x-cloak>
                                                <input class="hidden" value="" name="category_id">
                                                <div class="relative w-full mb-9">
                                                    <input type="radio" name="categoryId-{{ $product->category_id }}"
                                                        value="{{ $product->id }}" id="{{ $product->id }}"
                                                        class="hidden peer"
                                                        x-on:change="selectedProductList({{ json_encode($product) }})">
                                                    <svg width="40" height="40"
                                                        class="text-primary absolute m-2 hidden peer-checked:block  left-0 "
                                                        viewBox="0 0 40 40" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <rect width="40" height="40" rx="20"
                                                            fill="#009A4F" />
                                                        <path
                                                            d="M16.092 29.5L7 20.4938L9.27301 18.2422L16.092 24.9969L30.727 10.5L33 12.7516L16.092 29.5Z"
                                                            fill="white" />
                                                    </svg>
                                                    <label for="{{ $product->id }}"
                                                        class="cursor-pointer block w-full border-2 border-gray-300 md:rounded-3xl rounded p-4  peer-checked:border-green-600 peer-checked:bg-primary-light">
                                                        <div class="md:flex">
                                                            <div class="flex-shrink-0 text-center mb-4">
                                                                <td>
                                                                    @if ($product->featured_image_id)
                                                                        <img class="inline-block w-32 h-32"
                                                                            src="{{ asset('storage/' . $product->productImage->path) }}"
                                                                            name="product_image"
                                                                            value="{{ $product->featured_image_id }}"
                                                                            id="profile-image" alt="">
                                                                    @else
                                                                        <img class="inline-block w-32 h-32"
                                                                            src="{{ asset('images/no-image.png') }}"
                                                                            alt="">
                                                                    @endif
                                                                </td>
                                                            </div>
                                                            <div
                                                                class="md:ml-6 flex flex-1 flex-col text-center md:text-left">
                                                                <div class="md:flex justify-between">
                                                                    <div>
                                                                        <h4 class="text-sm">
                                                                            <div
                                                                                class="font-semibold text-secondary-600 hover:text-secondary-600 text-xl">

                                                                                <p
                                                                                    x-text="selectedVariation ? selectedVariation.title : '{{ strlen($product->title) > 38 ? substr($product->title, 0, 38) . '...' : substr($product->title, 0, 38) }}'">

                                                                                </p>
                                                                            </div>
                                                                        </h4>
                                                                        <p class="text-gray-500 ">
                                                                            {{ strlen($product->description) > 100
                                                                                ? substr($product->description, 0, 100) . '...'
                                                                                : substr($product->description, 0, 100) }}
                                                                        </p>
                                                                        <p class="mt-1 text-secondary-400 text-lg">
                                                                        <p
                                                                            x-text="selectedVariation ? selectedVariation.warranty + ' year warranty' : ' {{ $product->warranty }}' + ' year warranty' ">
                                                                        </p>
                                                                        </p>
                                                                    </div>
                                                                    <div>
                                                                        <h4 class="text-sm">
                                                                            <p
                                                                                class="font-semibold text-secondary-600 hover:text-secondary-600 text-2xl">
                                                                                £<span
                                                                                    x-text="selectedVariation ? getTotalPrice(selectedVariation) : getTotalPrice({{ json_encode($product) }})"></span>
                                                                            </p>
                                                                        </h4>
                                                                    </div>
                                                                </div>
                                                                <div class="mt-2">
                                                                    <div
                                                                        class="min-w-0 flex gap-4 items-end justify-between">
                                                                        <div class="md:flex gap-4">
                                                                            {{-- if Product has variations then show variations --}}
                                                                            @if ($product->productVariations->isNotEmpty())
                                                                                <div
                                                                                    class="flex font-medium relative text-secondary-600">
                                                                                    <svg class="absolute right-2 top-10"
                                                                                        width="14" height="8"
                                                                                        viewBox="0 0 14 8" fill="none"
                                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                                        <path d="M1.5 1.25L7 6.75L12.5 1.25"
                                                                                            stroke="#434343"
                                                                                            stroke-width="2"
                                                                                            stroke-linecap="round"
                                                                                            stroke-linejoin="round" />
                                                                                    </svg>
                                                                                    <div>
                                                                                        <label
                                                                                            class="text-base text-gray-500">Capacity</label>
                                                                                        <select
                                                                                            x-model="productVariationId"
                                                                                            name="product_variation_id"
                                                                                            id="productVariationId"
                                                                                            x-on:change="updateSelectedVariation($event.target.value);selectedProductList({{ json_encode($product) }})"
                                                                                            class="product_variation_id rounded border border-secondary-200 text-gray-500 w-full bg-gray-100 appearance-none py-2 pl-4 pr-4">
                                                                                            <template
                                                                                                x-for="variation in variations"
                                                                                                x-bind:key="variation.id">
                                                                                                <option
                                                                                                    x-bind:value="variation.id"
                                                                                                    x-text="variation.title">
                                                                                                </option>
                                                                                            </template>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            @else
                                                                                <div
                                                                                    class="font-medium text-secondary-600">
                                                                                    <div class="text-left w-[100px]">
                                                                                        <label
                                                                                            class="text-base text-gray-500">{{ __('Capacity') }}</label>
                                                                                        <div name="quantity"
                                                                                            id="panelCount"
                                                                                            class="rounded border border-secondary-200 h-[42px] text-gray-500 w-full  bg-gray-100 appearance-none py-2 pl-4 pr-4 text-center">
                                                                                            {{ $product->Kwh . ' ' . 'Kwh' }}
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            @endif
                                                                            <div
                                                                                class="flex font-medium relative text-secondary-600">
                                                                                <div class="text-left">
                                                                                    <label
                                                                                        class="text-base text-gray-500">Quantity</label>
                                                                                    <div
                                                                                        class="border rounded px-4 py-2 w-36 flex items-center gap-4 justify-between">
                                                                                        <button
                                                                                            @click.prevent="decrement({{ json_encode($product) }})">
                                                                                            <svg width="15"
                                                                                                height="15"
                                                                                                viewBox="0 0 13 2"
                                                                                                fill="none"
                                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                                <path d="M0.665039 1H12.665"
                                                                                                    stroke="#16a34a"
                                                                                                    stroke-width="1.5">
                                                                                                </path>
                                                                                            </svg>
                                                                                        </button>
                                                                                        <div name="quantity">
                                                                                            <input
                                                                                                class="category_{{ $product->id }}_quantity w-4/5 border-none outline-none border-white text-center"
                                                                                                type="text"
                                                                                                name="category_{{ $product->id }}_quantity"
                                                                                                x-model="count">
                                                                                        </div>
                                                                                        <button
                                                                                            @click.prevent="increment({{ json_encode($product) }})">
                                                                                            <svg width="15"
                                                                                                height="15"
                                                                                                viewBox="0 0 13 12"
                                                                                                fill="none"
                                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                                <path d="M0.665039 6H12.665"
                                                                                                    stroke="#16a34a"
                                                                                                    stroke-width="1.5">
                                                                                                </path>
                                                                                                <path
                                                                                                    d="M6.66504 12L6.66504 0"
                                                                                                    stroke="#16a34a"
                                                                                                    stroke-width="1.5">
                                                                                                </path>
                                                                                            </svg>
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <a href="javascript:void(0);"
                                                                            x-on:click="productDetailsModal({{ json_encode($product) }} , {{ json_encode($product->productSpecifications) }})"
                                                                            class="ml-4 flow-root text-lg underline flex-shrink-0 font-medium text-green-600">
                                                                            View Details
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif

                            @empty
                                <h2
                                    class="filament-tables-empty-state-heading text-xl font-bold tracking-tight text-center py-10">
                                    {{ __('No products Available Yet!') }}
                                </h2>
                            @endforelse
            </section>
            <div class="mt-14 sticky bottom-0">
                <div class="md:flex items-center bg-gray-100  md:px-20 py-4 text-center  justify-between w-full">
                    <div>
                        <div class="text-xl">Package Price inclusive VAT at 0%</div>

                    </div>
                    <div class="md:flex items-center gap-4">
                        <div class="text-3xl font-semibold py-2 md:py-0">£ <span id="totalAmount">0.00</span>
                            <input type="hidden" name="formData" id="formData">
                        </div>
                        <x-primary-button class="w-52 py-3 text-center" x-on:click="submitForm(event)">
                            {{ __('Proceed') }}
                        </x-primary-button>
                    </div>
                </div>
            </div>
            </form>
        </div>
        </div>
    @else
        <h2 class="filament-tables-empty-state-heading text-xl font-bold tracking-tight text-center py-10">
            {{ __('No compatible products available yet for selected panel. Please select another panel type.') }}
        </h2>
        @endif
        <div x-show="showDetails" x-cloak>
            <x-view-details />
        </div>

    </main>
    @if (Auth::user()->pending_order)
        {{-- Pending Order Confirmation Modal --}}
        <div x-data="pendingOrderData" x-cloak>
            <x-pending-order />
        </div>
    @endif
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
                <a href="{{ route('home') }}">
                    <button class="rounded-md text-white bg-red-600 p-2 w-36 shadow-sm">Exit Anyway</button>
                </a>
            </div>
        </x-slot>
    </x-confirmation-modal>
@endpush
@push('scripts')
    {{-- Form data Handler --}}
    <script>
        function formDataHandler() {
            let totalCartPrice = 0;
            let totalCartPricePre = 0;
            let selectProductArray = [];


            return {
                categoryId: null,
                productId: null,
                variationValue: null,
                selectedProductsInfo: [],
                selectedProducts: null,
                productName: null,
                productQuantity: null,
                selectedProductName: '',

                productData: function(variations, index) {
                    return {
                        variations: variations,
                        selectedVariation: variations[0], // Default to the first variation
                        open: false,
                        productVariationId: null,
                        count: 1,
                        productPrice: null,
                        productId: null,
                        selectedProducts: [],

                        existingProduct: function(product) {
                            let existingProductIndex = null;
                            if (this.selectedVariation) {
                                existingProductIndex = selectProductArray.findIndex(item => item.categoryId ===
                                    product.category_id && item.productId === this.selectedVariation.id);
                            } else {
                                existingProductIndex = selectProductArray.findIndex(item => item.categoryId ===
                                    product.category_id && item.productId === product.id);
                            }

                            if (existingProductIndex !== -1 && existingProductIndex !== null) {
                                this.selectedProductList(product);
                            }
                        },
                        increment: function(product) {
                            this.count++;
                            this.existingProduct(product);
                        },
                        decrement: function(product) {
                            if (this.count > 1) {
                                this.count--;
                                this.existingProduct(product);
                            }
                        },
                        getTotalPrice: function(product) {
                            const totalPrice = this.count * parseFloat(product.price);
                            const existingProductIndex = this.selectedProducts.findIndex(item => item.categoryId ===
                                product.category_id);

                            if (existingProductIndex !== -1) {
                                // Replace the existing product with the same category ID
                                this.selectedProducts[existingProductIndex].price = totalPrice;
                            } else {
                                // Add a new entry for the product
                                this.selectedProducts.push({
                                    productId: product.id,
                                    price: totalPrice,
                                    quantity: this.count,
                                    categoryId: product.category_id
                                });
                            }
                            return totalPrice;
                        },

                        getTotalCartPrice: function() {
                            let totalCartPrice = 0;
                            let selectedProductNames = [];
                            for (const item of selectProductArray) {
                                totalCartPrice += parseFloat(item.price) * item
                                    .quantity; // Multiply price by quantity
                                selectedProductNames.push(`${item.quantity} x ${item.title}`);
                                this.selectedProductName = selectedProductNames.join(' and ');
                            }
                            document.getElementById('totalAmount').innerHTML = parseFloat(totalCartPrice);
                            return totalCartPrice;
                        },

                        selectedProductList: function(product) {
                            let existingProductIndex = selectProductArray.findIndex(item => item.categoryId ===
                                product.category_id);
                            if (existingProductIndex !== -1) {
                                if (this.selectedVariation) {
                                    selectProductArray[existingProductIndex].productId = this.selectedVariation.id;
                                    selectProductArray[existingProductIndex].price = this.selectedVariation.price;
                                    selectProductArray[existingProductIndex].quantity = this.count;
                                    selectProductArray[existingProductIndex].title = this.selectedVariation.title;
                                } else {
                                    selectProductArray[existingProductIndex].productId = product.id;
                                    selectProductArray[existingProductIndex].price = product.price;
                                    selectProductArray[existingProductIndex].quantity = this.count;
                                    selectProductArray[existingProductIndex].title = product.title;
                                }
                            } else {
                                if (this.selectedVariation) {
                                    selectProductArray.push({
                                        productId: this.selectedVariation.id,
                                        price: this.selectedVariation.price,
                                        quantity: this.count,
                                        categoryId: product.category_id,
                                        title: product.title
                                    });
                                } else {
                                    selectProductArray.push({
                                        productId: product.id,
                                        price: product.price,
                                        quantity: this.count,
                                        categoryId: product.category_id,
                                        title: product.title
                                    });
                                }
                            }
                            this.getTotalCartPrice();
                        },

                        updateSelectedVariation: function(variationId) {
                            this.selectedVariation = this.variations.find(variation => variation.id ==
                                variationId);
                        },
                    }
                },
                submitForm: function(event) {
                    event.preventDefault();
                    this.selectedProducts = document.querySelectorAll('input[type="radio"]:checked');
                    this.selectedProducts.forEach(product => {
                        const productId = product.value;
                        const categoryId = product.getAttribute('name').split('-')[
                            1];
                        const quantityInput = document.querySelector(
                            `.category_${productId}_quantity`);
                        const productVariation = product.closest('.flex').querySelector(
                            '.product_variation_id');
                        this.variationValue = productVariation ? productVariation.value : null;
                        if (quantityInput) {
                            const selectedProduct = {
                                productId: productId,
                                categoryId: categoryId,
                                quantity: quantityInput.value,
                                productVariationValue: this.variationValue
                            };
                            this.selectedProductsInfo.push(selectedProduct);
                        }
                    });

                    const form = document.getElementById('productDataForm');
                    const formDataInput = document.getElementById('formData');
                    const selectElement = document.getElementById('panelCount');
                    const selectedOption = selectElement.options[selectElement.selectedIndex];
                    const extractedValue = selectedOption.getAttribute('name');
                    const parts = extractedValue.split('-');
                    const panelId = parts[1];
                    const panelQuantity = document.getElementById('panel_count').value;

                    const selectedFormData = {
                        selectedProductsInfo: this.selectedProductsInfo,
                        panelId: panelId,
                        panelQuantity: panelQuantity
                    };

                    const formDataJSON = JSON.stringify(selectedFormData);
                    formDataInput.value = formDataJSON;
                    form.submit();
                    return;

                },
            }
        }
    </script>
    <script type="text/javascript">
        // Increase Decrease quantity of recommended product
        function recommendedPanelData(panels, value) {
            return {
                open: false,
                count: panels,
                batteryValue: null,
                panelValue: value,
                kwhValue: null,
                newCount: null,
                increment: function() {
                    this.count++;
                    this.batteryDetail();
                },
                decrement: function() {
                    if (this.count > 1) {
                        this.count--;
                        this.batteryDetail();
                    }
                },
                batteryDetail: function() {
                    this.kwhValue = this.count * this.panelValue;
                    this.batteryValue = this.kwhValue / 1000;
                    return this.batteryValue;
                },
                panelCount: function() {
                    this.newCount = this.kwhValue / this.panelValue;
                    this.count = Math.floor(this.newCount);
                    const selectedValue = document.getElementById('panelCount').value;
                    window.location.href = `{{ url()->current() }}?panel_type=${selectedValue}`;
                    return this.count;
                }
            }
        }

        window.$modals = {
            show(name, id, data) {
                window.dispatchEvent(
                    new CustomEvent('modal', {
                        detail: name,
                        id: id,
                        data: data
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

        function productDetailsData() {
            return {
                showDetails: false,
                productDetails: {},
                productSpecifications: {},
                isproductVariations: null,
                productDetailsModal: function(product, specifications) {
                    this.showDetails = true;
                    this.productDetails = product;
                    this.productSpecifications = specifications;
                    this.hasProductVariations(product);
                },
                hasProductVariations: function(product) {
                    if (product.variation) {
                        this.isproductVariations = true;
                        return;
                    } else {
                        this.isproductVariations = false;
                    }
                }
            }
        }
    </script>
    {{-- Pending Order in cart confirmation --}}
    <script>
        function pendingOrderData() {
            return {
                showConfirmationModal: false,

                formSubmit: function(event, route) {
                    const buttonId = event.target.id;
                    if (buttonId === 'completePending') {
                        this.showConfirmationModal = false;
                        return;
                    }
                    this.showConfirmationModal = false;
                    window.location.href = route;
                }

            }
        }
    </script>
@endpush
