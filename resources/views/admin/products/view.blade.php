@extends('admin.partials.main')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">{{ __('Product') }}</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('All products') }}</a></li>
                        <li class="breadcrumb-item active">{{ 'View product' }}</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="mt-12 flex gap-2">
        <a href="{{ route('admin.products') }}">
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                <path d="M0 0h24v24H0V0z" fill="none"></path>
                <path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"></path>
            </svg>
        </a>
        <h3 class="font-bold text-xl text-gray-800 leading-tight mb-2">
            {{ __('Product Details') }}
        </h3>
    </div>
    <div class="bg-white rounded-lg p-6 mt-6">
        <div class="flex justify-content-end">
            <a href="{{ route('admin.product.edit', $product) }}"
                class="rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm mb-3">{{ 'Edit Product' }}
            </a>
        </div>
        <div class="md:flex gap-8">
            <div class="flex justify-between w-full gap-10">
                <table class="text-sm w-2/4">
                    <tbody>
                        <tr class="border border-gray-100 odd:bg-violet-50/25">
                            <td class="text-sm px-6 py-3 text-left border-r w-64">
                                <div class="font-bold"> {{ __('Product Name') }}</div>
                            </td>
                            <td class="text-sm px-6 py-3 text-left">
                                {{ $product->title }}
                            </td>
                        </tr>
                        <tr class="border border-gray-100 odd:bg-violet-50/25">
                            <td class="text-sm px-6 py-3 text-left border-r">
                                <div class="font-bold"> {{ __('Description') }}</div>
                            </td>
                            <td class="text-sm px-6 py-3 text-left">
                                {{ $product->description }}
                            </td>
                        </tr>
                        <tr class="border border-gray-100 odd:bg-violet-50/25">
                            <td class="text-sm px-6 py-3 text-left border-r">
                                <div class="font-bold"> {{ __('Specifications') }}</div>
                            </td>
                            <td class="text-sm px-6 py-3 text-left">
                                @foreach ($product->productSpecifications as $specification)
                                    <div class="flex gap-3">
                                        <span>{{ $specification->specification_name }}</span>
                                        <span>{{ $specification->specification_value }}</span>
                                    </div>
                                @endforeach
                            </td>
                        </tr>
                        <tr class="border border-gray-100 odd:bg-violet-50/25">
                            <td class="text-sm px-6 py-3 text-left border-r">
                                <div class="font-bold"> {{ __('Featured Image') }} </div>
                            </td>
                            <td class="text-sm px-6 py-3 text-left">
                                @if ($product->productImage)
                                    <img class="inline-block h-32 w-32 shadow "
                                        src="{{ asset('storage/' . $product->productImage->path) }}" id="profile-image"
                                        alt="Featured Image">
                                @else
                                    {{__('No Image Uploaded yet!')}}
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="text-sm w-2/4">
                    <tbody>
                        <tr class="border border-gray-100odd:bg-violet-50/25">
                            <td class="text-sm px-6 py-3 text-left border-r">
                                <div class="font-bold"> {{ __('Price') }}</div>
                            </td>
                            <td class="text-sm px-6 py-3 text-left">
                                {{ $product->price }}
                            </td>
                        </tr>
                        <tr class="border border-gray-100 odd:bg-violet-50/25">
                            <td class="text-sm px-6 py-3 text-left border-r">
                                <div class="font-bold"> {{ __('Stock') }}</div>
                            </td>
                            <td class="text-sm px-6 py-3 text-left">
                                {{ $product->stock }}
                            </td>
                        </tr>
                        <tr class="border border-gray-100 odd:bg-violet-50/25">
                            <td class="text-sm px-6 py-3 text-left border-r">
                                <div class="font-bold"> {{ __('Warranty') }}</div>
                            </td>
                            <td class="text-sm px-6 py-3 text-left">
                                {{ $product->warranty ?? 'N/A' }}
                            </td>
                        </tr>
                        <tr class="border border-gray-100 odd:bg-violet-50/25">
                            <td class="text-sm px-6 py-3 text-left border-r">
                                <div class="font-bold"> {{ __('Status') }} </div>
                            </td>
                            <td class="text-sm px-6 py-3 text-left">
                                Activated
                            </td>
                        </tr>
                        <tr class="border border-gray-100 odd:bg-violet-50/25">
                            <td class="text-sm px-6 py-3 text-left border-r">
                                <div class="font-bold"> {{ __('Tags') }} </div>
                            </td>
                            <td class="text-sm px-6 py-3 text-left">
                                {{ $product->tags->name ?? 'N/A' }}
                            </td>
                        </tr>
                        <tr class="border border-gray-100 odd:bg-violet-50/25">
                            <td class="text-sm px-6 py-3 text-left border-r">
                                <div class="font-bold"> {{ __('Category') }} </div>
                            </td>
                            <td class="text-sm px-6 py-3 text-left">
                                {{ $product->categories->title ?? 'N/A' }}
                            </td>
                        </tr>
                        <tr class="border border-gray-100 odd:bg-violet-50/25">
                            <td class="text-sm px-6 py-3 text-left border-r">
                                <div class="font-bold"> {{ __('Variations') }} </div>
                            </td>
                            <td class="text-sm px-6 py-3 text-left">
                                {{ $product->variation ? 'Yes' : 'Single Product' }}
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

        {{-- Product Variation card --}}
