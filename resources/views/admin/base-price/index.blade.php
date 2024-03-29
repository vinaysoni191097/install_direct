@extends('admin.partials.main')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">{{ __('Base Price') }}</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item active">{{ 'Base Price' }}</li>
                    </ol>
                </div>

            </div>


        </div>
    </div>
    <div x-data="basePriceData">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ __('Base Price') }}</h4>

                @if ($basePrices->count() === 0)
                    <div class="flex justify-content-end">
                        <button @click.prevent="basePriceDataModal = true ,url='{{ route('admin.base.price.store') }}'"
                            class="rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm  mb-3">{{ 'Add Base Price' }}
                        </button>
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>{{ __('SNo.') }}</th>
                                <th>{{ __('Price') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody class="pt-2">

                            @forelse ($basePrices as $key => $baseprice)
                                <tr x-data="statusHandler({{ $key }})">
                                    <td> {{ $key + $basePrices->firstItem() }}</td>
                                    <td> {{ '£' . $baseprice->getPrice }}</td>
                                    <td>
                                        <div>
                                            <button
                                                class="flex items-center transition ease-in-out duration-300 w-10 h-4 bg-gray-200 rounded-full focus:outline-none"
                                                x-bind:class="{ 'bg-green-500': {{ $baseprice->isActivated ? 'true' : 'false' }} }"
                                                @click.prevent="showModal({{ $baseprice->status }})">
                                                <div class="transition ease-in-out duration-300 rounded-full h-5 w-5 bg-white shadow border"
                                                    x-bind:class="{ 'transform translate-x-full': {{ $baseprice->isActivated ? 'true' : 'false' }} }">
                                                </div>
                                            </button>

                                            <x-status-confirmation
                                                title="{{ $baseprice->isActivated ? 'De-activate Base price' : 'Activate Base price' }}"
                                                routename="{{ route('admin.base.price.update.status', $baseprice) }}" />
                                        </div>

                                    </td>
                                    <td class="space-x-2">
                                        <button
                                            @click.prevent="basePriceDataModal = true, data= {{ json_encode($baseprice) }}, url='{{ route('admin.base.price.update', $baseprice) }}'"
                                            class="inline-block">
                                            <div>
                                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                    </path>
                                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                    </path>
                                                </svg>
                                                <title>{{ __('Edit') }}</title>
                                            </div>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <x-no-record-found />
                            @endforelse


                        </tbody>
                    </table>
                    <div class="mt-3">
                        {{-- {{ $basePrices->links() }} --}}
                    </div>

                </div>
            </div>
        </div>



        {{-- Add baseprice Modal  --}}

        <div @keydown.escape="basePriceDataModal = false" x-cloak>
            <!-- Modal -->
            <div class="fixed inset-0 z-30 flex items-center justify-center overflow-auto bg-black bg-opacity-50"
                x-show="basePriceDataModal">
                <!-- Modal inner -->
                <div class="max-w-xl px-6 py-4 mx-auto text-left bg-white rounded shadow-lg w-50"
                    x-transition:enter="motion-safe:ease-out duration-300" x-transition:enter-start="opacity-0 scale-90"
                    x-transition:enter-end="opacity-100 scale-100">
                    <!-- Title / Close-->
                    <div class="flex items-center justify-end">

                        <button type="button" class="z-50 cursor-pointer"
                            @click.prevent="basePriceDataModal = false , data={}, url=''">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <!-- content -->
                    <div>
                        <form x-bind:action="url" method="post" id="basePriceForm">
                            <span x-text= "data.route"></span>
                            @csrf
                            <div class="mb-3">
                                <label for="price" class="form-label"
                                    x-text= "(Object.values(data).length > 1 ) ? 'Update Price' : 'Add Price'">
                                </label>
                                <span class="text-red-500">*</span>
                                <input type="number" class="form-control" id="price" name="price"
                                    placeholder="Enter base price here..." :value="data.price" required min="1"
                                    maxlength="100">
                                @error('price')
                                    <p class="text-red-600 font-semibold mt-2">{{ $message }}</p>
                                @enderror
                                <span id="price-error" class="error"></span>
                            </div>
                            <div class="col-12">
                                <div class="flex justify-center">
                                    <button type="submit" class="bg-green-600 px-6 py-2 text-white rounded  font-semibold"
                                        x-text= "(Object.values(data).length > 1 ) ? 'Update Price' : 'Add Price'"></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
@endsection

@push('scripts')
    <script>
        function statusHandler(index) {
            return {
                deActivate: false,
                showConfirmation: false,
                buttonMessage: 'Activate',
                newStatusValue: 1,
                showModal: function(statusValue) {
                    this.active = !this.active;
                    this.showConfirmation = true;
                    if (statusValue == 1) {
                        this.buttonMessage = "Deactivate";
                        this.deActivate = true;
                        this.newStatusValue = 0;
                    }

                },
                exitModalHandler: function() {
                    this.showConfirmation = false;
                }
            }
        }


        function basePriceData() {
            return {
                'basePriceDataModal': false,
                'data': {},
                'url': ''
            }
        }
    </script>
@endpush
