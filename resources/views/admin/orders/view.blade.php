@extends('admin.partials.main')
@section('content')
    <div class="bg-white rounded-lg p-6 mt-6">

        <div class="text-start mb-3 text-lg font-medium flex gap-3">
            <a href="{{ route('admin.orders') }}">
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor" stroke="none" viewBox="0 0 24 24">
                    <path d="M21 11H6.414l5.293-5.293-1.414-1.414L2.586 12l7.707 7.707 1.414-1.414L6.414 13H21z"></path>
                </svg>
            </a>
            <div>Order Summary</div>
        </div>
        <div class="md:flex gap-8">
            <div class="flex justify-between w-full gap-10">
                <table class="text-sm w-2/4">
                    <tbody>
                        @foreach ($order->orderItems as $item)
                            <tr class="border border-gray-100 odd:bg-violet-50/25">
                                <td class="text-sm px-6 py-3 text-left border-r w-64">
                                    <div class="font-bold text-black">{{ $item->quantity }} X {{ $item->product_name }}
                                        @if ($item->Kwh)
                                            {{ $item->Kwh }}{{ __('Kwh') }}
                                        @endif
                                    </div>
                                </td>
                                <td class="text-sm px-6 py-3 text-left">
                                    £ {{ number_format($item->quantity * $item->price, 2) }}
                                </td>
                            </tr>
                        @endforeach
                        <tr class="border border-gray-100 odd:bg-violet-50/25">
                            <td class="text-sm px-6 py-3 text-left border-r w-64">
                                <div class="font-bold text-black"> {{ __('Total Amount') }}</div>
                            </td>
                            <td class="text-sm px-6 py-3 text-left">
                                £ {{ $order->total_amount }}
                            </td>
                        </tr>
                        <tr class="border border-gray-100 odd:bg-violet-50/25">
                            <td class="text-sm px-6 py-3 text-left border-r w-64">
                                <div class="font-bold text-black"> {{ __('Booking Amount') }}</div>
                            </td>
                            <td class="text-sm px-6 py-3 text-left">
                                - £
                                {{ number_format($order->booking_amount, 2) }}
                            </td>
                        </tr>
                        <tr class="border border-gray-100 odd:bg-violet-50/25">
                            <td class="text-sm px-6 py-3 text-left border-r w-64">
                                <div class="font-bold text-black"> {{ __('Pending Amount') }}</div>
                            </td>
                            <td class="text-sm px-6 py-3 text-left">
                                £ {{ $order->payable_amount }}
                            </td>
                        </tr>

                    </tbody>
                </table>
                <table class="text-sm w-2/4">
                    <tbody>
                        <tr class="border border-gray-100odd:bg-violet-50/25">
                            <td class="text-sm px-6 py-3 text-left border-r">
                                <div class="font-bold text-black"> {{ __('Billing Address') }}</div>
                            </td>
                            <td class="text-sm px-6 py-3 text-left">
                                {{ $order->billing_name }} , {{ $order->billing_address }}
                            </td>
                        </tr>
                        <tr class="border border-gray-100 odd:bg-violet-50/25">
                            <td class="text-sm px-6 py-3 text-left border-r">
                                <div class="font-bold text-black"> {{ __('Installation Address') }}</div>
                            </td>
                            <td class="text-sm px-6 py-3 text-left">
                                {{ $order->installation_address }}
                            </td>
                        </tr>
                        <tr class="border border-gray-100 odd:bg-violet-50/25">
                            <td class="text-sm px-6 py-3 text-left border-r">
                                <div class="font-bold text-black"> {{ __('Installation Timeframe') }}</div>
                            </td>
                            <td class="text-sm px-6 py-3 text-left">
                                {{ $order->installation_timeframe }}
                            </td>
                        </tr>
                        <tr class="border border-gray-100 odd:bg-violet-50/25">
                            <td class="text-sm px-6 py-3 text-left border-r">
                                <div class="font-bold text-black"> {{ __('Status') }} </div>
                            </td>
                            <td class="text-sm px-6 py-3 text-left">
                                {!! $order->order_status !!}
                            </td>
                        </tr>
                        <tr class="border border-gray-100 odd:bg-violet-50/25">
                            <td class="text-sm px-6 py-3 text-left border-r">
                                <div class="font-bold text-black"> {{ __('Order Number') }} </div>
                            </td>
                            <td class="text-sm px-6 py-3 text-left">
                                {{ $order->order_number }}
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="bg-white rounded-lg p-6 mt-6">
        <div class="text-start mb-3 text-lg font-medium">Customer Details
        </div>
        <div class="md:flex gap-8">
            <div class="flex justify-between w-full gap-10">
                <table class="text-sm w-2/4">
                    <tbody>

                        <tr class="border border-gray-100 odd:bg-violet-50/25">
                            <td class="text-sm px-6 py-3 text-left border-r w-64">
                                <div class="font-bold text-black"> {{ __('Customer Name') }}</div>
                            </td>
                            <td class="text-sm px-6 py-3 text-left">
                                {{ $order->customerDetails->name }}
                            </td>
                        </tr>
                        <tr class="border border-gray-100 odd:bg-violet-50/25">
                            <td class="text-sm px-6 py-3 text-left border-r w-64">
                                <div class="font-bold text-black"> {{ __('Customer Email') }}</div>
                            </td>
                            <td class="text-sm px-6 py-3 text-left">
                                {{ $order->customerDetails->email }}
                            </td>
                        </tr>
                        <tr class="border border-gray-100 odd:bg-violet-50/25">
                            <td class="text-sm px-6 py-3 text-left border-r w-64">
                                <div class="font-bold text-black"> {{ __('Phone Number') }}</div>
                            </td>
                            <td class="text-sm px-6 py-3 text-left">
                                {{ $order->customerDetails->phone_number }}
                            </td>
                        </tr>
                    </tbody>

                </table>
                <table class="w-2/4">
                    <tbody>
                        <tr>
                            <td>
                                <div id="map" style="height: 500px; width:100%;"></div>
                                <input type="hidden" value="{{ $order->installation_address_latitude }}" id="lat">
                                <input type="hidden" value="{{ $order->installation_address_longitude }}" id="long">
                                <input type="hidden" value="{{ $order->rooftop_cordinates }}" id="roftopCordinates">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>


    </div>

    @if ($order->document_uploaded)
        <div class="bg-white rounded-lg p-6 mt-6">
            <div class="text-start mb-3 text-lg font-medium">Property Images
            </div>
            <div class="grid gap-6 md:grid-cols-2" id="upload-sections">
                <div class="border rounded-lg bg-gray-50 p-4">
                    <div class="text-base">{{ __('Front of the house') }}
                    </div>

                    <div class="flex gap-5 rounded bg-grey-50 mt-2">
                        {!! $order->front_house_images !!}
                    </div>
                </div>
                <div class="border rounded-lg bg-gray-50 p-4">
                    <div class="text-base">{{ __('Side of the house') }}
                    </div>
                    <div class="flex gap-5 rounded bg-grey-50 mt-2">
                        {!! $order->side_house_images !!}
                    </div>
                </div>
                <div class="border rounded-lg bg-gray-50 p-4">
                    <div class="text-base">{{ __('Back of the house') }}
                    </div>
                    <div class="flex gap-5 rounded bg-grey-50 mt-2">
                        {!! $order->side_house_images !!}
                    </div>
                </div>
                <div class="border rounded-lg bg-gray-50 p-4">
                    <div class="text-base">{{ __('Fuse Board') }} </div>
                    <div class="flex gap-5  rounded bg-grey-50 mt-2">
                        {!! $order->fuse_board_images !!}
                    </div>
                </div>
                <div class="border rounded-lg bg-gray-50 p-4">
                    <div class="text-base">{{ __('Electric Meter') }}
                    </div>
                    <div class="flex gap-5  rounded bg-grey-50 mt-2">
                        {!! $order->electric_meter_images !!}
                    </div>
                </div>
                <div class="border rounded-lg bg-gray-50 p-4">
                    <div class="text-base">{{ __('Inside of Attic') }} </div>
                    <div class="flex gap-5  rounded bg-grey-50 mt-2">
                        {!! $order->inside_attic_images !!}
                    </div>
                </div>
                <div class="border rounded-lg bg-gray-50 p-4">
                    <div class="text-base">{{ __('Prefered position for battery & Inverter') }} </div>
                    <div class="flex gap-5  rounded bg-grey-50 mt-2">
                        {!! $order->battery_and_iverter_position_images !!}
                    </div>
                </div>
                <div class="border rounded-lg bg-gray-50 p-4">
                    <div class="text-base">{{ __('Last 3 Months Electricity Bill') }} </div>
                    <div class="flex gap-5  rounded bg-grey-50 mt-2">
                        {!! $order->electricity_bill_images !!}
                    </div>
                </div>
                <div class="border rounded-lg bg-gray-50 p-4">
                    <div class="text-base">{{ __('Any other images that will help us out') }}</div>
                    <div class="flex gap-5  rounded bg-grey-50 mt-2">
                        {!! $order->additional_images !!}
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
@push('scripts')
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <script
        src="https://maps.googleapis.com/maps/api/js?key={{ config('services.googleMap.key') }}&libraries=drawing,geometry&callback=initMap"
        defer></script>
    <script>
        let map;
        let drawingManager;
        let polygon;
        let latitudeValue = parseFloat(document.getElementById('lat').value) || 51.509865;
        let longitudeValue = parseFloat(document.getElementById('long').value) || -0.118092;

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {

                center: {
                    lat: latitudeValue,
                    lng: longitudeValue
                },

                zoom: 17,
                mapTypeId: google.maps.MapTypeId.HYBRID,
                editable: true,
                draggable: true,
                mapTypeControl: false,
                streetViewControl: false
            });
            var polygonCoords = JSON.parse(document.getElementById('roftopCordinates').value);
            var polygon = new google.maps.Polygon({
                paths: polygonCoords,
                strokeColor: "#ff0000",
                strokeOpacity: 0.8,
                strokeWeight: 3.5,
                fillColor: "#d8ffd8",
                fillOpacity: 0.8,
                clickable: false,
                editable: true,
                map: map

            });

        }
        window.initMap = initMap;
    </script>
@endpush
