@extends('layouts.main')
@section('content')
    <div class="relative bg-white">
        <div class="lg:absolute lg:inset-0 lg:left-1/2">
            <img class="h-64 w-full bg-gray-50 object-cover sm:h-80 lg:absolute lg:h-full" src="images/contact.png"
                alt="">
        </div>
        <div class="pb-24 pt-16 sm:pb-32 sm:pt-24 lg:mx-auto lg:grid lg:max-w-7xl lg:grid-cols-2 lg:pt-32">
            <div class="px-6 lg:px-8">
                <div class="mx-auto max-w-xl lg:mx-0 lg:max-w-lg">
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900">Contact Us</h2>
                    <p class="mt-2 text-lg leading-8 text-gray-600">If you are unsure how the system works drop us a message and we will be happy to assist you. We can also do a zoom chat if you are looking to speak to an expert. Just let us know in the message box.</p>
                    <form action="{{ route('contactUs.store') }}" method="POST" class="mt-16">
                        @csrf
                        <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
                            <div>
                                <label for="first_name" class="block text-sm font-semibold leading-6 text-gray-900">First
                                    Name <span class="text-red-600">*</span>
                                </label>
                                <div class="mt-2.5">
                                    <input type="text" name="first_name" id="first_name" autocomplete="given-name"
                                        class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset  sm:text-sm sm:leading-6"
                                        value="{{ old('first_name') }}">

                                    @error('first_name')
                                        <p class="text-red-600 font-medium">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div>
                                <label for="last_name" class="block text-sm font-semibold leading-6 text-gray-900">Last
                                    Name <span class="text-red-600">*</span></label>
                                <div class="mt-2.5">
                                    <input type="text" name="last_name" id="last_name" autocomplete="family-name"
                                        class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset  sm:text-sm sm:leading-6"
                                        value="{{ old('last_name') }}">

                                    @error('last_name')
                                        <p class="text-red-600 font-medium">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="sm:col-span-2">
                                <label for="email" class="block text-sm font-semibold leading-6 text-gray-900">Email
                                    <span class="text-red-600">*</span></label>
                                <div class="mt-2.5">
                                    <input id="email" name="email" type="email" autocomplete="email"
                                        class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset  sm:text-sm sm:leading-6"
                                        value="{{ old('email') }}">
                                    @error('email')
                                        <p class="text-red-600 font-medium">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="sm:col-span-2">
                                <div class="flex justify-between text-sm leading-6">
                                    <label for="company"
                                        class="block text-sm font-semibold leading-6 text-gray-900">Company</label>
                                    <p id="phone-description" class="text-gray-400">Optional</p>
                                </div>
                                <div class="mt-2.5">
                                    <input type="text" name="company" id="company" autocomplete="organization"
                                        class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset  sm:text-sm sm:leading-6"
                                        value="{{ old('company') }}">
                                </div>
                            </div>
                            <div class="sm:col-span-2">
                                <div class="flex justify-between text-sm leading-6">
                                    <label for="phone" class="block font-semibold text-gray-900">Phone
                                        <span class="text-red-600">*</span>
                                    </label>

                                </div>
                                <div class="mt-2.5">
                                    <input type="tel" name="phone" id="phone" autocomplete="tel"
                                        aria-describedby="phone-description" required
                                        class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset  sm:text-sm sm:leading-6"
                                        value="{{ old('phone') }}">
                                </div>
                                @error('phone')
                                    <p class="text-red-600 font-medium">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="sm:col-span-2">
                                <div class="flex justify-between text-sm leading-6">
                                    <label for="address"
                                        class="block text-sm font-semibold leading-6 text-gray-900">Address <span
                                            class="text-red-600">*</span></label>
                                </div>
                                <div class="mt-2.5">
                                    <textarea id="address" name="address" rows="2" aria-describedby="message-description"
                                        class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset  sm:text-sm sm:leading-6"> {{ old('address') }}</textarea>
                                    @error('address')
                                        <p class="text-red-600 font-medium">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="sm:col-span-2">
                                <div class="flex justify-between text-sm leading-6">
                                    <label for="message" class="block text-sm font-semibold leading-6 text-gray-900">How
                                        can
                                        we help you? <span class="text-red-600">*</span></label>
                                    <p id="message-description" class="text-gray-400">Max 500 characters</p>
                                </div>
                                <div class="mt-2.5">
                                    <textarea id="message" name="message" rows="4" aria-describedby="message-description"
                                        class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset  sm:text-sm sm:leading-6"> {{ old('first_name') }}</textarea>
                                    @error('message')
                                        <p class="text-red-600 font-medium">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="mt-10 flex justify-end border-t border-gray-900/10 pt-8">
                            <button type="submit"
                                class="rounded-md bg-green-600 px-3.5 py-2.5 text-center text-lg font-semibold text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 ">Send
                                Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