@if ($productVariations->count() > 0)
<h3 class="font-bold text-xl text-gray-800 leading-tight mb-2 mt-4">
    {{ __('Product Variations') }}
</h3>
@endif
    @forelse ($productVariations as $productVariation)
        <div class="mb-2" x-data="{ open: false }" x-cloak>
            <button class="bg-white text-gray-600 p-2 rounded-md text-center w-full flex justify-between font-semibold"
                x-on:click="open = ! open">{{ $productVariation->title }}
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 490 480" fill="currentColor">
                    <title>down</title>
                    <path d="M250 360l180-180-30-30-150 150-160-150-30 30 190 180z"></path>
                </svg>
            </button>

            <div x-show="open">
                <div class="bg-white rounded-lg p-6 mt-6 mb-4">
                    <div class="flex justify-content-end">
                    </div>
                    <div class="md:flex gap-8">
                        <div class="flex justify-between w-full gap-10">
                            <table class="text-sm w-2/4">
                                <tbody>
                                    <tr class="border border-gray-100 odd:bg-violet-50/25">
                                        <td class="text-sm px-6 py-3 text-left border-r w-64">
                                            <div class="font-bold"> {{ __('Variation Name') }}</div>
                                        </td>

                                        <td class="text-sm px-6 py-3 text-left">
                                            {{ $productVariation->title }}
                                        </td>
                                    </tr>
                                    <tr class="border border-gray-100 odd:bg-violet-50/25">
                                        <td class="text-sm px-6 py-3 text-left border-r">
                                            <div class="font-bold"> {{ __('Kwh') }}</div>
                                        </td>
                                        <td class="text-sm px-6 py-3 text-left">
                                            {{ $productVariation->Kwh }}
                                        </td>
                                    </tr>
                                    <tr class="border border-gray-100 odd:bg-violet-50/25">
                                        <td class="text-sm px-6 py-3 text-left border-r">
                                            <div class="font-bold"> {{ __('Specifications') }}</div>
                                        </td>

                                        <td class="text-sm px-6 py-3 text-left">
                                            @foreach ($productVariation->variationSpecifications as $specification)
                                                <div class="flex gap-3">
                                                    <span>{{ $specification->specification_name }}</span>
                                                    <span>{{ $specification->specification_value }}</span>
                                                </div>
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr class="border border-gray-100 odd:bg-violet-50/25">
                                        <td class="text-sm px-6 py-3 text-left border-r">
                                            <div class="font-bold"> {{ __('Featured Image') }} </div>
                                        </td>
                                        <td class="text-sm px-6 py-3 text-left">
                                            @if ($productVariation->variationImage)
                                                <img class="inline-block h-32 w-32 shadow "
                                                    src="{{ asset('storage/' . $productVariation->variationImage->path) }}"
                                                    id="profile-image" alt="Featured Image">
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="text-sm w-2/4">
                                <tbody>
                                    <tr class="border border-gray-100odd:bg-violet-50/25">
                                        <td class="text-sm px-6 py-3 text-left border-r">
                                            <div class="font-bold"> {{ __('Price') }}</div>
                                        </td>
                                        <td class="text-sm px-6 py-3 text-left">
                                            {{ $productVariation->price }}
                                        </td>
                                    </tr>
                                    <tr class="border border-gray-100 odd:bg-violet-50/25">
                                        <td class="text-sm px-6 py-3 text-left border-r">
                                            <div class="font-bold"> {{ __('Stock') }}</div>
                                        </td>
                                        <td class="text-sm px-6 py-3 text-left">
                                            {{ $productVariation->stock }}
                                        </td>
                                    </tr>
                                    <tr class="border border-gray-100 odd:bg-violet-50/25">
                                        <td class="text-sm px-6 py-3 text-left border-r">
                                            <div class="font-bold"> {{ __('Warranty') }}</div>
                                        </td>
                                        <td class="text-sm px-6 py-3 text-left">
                                            {{ $productVariation->warranty ?? 'N/A' }}
                                        </td>
                                    </tr>
                                    <tr class="border border-gray-100 odd:bg-violet-50/25">
                                        <td class="text-sm px-6 py-3 text-left border-r">
                                            <div class="font-bold"> {{ __('Status') }} </div>
                                        </td>
                                        <td class="text-sm px-6 py-3 text-left">
                                            Activated
                                        </td>
                                    </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
    @endforelse

@endsection
