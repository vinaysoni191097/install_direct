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
    <div x-data="categoryData">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ __('Categories') }}</h4>

                <div class="flex justify-content-end">
                    <button @click.prevent="categoryDataModal = true ,url='{{ route('admin.category.store') }}'"
                        class="rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm  mb-3">{{ 'Add New Category' }}
                    </button>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>{{ __('SNo.') }}</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Description') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody class="pt-2">

                            @forelse ($categories as $key => $category)
                                <tr x-data="statusHandler({{ $key }})">
                                    <td> {{ $key + $categories->firstItem() }}</td>
                                    <td> {{ $category->title }}</td>
                                    <td>{{ strlen($category->description) > 100 ? substr($category->description, 0, 100) . '...' : substr($category->description, 0, 100) }}
                                    </td>
                                    <td>
                                        <div>
                                            <button
                                                class="flex items-center transition ease-in-out duration-300 w-10 h-4 bg-gray-200 rounded-full focus:outline-none"
                                                x-bind:class="{ 'bg-green-500': {{ $category->isActivated ? 'true' : 'false' }} }"
                                                @click.prevent="showModal({{ $category->status }})">
                                                <div class="transition ease-in-out duration-300 rounded-full h-5 w-5 bg-white shadow border"
                                                    x-bind:class="{ 'transform translate-x-full': {{ $category->isActivated ? 'true' : 'false' }} }">
                                                </div>
                                            </button>

                                            <x-status-confirmation
                                                title="{{ $category->isActivated ? 'De-activate category' : 'Activate category' }}"
                                                routename="{{ route('admin.category.update.status', $category) }}" />
                                        </div>

                                    </td>
                                    <td class="space-x-2">
                                        <button
                                            @click.prevent="categoryDataModal = true, data= {{ json_encode($category) }}, url='{{ route('admin.category.update', $category->slug) }}'"
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
                                        <x-delete-confirmation-modal :values="$category" :message="'Are you sure you want to remove this category ?'"
                                            routename="{{ route('admin.category.delete', $category->slug) }}" />
                                    </td>
                                </tr>
                            @empty
                                <x-no-record-found />
                            @endforelse


                        </tbody>
                    </table>
                    <div class="mt-3">
                        {{ $categories->links() }}
                    </div>

                </div>
            </div>
        </div>



        {{-- Add Category Modal  --}}

        <div @keydown.escape="categoryDataModal = false" x-cloak>
            <!-- Modal -->
            <div class="fixed inset-0 z-30 flex items-center justify-center overflow-auto bg-black bg-opacity-50"
                x-show="categoryDataModal">
                <!-- Modal inner -->
                <div class="max-w-xl px-6 py-4 mx-auto text-left bg-white rounded shadow-lg w-50"
                    x-transition:enter="motion-safe:ease-out duration-300" x-transition:enter-start="opacity-0 scale-90"
                    x-transition:enter-end="opacity-100 scale-100">
                    <!-- Title / Close-->
                    <div class="flex items-center justify-between">
                        <h5 class="mr-3 text-black max-w-none"
                            x-text= "(Object.values(data).length > 1 ) ? 'Update Category' : 'Add Category'"></h5>

                        <button type="button" class="z-50 cursor-pointer"
                            @click.prevent="categoryDataModal = false , data={}, url=''">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <!-- content -->
                    <div>
                        <form x-bind:action="url" method="post" id="categoryForm">
                            <span x-text= "data.route"></span>
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">{{ __('Category Title') }}
                                    <span class="text-red-500">*</span></label>
                                <input type="text" class="form-control" id="title" name="title"
                                    placeholder="Enter category title" :value="data.title" required maxlength="100">
                                @error('title')
                                    <p class="text-red-600 font-semibold mt-2">{{ $message }}</p>
                                @enderror
                                <span id="title-error" class="error"></span>
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
                            <div class="col-12">
                                <div class="flex justify-center">
                                    <button type="submit" class="bg-green-600 px-6 py-2 text-white rounded  font-semibold"
                                        x-text= "(Object.values(data).length > 1 ) ? 'Update Category' : 'Add Category'"></button>
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


        function categoryData() {
            return {
                'categoryDataModal': false,
                'data': {},
                'url': ''
            }
        }
    </script>
@endpush
