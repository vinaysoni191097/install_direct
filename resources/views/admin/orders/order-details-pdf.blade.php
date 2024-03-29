<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Install Direct') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <!-- Scripts -->
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default" defer></script>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/form-validate.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>

</head>
<style>
    img+img {
        margin-left: 15px
    }

    .upload-sections>div {
        margin-bottom: 15px;
    }
</style>

<body class="antialiased">
    <main>
        <section class="min-h-screen flex flex-col sm:justify-center  pt-20 pb-20  px-4 sm:px-10 py-10 mx-2">
            <!-- Order Details-->
            <div>
                <div style="font-size: 32px; font-weight: bold; margin-bottom: 5px;">Order Details</div>
                <div style="color: #667085; font-size: 20px;">Prices and quantity can vary as per further inspection of
                    the residence </b>
                </div>
            </div>
            <div style="border:1px solid #dbd7d7; margin-top: 5px; border-radius: 6px; padding: 10px;">
                <div style="display: table; width: 100%; border-spacing: 10px;">
                    <div style="display: table-cell;">
                        <p style="margin-bottom: 5px; color: #a1a1a1;">Order ID</p>
                        <p>Order {{ '#' . $order->order_number }} </p>
                    </div>
                    <div style="display:table-cell;">
                        <p style="margin-bottom: 5px; color: #a1a1a1;">Status</p>
                        <div style="  color: #5925DC; border-radius: 25px; font-size: 16px;">
                            {!! $order->order_status !!}
                        </div>
                    </div>
                    <div style="display:table-cell;">
                        <p style="margin-bottom: 5px; color: #a1a1a1;">Order Placed On</p>
                        <p>{{ $order->created_at->format('M d Y') }} </p>
                    </div>
                    <div style="display:table-cell;">
                        <p style="margin-bottom: 5px;color: #a1a1a1;">Installation Preference</p>
                        <p>{{ 'Between' . ' ' . $order->installation_timeframe }}</p>
                    </div>
                </div>
            </div>
            <div style="font-size: 20px; font-weight: 500; margin-top: 20px; margin-bottom: 10px;">Products
            </div>
            <div>
                @foreach ($order->orderItems as $key => $item)
                    <table style="border-collapse: separate; margin-bottom: 20px;width: 100%;">
                        <tr>
                            <td style="border: 2px solid #ccc; border-radius: 10px; padding: 5px;">
                                <table>
                                    <tr>
                                        <td>
                                            <table style="border-spacing: 20px; border-collapse: separate;">
                                                <tr>
                                                    @if ($item->product_image)
                                                        <td>
                                                            <img src="{{ asset('storage/' . $item->product_image) }}"
                                                                alt="product Image" style="height: 8rem">
                                                        </td>
                                                    @else
                                                        <td>
                                                            <img class="inline-block w-32 h-32  shadow border border-white mt-2"
                                                                src="{{ asset('images/no-image.png') }}"
                                                                alt="">
                                                        </td>
                                                    @endif
                                                    <td>
                                                        <table>
                                                            <tr>
                                                                <td colspan="2">
                                                                    <p style="font-size:18px;  font-weight: bold;">
                                                                        {{ $item->product_name }}</p>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">
                                                                    <p style="font-size:18px;">{{ $item->warranty }}
                                                                        year
                                                                        warranty</p>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <p style="color:#797979; font-weight: 500;">Capacity
                                                                    </p>
                                                                    <p>{{ $item->Kwh ?? 'NA' }}</p>
                                                                </td>
                                                                <td>
                                                                    <p style="color:#797979; font-weight: 500;">Quantity
                                                                    </p>
                                                                    <p>{{ $item->quantity }}</p>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                @endforeach
                <div style="page-break-before:always;"> </div>
            </div>
            <div>
                <div>
                    <div style="font-weight: bold; font-size: 24px; margin-top: 20px; margin-bottom: 10px;">Billing
                        Address and Payment Information</div>
                    <div style="border:1px solid #ccc; border-radius: 10px; padding: 20px;">
                        <div style="font-weight: 600; font-size: 18px;">Payment Method</div>
                        <div style="border-bottom: 1px solid #ccc; font-size: 18px; padding: 10px 0;">Visa card ending
                            in 3245 </div>
                        <div style="font-weight: 600; font-size: 18px; margin-top: 10px;">Billing Address</div>
                        <div style="font-size: 18px;">{{ $order->billing_name }}</div>
                        <p style="font-size: 18px;">{{ $order->billing_address }} </p>
                        <p style="font-size: 18px;">{{ $order->customerDetails->phone_number }}</p>
                    </div>
                </div>
            </div>
            <div>
                <div>
                    <div style="font-weight: bold; font-size: 24px; margin-top: 20px; margin-bottom: 10px;">Installation
                        Address Details</div>
                    <div style="border:1px solid #ccc; border-radius: 10px; padding: 20px;">
                        <div style="font-weight: 600; font-size: 18px;">Payment Method</div>
                        <div style="border-bottom: 1px solid #ccc; font-size: 18px; padding: 10px 0;">Visa card ending
                            in 3245 </div>
                        <div style="font-weight: 600; font-size: 18px; margin-top: 10px;">Billing Address</div>
                        <div style="font-size: 18px;">{{ $order->customerDetails->name }}</div>
                        <p style="font-size: 18px;">{{ $order->installation_address }} </p>
                        <p style="font-size: 18px;">{{ $order->customerDetails->phone_number }}</p>
                    </div>
                </div>
            </div>

            <div style="page-break-before:always;"> </div>

            <div style="font-weight: 600; margin-top: 20px; font-size: 22px; padding: 0px 0;">Property Images</div>
            <div style="gap:10px;">
                <div style="width:100%; margin-right:10px; float:left;">
                    <div class="bg-white rounded-lg p-6 mt-6">
                        <div class="text-start mb-3 text-lg font-medium">Property Images
                        </div>
                        <div id="upload-sections" class="upload-sections">
                            <div class="border rounded-lg bg-gray-50 p-4">
                                <div class="text-base" style="margin-bottom: 40px;">{{ __('Front of the house') }}
                                </div>

                                <div class="flex gap-5 rounded bg-grey-50 mt-2">
                                    {!! $order->front_house_images !!}
                                </div>
                            </div>
                            <div class="border rounded-lg bg-gray-50 p-4">
                                <div class="text-base" style="margin-bottom: 40px;">{{ __('Side of the house') }}
                                </div>
                                <div class="flex gap-5 rounded bg-grey-50 mt-2">
                                    {!! $order->side_house_images !!}
                                </div>
                            </div>
                            <div class="border rounded-lg bg-gray-50 p-4">
                                <div class="text-base" style="margin-bottom: 40px;">{{ __('Back of the house') }}
                                </div>
                                <div class="flex gap-5 rounded bg-grey-50 mt-2">
                                    {!! $order->side_house_images !!}
                                </div>
                            </div>
                            <div class="border rounded-lg bg-gray-50 p-4">
                                <div class="text-base" style="margin-bottom: 40px;">{{ __('Fuse Board') }} </div>
                                <div class="flex gap-5 rounded bg-grey-50 mt-2">
                                    {!! $order->fuse_board_images !!}
                                </div>
                            </div>
                            <div class="border rounded-lg bg-gray-50 p-4">
                                <div class="text-base" style="margin-bottom: 40px;">{{ __('Electric Meter') }}
                                </div>
                                <div class="flex gap-5 rounded bg-grey-50 mt-2">
                                    {!! $order->electric_meter_images !!}
                                </div>
                            </div>
                            <div class="border rounded-lg bg-gray-50 p-4">
                                <div class="text-base" style="margin-bottom: 40px;">{{ __('Inside of Attic') }} </div>
                                <div class="flex gap-5 rounded bg-grey-50 mt-2">
                                    {!! $order->inside_attic_images !!}
                                </div>
                            </div>
                            <div class="border rounded-lg bg-gray-50 p-4">
                                <div class="text-base" style="margin-bottom: 40px;">
                                    {{ __('Prefered position for battery & Inverter') }} </div>
                                <div class="flex gap-5 rounded bg-grey-50 mt-2">
                                    {!! $order->battery_and_iverter_position_images !!}
                                </div>
                            </div>
                            <div class="border rounded-lg bg-gray-50 p-4">
                                <div class="text-base" style="margin-bottom: 40px;">
                                    {{ __('Last 3 Months Electricity Bill') }} </div>
                                <div class="flex gap-5 rounded bg-grey-50 mt-2">
                                    {!! $order->electricity_bill_images !!}
                                </div>
                            </div>
                            <div class="border rounded-lg bg-gray-50 p-4">
                                <div class="text-base" style="margin-bottom: 40px;">
                                    {{ __('Any other images that will help us out') }}</div>
                                <div class="flex gap-5 rounded bg-grey-50 mt-2">
                                    {!! $order->additional_images !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </main>
</body>

</html>
