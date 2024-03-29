@extends('layouts.main')
@section('content')
    <div class="md:bg-top-banner relative">
        @if ($content && $content->banner_image_id)
            <img src="{{ asset('storage/' . $content->bannerImage->path) }}" class="bg-cover bg-no-repeat  lg:h-screen">
        @else
            <img src="{{ asset('images/homepage-top-banner.png') }}" class="bg-cover bg-no-repeat  lg:h-screen">
        @endif
        <div class="lg:flex justify-end md:absolute top-0 right-0  items-center lg:h-screen">
            <div class="bg-gray-50 md:w-3/4 rounded-lg md:mr-16 md:mt-20  md:p-12 p-4">
                <div class="md:text-4xl text-3xl font-bold opacity-80 leading-normal md:mt-0">
                    {{ $content->banner_headline ?? null }}
                </div>
                <div class="md:text-2xl text-lg font-normal text-gray-500 py-5">{{ $content->banner_tagline ?? null }}</div>
                <div class="bg-white rounded-lg border p-4 opacity-100">
                    <label class="mb-2 block font-medium text-gray-600">
                        {{ __('Enter your postcode to understand how much you can save') }}
                    </label>

                    {{-- Checking if user is logged in or not and if user is admin then it should not give option to check the steps --}}
                    @if (Auth::user())
                        <div x-data="loggedUserFormData" x-cloak>
                            <form action="{{ route('customer.property.query') }}" method="POST" id="zipForm">
                                @csrf
                                <div class="flex gap-4">
                                    <input type="text" name="zip"
                                        class="border-gray-300 focus:border-gray-400 px-4 focus:ring-gray-400 border rounded-lg block mt-1 w-full h-12"
                                        x-bind:class="{ 'cursor-not-allowed': isAdmin }" x-bind:disabled="isAdmin"
                                        x-model='zipValue' placeholder="Enter your post code" maxlength="8">

                                    <button type="button"
                                        class="items-center px-4 w-56 py-1 bg-green-600 border border-transparent rounded-md font-medium text-base text-white  hover:bg-green-700 focus:bg-green-700 active:bg-green-900 focus:outline-none  transition ease-in-out duration-150"
                                        x-bind:class="{ 'cursor-not-allowed': isAdmin }" x-bind:disabled="isAdmin"
                                        x-on:click="locationZip(event)">
                                        {{ __('Get Location') }}
                                    </button>
                                </div>
                                <p class="text-red-600 font-semibold mt-2" x-show="isAdmin">
                                    {{ __('* Please login as user to proceed further! *') }}
                                </p>
                                <p class="text-red-600 font-semibold mt-2" x-show="isUserZipCodeAdded">
                                    {{ __('Please add postal code first!') }}
                                </p>
                                <p class="text-red-600 font-semibold mt-2" x-show="showError" x-text="errorMessage">
                                </p>

                            </form>
                            {{-- Pending Order Confirmation Modal --}}
                            <x-pending-order />

                        </div>
                    @else
                        <div x-data="locationData" x-cloak>
                            <form action="{{ route('customer.property.query') }}" method="POST" id="locationForm">
                                @csrf
                                <div class="flex gap-4">
                                    <input type="text" name="zip" id="zip" x-model="zipValue" value=""
                                        class="border-gray-300 focus:border-gray-400 px-4 focus:ring-gray-400 border rounded-lg block mt-1 w-full h-12"
                                        placeholder="Enter your post code" maxlength="8">
                                    <button type="submit"
                                        class="w-52 md:text-lg text-sm text-center bg-green-600 text-white px-6 rounded-md font-medium"
                                        @click.prevent="locationZip()">
                                        {{ __('Get Location') }}
                                    </button>
                                </div>
                                <p class="text-red-600 font-semibold mt-2" x-show="isZipCodeAdded">
                                    {{ __('Please add zip code first!') }}
                                </p>
                                <p class="text-red-600 font-semibold mt-2" x-show="showError" x-text="errorMessage">
                                </p>
                            </form>
                        </div>
                    @endif


                </div>
                @if ($content && $content->keyFeatures->isNotEmpty())
                    @foreach ($content->keyFeatures as $value)
                        <div class="flex gap-4 items-center text-lg mb-4 mt-5">
                            <img src="{{ asset('images/green-tick.png') }}">
                            <span>{{ $value->key_feature }}</span>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    {{-- Partner Logos  --}}

    <div class="company-already-growing border-b py-14">
        <div class="text-center text-xl font-medium text-gray-500 mb-5">
            Join over 1,000,000+ UK residents who have installed solar panels
        </div>

        <div class="owl-carousel owl-theme px-20">
            @foreach ($logos as $key => $logo)
                <div class="item">
                    <img class="bg-transparent" src="{{ asset('storage/' . $logo->partnerLogo->path) }}">
                </div>
            @endforeach
        </div>
    </div>


    <section class="text-center md:p-28 p-4">
        <div class="md:text-4xl text-2xl font-bold">How it Works</div>
        <p class="md:text-2xl text-lg font-normal text-gray-500 mt-5">Keeping it clear,simple & straightforward.
            billing.</p>
        <div class="md:flex justify-center items-start md:px-10 m-auto mt-20">
            <div class="m-auto md:w-[400px] md:mb-0 mb-5">
                <img class="m-auto" src="images/how-it-work-1.png">
                <div class="text-xl mt-5">1. Tell us about your home & your bills <br> & we will give you a recommendation.
                </div>
            </div>
            <div class="m-auto md:w-[400px] md:mb-0 mb-5">
                <img class="m-auto" src="images/how-it-work-2.png">
                <div class="text-xl mt-5"> 2. Customize your package to suit your <br> budget and needs.</div>
            </div>
            <div class="m-auto md:w-[400px] md:mb-0 mb-5">
                <img class="m-auto" src="images/how-it-work-3.png">
                <div class="text-xl mt-5">3. Upload pictures and we will confirm<br> your order, then fit within 3 weeks!
                </div>
            </div>
        </div>
    </section>


    <div class="md:bg-top-banner relative">
        @if ($content && $content->center_banner_image_id)
            <img src="{{ asset('storage/' . $content->centerBannerImage->path) }}"
                class="lg:h-screen bg-cover md:mt-0 md:mb-0 mt-10 mb-10 bg-no-repeat">
        @else
            <img src="{{ asset('images/banner-2.png') }}"
                class="lg:h-screen bg-cover md:mt-0 md:mb-0 mt-10 mb-10 bg-no-repeat">
        @endif
        @if ($content)
            <div class="lg:flex justify-end md:absolute top-0 left-0 items-center lg:h-screen">
                <div class="bg-gray-50  rounded-lg md:ml-16 md:w-[620px] md:p-12 p-4">
                    <div class="md:text-4xl text-2xl font-bold opacity-80 leading-normal">
                        {{ $content->center_banner_headline ?? '' }}
                    </div>
                    <p class="text-lg leading-9 mt-5">
                        {!! $content->center_banner_text ?? '' !!}
                    </p>
                    {{-- <div class="flex gap-4 mt-9">
                <div>
                    <x-primary-button class="w-40 py-2 text-lg text-center">
                        {{ __('Discover More') }}
                    </x-primary-button>
                </div>
                <div class="flex gap-2 items-center text-xl text-gray-500 font-medium">
                    <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.6667 8.13818V30.3048L30.0834 19.2215L12.6667 8.13818Z" fill="black" />
                    </svg> Play Video
                </div>
            </div> --}}
                </div>
            </div>
    </div>
    @endif

    {{-- @if ($aboutUsContent && $aboutUsContent->main_content_section_one) --}}
    <section class="text-center md:p-28 p-4">
        <div class="md:text-4xl text-2xl font-bold">Why choose Installs Direct for your Solar System?</div>
        <p class="text-2xl font-normal text-gray-500 mt-5">We want to be transparent & put you in control to make an
            informed decision.
        </p>
        <div class="md:flex justify-center gap-16 mt-20">
            <div class="border md:w-[400px] p-4 rounded-3xl mb-5">
                <img class="m-auto py-5" src="images/energy-bill.png">

                {{-- <div class="font-medium text-2xl mb-3">Save $1000 on energy bills</div> --}}
                <div class="text-lg font-medium text-gray-600">
                    By cutting out the salesperson and travel costs, we pass the savings on to you!
                    {{-- {{ mb_strlen(strip_tags($aboutUsContent && $aboutUsContent->main_content_section_one)) > 100 ? mb_substr(strip_tags($aboutUsContent->main_content_section_one), 0, 100) . '...' : mb_substr(strip_tags($aboutUsContent->main_content_section_one), 0, 100) }} --}}
                </div>
            </div>

            <div class="border  md:w-[400px] p-4 rounded-3xl mb-5">
                <img class="m-auto py-5" src="images/eco-friendly.png">
                {{-- <div class="font-medium text-2xl mb-3">Eco-Friendly Investment</div> --}}

                <div class="text-lg font-medium text-gray-600">
                    We have clear transparent pricing for you to add or remove extra panels or batteries as you choose!
                    {{-- {{ mb_strlen(strip_tags($aboutUsContent && $aboutUsContent->main_content_section_two)) > 100 ? mb_substr(strip_tags($aboutUsContent->main_content_section_two), 0, 100) . '...' : mb_substr(strip_tags($aboutUsContent->main_content_section_two), 0, 100) }} --}}
                </div>
            </div>


            <div class="border md:w-[400px] p-4 rounded-3xl mb-5">
                <img class="m-auto py-5" src="images/property-value.png">
                {{-- <div class="font-medium text-2xl mb-3">Enhanced Property Value.</div> --}}

                <div class="text-lg font-medium text-gray-600">
                    There is no pressure selling tactics in your home & experts on hand to advise you if you need them.
                    {{-- {{ mb_strlen(strip_tags($aboutUsContent && $aboutUsContent->main_content_section_three)) > 100 ? mb_substr(strip_tags($aboutUsContent->main_content_section_three), 0, 100) . '...' : mb_substr(strip_tags($aboutUsContent->main_content_section_three), 0, 100) }} --}}
                </div>
            </div>
        </div>
        <div>
            <a href="{{ route('aboutus') }}">
                <x-primary-button class="w-40 py-2 mt-20 text-lg text-center">
                    {{ __('Discover More') }}
                </x-primary-button>
            </a>
        </div>
    </section>
    {{-- @endif --}}

    {{-- FAQ Section  --}}
    @if ($faqs->isNotEmpty())
        @include('frontend.sections.faq')
    @endif

    <section class="text-center md:p-20 py-10 px-4">
        <div class="flex justify-center">
            <img class="mb-4" src="images/avtar-group-img.png">
        </div>
        <div class="text-2xl font-medium text-blue-900 py-2">{{ __('Still have questions?') }}</div>
        <div class="text-2xl text-blue-900 ">{{ __('Can’t find the answer you’re looking for?') }} </div>
        <a href="{{ route('contactus') }}">
            <button
                class="bg-blue-900 font-semibold text-white rounded-lg text-xl py-3 mt-9 px-9">{{ __('Contact Us') }}</button></a>
    </section>
