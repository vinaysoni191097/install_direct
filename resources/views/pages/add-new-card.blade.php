@extends('layouts.main')
@section('content')
<main class="pt-16 md:pt-[96px] space-y-8 lg:h-screen">
    <div class="tab-wrapper" x-data="{ activeTab:  3 }">
        <div class="footer-bg ">
            <section class="mx-auto max-w-6xl lg:max-w-8xl px-4 lg:px-8  h-full">
                <div class="md:text-2xl text-xl pt-6 pb-2 font-medium">Welcome Oliver Relm!</div>

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
                <div class="md:flex justify-between items-end">
                    <div>
                        <div class="md:text-2xl text-lg font-medium">Personal info</div>
                        <div class="md:text-lg text-base text-gray-500">Update your photo and personal details here.
                        </div>
                    </div>
                    <div class="mt-5 md:mt-0">
                        <x-secondary-button class="text-center mr-2">
                            {{ __('Cancel') }}
                        </x-secondary-button>

                        <x-primary-button class=" text-lg text-center">
                            {{ __('Update') }}
                        </x-primary-button>
                    </div>
                </div>

                <div>
                    <div class="md:flex gap-20 -space-x-2 p-4 mt-14 overflow-hidden ">
                        <div class="relative text-center h-32">

                            <img class="inline-block h-32 w-32  shadow rounded-full ring-2 ring-white"
                                src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                alt="">
                            <div
                                class="items-center absolute bottom-0 md:right-0 right-20 text-blue rounded-full bg-gray-200 shadow-lg tracking-wide cursor-pointer hover:bg-blue hover:text-black">

                                <label for="logo" class="w-full text-center cursor-pointer px-3 py-3 block font-bold">
                                    <svg width="18" height="16" viewBox="0 0 18 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M2.33268 2.33366H4.83268L6.49935 0.666992H11.4993L13.166 2.33366H15.666C16.108 2.33366 16.532 2.50925 16.8445 2.82181C17.1571 3.13437 17.3327 3.5583 17.3327 4.00033V14.0003C17.3327 14.4424 17.1571 14.8663 16.8445 15.1788C16.532 15.4914 16.108 15.667 15.666 15.667H2.33268C1.89065 15.667 1.46673 15.4914 1.15417 15.1788C0.84161 14.8663 0.666016 14.4424 0.666016 14.0003V4.00033C0.666016 3.5583 0.84161 3.13437 1.15417 2.82181C1.46673 2.50925 1.89065 2.33366 2.33268 2.33366ZM8.99935 4.83366C7.89428 4.83366 6.83447 5.27265 6.05307 6.05405C5.27167 6.83545 4.83268 7.89526 4.83268 9.00033C4.83268 10.1054 5.27167 11.1652 6.05307 11.9466C6.83447 12.728 7.89428 13.167 8.99935 13.167C10.1044 13.167 11.1642 12.728 11.9456 11.9466C12.727 11.1652 13.166 10.1054 13.166 9.00033C13.166 7.89526 12.727 6.83545 11.9456 6.05405C11.1642 5.27265 10.1044 4.83366 8.99935 4.83366ZM8.99935 6.50033C9.66239 6.50033 10.2983 6.76372 10.7671 7.23256C11.236 7.7014 11.4993 8.33728 11.4993 9.00033C11.4993 9.66337 11.236 10.2993 10.7671 10.7681C10.2983 11.2369 9.66239 11.5003 8.99935 11.5003C8.33631 11.5003 7.70042 11.2369 7.23158 10.7681C6.76274 10.2993 6.49935 9.66337 6.49935 9.00033C6.49935 8.33728 6.76274 7.7014 7.23158 7.23256C7.70042 6.76372 8.33631 6.50033 8.99935 6.50033Z"
                                            fill="black" />
                                    </svg>

                                    <input accept="image/jpg,image/png,image/jpeg" class="w-full cursor-pointer hidden"
                                        type="file" name="profile_image" id="logo" @change="fileChosen">
                                </label>
                            </div>
                        </div>
                        <div class="md:w-3/5">
                            <div>
                                <x-input-label for="name" :value="__('Full Name')" />
                                <x-text-input id="name" class="block mt-1 w-full h-11" type="text" name="name"
                                    :value="old('name')" required autofocus autocomplete="name"
                                    placeholder="Enter your name" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
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
                                <x-text-input id="email" class="block mt-1 w-full h-11 pl-12 " disabled readonly
                                    type="email" name="email" :value="old('email')" required autocomplete="username"
                                    placeholder="olivia@untitledui.com" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <div class="mt-4 relative">
                                <x-input-label for="email" :value="__('Phone number')" />
                                <x-text-input id="phone" type="tel" class="block mt-2 w-full h-11"
                                    placeholder="+1 (555) 000-0000" name="phone" :value="old('phone')" required
                                    autocomplete="off" maxlength="10" onkeypress="return onlyNumberKey(event)" />
                                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                                <x-text-input id="telCode" type="hidden" class="block mt-1 w-full" name="telCode"
                                    :value="+1" required autocomplete="off" />
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <div class="tab-panel" :class="{ 'active': activeTab === 1 }"
                x-show.transition.in.opacity.duration.600="activeTab === 1">
                <div class="flex-1">
                    <ul class="space-y-3">
                        <li class="md:flex flex-col sm:flex-row gap-3 p-4 border rounded-md border-secondary-200 group">
                            <div class="flex-shrink-0 m-auto w-40 h-40">
                                <img src="images/panel.png" alt="Front of men's Basic Tee in black."
                                    class="w-full h-full object-contain m-auto rounded-md border-secondary-200">
                            </div>

                            <div class="sm:ml-6 flex flex-1 flex-col justify-between">
                                <div class="md:flex justify-between">
                                    <div>
                                        <div class="text-gray-500 text-lg md:mb-4">October 19, 2023</div>
                                        <h3 class="text-sm">
                                            <a href="#" class="md:text-2xl text-lg font-bold">425W panels and 6.2kWh
                                                battery</a>
                                        </h3>
                                        <p class="mt-2 text-lg text-gray-500">Number of Panels</p>
                                        <p class="mt-2 text-lg text-gray-500 mb-5 md:mb-0">15 </p>
                                    </div>
                                    <div>
                                        <div class="md:text-2xl text-xl text-gray-500 font-medium mb-4">Total Payable
                                        </div>
                                        <div class="md:text-2xl text-xl font-bold">£ 10,601.00 </div>
                                    </div>
                                    <div class="text-amber-500 text-xl mt-5 md:mt-0 font-medium">In- Progress</div>
                                </div>
                                <a href="order-detail"
                                    class="text-right text-lg underline flex-shrink-0 font-medium text-green-600">View
                                    Details</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-panel" :class="{ 'active': activeTab === 2 }"
                x-show.transition.in.opacity.duration.600="activeTab === 2">
                <div class="md:flex justify-between items-end mb-5">
                    <div>
                        <div class="md:text-2xl text-lg font-medium">Add New Address</div>
                        <div class="md:text-lg text-base text-gray-500">Fill the details below to continue.</div>
                    </div>
                    <div class="mt-5 md:mt-0">
                        <x-secondary-button class="text-center mr-2">
                            {{ __('Cancel') }}
                        </x-secondary-button>

                        <x-primary-button class=" text-lg text-center">
                            {{ __('Save') }}
                        </x-primary-button>
                    </div>
                </div>

                <div class="mt-2 md:w-1/2 grid  grid-cols-1 gap-y-3 sm:grid-cols-2 sm:gap-x-4 ">
                    <div class="sm:col-span-2">
                        <label for="shippingFullName" class="block text-secondary-600">Full Name</label>
                        <div class="mt-1">
                            <input type="text"
                                class="block w-full py-3 px-4 border border-secondary-200 rounded-md placeholder:text-sm placeholder:text-secondary-500"
                                placeholder="Jane Doe">
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="address" class="block text-secondary-600">Phone number</label>
                        <div class="mt-1">
                            <input type="text" name="address" id="address"
                                class="block w-full py-3 px-4 border border-secondary-200 rounded-md placeholder:text-sm placeholder:text-secondary-500"
                                placeholder="Phone number">
                        </div>
                    </div>
                    <div>
                        <label for="shippingCity" class="block text-secondary-600">City</label>
                        <div class="mt-1">
                            <select id="shippingCity" name="shippingCity"
                                class="block w-full py-3 px-4 border border-secondary-200 rounded-md placeholder:text-sm placeholder:text-secondary-500">
                                <option>Select</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label for="shippingState" class="block text-secondary-600">State</label>
                        <div class="mt-1">
                            <select id="shippingState" name="state"
                                class="block w-full py-3 px-4 border border-secondary-200 rounded-md placeholder:text-sm placeholder:text-secondary-500">
                                <option>Select</option>
                            </select>
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="shippingAddress2" class="block text-secondary-600">Address </label>
                        <div class="mt-1">
                            <textarea
                                class="block w-full py-3 px-4 border border-secondary-200 rounded-md placeholder:text-sm placeholder:text-secondary-500 resize-none"
                                placeholder="123 Main Street, London, NW1 2AB, United Kingdom"></textarea>
                        </div>
                    </div>
                </div>


            </div>
            <div class="tab-panel" :class="{ 'active': activeTab === 3 }"
                x-show.transition.in.opacity.duration.600="activeTab === 3">
                <div class="md:flex justify-between items-end mb-5">
                    <div>
                        <div class="md:text-2xl text-lg font-medium">Add New Card</div>
                        <div class="md:text-lg text-base text-gray-500">Fill the details below to continue.</div>
                    </div>
                    <div class="mt-5 md:mt-0">
                        <x-secondary-button class="text-center mr-2">
                            {{ __('Cancel') }}
                        </x-secondary-button>

                        <x-primary-button class=" text-lg text-center">
                            {{ __('Save') }}
                        </x-primary-button>
                    </div>
                </div>
                <div class="mt-2 md:w-1/2 grid  grid-cols-1 gap-y-3 sm:grid-cols-2 sm:gap-x-4 ">
                    <div class="sm:col-span-2">
                        <div class="mt-1">
                            <input type="text"
                                class="block w-full py-3 px-4 border border-secondary-200 rounded-md placeholder:text-sm placeholder:text-secondary-500"
                                placeholder="Card Number">
                        </div>
                    </div>
                    <div>
                        <div class="mt-1">
                            <input type="text"
                                class="block w-full py-3 px-4 border border-secondary-200 rounded-md placeholder:text-sm placeholder:text-secondary-500"
                                placeholder="Valid through">
                        </div>
                    </div>
                    <div>
                        <div class="mt-1">
                            <input type="text"
                                class="block w-full py-3 px-4 border border-secondary-200 rounded-md placeholder:text-sm placeholder:text-secondary-500"
                                placeholder="CVV">
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <div class="mt-1">
                            <input type="text"
                                class="block w-full py-3 px-4 border border-secondary-200 rounded-md placeholder:text-sm placeholder:text-secondary-500"
                                placeholder="Card Holder Name">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>
@endsection