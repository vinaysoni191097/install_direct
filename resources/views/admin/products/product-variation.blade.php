@extends('admin.partials.main')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">{{ __('Product variation') }}</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('admin.products') }}">
                                {{ __('All Products') }}</a></li>
                        <li class="breadcrumb-item active">{{ 'Create Product' }}</li>
                        <li class="breadcrumb-item active">{{ 'Create Product Variation' }}</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="space-y-10 divide-y divide-gray-900/10">
        <div class="grid grid-cols-1 gap-x-8 gap-y-8 ">
            <form action="{{ route('admin.product.variation.store') }}" method="post" enctype="multipart/form-data"
                class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2" x-data="formData"
                id="newProductVariationForm" x-cloak>
                @csrf
                <template x-for="(field, index) in fields" :key="index">
                    <div class="px-4 py-6 sm:p-8">
                        <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="col-span-full">
                                <div class="flex gap-2 text-center">
                                    <span class="font-extrabold text-base block text-black" x-text="index +1 + '.'"></span>
                                    <label for="first-name"
                                        class="block text-sm font-extrabold leading-6 text-black">{{ __('Parent Product') }}
                                        <sup class="text-red-600">*</sup>
                                    </label>
                                </div>
                                <div class="mt-2">
                                    <input type="text" class="form-control" id="parent_product" name="parent_product"
                                        required disabled value="{{ $product->title }}" placeholder="Enter product title"
                                        class="block w-full rounded-md border-1 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    @error('parent_product')
                                        <p class="text-red-600 mt-2 font-semibold">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <input type="number" name="parent_product_id" class="hidden" value="{{ $product->id }}" />
                            <div class="col-span-full">
                                <label for="first-name"
                                    class="block text-sm font-extrabold leading-6 text-black">{{ __('Product Title') }}
                                    <sup class="text-red-600">*</sup>
                                </label>
                                <div class="mt-2">
                                    <input type="text" class="form-control" :id="'field' + index"
                                        x-model="fields[index].title" :name="`form[${index}][title]`" required
                                        placeholder="Enter product title"
                                        class="block w-full rounded-md border-1 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    @error('title')
                                        <p class="text-red-600 mt-2 font-semibold">{{ $message }}</p>
                                    @enderror
                                    <span id="title-error" class="error"></span>
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="first-name"
                                    class="block text-sm font-extrabold leading-6 text-black">{{ __('Price') }}
                                    <sup class="text-red-600">*</sup>
                                </label>
                                <div class="mt-2">
                                    <input type="number" min="1" class="form-control" id="price"
                                        id="'field' + index" x-model="fields[index].price" :name="`form[${index}][price]`"
                                        required placeholder="00.00"
                                        class="block w-full rounded-md border-1 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    @error('price')
                                        <p class="text-red-600 mt-2 font-semibold">{{ $message }}</p>
                                    @enderror
                                    <span id="price-error" class="error"></span>
                                </div>
                            </div>





                            <div class="sm:col-span-3">
                                <label for="city"
                                    class="block text-sm font-extrabold leading-6 text-black">{{ __('Stock') }}
                                    <sup class="text-red-600">*</sup>
                                </label>
                                <div class="mt-2">
                                    <input type="number" min="1" id="'field' + index" x-model="fields[index].stock"
                                        :name="`form[${index}][stock]`" placeholder="Enter product stock" required
                                        class="block w-full rounded-md border-1 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    @error('stock')
                                        <p class="text-red-600 mt-2 font-semibold">{{ $message }}</p>
                                    @enderror
                                    <span id="stock-error" class="error"></span>
                                </div>
                            </div>
                            <div class="sm:col-span-3">
                                <label for="region"
                                    class="block text-sm font-extrabold leading-6 text-black">{{ __('Warranty') }}
                                    <sup class="text-red-600">*</sup>
                                </label>
                                <div class="mt-2">
                                    <input type="number" min="1" class="form-control" id="warranty"
                                        id="'field' + index" x-model="fields[index].warranty"
                                        :name="`form[${index}][warranty]`" placeholder="Enter warranty in years " required
                                        class="block w-full rounded-md border-1 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    @error('warranty')
                                        <p class="text-red-600 mt-2 font-semibold">{{ $message }}</p>
                                    @enderror
                                    <span id="warranty-error" class="error"></span>

                                </div>
                            </div>



                            <div class="col-span-full">
                                <div class="mb-3">
                                    <label for="specifications" class="form-label">{{ __('Specifications') }}
                                        <sup class="text-red-600">*</sup>
                                    </label>
                                    <div class="w-full max-w-3xl flex gap-4 items-center" x-data="{ specifications: [{ name: '', value: '' }] }"
                                        name="specifications">
                                        <table>
                                            <tbody>
                                                <template x-for="(specification, sIndex) in specifications"
                                                    :key="index">
                                                    <tr>
                                                        <td class="border p-2">
                                                            <input type="text"
                                                                x-model="specification.name , fields[index].specification_name"
                                                                name="specification_name[]"
                                                                :name="`form[${index}][specification_name][]`"
                                                                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                                                                placeholder="Enter specification name" />
                                                        </td>
                                                        <td class="border p-2">
                                                            <input type="text" x-model="specification.value"
                                                                x-model="fields[index].specification_value[]"
                                                                :name="`form[${index}][specification_value][]`"
                                                                name="specification_value[]"
                                                                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                                                                placeholder="Enter value" />
                                                        </td>
                                                        <td class="border p-2">
                                                            <button type="button"
                                                                @click.prevent="specifications.splice(sIndex, 1)"
                                                                class="bg-red-500 text-white font-semibold rounded-md p-2">
                                                                Remove
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </template>
                                            </tbody>
                                        </table>
                                        <button type="button"
                                            @click.prevent="specifications.push({ name: '', value: '' })"
                                            class="bg-green-500 text-white font-semibold rounded-md p-2">
                                            Add More
                                        </button>
                                    </div>
                                </div>
                            </div>


                            <div class="col-span-full">
                                <div class="mb-3">
                                    <label for="featured_image" class="form-label">{{ __('Product Image') }}</label>
                                    <input id="featured_image" type="file" :id="'field' + index"
                                        x-model="fields[index].featured_image" :name="`form[${index}][featured_image]`"
                                        style="display: block" onchange="fileChosen(event)" />

                                    <img class="h-44 w-44 shadow border-white mt-2 border-0 hidden" src=""
                                        id="featuredImage" alt="" />
                                </div>
                            </div>

                        </div>
                        <div class="flex justify-end gap-4">
                            <template x-if="fields.length > 1 ">
                                <button type="button" @click.prevent="fields.splice(index,1)"
                                    class="bg-red-500 p-2 text-white font-semibold mt-2 rounded-md border-b border-gray-900/10 ">
                                    Remove
                                </button>
                            </template>
                            <button type="button" @click.prevent="fields.push('')"
                                class="bg-green-500 p-2 text-white font-semibold mt-2 rounded-md">
                                Add more
                            </button>
                        </div>
                    </div>
                </template>

                <div class="flex items-center justify-end gap-x-6 border-t border-gray-900/10 px-4 py-4 sm:px-8">


                    <input type="hidden" id="token" value="{{ csrf_token() }}">
                    <button type="button"
                        onclick="cancelVariation('{{ route('admin.product.variation.cancel', $product) }}' ,'{{ route('admin.products') }}')"
                        class="bg-gray-800 text-white font-semibold rounded-md p-2 px-4">{{ __('Cancel') }}
                    </button>


                    <button type="submit"
                        class="bg-green-500 text-white font-semibold  rounded-md p-2 px-4">{{ __('Save Product') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const formData = {

            specifications: [{
                name: '',
                value: ''
            }],
            fields: [''],

        };
    </script>
    {{-- Image Loader  --}}
    <script type="text/javascript">
        function fileChosen(event) {

            const image = document.getElementById("featuredImage");

            const reader = new FileReader();
            reader.onload = function() {
                image.src = reader.result;
            };
            image.classList.remove("hidden");
            reader.readAsDataURL(event.target.files[0]);

        }
    </script>

    <script>
        function cancelVariation(url, destination) {
            var token = document.getElementById('token').value;
            var xhr = new XMLHttpRequest();
            var routeName = url;
            xhr.open("POST", url, false);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
            xhr.setRequestHeader('X-CSRF-TOKEN', token);
            xhr.send();
            if (xhr.status == 200) {
                window.location.href = destination;
            }
        }
    </script>
@endpush
