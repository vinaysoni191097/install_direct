@extends('layouts.main')
@section('content')
    <main class="pt-16 md:pt-[96px] space-y-8">
        <div class="tab-wrapper" x-data="{ activeTab: 2 }" x-cloak>
            <div class="footer-bg ">
                <section class="mx-auto max-w-6xl lg:max-w-8xl px-4 lg:px-8  h-full">
                    <div class="md:text-2xl text-xl pt-6 pb-2 font-medium">Welcome {{ $user->name }}!</div>

                    <div class="md:flex gap-14">
                        <label @click="activeTab = 0"
                            class="tab-control md:py-4 md:px-6 px-2 md:text-lg text-base cursor-pointer"
                            :class="{ 'active border-b-4 border-green-600 font-medium': activeTab === 0 }">Profile</label>
                        <label @click="activeTab = 1"
                            class="tab-control md:py-4 md:px-6 px-2 md:text-lg text-base cursor-pointer"
                            :class="{ 'active border-b-4 border-green-600 font-medium': activeTab === 1 }">Orders</label>
                        <label @click="activeTab = 2"
                            class="tab-control md:py-4 md:px-6 px-2 md:text-lg text-base cursor-pointer"
                            :class="{ 'active border-b-4 border-green-600 font-medium': activeTab === 2 }">My Addresses
                        </label>
                        <label @click="activeTab = 3"
                            class="tab-control md:py-4 md:px-6 px-2 md:text-lg text-base cursor-pointer"
                            :class="{ 'active border-b-4 border-green-600 font-medium': activeTab === 3 }">Payment </label>
                    </div>
                </section>
            </div>
            <section class="mx-auto max-w-6xl lg:max-w-8xl px-4 lg:px-8 md:mt-20 mt-10 mb-20  h-full">
                <div class="tab-panel" :class="{ 'active': activeTab === 0 }"
                    x-show.transition.in.opacity.duration.600="activeTab === 0">

                    <form action="{{ route('customer.profile.update', $user) }}" method="post"
                        enctype="multipart/form-data" id="customerAccountForm">
                        @method('put')
                        @csrf
                        <div class="md:flex justify-between items-end">
                            <div>
                                <div class="md:text-2xl text-lg font-medium">Personal info</div>
                                <div class="md:text-lg text-base text-gray-500">Update your photo and personal details here.
                                </div>
                            </div>
                            <div class="mt-5 md:mt-0">
                                <a href="{{ route('dashboard') }}">
                                    <x-secondary-button class="text-center mr-2">
                                        {{ __('Cancel') }}
                                    </x-secondary-button>
                                </a>
                                <x-primary-button class=" text-lg text-center">
                                    {{ __('Update') }}
                                </x-primary-button>
                            </div>
                        </div>
                        <div>
                            <div class="md:flex gap-20 -space-x-2 p-4 mt-14 overflow-hidden ">
                                <div class="relative text-center h-32 mb-4">
                                    <div x-data="userProfileImage" x-init="profilePictureUploaded({{ json_encode($user->userData->profile_picture) }})">
                                        <img class="inline-block h-32 w-32  shadow rounded-full ring-2 ring-white"
                                            src="{{ asset('storage/' . $user->userData->profile_picture) }}"
                                            id="profile-image" alt="" x-show="isImageUploaded">

                                        <span x-show="!isImageUploaded"
                                            class="block h-32 w-32 shadow rounded-full ring-2 ring-white bg-green-100 text-green-500 font-bold text-center items-center py-8 text-6xl"
                                            id="setLogo">{{ $user->nameInitials }}
                                        </span>
                                        <div
                                            class="items-center absolute bottom-0 md:right-0  text-blue rounded-full bg-gray-200 shadow-lg tracking-wide cursor-pointer hover:bg-blue hover:text-black">

                                            <label for="logo"
                                                class="w-full text-center cursor-pointer px-3 py-3 block font-bold">
                                                <svg width="18" height="16" viewBox="0 0 18 16" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M2.33268 2.33366H4.83268L6.49935 0.666992H11.4993L13.166 2.33366H15.666C16.108 2.33366 16.532 2.50925 16.8445 2.82181C17.1571 3.13437 17.3327 3.5583 17.3327 4.00033V14.0003C17.3327 14.4424 17.1571 14.8663 16.8445 15.1788C16.532 15.4914 16.108 15.667 15.666 15.667H2.33268C1.89065 15.667 1.46673 15.4914 1.15417 15.1788C0.84161 14.8663 0.666016 14.4424 0.666016 14.0003V4.00033C0.666016 3.5583 0.84161 3.13437 1.15417 2.82181C1.46673 2.50925 1.89065 2.33366 2.33268 2.33366ZM8.99935 4.83366C7.89428 4.83366 6.83447 5.27265 6.05307 6.05405C5.27167 6.83545 4.83268 7.89526 4.83268 9.00033C4.83268 10.1054 5.27167 11.1652 6.05307 11.9466C6.83447 12.728 7.89428 13.167 8.99935 13.167C10.1044 13.167 11.1642 12.728 11.9456 11.9466C12.727 11.1652 13.166 10.1054 13.166 9.00033C13.166 7.89526 12.727 6.83545 11.9456 6.05405C11.1642 5.27265 10.1044 4.83366 8.99935 4.83366ZM8.99935 6.50033C9.66239 6.50033 10.2983 6.76372 10.7671 7.23256C11.236 7.7014 11.4993 8.33728 11.4993 9.00033C11.4993 9.66337 11.236 10.2993 10.7671 10.7681C10.2983 11.2369 9.66239 11.5003 8.99935 11.5003C8.33631 11.5003 7.70042 11.2369 7.23158 10.7681C6.76274 10.2993 6.49935 9.66337 6.49935 9.00033C6.49935 8.33728 6.76274 7.7014 7.23158 7.23256C7.70042 6.76372 8.33631 6.50033 8.99935 6.50033Z"
                                                        fill="black" />
                                                </svg>

                                                <input accept="image/jpg,image/png,image/jpeg"
                                                    class="w-full cursor-pointer hidden" type="file"
                                                    name="profile_picture" id="logo" x-on:change="fileChosen(event)">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="md:w-3/5">
                                    <div class="flex gap-3">
                                        <div>
                                            <x-input-label for="first_name" :value="__('First Name')" />
                                            <x-text-input id="first_name" class="block mt-1 w-full h-11" type="text"
                                                maxlength="20" name="first_name" :value="old('first_name')" required autofocus
                                                autocomplete="first_name" placeholder="Enter your First name"
                                                x-bind:value="`{{ $user->userData->first_name }}`" />
                                            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                                            <span id="first_name-error" class="error"></span>
                                        </div>
                                        <div>
                                            <x-input-label for="last_name" :value="__('Last Name')" />
                                            <x-text-input id="last_name" class="block mt-1 w-full h-11" type="text"
                                                maxlength="20" name="last_name" :value="old('name')" required autofocus
                                                autocomplete="name" placeholder="Enter your name"
                                                x-bind:value="`{{ $user->userData->last_name }}`" />
                                            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                                            <span id="last_name-error" class="error"></span>
                                        </div>
                                    </div>

                                    <div class="mt-4 relative">
                                        <svg width="20" height="20"
                                            class="w-5 h-5 absolute left-4 inset-9 items-center justify-center"
                                            viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M18.3327 4.99967C18.3327 4.08301 17.5827 3.33301 16.666 3.33301H3.33268C2.41602 3.33301 1.66602 4.08301 1.66602 4.99967M18.3327 4.99967V14.9997C18.3327 15.9163 17.5827 16.6663 16.666 16.6663H3.33268C2.41602 16.6663 1.66602 15.9163 1.66602 14.9997V4.99967M18.3327 4.99967L9.99935 10.833L1.66602 4.99967"
                                                stroke="#667085" stroke-width="1.66667" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>

                                        <x-input-label for="email" :value="__('Email')" />
                                        <x-text-input id="email"
                                            class="block mt-1 w-full h-11 pl-12 cursor-not-allowed " disabled readonly
                                            type="email" name="email" :value="old('email')" required autocomplete="username"
                                            x-bind:value="`{{ $user->email }}`" />
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>

                                    <div class="mt-4 relative">
                                        <x-input-label for="phone" :value="__('Phone number')" />
                                        <x-text-input id="phone" type="tel" class="block mt-2 w-full h-11"
                                            placeholder="+1 (555) 000-0000" name="phone"
                                            x-bind:value="`{{ $user->phone_number }}` ?? old('phone')" required
                                            autocomplete="off" maxlength="15" onkeypress="return onlyNumberKey(event)" />
                                        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                                        <x-text-input id="telCode" type="hidden" class="block mt-1 w-full"
                                            name="telCode" :value="+1" required autocomplete="off" />
                                        <span id="phone-error" class="error"></span>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-panel" :class="{ 'active': activeTab === 1 }"
                    x-show.transition.in.opacity.duration.600="activeTab === 1">
                    @if ($cartProducts->isNotEmpty())
                        <div class="flex-1 mb-3 ">
                            <div class="space-y-3 p-3 border rounded-md border-secondary-200">
                                <div class="bg-yellow-50 border border-yellow-200 p-2 rounded text-yellow-500">
                                    <div class="flex justify-between">
                                        <div class="flex items-center gap-2">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9 5H11V7H9V5ZM9 9H11V15H9V9ZM10 0C4.48 0 0 4.48 0 10C0 15.52 4.48 20 10 20C15.52 20 20 15.52 20 10C20 4.48 15.52 0 10 0ZM10 18C5.59 18 2 14.41 2 10C2 5.59 5.59 2 10 2C14.41 2 18 5.59 18 10C18 14.41 14.41 18 10 18Z"
                                                    fill="#D19600" />
                                            </svg>
                                            Order Pending
                                        </div>
                                        <div class="flex gap-4 items-center">
                                            <a href="{{ route('customer.checkout') }}"
                                                class="text-green-700  font-medium underline">Review Your
                                                Order</a>
                                        </div>
                                    </div>

                                </div>
                                <div class="md:flex flex-col sm:flex-row gap-3 mt-2">
                                    <div class="flex-shrink-0 m-auto w-28 h-28">
                                        <img src="images/panel.png" alt="Front of men's Basic Tee in black."
                                            class="w-full h-full object-contain m-auto rounded-md border-secondary-200">
                                    </div>

                                    <div class="sm:ml-6 flex flex-1 flex-col ">
                                        <div class="flex">
                                            <div class="min-w-0 flex-1">
                                                <div class="text-gray-400 text-base font-medium">
                                                </div>
                                                <h3 class="text-sm flex gap-4 py-2 items-center">
                                                    @foreach ($cartProducts as $cart)
                                                        <p class="md:text -2xl text-lg font-bold">
                                                            {{ $cart->quantity . ' X ' . $cart->products->title }}
                                                        </p>
                                                    @endforeach
                                                    <p class="items-center">
                                                        <span
                                                            class="bg-gray-200 rounded-full border border-gray-300 px-4 py-1">Pending
                                                        </span>
                                                    </p>
                                                </h3>
                                                <div class="flex items-center gap-5">

                                                    <p class="mt-1 text-base"><span class="text-gray-400">Booking
                                                            Amount</span>
                                                        :{{ __('£' . number_format($cart::BOOKING_AMOUNT, 2)) }}</p>
                                                    <p>|</p>
                                                    <p><span class="text-gray-400">Installation Preference</span>:
                                                        {{ $user->userInstallationAddress->address }} |
                                                        {{ $user->userInstallationAddress->installation_timeframe }}</p>
                                                </div>
                                            </div>

                                            <div
                                                class="ml-4 flow-root flex-shrink-0 text-2xl font-semibold text-secondary-600">
                                                <div class="text-gray-dark ">Cart Total</div>
                                                {{ __('£' . $cart->total_price) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @forelse ($orders as $order)
                        <div class="flex-1 mb-3 ">
                            <div class="space-y-3 p-3 border rounded-md border-secondary-200">
                                @if (!$order->document_uploaded)
                                    <div class="bg-orange-50 border border-orange-200 p-2 rounded text-orange-500">
                                        <div class="flex justify-between gap-4">
                                            <div class="flex items-center gap-2">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M11 7H13V9H11V7ZM11 11H13V17H11V11ZM12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM12 20C7.59 20 4 16.41 4 12C4 7.59 7.59 4 12 4C16.41 4 20 7.59 20 12C20 16.41 16.41 20 12 20Z"
                                                        fill="#FF8600" />
                                                </svg>
                                                Please upload required pending images
                                            </div>
                                            <div class="flex gap-4 items-center">

                                                <a class="text-orange-500 font-medium underline"
                                                    href="{{ route('customer.pending.document.upload', $order->order_number) }}">Upload
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <a href="{{ route('customer.order.details', $order) }}">
                                    <div class="md:flex flex-col sm:flex-row gap-3 mt-2">
                                        <div class="flex-shrink-0 m-auto w-28 h-28">
                                            <img src="images/panel.png" alt="Front of men's Basic Tee in black."
                                                class="w-full h-full object-contain m-auto rounded-md border-secondary-200">
                                        </div>

                                        <div class="sm:ml-6 flex flex-1 flex-col ">
                                            <div class="flex">
                                                <div class="min-w-0 flex-1">
                                                    <div class="text-gray-400 text-base font-medium">
                                                        {{ $order->created_at->format('d M Y (l)') }}</div>
                                                    <h3 class="text-sm flex gap-4 py-2 items-center">
                                                        <p class="md:text-2xl text-lg font-bold ">
                                                            {{ $order->orderItemsSummary }}
                                                        </p>

                                                        {{-- Order Status Attribute  --}}
                                                        {!! $order->order_status !!}
                                                    </h3>
                                                    <div class="flex items-center gap-5">

                                                        <p class="mt-1 text-base"><span class="text-gray-400">Order
                                                                ID</span>
                                                            :{{ __('#' . $order->order_number) }}</p>
                                                        <p>|</p>
                                                        <p><span class="text-gray-400">Installation Preference</span> :
                                                            {{ __('Between' . ' ' . $order->installation_timeframe) }}</p>
                                                    </div>
                                                </div>

                                                <div
                                                    class="ml-4 flow-root flex-shrink-0 text-2xl font-semibold text-secondary-600">
                                                    <div class="text-gray-dark ">Subtotal</div>
                                                    {{ __('£' . $order->payable_amount) }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @empty
                        <h2> No orders!</h2>
                    @endforelse

                </div>
                <div class="tab-panel" :class="{ 'active': activeTab === 2 }"
                    x-show.transition.in.opacity.duration.600="activeTab === 2">
                    <form action="{{ route('customer.profile.address.store', $user) }}" method="post"
                        id="newAddressForm">
                        @csrf
                        <div class="md:flex justify-between items-end">
                            <div>
                                <div class="md:text-2xl text-lg font-medium">Add New Address</div>
                                <div class="md:text-lg text-base text-gray-500">Fill the details below to continue.</div>
                            </div>
                            <div class="mt-5 md:mt-0">
                                <a href="{{ route('customer.account.profile') }}">
                                    <x-secondary-button class="text-center mr-2">
                                        {{ __('Cancel') }}
                                    </x-secondary-button>
                                </a>
                                <x-primary-button class=" text-lg text-center">
                                    {{ __('Save') }}
                                </x-primary-button>
                            </div>
                        </div>

                        <div class="mt-2 md:w-1/2 grid  grid-cols-1 gap-y-3 sm:grid-cols-2 sm:gap-x-4 ">
                            <div class="sm:col-span-2">
                                <label for="shippingFullName" class="block text-secondary-600">Full Name</label>
                                <div class="mt-1">
                                    <input type="text" name="shippingFullName"
                                        class="block w-full py-3 px-4 border border-secondary-200 rounded-md placeholder:text-sm placeholder:text-secondary-500 mb-2"
                                        placeholder="Jane Doe" value="{{ $user->name ?? old('shippingFullName') }}">
                                    @error('shippingFullName')
                                        <p class="text-red-600 font-semibold mt-2">{{ $message }}</p>
                                    @enderror
                                    <span id="shippingFullName-error" class="error"></span>
                                </div>
                            </div>
                            <div class="sm:col-span-2">
                                <label for="phone_number" class="block text-secondary-600">Phone number</label>
                                <div class="mt-1">
                                    <input type="text" name="phone_number" id="phone_number"
                                        value="{{ old('phone_number') }}"
                                        class="block w-full py-3 px-4 border border-secondary-200 rounded-md placeholder:text-sm placeholder:text-secondary-500 mb-2"
                                        placeholder="Phone number" maxlength="15">
                                    @error('phone_number')
                                        <p class="text-red-600 font-semibold mt-2">{{ $message }}</p>
                                    @enderror
                                    <span id="phone_number-error" class="error"></span>

                                </div>
                            </div>
                            <div>
                                <label for="state" class="block text-secondary-600">State</label>
                                <div class="mt-1">
                                    <select id="state" name="state"
                                        class="block w-full py-3 px-4 border border-secondary-200 rounded-md placeholder:text-sm placeholder:text-secondary-500 mb-2">
                                        <option value="" selected disabled>Select</option>
                                        <option value="1" @if (old('state') == '1') selected @endif>England
                                        </option>
                                        <option value="2" @if (old('state') == '2') selected @endif>Scotland
                                        </option>
                                        <option value="3" @if (old('state') == '3') selected @endif>Wales
                                        </option>
                                    </select>
                                    @error('state')
                                        <p class="text-red-600 font-semibold mt-2">{{ $message }}</p>
                                    @enderror
                                    <span id="state-error" class="error"></span>

                                </div>
                            </div>
                            <div>
                                <label for="city" class="block text-secondary-600">City</label>
                                <div class="mt-1">
                                    <select id="city" name="city"
                                        class="block w-full py-3 px-4 border border-secondary-200 rounded-md placeholder:text-sm placeholder:text-secondary-500 mb-2">
                                        <option value="" selected disabled>Select</option>
                                    </select>
                                    @error('city')
                                        <p class="text-red-600 font-semibold mt-2">{{ $message }}</p>
                                    @enderror
                                    <span id="city-error" class="error"></span>

                                </div>
                            </div>
                            <div class="sm:col-span-2">
                                <label for="country" class="block text-secondary-600">Country</label>
                                <div class="mt-1">
                                    <input type="text" name="country" id="country" disabled
                                        class="block w-full py-3 px-4 border border-secondary-200 rounded-md placeholder:text-sm placeholder:text-secondary-500 mb-2 cursor-not-allowed"
                                        value="UK">
                                    @error('country')
                                        <p class="text-red-600 font-semibold mt-2">{{ $message }}</p>
                                    @enderror
                                    <span id="country-error" class="error"></span>

                                </div>
                            </div>
                            <div class="sm:col-span-2">
                                <label for="zip" class="block text-secondary-600">Postal code</label>
                                <div class="mt-1">
                                    <input type="text" name="zip" id="zip" value="{{ old('zip') }}"
                                        class="block w-full py-3 px-4 border border-secondary-200 rounded-md placeholder:text-sm placeholder:text-secondary-500 mb-2"
                                        placeholder="Enter postal code">
                                    @error('zip')
                                        <p class="text-red-600 font-semibold mt-2">{{ $message }}</p>
                                    @enderror
                                    <span id="zip-error" class="error"></span>

                                </div>
                            </div>
                            <div class="sm:col-span-2">
                                <label for="shippingAddress2" class="block text-secondary-600">Address </label>
                                <div class="mt-1">
                                    <textarea name="shippingAddress2"
                                        class="block w-full py-3 px-4 border border-secondary-200 rounded-md placeholder:text-sm placeholder:text-secondary-500 resize-none mb-2"
                                        placeholder="123 Main Street, London, NW1 2AB, United Kingdom">{{ old('shippingAddress2') }}</textarea>
                                    @error('shippingAddress2')
                                        <p class="text-red-600 font-semibold mt-2">{{ $message }}</p>
                                    @enderror
                                    <span id="shippingAddress2-error" class="error"></span>
                                </div>
                            </div>

                        </div>
                    </form>

                </div>
                <div class="tab-panel" :class="{ 'active': activeTab === 3 }"
                    x-show.transition.in.opacity.duration.600="activeTab === 3">
                    <p>Coming Soon....</p>
                </div>
            </section>
        </div>
    </main>
@endsection

@push('modals')
    {{-- Delete Confirmation Modal  --}}
    <x-confirmation-modal name="deleteAddressModal">
        <x-slot name="body" class="relative">
            <!-- Body of the modal -->
            <div class="cursor-pointer" @click="show= false">
                <svg width="31" height="31" class="absolute right-2 top-2" viewBox="0 0 31 31" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M15.3125 0C6.78125 0 0 6.78125 0 15.3125C0 23.8438 6.78125 30.625 15.3125 30.625C23.8438 30.625 30.625 23.8438 30.625 15.3125C30.625 6.78125 23.8438 0 15.3125 0ZM21.2188 22.9688L15.3125 17.0625L9.40625 22.9688L7.65625 21.2188L13.5625 15.3125L7.65625 9.40625L9.40625 7.65625L15.3125 13.5625L21.2188 7.65625L22.9688 9.40625L17.0625 15.3125L22.9688 21.2188L21.2188 22.9688Z"
                        fill="#434343" />
                </svg>
            </div>
            <div class="font-semibold text-2xl text-center">Delete!</div>
            <div class="text-center mb-4">
                <div class="text-lg text-gray-400">Are you sure you want to delete this address? All changes will be
                    undone.</div>
            </div>
            <form method="POST" action="#">
                @csrf
                <div class="flex justify-center gap-4 mb-3 pt-5">
                    <button class="rounded-md text-gray-500 border border-1 border-gray-400 p-2 font-medium w-36"
                        @click="show=false">Cancel</button>

                    <button type="submit" class="rounded-md text-white bg-red-600 p-2 w-36 shadow-sm">Yes,
                        Delete!</button>

                </div>
            </form>

        </x-slot>
    </x-confirmation-modal>
@endpush

@push('scripts')
    {{-- Image Loader  --}}
    <script type="text/javascript">
        function userProfileImage() {
            return {
                isImageUploaded: false,
                profilePictureUploaded: function(profilePicture) {
                    if (profilePicture != null) {
                        this.isImageUploaded = true;
                        return;
                    }
                    this.isImageUploaded = false;
                },
                fileChosen: function(event) {
                    const image = document.getElementById("profile-image");
                    const reader = new FileReader();
                    reader.onload = function() {
                        image.src = reader.result;
                    };
                    reader.readAsDataURL(event.target.files[0]);
                    this.isImageUploaded = true;
                }
            }
        }
    </script>

    {{-- Modal handler  --}}
    <script type="text/javascript">
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
        //Deletion Modal
        let deleteAddressModal = (e) => {
            const id = e.currentTarget.getAttribute('id');
            modal = id.split('-');
            if (modal.length === 2) {
                $modals.show(modal[0], id);
                document.querySelector(`#${modal[0]} form`).setAttribute('action', e.currentTarget.dataset.url);
            }
        }
    </script>


    {{-- Change Cities according to countries  --}}
    <script type="text/javascript">
        function getCities() {
            const stateSelect = document.getElementById("state");
            const citySelect = document.getElementById("city");
            const citiesByState = {
                1: {!! json_encode($englandCities) !!},
                2: {!! json_encode($scotlandCities) !!},
                3: {!! json_encode($walesCities) !!},
            };

            // Function to update the city options based on the selected state
            function updateCityOptions() {
                const selectedState = stateSelect.value;
                const cities = citiesByState[selectedState] || [];

                // Clear the existing city options
                citySelect.innerHTML = '<option value="" selected disabled>Select</option>';

                // Add new city options
                cities.forEach((city) => {
                    const option = document.createElement("option");
                    option.value = city.city_name;
                    option.textContent = city.city_name;
                    citySelect.appendChild(option);
                });
            }

            // Add an event listener to the "State" select element
            stateSelect.addEventListener("change", updateCityOptions);

            // Initial update of city options based on the default selected state
            updateCityOptions();
        }
    </script>
@endpush
