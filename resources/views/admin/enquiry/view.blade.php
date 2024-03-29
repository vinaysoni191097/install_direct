@extends('admin.partials.main')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">{{ __('Enquiry') }}</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item active">{{ 'View enquiry' }}</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="mt-12 flex gap-2">
        <a href="{{ route('admin.enquiries') }}">
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                <path d="M0 0h24v24H0V0z" fill="none"></path>
                <path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"></path>
            </svg>
        </a>
        <h3 class="font-bold text-xl text-gray-800 leading-tight mb-2">
            {{ __('Enquiry Details') }}
        </h3>
    </div>
    <div class="bg-white rounded-lg p-6 mt-6">
        <div class="md:flex gap-8">
            <div class="flex justify-between w-full gap-10">
                <table class="text-sm w-2/4">
                    <tbody>
                        <tr class="border border-gray-100 odd:bg-violet-50/25">
                            <td class="text-sm px-6 py-3 text-left border-r w-64">
                                <div class="font-bold"> {{ __('Enquiry Number') }}</div>
                            </td>
                            <td class="text-sm px-6 py-3 text-left">
                                # {{ $enquiry->enquiry_number ?? '' }}
                            </td>
                        </tr>
                        <tr class="border border-gray-100 odd:bg-violet-50/25">
                            <td class="text-sm px-6 py-3 text-left border-r w-64">
                                <div class="font-bold"> {{ __('Customer Name') }}</div>
                            </td>
                            <td class="text-sm px-6 py-3 text-left">
                                {{ $enquiry->userData->name ?? '' }}
                            </td>
                        </tr>
                        <tr class="border border-gray-100 odd:bg-violet-50/25">
                            <td class="text-sm px-6 py-3 text-left border-r">
                                <div class="font-bold"> {{ __('Phone Number') }}</div>
                            </td>
                            <td class="text-sm px-6 py-3 text-left">
                                {{ $enquiry->userData->phone_number ?? '' }}
                            </td>
                        </tr>
                        <tr class="border border-gray-100 odd:bg-violet-50/25">
                            <td class="text-sm px-6 py-3 text-left border-r">
                                <div class="font-bold"> {{ __('Email') }}</div>
                            </td>
                            <td class="text-sm px-6 py-3 text-left">
                                {{ $enquiry->userData->email }}
                            </td>
                        </tr>
                        <tr class="border border-gray-100 odd:bg-violet-50/25">
                            <td class="text-sm px-6 py-3 text-left border-r">
                                <div class="font-bold"> {{ __('Date') }} </div>
                            </td>
                            <td class="text-sm px-6 py-3 text-left">
                                {{ $enquiry->created_at->format('d M y / h:i a') }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="text-sm w-2/4">
                    <tbody>
                        <tr class="border border-gray-100odd:bg-violet-50/25">
                            <td class="text-sm px-6 py-3 text-left border-r">
                                <div class="font-bold"> {{ __('Installation Address') }}</div>
                            </td>
                            <td class="text-sm px-6 py-3 text-left">
                                {{ $enquiry->location_address }}
                            </td>
                        </tr>
                        <tr class="border border-gray-100 odd:bg-violet-50/25">
                            <td class="text-sm px-6 py-3 text-left border-r">
                                <div class="font-bold"> {{ __('Installation TimeFrame') }}</div>
                            </td>
                            <td class="text-sm px-6 py-3 text-left">
                                {{ $enquiry->installation_timeframe }}
                            </td>
                        </tr>
                        <tr class="border border-gray-100 odd:bg-violet-50/25">
                            <td class="text-sm px-6 py-3 text-left border-r">
                                <div class="font-bold"> {{ __('Power Consumption') }} </div>
                            </td>
                            <td class="text-sm px-6 py-3 text-left">
                                @switch($enquiry->power_consumption)
                                    @case('KwhValue')
                                        {{ $enquiry->consumption_kwh_value . ' ' . 'Kwh' }}
                                    @break

                                    @case('amountValue')
                                        {{ '£' . $enquiry->consumption_amount_value }}
                                    @break

                                    @default
                                        <p class="text-red-600 font-medium ">{{ "Customer didn't add the values" }}</p>
                                @endswitch
                            </td>
                        </tr>
                        <tr class="border border-gray-100 odd:bg-violet-50/25">
                            <td class="text-sm px-6 py-3 text-left border-r">
                                <div class="font-bold"> {{ __('Ownership') }} </div>
                            </td>
                            <td class="text-sm px-6 py-3 text-left">
                                {{ $enquiry->ownership }}
                            </td>
                        </tr>
                        <tr class="border border-gray-100 odd:bg-violet-50/25">
                            <td class="text-sm px-6 py-3 text-left border-r">
                                <div class="font-bold"> {{ __('Total Members') }} </div>
                            </td>
                            <td class="text-sm px-6 py-3 text-left">
                                {{ $enquiry->members }}
                            </td>
                        </tr>

                        <tr class="border border-gray-100 odd:bg-violet-50/25">
                            <td class="text-sm px-6 py-3 text-left border-r">
                                <div class="font-bold"> {{ __('Electricity Bill') }} </div>
                            </td>
                            <td class="text-sm px-6 py-3 text-left">
                                @switch($enquiry->elec_rate_type)
                                    @case('rateSame')
                                        {{ 'Same Rate for Day and Night (per unit) : ' . ' £' . $enquiry->day_rate }}
                                    @break

                                    @case('rateChanged')
                                        {{ 'Day Rate:' . ' ' . $enquiry->day_rate }} <br>
                                        {{ 'Night Rate:' . ' ' . $enquiry->night_rate }}
                                    @break

                                    @default
                                        <p class="text-red-600 font-medium ">{{ "Customer didn't add the values" }}</p>
                                @endswitch
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <table class="w-full mt-5">
            <tbody>
                <tr>
                    <td>
                        <div id="map" style="height: 500px; width:100%;"></div>
                        <input type="hidden" value="{{ $enquiry->latitude }}" id="lat">
                        <input type="hidden" value="{{ $enquiry->longitude }}" id="long">
                        <input type="hidden" value="{{ $enquiry->rooftop_cordinates }}" id="roftopCordinates">
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
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

                zoom: 18,
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
