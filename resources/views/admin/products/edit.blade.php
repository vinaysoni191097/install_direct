@extends('admin.partials.main')
@section('content')

    @php
        $inverterIds = $product->batteryInverterCompatibility->pluck('inverter_id');
    @endphp
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">{{ __('Edit Product') }}</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.products') }}">{{ __('All products') }}</a></li>
                        <li class="breadcrumb-item active">{{ 'Edit product' }}</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div x-data="productDataHandler()" x-cloak>
        <div class="space-y-10 divide-y divide-gray-900/10">
            <div class="grid grid-cols-1 gap-x-8 gap-y-8 ">
                <form action="{{ route('admin.product.update', $product->slug) }}" method="post"
                    enctype="multipart/form-data" id="newProductForm"
                    class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2">
                    @method('put')
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
                                        value="{{ $product->title }}" placeholder="Enter product title"
                                        class="block w-full rounded-md border-1 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    @error('title')
                                        <p class="text-red-600 mt-2 font-semibold">{{ $message }}</p>
                                    @enderror
                                </div>
                                <span id="title-error" class="error"></span>

                            </div>
                            <div class="col-span-full">
                                <label for="last-name"
                                    class="block text-sm font-extrabold leading-6 text-black">{{ __('Description') }}
                                    <sup class="text-red-600">*</sup>
                                </label>
                                <div class="mt-2">
                                    <textarea id="description" name="description" rows="3" required placeholder="Enter product description here"
                                        class="block w-full rounded-md border-1 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ $product->description }}
                                    </textarea>
                                    @error('description')
                                        <p class="text-red-600 mt-2 font-semibold">{{ $message }}</p>
                                    @enderror
                                </div>
                                <span id="description-error" class="error"></span>

                            </div>
                            <div class="sm:col-span-3">
                                <label for="first-name"
                                    class="block text-sm font-extrabold leading-6 text-black">{{ __('Price') }}
                                    <sup class="text-red-600">*</sup>
                                </label>
                                <div class="mt-2">
                                    <input type="number" min="1" class="form-control" id="price" name="price"
                                        required placeholder="00.00" value="{{ $product->price }}"
                                        class="block w-full rounded-md border-1 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    @error('price')
                                        <p class="text-red-600 mt-2 font-semibold">{{ $message }}</p>
                                    @enderror
                                </div>
                                <span id="price-error" class="error"></span>

                            </div>

                            <div class="sm:col-span-3">
                                <label for="last-name"
                                    class="block text-sm font-extrabold leading-6 text-black">{{ __('Category') }}
                                    <sup class="text-red-600">*</sup>
                                </label>
                                <div class="mt-2">
                                    <select id="category" name="category" required
                                        class="block w-full rounded-md border-1 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        @foreach ($categories as $key => $category)
                                            <option value="{{ $category->id }}"
                                                @if ($category->id == $product->category_id) selected @endif>{{ $category->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                        <p class="text-red-600 mt-2 font-semibold">{{ $message }}</p>
                                    @enderror
                                </div>
                                <span id="category-error" class="error"></span>

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
                                            <option {{ $inverterIds->contains($inverter->id) ? 'selected' : '' }}
                                                value="{{ $inverter->id }}">{{ $inverter->title }}</option>
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
                                        value="{{ $product->stock }}" placeholder="Enter product stock" required
                                        class="block w-full rounded-md border-1 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    @error('stock')
                                        <p class="text-red-600 mt-2 font-semibold">{{ $message }}</p>
                                    @enderror
                                </div>
                                <span id="stock-error" class="error"></span>

                            </div>

                            <div class="sm:col-span-3">
                                <label for="region"
                                    class="block text-sm font-extrabold leading-6 text-black">{{ __('Kwh') }}
                                    <sup class="text-red-600">*</sup>
                                </label>
                                <div class="mt-2">
                                    <input type="number" min="1" class="form-control" id="Kwh"
                                        name="Kwh" placeholder="Enter Kwh" required value="{{ $product->Kwh }}"
                                        class="block w-full rounded-md border-1 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    @error('Kwh')
                                        <p class="text-red-600 mt-2 font-semibold">{{ $message }}</p>
                                    @enderror

                                </div>
                                <span id="Kwh-error" class="error"></span>

                            </div>

                            <div class="sm:col-span-3">
                                <label for="region"
                                    class="block text-sm font-extrabold leading-6 text-black">{{ __('Warranty') }}
                                    <sup class="text-red-600">*</sup>
                                </label>
                                <div class="mt-2">
                                    <input type="number" min="1" class="form-control" id="warranty"
                                        name="warranty" placeholder="Enter warranty in years " required
                                        value="{{ $product->warranty }}"
                                        class="block w-full rounded-md border-1 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    @error('warranty')
                                        <p class="text-red-600 mt-2 font-semibold">{{ $message }}</p>
                                    @enderror
                                </div>
                                <span id="warranty-error" class="error"></span>

                            </div>


                            <div class="col-span-full">
                                <div class="mb-3">
                                    <label for="specifications" class="form-label">{{ __('Specifications') }}
                                        <sup class="text-red-600">*</sup>
                                    </label>
                                    <div class="w-full max-w-3xl flex gap-4 items-center" name="specifications"
                                        x-data="specificationsHandler()" x-cloak>
                                        <table>
                                            <tbody>
                                                <template x-for="(specification, index) in specifications"
                                                    :key="index">
                                                    <tr>
                                                        <td class="border p-2">
                                                            <input type="text" name="specification_name[]"
                                                                x-model="specification.specification_name"
                                                                x-bind:value="specification.specification_name"
                                                                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" />
                                                        </td>
                                                        <td class="border p-2">
                                                            <input type="text" name="specification_value[]"
                                                                x-model="specification.specification_value"
                                                                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" />
                                                        </td>
                                                        <td class="border p-2">
                                                            <button type="button" @click.prevent="removeField(index)"
                                                                class="bg-red-500 text-white font-semibold rounded-md p-2"
                                                                x-show="specifications.length > 1 && (specification.name !== '' && specification.value !== '')">
                                                                {{ __(' Remove') }}
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </template>
                                            </tbody>
                                        </table>

                                        <div class="">
                                            <button type="button" @click.prevent="addNewField"
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
                                    <label for="featured_image" class="form-label">{{ __('Product Image') }}</label>
                                    <input id="featured_image" name="featured_image" type="file"
                                        accept="image/x-png,image/gif,image/jpeg" x-on:change="fileChosen(event)"
                                        style="display: block;">

                                    @if ($product->featured_image_id)
                                        <img class="inline-block w-32 h-32  shadow border border-white mt-2"
                                            src="{{ asset('storage/' . $product->productImage->path) }}"
                                            name="product_image" value="{{ $product->featured_image_id }}"
                                            id="profile-image" alt="">
                                    @else
                                        <img class="inline-block w-32 h-32  shadow border border-white mt-2"
                                            src="{{ asset('images/no-image.png') }}" alt="" id="featuredImage">
                                    @endif
                                </div>
                            </div>


                        </div>
                        <div class="col-span-full">
                            <div class="mt-4 flex justify-end text-center items-center gap-3">
                                <button type="submit"
                                    class="bg-green-600 text-white font-semibold rounded p-2">{{ __('Update Product') }}</button>
                                <a href="#" class="bg-gray-600 text-white font-semibold rounded p-2"
                                    @click.prevent="createNewVariation = !createNewVariation">{{ __('Create Product Variation') }}</a>

                            </div>
                        </div>
                    </div>


                </form>
            </div>
        </div>

        {{-- Create new Variation Option  --}}
        <form action="{{ route('admin.product.variation.store') }}" method="post" enctype="multipart/form-data"
            class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2 mt-4"
            id="newProductVariationForm">
            @csrf
            <div x-show="createNewVariation">
                <div class="px-4 py-6 sm:p-8">
                    <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="col-span-full">
                            <div class="flex gap-2 text-center">

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
                                <input type="text" class="form-control" id="variationTitle" name="title" required
                                    value="{{ old('title') }}" placeholder="Enter product title"
                                    class="block w-full rounded-md border-1 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                @error('title')
                                    <p class="text-red-600 mt-2 font-semibold">{{ $message }}</p>
                                @enderror
                                <span id="variationTitle-error" class="error"></span>
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="first-name"
                                class="block text-sm font-extrabold leading-6 text-black">{{ __('Price') }}
                                <sup class="text-red-600">*</sup>
                            </label>
                            <div class="mt-2">
                                <input type="number" min="1" class="form-control" id="variationPrice"
                                    name="price" required placeholder="00.00" value="{{ old('price') }}"
                                    class="block w-full rounded-md border-1 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                @error('price')
                                    <p class="text-red-600 mt-2 font-semibold">{{ $message }}</p>
                                @enderror
                                <span id="variationPrice-error" class="error"></span>
                            </div>
                        </div>
                        <div class="sm:col-span-3">
                            <label for="city"
                                class="block text-sm font-extrabold leading-6 text-black">{{ __('Stock') }}
                                <sup class="text-red-600">*</sup>
                            </label>
                            <div class="mt-2">
                                <input type="number" min="1" id="variationStock" name="stock"
                                    value="{{ old('stock') }}" placeholder="Enter product stock" required
                                    class="block w-full rounded-md border-1 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                @error('stock')
                                    <p class="text-red-600 mt-2 font-semibold">{{ $message }}</p>
                                @enderror
                                <span id="variationStock-error" class="error"></span>
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="region"
                                class="block text-sm font-extrabold leading-6 text-black">{{ __('Kwh') }}
                                <sup class="text-red-600">*</sup>
                            </label>
                            <div class="mt-2">
                                <input type="number" min="1" class="form-control" id="variationKwh"
                                    name="Kwh" placeholder="Enter Kwh" required value="{{ old('Kwh') }}"
                                    class="block w-full rounded-md border-1 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                @error('Kwh')
                                    <p class="text-red-600 mt-2 font-semibold">{{ $message }}</p>
                                @enderror
                                <span id="variationKwh-error" class="error"></span>
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="region"
                                class="block text-sm font-extrabold leading-6 text-black">{{ __('Warranty') }}
                                <sup class="text-red-600">*</sup>
                            </label>
                            <div class="mt-2">
                                <input type="number" min="1" class="form-control" id="variationWarranty"
                                    name="warranty" placeholder="Enter warranty in years " required
                                    value="{{ old('warranty') }}"
                                    class="block w-full rounded-md border-1 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                @error('warranty')
                                    <p class="text-red-600 mt-2 font-semibold">{{ $message }}</p>
                                @enderror
                                <span id="variationWarranty-error" class="error"></span>
                            </div>
                        </div>

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
                                                            id="specification_name" name="specification_name[]"
                                                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                                                            placeholder="Enter specification name" />
                                                    </td>
                                                    <td class="border p-2">
                                                        <input type="text" x-model="specification.value"
                                                            id="specification_value" name="specification_value[]"
                                                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                                                            placeholder="Enter value" />
                                                    </td>
                                                    <td class="border p-2">
                                                        <button type="button"
                                                            @click.prevent="specifications.splice(index, 1)"
                                                            class="bg-red-500 text-white font-semibold rounded-md p-2"
                                                            x-show="specifications.length > 1 || (specification.name !== '' && specification.value !== '')">
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
                                <span id="VariationSpecification_name-error" class="error"></span>
                                <span id="variationSpecification_value-error" class="error"></span>
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
                                <input id="featured_image" name="featured_image" type="file" style="display: block;"
                                    onchange="fileChosen(event)" accept="image/x-png,image/gif,image/jpeg">

                                <div class="image-preview-container">
                                    <span id="closeImagePreview" class="close-icon hidden">&times;</span>
                                    <img id="featuredImage" src="#" alt="Uploaded Image" class="hidden" />
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="flex gap-4 mt-3 justify-end">
                        <button
                            class="bg-green-600 p-2  text-white font-semibold rounded-md w-sm">{{ __('Save') }}</button>
                        <button @click.prevent="cancelNewVariation"
                            class="bg-gray-600 p-2  text-white font-semibold rounded-md w-sm">{{ __('Cancel') }}</button>
                    </div>
                </div>
            </div>
        </form>

    </div>


    {{-- Old Variations Edit Option  --}}
    @if ($productVariations->isNotEmpty() && $productVariations->count() > 0)
        <h3 class="font-bold text-xl text-gray-800 leading-tight mb-2 mt-4">
            {{ __('Product Variations') }}
        </h3>
        @foreach ($productVariations as $key => $productVariation)
            <div class="mb-2" x-data="editVariation({{ $key }})" x-cloak>
                <button class="bg-white text-gray-600 p-3 rounded-md text-center w-full flex justify-between font-semibold"
                    x-on:click="isOpen = ! isOpen">{{ $productVariation->title }}
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 490 480" fill="currentColor">
                        <title>down</title>
                        <path d="M250 360l180-180-30-30-150 150-160-150-30 30 190 180z"></path>
                    </svg>
                </button>

                <div x-show="isOpen">
                    <div class="bg-white rounded-lg p-6 mt-6 mb-4">
                        <div class="flex justify-content-end px-3 gap-2 items-center mb-2 cursor-pointer  ">
                            <button @click.prevent="allowEdit">
                                <svg class="w-5 h-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512">
                                    <path
                                        d="M402.6 83.2l90.2 90.2c3.8 3.8 3.8 10 0 13.8L274.4 405.6l-92.8 10.3c-12.4 1.4-22.9-9.1-21.5-21.5l10.3-92.8L388.8 83.2c3.8-3.8 10-3.8 13.8 0zm162-22.9l-48.8-48.8c-15.2-15.2-39.9-15.2-55.2 0l-35.4 35.4c-3.8 3.8-3.8 10 0 13.8l90.2 90.2c3.8 3.8 10 3.8 13.8 0l35.4-35.4c15.2-15.3 15.2-40 0-55.2zM384 346.2V448H64V128h229.8c3.2 0 6.2-1.3 8.5-3.5l40-40c7.6-7.6 2.2-20.5-8.5-20.5H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V306.2c0-10.7-12.9-16-20.5-8.5l-40 40c-2.2 2.3-3.5 5.3-3.5 8.5z">
                                    </path>
                                </svg>
                            </button>


                            {{-- Delpete Confirmation Modal  --}}
                            <x-delete-confirmation-modal :values="$product" :message="'Are you sure you want to remove this product ?'"
                                routename="{{ route('admin.product.variation.delete', $productVariation) }}" />

                        </div>
                        <form action="{{ route('admin.product.variation.update', $productVariation) }}" method="POST"
                            enctype="multipart/form-data" id="editProductVariationForm">
                            @method('put')
                            @csrf

                            <div class="px-4 py-6 sm:p-8">
                                <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                    <div class="col-span-full">
                                        <div class="flex gap-2 text-center">

                                            <label for="first-name"
                                                class="block text-sm font-extrabold leading-6 text-black">{{ __('Parent Product') }}
                                                <sup class="text-red-600">*</sup>
                                            </label>
                                        </div>
                                        <div class="mt-2">
                                            <input type="text" class="form-control" id="parent_product"
                                                name="parent_product" required disabled value="{{ $product->title }}"
                                                placeholder="Enter product title"
                                                class="block w-full rounded-md border-1 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            @error('parent_product')
                                                <p class="text-red-600 mt-2 font-semibold">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <input type="number" name="parent_product_id" class="hidden"
                                        value="{{ $product->id }}" />
                                    <div class="col-span-full">
                                        <label for="first-name"
                                            class="block text-sm font-extrabold leading-6 text-black">{{ __('Product Title') }}
                                            <sup class="text-red-600">*</sup>
                                        </label>
                                        <div class="mt-2">
                                            <input type="text" class="form-control" id="title" name="title"
                                                required value="{{ $productVariation->title }}"
                                                placeholder="Enter product title"
                                                class="block w-full rounded-md border-1 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                                x-bind:class="{ 'cursor-not-allowed': isDisabled }"
                                                x-bind:disabled="isDisabled">
                                            @error('title')
                                                <p class="text-red-600 mt-2 font-semibold">{{ $message }}</p>
                                            @enderror
                                            <span id="edit_title-error" class="error"></span>
                                        </div>
                                    </div>

                                    <div class="sm:col-span-3">
                                        <label for="first-name"
                                            class="block text-sm font-extrabold leading-6 text-black">{{ __('Price') }}
                                            <sup class="text-red-600">*</sup>
                                        </label>
                                        <div class="mt-2">
                                            <input type="number" min="1" class="form-control" id="price"
                                                name="price" required placeholder="00.00"
                                                value="{{ $productVariation->price }}"
                                                class="block w-full rounded-md border-1 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                                x-bind:class="{ 'cursor-not-allowed': isDisabled }"
                                                x-bind:disabled="isDisabled">
                                            @error('price')
                                                <p class="text-red-600 mt-2 font-semibold">{{ $message }}</p>
                                            @enderror
                                            <span id="edit_price-error" class="error"></span>
                                        </div>
                                    </div>
                                    <div class="sm:col-span-3">
                                        <label for="city"
                                            class="block text-sm font-extrabold leading-6 text-black">{{ __('Stock') }}
                                            <sup class="text-red-600">*</sup>
                                        </label>
                                        <div class="mt-2">
                                            <input type="number" min="1" id="stock" name="stock"
                                                value="{{ $productVariation->stock }}" placeholder="Enter product stock"
                                                required
                                                class="block w-full rounded-md border-1 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                                x-bind:class="{ 'cursor-not-allowed': isDisabled }"
                                                x-bind:disabled="isDisabled">
                                            @error('stock')
                                                <p class="text-red-600 mt-2 font-semibold">{{ $message }}</p>
                                            @enderror
                                            <span id="edit_stock-error" class="error"></span>
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
                                                value="{{ $productVariation->warranty }}"
                                                class="block w-full rounded-md border-1 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                                x-bind:class="{ 'cursor-not-allowed': isDisabled }"
                                                x-bind:disabled="isDisabled">
                                            @error('warranty')
                                                <p class="text-red-600 mt-2 font-semibold">{{ $message }}</p>
                                            @enderror
                                            <span id="edit_warranty-error" class="error"></span>
                                        </div>
                                    </div>

                                    <div class="col-span-full">
                                        <div class="mb-3">
                                            <label for="specifications"
                                                class="form-label text-black">{{ __('Specifications') }}
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
                                                                    <input type="text" name="specification_name[]"
                                                                        x-model="specification.specification_name"
                                                                        x-bind:value="specification.specification_name"
                                                                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                                                                        x-bind:class="{ 'cursor-not-allowed': isDisabled }"
                                                                        x-bind:disabled="isDisabled" />
                                                                </td>
                                                                <td class="border p-2">
                                                                    <input type="text" name="specification_value[]"
                                                                        x-model="specification.specification_value"
                                                                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                                                                        x-bind:class="{ 'cursor-not-allowed': isDisabled }"
                                                                        x-bind:disabled="isDisabled" />
                                                                </td>
                                                                <td class="border p-2">
                                                                    <button type="button"
                                                                        @click.prevent="removeField(index)"
                                                                        class="text-red-500  font-semibold rounded-md p-2"
                                                                        x-bind:class="{ 'cursor-not-allowed': isDisabled }"
                                                                        x-bind:disabled="isDisabled">
                                                                        <svg class="w-5 h-5" fill="currentColor"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            viewBox="0 0 20 20">
                                                                            <path
                                                                                d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z">
                                                                            </path>
                                                                        </svg>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        </template>
                                                    </tbody>
                                                </table>

                                                <div class="w-32">
                                                    <button type="button"
                                                        x-bind:class="{ 'cursor-not-allowed': isDisabled }"
                                                        x-bind:disabled="isDisabled"
                                                        @click.prevent="specifications.push({ name: '', value: '' })"
                                                        class="bg-green-500 text-white font-semibold rounded-md p-2">
                                                        Add More
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
                                            <input id="featured_image" name="featured_image" type="file"
                                                x-on:change="fileChosen(event)" style="display: block;"
                                                x-bind:disabled="isDisabled">
                                            @if ($productVariation->variationImage)
                                                <img class="inline-block h-32 w-32 shadow "
                                                    src="{{ asset('storage/' . $productVariation->variationImage->path) }}"
                                                    id="profile-image" alt="Featured Image">
                                            @else
                                                <img class="inline-block w-32 h-32  shadow border border-white mt-2"
                                                    src="{{ asset('images/no-image.png') }}" alt=""
                                                    id="newFeatureImage">
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="flex gap-4 mt-3 justify-end" x-show="isEditEnabled">
                                <button
                                    class="bg-green-600 p-2  text-white font-semibold rounded-md w-sm">{{ __('Save') }}</button>
                                <button @click.prevent="cancelEdit"
                                    class="bg-gray-600 p-2  text-white font-semibold rounded-md w-sm">{{ __('Cancel') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    @endif

    {{-- This code is to check if variation exists or not : Adding into blade derective in order to add condition   --}}
    @isset($productVariation)
        <script>
            function variationSpecificationsHandler() {
                return {
                    specifications: {!! json_encode($productVariation->variationSpecifications->toArray() ?? null) !!},
                    addNewField() {
                        this.specifications.push({
                            specification_name: '',
                            specification_value: '',
                        });
                    },
                    removeField(index) {
                        this.specifications.splice(index, 1);
                    },
                };
            }
        </script>
    @endisset
@endsection
@push('scripts')
    {{-- Parent Product x-data  --}}
    <script type="text/javascript">
        function productDataHandler() {
            return {
                createNewVariation: false,
                cancelNewVariation: function() {
                    this.createNewVariation = false
                },
                specifications: [''],
                addnewVariationField() {
                    this.specifications.push({
                        specification_name: '',
                        specification_value: '',
                    });
                },
                removeField(index) {
                    this.specifications.splice(index, 1);
                },
                fileChosen: function(event) {
                    const image = document.getElementById("featuredImage");

                    const reader = new FileReader();
                    reader.onload = function() {
                        image.src = reader.result;
                    };
                    image.classList.remove("hidden");
                    reader.readAsDataURL(event.target.files[0]);

                }
            }
        }
    </script>

    <script>
        function specificationsHandler() {
            return {
                specifications: {!! json_encode($product->productSpecifications->toArray() ?? null) !!},
                addNewField() {
                    this.specifications.push({
                        specification_name: '',
                        specification_value: '',
                    });
                },
                removeField(index) {
                    this.specifications.splice(index, 1);
                },
            };
        }


        function editVariation(index) {
            return {
                isOpen: false,
                isDisabled: true,
                isEditEnabled: false,
                allowEdit: function() {
                    this.isDisabled = false
                    cancelButton = true
                    saveButton = true
                    this.isEditEnabled = true
                },
                cancelEdit: function() {
                    this.isDisabled = true
                    this.isOpen = false
                    this.isEditEnabled = false
                    window.location.reload();
                },
                fileChosen: function(event) {
                    const image = document.getElementById("newFeatureImage");
                    const reader = new FileReader();
                    reader.onload = function() {
                        image.src = reader.result;
                    };
                    image.classList.remove("hidden");
                    reader.readAsDataURL(event.target.files[0]);

                }
            }
        }
    </script>

    <script>
        const select = new Choices('.select', {
            searchEnabled: true,
            loadingText: 'Loading...',
            allowHTML: true,
            removeItems: true,
            removeItemButton: true,
            itemSelectText: '',
            classNames: {
                containerOuter: 'choices select-choices',
            },
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var categorySelect = document.getElementById('category');
            var inverterSection = document.getElementById('inverterSection');

            categorySelect.addEventListener('change', function() {
                var selectedOption = categorySelect.options[categorySelect.selectedIndex];
                var selectedTitle = selectedOption.text;
                var selectedCategory = selectedTitle.toLowerCase();
                var isBatteryCategory = selectedCategory.includes('battery');
                inverterSection.style.display = isBatteryCategory ? 'block' : 'none';
            });

            // Initial check when the page loads
            var initialSelectedTitle = categorySelect.options[categorySelect.selectedIndex].text;
            var initialSelectedCategory = initialSelectedTitle.toLowerCase();
            var initialIsBatteryCategory = initialSelectedCategory.includes('battery');
            inverterSection.style.display = initialIsBatteryCategory ? 'block' : 'none';
        });
    </script>
@endpush
