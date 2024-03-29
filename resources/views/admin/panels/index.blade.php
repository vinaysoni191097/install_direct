@extends('admin.partials.main')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">{{ __('All Categories') }}</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item active">{{ 'All Categories' }}</li>
                    </ol>
                </div>

            </div>


        </div>
    </div>
    <div x-data="panelData">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ __('Categories') }}</h4>

                <div class="flex justify-content-end">
                    <button @click.prevent="panelDataModal = true ,url='{{ route('admin.panel.store') }}'"
                        class="rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm  mb-3">{{ 'Add New Panel Type' }}
                    </button>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>{{ __('S No.') }}</th>
                                <th>{{ __('Panel Image') }}</th>
                                <th>{{ __('Panel Type') }}</th>
                                <th>{{ __('Description') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody class="pt-2">

                            @forelse ($panels as $key => $panel)
                                <tr x-data="statusHandler({{ $key }})">
                                    <td> {{ $key + $panels->firstItem() }}</td>
                                    <td>
                                        @if ($panel->featured_image_id)
                                            <img class="inline-block w-16 h-16 rounded-full"
                                                src="{{ asset('storage/' . $panel->productImage->path) }}"
                                                name="product_image" value="{{ $panel->featured_image_id }}"
                                                id="profile-image" alt="">
                                        @else
                                            <img class="inline-block w-16 h-16 rounded-full"
                                                src="{{ asset('images/no-image.png') }}" alt="">
                                        @endif
                                    </td>
                                    <td> {{ $panel->watts . ' ' . 'W' }}</td>
                                    <td>{{ strlen($panel->description) > 100 ? substr($panel->description, 0, 100) . '...' : substr($panel->description, 0, 100) }}
                                    </td>
                                    <td>
                                        <div>
                                            <button
                                                class="flex items-center transition ease-in-out duration-300 w-10 h-4 bg-gray-200 rounded-full focus:outline-none"
                                                x-bind:class="{ 'bg-green-500': {{ $panel->isActivated ? 'true' : 'false' }} }"
                                                @click.prevent="showModal({{ $panel->status }})">
                                                <div class="transition ease-in-out duration-300 rounded-full h-5 w-5 bg-white shadow border"
                                                    x-bind:class="{ 'transform translate-x-full': {{ $panel->isActivated ? 'true' : 'false' }} }">
                                                </div>
                                            </button>

                                            <x-status-confirmation
                                                title="{{ $panel->isActivated ? 'De-activate panel' : 'Activate panel' }}"
                                                routename="{{ route('admin.panel.update.status', $panel) }}" />
                                        </div>

                                    </td>
                                    <td class="space-x-2">
                                        <button
                                            @click.prevent="panelDataModal = true, data= {{ json_encode($panel) }}, url='{{ route('admin.panel.update', $panel->slug) }}'"
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

                                        {{-- Delete Confirmation Modal  --}}
                                        <x-delete-confirmation-modal :values="$panel" :message="'Are you sure you want to remove this panel ?'"
                                            routename="{{ route('admin.panel.delete', $panel->slug) }}" />
                                    </td>
                                </tr>
                            @empty
                                <x-no-record-found />
                            @endforelse


                        </tbody>
                    </table>
                    <div class="mt-3">
                        {{ $panels->links() }}
                    </div>

                </div>
            </div>
        </div>



        {{-- Add panel Modal  --}}

        <div @keydown.escape="panelDataModal = false" x-cloak>
            <!-- Modal -->
            <div class="fixed inset-0 z-30 flex items-center justify-center overflow-auto bg-black bg-opacity-50"
                x-show="panelDataModal">
                <!-- Modal inner -->
                <div class="max-w-xl px-6 py-4 mx-auto text-left bg-white rounded shadow-lg w-50"
                    x-transition:enter="motion-safe:ease-out duration-300" x-transition:enter-start="opacity-0 scale-90"
                    x-transition:enter-end="opacity-100 scale-100">
                    <!-- Title / Close-->
                    <div class="flex items-center justify-between">
                        <h5 class="mr-3 text-black max-w-none"
                            x-text= "(Object.values(data).length > 1 ) ? 'Update panel' : 'Add panel'"></h5>

                        <button type="button" class="z-50 cursor-pointer"
                            @click.prevent="panelDataModal = false , data={}, url='', location.reload();">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <!-- content -->
                    <div>
                        <form x-bind:action="url" method="post" id="panelForm">
                            <span x-text= "data.route"></span>
                            @csrf
                            <div class="mb-3">
                                <label for="watts" class="form-label">{{ __('Panel Title') }}
                                    <span class="text-red-500">*</span></label>
                                <input type="string" class="form-control" id="title" name="title"
                                    placeholder="Enter panel type" :value="data.title" required maxlength="30"
                                    minlength="10">
                                @error('title')
                                    <p class="text-red-600 font-semibold mt-2">{{ $message }}</p>
                                @enderror
                                <span id="title-error" class="error"></span>
                            </div>
                            <div class="mb-3">
                                <label for="watts" class="form-label">{{ __('Panel in watts(W)') }}
                                    <span class="text-red-500">*</span></label>
                                <input type="number" class="form-control" id="watts" name="watts"
                                    placeholder="Enter panel type" :value="data.watts" required maxlength="5"
                                    min="100" max="10000">
                                @error('watts')
                                    <p class="text-red-600 font-semibold mt-2">{{ $message }}</p>
                                @enderror
                                <span id="watts-error" class="error"></span>
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">{{ __('Panel Price') }}
                                    <span class="text-red-500">*</span></label>
                                <input type="number" class="form-control" id="price" name="price"
                                    placeholder="Enter panel price" :value="data.price" required maxlength="5"
                                    min="1">
                                @error('price')
                                    <p class="text-red-600 font-semibold mt-2">{{ $message }}</p>
                                @enderror
                                <span id="price-error" class="error"></span>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">{{ __('Description') }}
                                    <span class="text-red-500">*</span></label>
                                <textarea class="form-control" id="description" name="description" :value="data.description" rows="3" required
                                    maxlength="300"></textarea>
                                <span id="description-error" class="error"></span>
                                @error('description')
                                    <p class="text-red-600 font-semibold mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-span-full">
                                <div class="mb-3">
                                    <label for="featured_image"
                                        class="form-label text-black">{{ __('Product Image') }}</label>
                                    <input id="featured_image" name="featured_image" type="file"
                                        style="display: block;" onchange="fileChosen(event)"
                                        accept="image/x-png,image/gif,image/jpeg">

                                    <div class="image-preview-container relative mt-2">
                                        <div id="closeImagePreview"
                                            class="close-icon hidden absolute w-4/6 text-red-500 font-extrabold text-xl cursor-pointer right-4 ">
                                            &times;
                                        </div>
                                        <img class="w-2/6 h-full object-contain hidden" id="featuredImage" src=""
                                            alt="Uploaded Image" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="flex justify-center">
                                    <button type="submit"
                                        class="bg-green-600 px-6 py-2 text-white rounded  font-semibold"
                                        x-text= "(Object.values(data).length > 1 ) ? 'Update panel' : 'Add panel'"></button>
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


        function panelData() {
            return {
                'panelDataModal': false,
                'data': {},
                'url': ''
            }
        }
    </script>

    {{-- Image Loader --}}
    <script type="text/javascript">
        function fileChosen(event) {
            const image = document.getElementById("featuredImage");
            const closeButton = document.getElementById("closeImagePreview");

            const reader = new FileReader();
            reader.onload = function() {
                image.src = reader.result;
                closeButton.classList.remove("hidden"); // Show close button when an image is selected
            };

            image.classList.remove("hidden");
            reader.readAsDataURL(event.target.files[0]);

            closeButton.addEventListener("click", function() {
                // Hide the image and reset its source
                image.classList.add("hidden");
                image.src = "";

                // Hide the close button after closing the image preview
                closeButton.classList.add("hidden");
            });
        }
    </script>
@endpush
