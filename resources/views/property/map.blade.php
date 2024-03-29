@extends('layouts.inner')
@section('content')
    <header class="fixed inset-x-0 bg-secondary-100 border-b z-10 bg-white">
        <button id="exitModal-{{ 1 }}" onclick="exitModal(event)">
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
                    <div class="md:absolute  hidden md:block  inset-0 flex items-center" aria-hidden="true">
                        <svg class="w-full" width="107" height="8" viewBox="0 0 107 8" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M1 3.5C0.723858 3.5 0.5 3.72386 0.5 4C0.5 4.27614 0.723858 4.5 1 4.5V3.5ZM106.354 4.35355C106.549 4.15829 106.549 3.84171 106.354 3.64645L103.172 0.464466C102.976 0.269204 102.66 0.269204 102.464 0.464466C102.269 0.659728 102.269 0.976311 102.464 1.17157L105.293 4L102.464 6.82843C102.269 7.02369 102.269 7.34027 102.464 7.53553C102.66 7.7308 102.976 7.7308 103.172 7.53553L106.354 4.35355ZM1 4.5H106V3.5H1V4.5Z"
                                fill="#E4E4E4" />
                        </svg>
                    </div>
                    <a href="#" class="relative flex h-10 w-10 items-center justify-center " aria-current="step">
                        <svg width="70" height="70" class="mb-5" viewBox="0 0 27 26" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.4167 0V2.81017L10.4526 0.879667L8.96408 2.36925L10.8913 4.33333H8.08333V6.5H10.8935L8.96408 8.46408L10.4526 9.95258L12.4167 8.02533V10.8333H14.5833V8.02317L16.5474 9.95258L18.037 8.46408L16.1054 6.5H18.9167V4.33333H16.1065L18.037 2.36925L16.5474 0.879667L14.5833 2.81125V0H12.4167ZM13.5 3.25C14.6938 3.25 15.6667 4.22283 15.6667 5.41667C15.6667 6.6105 14.6938 7.58333 13.5 7.58333C12.3062 7.58333 11.3333 6.6105 11.3333 5.41667C11.3333 4.22283 12.3062 3.25 13.5 3.25ZM2.90392 13L0.5 22.6146V26H26.5V22.6146L24.0961 13H2.90392ZM4.59608 15.1667H22.405L24.3333 22.8854V23.8333H2.66667V22.8854L4.59608 15.1667ZM5.91667 16.25L5.47683 18.2141H7.74533L8.08333 16.25H5.91667ZM10.25 16.25L10.0463 18.2141H12.3148L12.4167 16.25H10.25ZM14.5833 16.25L14.6852 18.2141H16.9526L16.75 16.25H14.5833ZM18.9167 16.25L19.2558 18.2141H21.5232L21.0833 16.25H18.9167ZM5.03592 20.3808L4.63183 22.75H7.10183L7.44092 20.3797L5.03592 20.3808ZM9.91092 20.3808L9.70833 22.75H12.2141L12.3148 20.3797L9.91092 20.3808ZM14.6852 20.3808L14.7859 22.75H17.2917L17.088 20.3797L14.6852 20.3808ZM19.5602 20.3808L19.8982 22.75H22.3703L21.9641 20.3797L19.5602 20.3808Z"
                                fill="#A1A1A1" />
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
    <main class="pt-28 md:pt-[120px] space-y-8 lg:h-screen bg-gray-100" x-data="mapStepsData" x-cloak>
        <section class="mx-auto relative h-full" x-show="showStepSection">
            <img src="{{ asset('images/map-img.png') }}" class="mr-3 h-full" alt="map">
            <div
                class="bg-white p-6 absolute inset-2/4 left-0 right-0 md:w-[525px] h-[500px] rounded-2xl m-auto mt-0 md:mt-auto">
                <div x-show="showStep1">
                    <img src="{{ asset('images/map-1.png') }}" class="mr-3 w-full h-72" alt="map">
                    <div class="text-lg font-semibold mt-4">1. Move the map by dragging it</div>
                    <div class="text-lg font-light">Locate your house on Map.</div>
                </div>
                <div x-show="showStep2">
                    <img src="{{ asset('images/map-2.png') }}" class="mr-3 w-full h-72" alt="map">
                    <div class="text-lg font-semibold mt-4">2. Use “+” & “-” controls to zoom</div>
                    <div class="text-lg font-light">Use these controls to zoom in and out on your roof</div>
                </div>
                <div class="move-map" x-show="showStep3">
                    <img src="{{ asset('images/map-2.png') }}" class="mr-3 w-full h-72" alt="map">
                    <div class="text-lg font-semibold mt-4">3. Drop a pin</div>
                    <div class="text-lg font-light">Tap your roof to place a pin, and draw a box around your whole roof.
                    </div>
                </div>
                {{-- Values from session for map  --}}
                <input class="hidden" id="latitude" value="{{ session('latitude') }}">
                <input class="hidden" id="longitude" value="{{ session('longitude') }}">

                <div class="flex justify-center">
                    <x-primary-button class="mt-5 m-auto w-60 py-3 text-center uppercase" @click.prevent="nextStep">
                        {{ __('Next') }}
                    </x-primary-button>
                </div>
            </div>
        </section>

        <div class="mx-auto relative" x-show="showMap">
            <div id="map" style="height: calc(100vh - 280px);"></div>
            <div class="md:flex justify-between gap-4 text-center items-end mt-10 px-20">
                <button id="exitModal-{{ 1 }}" onclick="exitModal(event)"
                    class="rounded-md w-60 border-2 border-green-600 px-4 py-3 text-xl font-medium text-green-600 shadow-sm hover:bg-primary">
                    {{ 'Start Over' }}
                </button>
                <div class="md:flex gap-4">
                    <div class="w-60">
                        <button
                            class="w-60 py-3 text-center text-lg font-medium rounded-md border border-1 hover:border-white border-green-400 bg-gray-200 items-center"
                            @click.prevent="deletePolygon()">
                            {{ __('Clear Selection') }}
                        </button>
                    </div>
                    <form method="POST" action="{{ route('customer.property.areaDetails') }}" id="totalAreaForm">
                        @csrf
                        <input class="hidden" value="" name="totalArea" id="totalArea">
                        <input class="hidden" value="" name="rooftopCordinates" id="rooftopCordinates">

                        <div class="w-60">
                            <x-primary-button class="w-60 py-3 text-center" @click.prevent="calculateArea">
                                {{ __('Continue') }}
                            </x-primary-button>
                        </div>
                        <button class="hidden" type="submit" id="submitDetails"></button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
