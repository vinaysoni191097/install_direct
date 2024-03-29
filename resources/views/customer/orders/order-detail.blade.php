@extends('layouts.main')
@section('content')
    <section class="min-h-screen flex flex-col sm:justify-center  pt-20 pb-20 md:px-28 px-4 sm:px-10 py-10 mx-2">
        <!--Breadcrumbs-->
        <nav class="flex md:mt-10 mb-9" aria-label="Breadcrumb">
            <ol role="list" class="flex items-center space-x-4">
                <li>
                    <div>
                        <a href="{{ route('customer.account.profile') }}"
                            class=" text-sm font-medium text-gray-500 hover:text-gray-700">
                            Account
                        </a>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                clip-rule="evenodd" />
                        </svg>
                        <a href="{{ route('customer.myOrders') }}"
                            class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">Orders</a>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                clip-rule="evenodd" />
                        </svg>
                        <a href="#" class="ml-4 text-sm font-medium text-green-600" aria-current="page">Order
                            #{{ $order->order_number }}</a>
                    </div>
                </li>
            </ol>
        </nav>
        @if (!$order->document_uploaded)
            <div class="bg-orange-50 border border-orange-200 p-2 rounded text-orange-500 mb-3">
                <div class="flex justify-between">
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

                        <a class="text-orange-500 text-base font-medium underline px-2"
                            href="{{ route('customer.pending.document.upload', $order->order_number) }}">Upload
                            </a>
                    </div>
                </div>
            </div>
        @endif
        <!-- Order Details-->
        <div class="md:flex justify-between items-end">
            <div>
                <div class="md:text-4xl text-xl font-bold mb-2">Order Details</div>
                <div class="md:text-xl text-lg gray-text">Prices and quantity can vary as per further inspection of the residence</b>
                </div>
            </div>
            <div class="gap-4 flex">
                @if (!$order->document_uploaded)
                    <a href="{{ route('customer.pending.document.upload', $order) }}">
                        <x-secondary-button
                            class=" text-center text-green-600 border-green-600 font-medium md:text-xl text-lg mt-4 px-6 md:mt-0 py-3 ">
                            {{ __('Upload') }}
                        </x-secondary-button>
                    </a>
                @endif
                <a href="{{ route('customer.order.invoice', $order) }}">
                    <x-primary-button class="w-52 md:text-xl text-lg mt-4 md:mt-0 py-3 text-center">
                        {{ __('Download Invoice') }}
                    </x-primary-button>
                </a>
            </div>
        </div>

        <div class="flex-1 mt-10">
            <ul class="space-y-3">
                <li class="md:flex flex-col sm:flex-row gap-3 p-4 border rounded-lg border-secondary-200 group">

                    <div class="sm:ml-6 flex flex-1 flex-col justify-between">
                        <div class="md:flex justify-between">
                            <div>

                                <p class="mt-2 text-lg text-gray-400">Order ID</p>
                                <p class="mt-2 text-lg text-gray-500">Order #{{ $order->order_number }} </p>
                            </div>
                            <div class="mb-4">
                                <p class="mt-2 text-lg text-gray-400 mb-1">Status</p>
                                <div class="text-sm"> {!! $order->order_status !!}</div>
                            </div>
                            <div>

                                <p class="mt-2 text-lg text-gray-400">Order Placed On</p>
                                <p class="mt-2 text-lg text-gray-500">{{ $order->created_at->format('d M Y , l') }} </p>
                            </div>
                            <div>
                                <p class="mt-2 text-lg text-gray-400">Installation Preference</p>
                                <p class="mt-2 text-lg text-gray-500">{{ $order->installation_timeframe }}</p>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>

        <div class="grid md:grid-cols-2 gap-20 justify-center mt-10">
            @foreach ($order->orderItems as $item)
                <div class="relative w-full mb-9">
                    <label for="owner"
                        class="cursor-pointer block w-full border-2 border-gray-300 md:rounded-3xl rounded p-4">
                        <div class="md:flex py-5">
                            <div class="flex-shrink-0">
                                @if ($item->product_image)
                                    <img src="{{ asset('storage/' . $item->product_image) }}" alt="product Image"
                                        class="w-20 h-20 m-auto rounded-md">
                                @endif
                            </div>
                            <div class="md:ml-6 flex flex-1 flex-col">
                                <div class="md:flex">
                                    <div class="min-w-0 flex-1">
                                        <h4 class="text-sm">
                                            <div
                                                class="font-semibold text-secondary-600 hover:text-secondary-600 md:text-xl text-lg">
                                                {{ $item->product_name }}</div>
                                        </h4>
                                        <p class="mt-1 text-secondary-400 text-lg">{{ $item->warranty ?? 1 }} year warranty
                                        </p>
                                        <p class="mt-1 text-secondary-400 text-lg font-medium">Quantity :
                                            {{ $item->quantity }}
                                        </p>
                                    </div>
                                    @if ($item->Kwh)
                                        <div
                                            class="md:ml-4 flow-root flex-shrink-0 font-medium relative text-center text-secondary-600">

                                            <div
                                                class="rounded border border-secondary-200 text-gray-500 w-full md:w-32 bg-gray-100 appearance-none py-2 pl-4 pr-4 ">
                                                {{ $item->Kwh }} Kwh
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <div class="flex mt-4">
                                    <div class="min-w-0 flex-1">
                                        <h4 class="text-sm">
                                            <a href="#"
                                                class="font-semibold text-secondary-600 hover:text-secondary-600 text-2xl">£
                                                {{ number_format($item->price, 2) }} </a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </label>
                </div>
            @endforeach
        </div>


        <div class="md:flex w-full gap-20 mt-5">
            <div class="w-full">
                <div class="md:text-2xl text-base font-bold mb-6 mt-4">Billing Address and Payment Information</div>
                <div class="border rounded-lg p-6">
                    <div class="text-gray-500 md:text-xl text-base">Payment Method</div>
                    <div class="border-b md:text-xl text-base py-4">Visa card ending in 3245</div>
                    <div class="mt-4 text-gray-500 text-base mb-2">Billing Address</div>
                    <div class="text-xl mb-2">{{ $order->billing_name }}</div>
                    <p class="md:text-xl text-base ">
                        {{ $order->billing_address }}
                    </p>
                    <p class="border-b py-4 md:text-xl text-base">{{ $user->phone_number }}</p>
                    <div class="mt-4 text-gray-500 text-base mb-2">Installation Address</div>
                    <div class="text-xl mb-2">{{ $user->name }}</div>
                    <p class="md:text-xl text-base ">
                        {{ $order->installation_address }}
                    </p>
                    <p class="md:text-xl text-base">{{ $user->phone_number }}</p>
                </div>
            </div>
            <div class="w-full">
                <div class="md:text-2xl text-base  font-bold mb-6 mt-4">Order Summary</div>
                <div class="border rounded-lg md:p-6 p-2">
                    <div class="w-full">
                        @foreach ($order->orderItems as $item)
                            <div class="flex justify-between border-b pb-4 mb-4">
                                <div class="md:text-lg text-base">{{ $item->quantity }} X {{ $item->product_name }}</div>
                                <div class="font-semibold md:text-lg text-base">£{{ number_format($item->quantity * $item->price, 2) }}
                                </div>
                            </div>
                        @endforeach
                        <div class="flex justify-between border-b pb-4 mb-4">
                            <div class="md:text-lg text-base">Total Amount</div>
                            <div class="font-semibold md:text-lg text-base"> £{{ $order->total_amount }} </div>
                        </div>
                        <div class="flex justify-between border-b pb-4 mb-4">
                            <div class="md:text-lg text-base">Booking Amount</div>
                            <div class="font-semibold md:text-lg text-base">-£
                                {{ number_format($order->booking_amount, 2) }} </div>
                        </div>
                        <div class="flex justify-between font-semibold  pb-4 mb-4">
                            <div class="text-xl">Total Payable</div>
                            <div class="font-bold text-xl">£{{ $order->payable_amount }} </div>
                        </div>
                        <div class="text-center text-gray-500 text-base mt-10">Prices and quantity can vary as per
                            further inspection of the residence</div>
                    </div>
                </div>
            </div>
        </div>

