<div class="fixed inset-0 flex items-center justify-center z-50 bg">
    <div class="fixed inset-0 backdrop-grayscale bg-black/30 transition-opacity"></div>
    <div class="bg-gray-100 opacity-30"></div>

    <div
        class="bg-white rounded-lg overflow-hidden transform transition-all shadow-lg sm:max-w-2xl sm:w-full opacity-100 p-6">
        {{-- <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4"> --}}

            <button type="button" @click.prevent="showDetails= false">
                <svg width="31" height="31" class="absolute right-2 top-2" viewBox="0 0 31 31" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M15.3125 0C6.78125 0 0 6.78125 0 15.3125C0 23.8438 6.78125 30.625 15.3125 30.625C23.8438 30.625 30.625 23.8438 30.625 15.3125C30.625 6.78125 23.8438 0 15.3125 0ZM21.2188 22.9688L15.3125 17.0625L9.40625 22.9688L7.65625 21.2188L13.5625 15.3125L7.65625 9.40625L9.40625 7.65625L15.3125 13.5625L21.2188 7.65625L22.9688 9.40625L17.0625 15.3125L22.9688 21.2188L21.2188 22.9688Z"
                        fill="#434343" />
                </svg>
            </button>

        {{-- </div> --}}
        <div x-show="isproductVariations">
            <template x-for="variation in productDetails['product_variations']">
                <div class="border-b mb-2">
                    <div class="font-semibold text-xl text-center">
                        <span x-text="variation.title"></span>
                    </div>
                    <div class="text-center mb-4">
                        <div class="text-2xl font-bold">
                            <span x-text="'£ ' + variation.price"></span>
                        </div>
                        <div class="text-base text-gray-600">
                            <span x-text="variation.description">
                            </span>
                        </div>
                        <div class="text-lg">
                            <span x-text="variation.warranty + ' years warranty'">
                            </span>
                        </div>
                        <div class="text-lg">
                            <span x-text="variation.Kwh">
                            </span>
                        </div>
                    </div>

                    <template x-for="specification in variation['variation_specifications']">
                        <div>
                            <div class="flex justify-between mb-3  pt-5">
                                <div class="text-lg flex items-center gap-2">
                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="6" cy="6" r="6" fill="#434343" />
                                    </svg>
                                    <span x-text="specification.specification_name"></span>
                                </div>
                                <div class="font-semibold text-lg"><span x-text="specification.specification_value">

                                    </span>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </template>

        </div>
        <div x-show="!isproductVariations">
            <div class="font-semibold text-xl text-center">
                <span x-text="productDetails.title"></span>
            </div>
            <div class="text-center mb-4">
                <div class="text-2xl font-bold">
                    <span x-text="'£ ' + productDetails.price"></span>
                </div>
                <div class="text-base text-gray-600">
                    <span x-text="productDetails.description">
                    </span>
                </div>
                <div class="text-lg">
                    <span x-text="productDetails.warranty + ' years warranty'">
                    </span>
                </div>
            </div>
            <template x-for="specification in productSpecifications">
                <div class="flex justify-between mb-3 border-t pt-5">
                    <div class="text-lg flex items-center gap-2">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <circle cx="6" cy="6" r="6" fill="#434343" />
                        </svg>
                        <span x-text="specification.specification_name"></span>
                    </div>
                    <div class="font-semibold text-lg"><span x-text="specification.specification_value">
                        </span>
                    </div>
                </div>
            </template>
        </div>

    </div>

</div>
</div>