@push('modals')
    <!-- Exit Modal -->
    <x-confirmation-modal name="exitModal">
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
            <div class="font-semibold text-2xl text-center">Alert</div>

            <div class="text-center mb-4">
                <div class="text-lg text-gray-400">Are you sure you want to exit? All changes will be undone.</div>
            </div>
            <div class="flex justify-center gap-4 mb-3 pt-5">
                <button class="rounded-md text-gray-500 border border-1 border-gray-400 p-2 font-medium w-36"
                    @click="show=false">Cancel</button>
                <a href="{{ route('home') }}">
                    <button class="rounded-md text-white bg-red-600 p-2 w-36 shadow-sm">Exit Anyway</button>
                </a>
            </div>

        </x-slot>
    </x-confirmation-modal>
@endpush
@push('scripts')
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <script
        src="https://maps.googleapis.com/maps/api/js?key={{ config('services.googleMap.key') }}&libraries=drawing,geometry&callback=initMap"
        defer></script>
    <script>
        let map;
        let drawingManager;
        let polygon;
        let latitudeValue = parseFloat(document.getElementById('latitude').value) || 51.509865;
        let longitudeValue = parseFloat(document.getElementById('longitude').value) || -0.118092;

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {

                center: {
                    lat: latitudeValue,
                    lng: longitudeValue
                },
                zoomControl: true,
                zoomControlOptions: {
                    position: google.maps.ControlPosition.TOP_RIGHT,
                },
                zoom: 19,
                mapTypeId: google.maps.MapTypeId.HYBRID,
                editable: true,
                draggable: true,
                mapTypeControl: false,
                streetViewControl: false
            });
            drawingManager = new google.maps.drawing.DrawingManager({
                drawingMode: google.maps.drawing.OverlayType.POLYGON,
                drawingControl: true,
                drawingControlOptions: {
                    position: google.maps.ControlPosition.TOP_CENTER,
                    drawingModes: [
                        google.maps.drawing.OverlayType.POLYGON,
                    ],
                },
                polygonOptions: {
                    strokeColor: "#ff0000",
                    strokeOpacity: 0.8,
                    strokeWeight: 3.5,
                    fillColor: "#d8ffd8",
                    fillOpacity: 0.8,
                    clickable: false,
                    editable: true,
                },
            });
            drawingManager.setMap(map);
            google.maps.event.addListener(drawingManager, 'overlaycomplete', function(event) {
                if (event.type === google.maps.drawing.OverlayType.POLYGON) {
                    if (polygon) {
                        polygon.setMap(null);
                    }
                    polygon = event.overlay;

                    var polygonPath = event.overlay.getPath();

                    // Extract and log latitude and longitude values
                    var coordinates = [];
                    for (var i = 0; i < polygonPath.getLength(); i++) {
                        var vertex = polygonPath.getAt(i);
                        coordinates.push({
                            lat: vertex.lat(),
                            lng: vertex.lng()
                        });
                    }
                    document.getElementById('rooftopCordinates').value = JSON.stringify(coordinates);
                }
            });
        }

        function calculateArea() {
            if (polygon) {
                const area = google.maps.geometry.spherical.computeArea(polygon.getPath());
                document.getElementById('totalArea').value = `${area.toFixed(2)}`;
                const submitButton = document.getElementById('submitDetails');
                // Trigger a click event on the submit button
                submitButton.click();

            } else {
                alert('Please select your rooftop area first.');
            }
        }

        function deletePolygon() {
            if (polygon) {
                polygon.setMap(null);
                polygon = null;
            }
        }
        window.initMap = initMap;
    </script>

    {{-- Map Steps Data for binding   --}}
    <script type="text/javascript">
        const mapStepsData = {

            showStepSection: true,
            showStep1: true,
            showStep2: false,
            showStep3: false,
            showMap: false,
            nextStep: function() {
                switch (true) {
                    case (this.showStep1):
                        this.showStep1 = false;
                        this.showStep2 = true;
                        break;
                    case (this.showStep2):
                        this.showStep2 = false;
                        this.showStep3 = true;
                        break;
                    default:
                        this.showStep3 = false;
                        this.showStepSection = false;
                        this.showMap = true;
                        break;
                }

            },

        }
    </script>
    {{-- Modal Handler  --}}
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
