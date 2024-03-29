@extends('layouts.main')
@section('content')
    <section class="min-h-screen text-center flex flex-col sm:justify-center items-center pt-20 pb-20 mx-2">
        <div
            class="w-full sm:max-w-lg  lg:px-10 px-6 lg:py-12 py-6   bg-gray-color overflow-hidden rounded-xl md:mt-20 mt-10">
            <div class="m-auto">
                <svg width="64" height="64" viewBox="0 0 64 64" class="m-auto" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <circle cx="32" cy="32" r="31.75" fill="white" stroke="#009A4F" stroke-width="0.5" />
                    <path d="M17 31.7317L26.5 43L48 22" stroke="#009A4F" stroke-width="6" />
                </svg>
            </div>
            <h3 class="font-semibold text-2xl py-4">Your reservation is Confirmed!</h3>
            <p class="text-base text-gray-500">Thank you for choosing us to power your future with solar energy.Our team
                will be in touch soon to schedule your installation and answer any questions you may have. </p>
            <div class="text-center">
                <a href="{{ route('customer.myOrders') }}">
                    <x-primary-button class="py-3 w-60 mt-10 text-lg text-center">
                        {{ __('Go to Orders') }}
                    </x-primary-button>
                </a>
            </div>
        </div>
        <section>
        @endsection