@if ($order->document_uploaded)
<div class="font-semibold text-2xl mt-5 mb-3">Uploads</div>

<div class="grid gap-6 md:grid-cols-2" id="upload-sections">
    <div class="border rounded-lg bg-gray-50 p-4">
        <div class="font-medium text-xl">{{ __('Front of the house') }}
        </div>

        <div class="flex gap-5 rounded bg-grey-50 mt-2">
            {!! $order->front_house_images !!}
        </div>
    </div>
    <div class="border rounded-lg bg-gray-50 p-4">
        <div class="font-medium text-xl">{{ __('Side of the house') }}
        </div>
        <div class="flex gap-5 rounded bg-grey-50 mt-2">
            {!! $order->side_house_images !!}
        </div>
    </div>
    <div class="border rounded-lg bg-gray-50 p-4">
        <div class="font-medium text-xl">{{ __('Back of the house') }}
        </div>
        <div class="flex gap-5 rounded bg-grey-50 mt-2">
            {!! $order->side_house_images !!}
        </div>
    </div>
    <div class="border rounded-lg bg-gray-50 p-4">
        <div class="font-medium text-xl">{{ __('Fuse Board') }} </div>
        <div class="flex gap-5  rounded bg-grey-50 mt-2">
            {!! $order->fuse_board_images !!}
        </div>
    </div>
    <div class="border rounded-lg bg-gray-50 p-4">
        <div class="font-medium text-xl">{{ __('Electric Meter') }}
        </div>
        <div class="flex gap-5  rounded bg-grey-50 mt-2">
            {!! $order->electric_meter_images !!}
        </div>
    </div>
    <div class="border rounded-lg bg-gray-50 p-4">
        <div class="font-medium text-xl">{{ __('Inside of Attic') }} </div>
        <div class="flex gap-5  rounded bg-grey-50 mt-2">
            {!! $order->inside_attic_images !!}
        </div>
    </div>
    <div class="border rounded-lg bg-gray-50 p-4">
        <div class="font-medium text-xl">{{ __('Prefered position for battery & Inverter') }} </div>
        <div class="flex gap-5  rounded bg-grey-50 mt-2">
            {!! $order->battery_and_iverter_position_images !!}
        </div>
    </div>
    <div class="border rounded-lg bg-gray-50 p-4">
        <div class="font-medium text-xl">{{ __('Last 3 Months Electricity Bill') }} </div>
        <div class="flex gap-5  rounded bg-grey-50 mt-2">
            {!! $order->electricity_bill_images !!}
        </div>
    </div>
    <div class="border rounded-lg bg-gray-50 p-4">
        <div class="font-medium text-xl">{{ __('Any other images that will help us out') }}</div>
        <div class="flex gap-5  rounded bg-grey-50 mt-2">
            {!! $order->additional_images !!}
        </div>
    </div>
</div>
@endif
    </section>
@endsection