@endsection

@push('scripts')
    <script type="text/javascript">
        function loggedUserFormData() {
            return {
                isAdmin: @json(Auth::check() && Auth::user()->isAdmin ? true : false),
                isUserZipCodeAdded: false,
                zipValue: '',
                isZipCodeAdded: false,
                showConfirmationModal: false,
                showError: false,
                errorMessage: null,
                locationZip: function(event) {
                    if (this.zipValue === '') {
                        event.preventDefault();
                        this.isUserZipCodeAdded = true;
                    } else {
                        const form = document.getElementById('zipForm');
                        this.showConfirmationModal = @json(Auth::check() && Auth::user()->pendingOrder ? true : false);
                        if (!this.showConfirmationModal) {
                            var xhr = new XMLHttpRequest();
                            xhr.open("GET", `https://api.postcodes.io/postcodes/${this.zipValue}/validate`);
                            xhr.setRequestHeader('Content-Type', 'application/json');
                            xhr.send();
                            var self = this;
                            xhr.onload = function() {
                                if (xhr.status === 200) {
                                    const response = JSON.parse(xhr.responseText);
                                    const result = response.result;
                                    if (result === true) {
                                        form.submit();
                                        return;
                                    }
                                    self.errorMessage = "Please add a valid post code";
                                    self.showError = true;
                                } else {
                                    self.errorMessage =
                                        "We are not able to validate this code at the moment. Please try again later";
                                    self.showError = true;
                                }
                            };
                        }
                    }
                },
                formSubmit: function(event) {
                    const buttonId = event.target.id;
                    if (buttonId === 'completePending') {
                        this.showConfirmationModal = false;
                        window.location.href = '{{ route('customer.myOrders') }}';
                        return;
                    }
                    this.showConfirmationModal = false;
                    window.location.href = '{{ route('customer.cart.delete') }}';
                }
            }
        }

        function locationData() {
            return {
                zipValue: '',
                isZipCodeAdded: false,
                showError: false,
                errorMessage: null,
                locationZip() {
                    if (this.zipValue === '') {
                        this.isZipCodeAdded = true;
                    } else if (this.zipValue.length >= 8 || /[^\w\s]/.test(this.zipValue)) {
                        this.errorMessage = 'Zip code should not exceed 8 characters or contain special characters.';
                        this.showError = true;
                    } else {
                        const locationForm = document.getElementById('locationForm');
                        this.isZipCodeAdded = false;
                        var xhr = new XMLHttpRequest();
                        xhr.open("GET", `https://api.postcodes.io/postcodes/${this.zipValue}/validate`);
                        xhr.setRequestHeader('Content-Type', 'application/json');
                        xhr.send();
                        var self = this;
                        xhr.onload = function() {
                            if (xhr.status === 200) {
                                const response = JSON.parse(xhr.responseText);
                                const result = response.result;
                                if (result === true) {
                                    locationForm.submit();
                                    return;
                                }
                                self.errorMessage = "Please add a valid post code";
                                self.showError = true;
                            } else {
                                self.errorMessage =
                                    "We are not able to validate this code at the moment. Please try again later";
                                self.showError = true;
                            }
                        };

                    }
                }
            };
        }
    </script>
@endpush
