@extends('admin.partials.main')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">{{ __('Add New Product') }}</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item active"><a href="">{{ 'All Products' }}</a></li>
                        <li class="breadcrumb-item active">{{ 'Add Product' }}</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
    <div x-data="newProductFormData" x-cloak>

        <div class="space-y-10 divide-y divide-gray-900/10">
            <div class="grid grid-cols-1 gap-x-8 gap-y-8 ">
                <form action="{{ route('admin.product.store') }}" onsubmit="event.preventDefault()" method="post"
                    enctype="multipart/form-data" id="newProductForm"
                    class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2">
                    @csrf

                    <div class="px-4 py-6 sm:p-8">
                        <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="col-span-full">
                                <label for="first-name"
                                    class="block text-sm font-extrabold leading-6 text-black">{{ __('Product Title') }}
                                    <sup class="text-red-600">*</sup>
                                </label>
                                <div class="mt-2">
                                    <input type="text" class="form-control" id="title" name="title" required
                                        value="{{ old('title') }}" placeholder="Enter product title"
                                        class="block w-full rounded-md border-1 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    @error('title')
                                        <p class="text-red-600 mt-2 font-semibold">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-span-full">
                                <label for="last-name"
                                    class="block text-sm font-extrabold leading-6 text-black">{{ __('Description') }}
                                    <sup class="text-red-600">*</sup>
                                </label>
                                <div class="mt-2">
                                    <textarea id="description" name="description" rows="3" required placeholder="Enter product description here"
                                        class="block w-full rounded-md border-1 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ old('description') }}</textarea>
                                    @error('description')
                                        <p class="text-red-600 mt-2 font-semibold">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="sm:col-span-3">
                                <label for="first-name"
                                    class="block text-sm font-extrabold leading-6 text-black">{{ __('Price') }}
                                    <sup class="text-red-600">*</sup>
                                </label>
                                <div class="mt-2">
                                    <input type="number" min="1" class="form-control" id="price" name="price"
                                        required placeholder="00.00" value="{{ old('price') }}"
                                        class="block w-full rounded-md border-1 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    @error('price')
                                        <p class="text-red-600 mt-2 font-semibold">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <div class="flex gap-2">
                                    <label for="last-name"
                                        class="block text-sm font-extrabold leading-6 text-black">{{ __('Category') }}
                                        <sup class="text-red-600">*</sup>
                                    </label>
                                    <a href="{{ route('admin.product.categories') }}">
                                        <svg class="w-5 h-5 cursor-pointer" xmlns="http://www.w3.org/2000/svg"
                                            fill="#16a34a" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M1.5 8a6.5 6.5 0 1113 0 6.5 6.5 0 01-13 0zM8 0a8 8 0 100 16A8 8 0 008 0zm.75 4.75a.75.75 0 00-1.5 0v2.5h-2.5a.75.75 0 000 1.5h2.5v2.5a.75.75 0 001.5 0v-2.5h2.5a.75.75 0 000-1.5h-2.5v-2.5z">
                                            </path>
                                            <title>{{ __('Add new categories') }}</title>
                                        </svg>
                                    </a>
                                </div>
                                <div class="mt-2">
                                    <select id="category" name="category" required
                                        class="block w-full rounded-md border-1 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        <option value="{{ old('category') }}">Select Category</option>
                                        @foreach ($categories as $key => $category)
                                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                        <p class="text-red-600 mt-2 font-semibold">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="sm:col-span-3" id="inverterSection" style="display: none;">
                                <div class="flex gap-2">
                                    <label for="inverter_compatibility"
                                        class="block text-sm font-extrabold leading-6 text-black">{{ __('Select inverter compatibility') }}
                                    </label>
                                </div>
                                <div>
                                    <select id="inverter_compatibility" name="inverter_compatibility[]"
                                        autocomplete="inverter_compatibility"
                                        class="select block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6 "
                                        multiple>
                                        @foreach ($inverters as $key => $inverter)
                                            <option value="{{ $inverter->id }}">{{ $inverter->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('inverter_compatibility')
                                        <p class="text-red-600 mt-2 font-semibold">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="city"
                                    class="block text-sm font-extrabold leading-6 text-black">{{ __('Stock') }}
                                    <sup class="text-red-600">*</sup>
                                </label>
                                <div class="mt-2">
                                    <input type="number" min="1" id="stock" name="stock"
                                        value="{{ old('stock') }}" placeholder="Enter product stock" required
                                        class="block w-full rounded-md border-1 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    @error('stock')
                                        <p class="text-red-600 mt-2 font-semibold">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="region"
                                    class="block text-sm font-extrabold leading-6 text-black">{{ __('Warranty') }}
                                    <sup class="text-red-600">*</sup>
                                </label>
                                <div class="mt-2">
                                    <input type="number" min="1" class="form-control" id="warranty"
                                        name="warranty" placeholder="Enter warranty in years " required
                                        value="{{ old('warranty') }}"
                                        class="block w-full rounded-md border-1 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    @error('warranty')
                                        <p class="text-red-600 mt-2 font-semibold">{{ $message }}</p>
                                    @enderror

                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="region"
                                    class="block text-sm font-extrabold leading-6 text-black">{{ __('Kwh') }}
                                    <sup class="text-red-600">*</sup>
                                </label>
                                <div class="mt-2">
                                    <input type="number" min="1" class="form-control" id="Kwh"
                                        name="Kwh" placeholder="Enter Kwh" required value="{{ old('Kwh') }}"
                                        class="block w-full rounded-md border-1 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    @error('Kwh')
                                        <p class="text-red-600 mt-2 font-semibold">{{ $message }}</p>
                                    @enderror

                                </div>
                            </div>
                            {{-- <div class="col-span-full">
                                <label for="tags"
                                    class="block text-sm font-extrabold leading-6 text-black">{{ __('Product Tags') }}</label>
                                <div class="mt-2">
                                    <select id="tags" name="tags[]" autocomplete="tags"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6 product-tags"
                                        multiple="multiple" placeholder="Select tags">
                                        @foreach ($tags as $key => $tag)
                                            <option>{{ $tag->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> --}}


                            <div class="col-span-full">
                                <div class="mb-3">
                                    <label for="specifications" class="form-label text-black">{{ __('Specifications') }}
                                        <sup class="text-red-600">*</sup>
                                    </label>
                                    <div class="w-full max-w-3xl flex gap-4 items-center" x-data="{ specifications: [{ name: '', value: '' }] }"
                                        name="specifications">
                                        <table>
                                            <tbody>
                                                <template x-for="(specification, index) in specifications"
                                                    :key="index">
                                                    <tr>
                                                        <td class="border p-2">
                                                            <input type="text" x-model="specification.name"
                                                                name="specification_name[]"
                                                                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                                                                placeholder="Enter specification name" />
                                                        </td>
                                                        <td class="border p-2">
                                                            <input type="text" x-model="specification.value"
                                                                name="specification_value[]"
                                                                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                                                                placeholder="Enter value" />
                                                        </td>
                                                        <td class="border p-2">
                                                            <button type="button"
                                                                @click.prevent="specifications.splice(index, 1)"
                                                                class="bg-red-500 text-white font-semibold rounded-md p-2"
                                                                x-show="specifications.length > 1 && (specification.name !== '' && specification.value !== '')">
                                                                {{ __('Remove') }}
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </template>
                                            </tbody>
                                        </table>

                                        <div class="w-32">
                                            <button type="button"
                                                @click.prevent="specifications.push({ name: '', value: '' })"
                                                class="bg-green-500 text-white font-semibold rounded-md p-2">
                                                {{ __('Add More') }}
                                            </button>
                                        </div>
                                    </div>
                                    <div class="flex gap-4">
                                        @error('specification_name.*')
                                            <p class="text-red-600 mt-2 font-semibold">{{ $message }}</p>
                                        @enderror

                                        @error('specification_value.*')
                                            <p class="text-red-600 mt-2 font-semibold">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="col-span-full">
                                <div class="mb-3">
                                    <label for="featured_image"
                                        class="form-label text-black">{{ __('Product Image') }}</label>
                                    <input id="featured_image" name="featured_image" type="file"
                                        style="display: block;" onchange="fileChosen(event)"
                                        accept="image/x-png,image/gif,image/jpeg">

                                    <div class="image-preview-container">
                                        <span id="closeImagePreview" class="close-icon hidden">&times;</span>
                                        <img id="featuredImage" src="#" alt="Uploaded Image" class="hidden" />
                                    </div>
                                </div>
                            </div>

                        </div>

                        {{-- Multiple product value --}}
                        <input type="hidden" name="productVariation" id="productVariation" value="">

                    </div>


                    <div class="flex items-center justify-end gap-x-6 border-t border-gray-900/10 px-4 py-4 sm:px-8">

                        <button type="button" @click.prevent="createProduct()"
                            data-url="{{ route('admin.product.store') }}"
                            class="bg-green-500 text-white font-semibold  rounded-md p-2 px-4">{{ __('Save Product') }}</button>
                    </div>
                </form>
            </div>
        </div>


        {{-- Product Variation Confirmation Modal --}}
        <div id="basicModal" x-show="showVariationModal">

            <div @keydown.window.escape="open = false" class="relative z-10" aria-labelledby="modal-title"
                x-ref="dialog" aria-modal="true">


                <div x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                    x-description="Background backdrop, show/hide based on modal state."
                    class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>


                <div class="fixed z-10 inset-0 overflow-y-auto">
                    <div class="flex items-end sm:items-center justify-center min-h-full p-4 text-center sm:p-0">

                        <div x-transition:enter="ease-out duration-300"
                            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                            x-transition:leave="ease-in duration-200"
                            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                            x-description="Modal panel, show/hide based on modal state."
                            class="relative bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-lg sm:w-full"
                            @click.away="open = false">
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">

                                <div
                                    class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-gray-100 sm:mx-0 sm:h-10 sm:w-10">
                                    <svg class="h-6 w-6 text-gray-600" x-description="Heroicon name: outline/exclamation"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                        Product Variations ?
                                    </h3>
                                    <div class="mt-2">
                                        <p class="text-sm text-gray-500">
                                            Do you want to create variations for this product as well ?
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-50 px-4 py-3 sm:px-6 flex">

                                <button type="button"
                                    class="mt-3 w-full inline-flex justify-center rounded-md border border-green-300 shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                                    onclick="formSubmit(event)" id="createVariationsButton">
                                    Yes, I want to create variations
                                </button>
                                <button type="button"
                                    class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-gray-700 text-base font-medium text-white hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                                    onclick="formSubmit(event)" id="singleProductButton">
                                    No, Only single product at this time
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<style>
    .image-preview-container {
        position: relative;
        display: inline-block;
    }

    .close-icon {
        position: absolute;
        top: 5px;
        right: 5px;
        cursor: pointer;
        font-size: 20px;
        color: red;
        z-index: 1;
    }

    .hidden {
        display: none;
    }
</style>
@push('scripts')
    <script>
        const select = new Choices('.select', {
            searchEnabled: true,
            placeholder: true,
            loadingText: 'Loading...',
            placeholderValue: "Select inverter compatibility",
            itemSelectText: '',
            classNames: {
                containerOuter: 'choices select-choices',
            },
        });
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
                image.src = "#";

                // Hide the close button after closing the image preview
                closeButton.classList.add("hidden");
            });
        }
    </script>

    <script>
        function newProductFormData() {
            return {
                specifications: [{
                    name: '',
                    value: ''
                }],
                showVariationModal: false,
                createProduct: function() {
                    this.showVariationModal = true;
                },
            }
        }

        function formSubmit(event) {
            const form = document.getElementById('newProductForm');
            const productVariation = document.getElementById('productVariation');
            const createVariationsButton = document.getElementById('createVariationsButton');

            if (event.target === createVariationsButton) {
                productVariation.value = "1";
            }

            form.submit();
        }
    </script>

@endpush
