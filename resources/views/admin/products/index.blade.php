@extends('admin.partials.main')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">{{ __('All Products') }}</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item active">{{ 'All Products' }}</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->


    <div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ __('Products') }}</h4>

                <div class="flex justify-content-end">
                    <a href="{{ route('admin.product.create') }}"
                        class="rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm mb-3">{{ 'Add Product' }}
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover mb-0">

                        <thead>
                            <tr>
                                <th>{{ __('SNo.') }}</th>
                                <th>{{ __('Title') }}</th>
                                <th>{{ __('Category') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($products as $key => $product)
                                <tr x-data="statusHandler({{ $key }})">
                                    <td>{{ $key + $products->firstItem() }}</td>
                                    <td>{{ $product->title }}</td>
                                    <td>{{ $product->productCategories->title ?? 'UnCategorized' }}</td>
                                    <td>
                                        <div>
                                            <button
                                                class="flex items-center transition ease-in-out duration-300 w-10 h-4 bg-gray-200 rounded-full focus:outline-none"
                                                x-bind:class="{ 'bg-green-500': {{ $product->isActivated ? 'true' : 'false' }} }"
                                                @click.prevent="showModal({{ $product->status }})">
                                                <div class="transition ease-in-out duration-300 rounded-full h-5 w-5 bg-white shadow border"
                                                    x-bind:class="{ 'transform translate-x-full': {{ $product->isActivated ? 'true' : 'false' }} }">
                                                </div>
                                            </button>

                                            <x-status-confirmation
                                                title="{{ $product->isActivated ? 'De-activate Product' : 'Activate Product' }}"
                                                routename="{{ route('admin.product.update.status', $product) }}" />
                                        </div>
                                    </td>

                                    <td class="space-x-2">
                                        <a href="{{ route('admin.product.view', $product) }}" class="inline-block">
                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="#16a34a">
                                                <path fill="none" stroke="#16a34a" stroke-width="2"
                                                    d="M12,21 C7,21 1,16 1,12 C1,8 7,3 12,3 C17,3 23,8 23,12 C23,16 17,21 12,21 Z M12,7 C9.23875,7 7,9.23875 7,12 C7,14.76125 9.23875,17 12,17 C14.76125,17 17,14.76125 17,12 C17,9.23875 14.76125,7 12,7 L12,7 Z">
                                                </path>
                                                <title>{{ __('View') }}</title>
                                            </svg>
                                        </a>
                                        <a href="{{ route('admin.product.edit', $product->slug) }}" class="inline-block">
                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="24"
                                                height="24" viewBox="0 0 24 24" fill="none" stroke="#252b3b"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                </path>
                                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                </path>
                                                <title>{{ __('Edit') }}</title>
                                            </svg>
                                        </a>

                                        {{-- Delete Confirmation Modal  --}}
                                        <x-delete-confirmation-modal :values="$product" :message="'Are you sure you want to remove this product ?'"
                                            routename="{{ route('admin.product.delete', $product->slug) }}" />

                                    </td>
                                </tr>
                            @empty
                            <x-no-record-found />

                            @endforelse

                        </tbody>

                    </table>
                    {{ $products->links() }}
                </div>

            </div>
        </div>
    </div>
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
    </script>
@endpush
