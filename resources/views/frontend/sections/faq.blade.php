<section class="md:p-24 p-4" style="background-color: #fcfcfc;">
    <div class="text-center">
        <div class="font-bold md:text-4xl text-2xl mb-10">{{ __('Frequently Asked Questions') }}</div>
    </div>
    <div class="tab-wrapper" x-data="{ activeTab: 0 }">
        <div class="flex justify-center">
            <label @click="activeTab = 0" class="tab-control md:py-4 md:px-6 px-2 text-gray-600 text-xl  cursor-pointer active  border-b-4    border-gray-600 font-medium" :class="{ 'active text-green-600 border-b-4 border-green-600 font-medium': activeTab === 0 }">
                {{__('Battery')}}
            </label>
            <label @click="activeTab = 1" class="tab-control border-b-4 border-gray-600 text-gray-600  md:py-4 md:px-6 px-2 text-xl  cursor-pointer active font-medium" :class="{ 'active border-b-4 border-green-600 font-medium': activeTab === 1 }">
                {{ __('Solar') }}
            </label>

        </div>

        {{-- Tab 1 Content  --}}
        <div class="tab-panel" :class="{ 'active': activeTab === 0 }" x-show.transition.in.opacity.duration.600="activeTab === 0">
            <div class="flex justify-center mt-10 font-sans">
                <div class="md:w-2/3 space-y-8">
                    <dl class="space-y-5 text-gray-900">
                        @foreach ($faqs as $key => $faq)
                        @if(isset($faq['title']) && $faq['title'] == 1)
                        <div class="border-b" x-data="{ open: false }" x-cloak>
                            <dt class="rounded-md flex items-center justify-between cursor-pointer select-none pb-6" @click="open = !open">
                                <button class="select-text md:text-xl text-lg font-medium">
                                    {{ $faq->question }}
                                </button>
                                <svg width="34" height="34" class="w-7 h-7" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path x-show="!open" d="M17 11V23M11 17H23M32 17C32 25.2843 25.2843 32 17 32C8.71573 32 2 25.2843 2 17C2 8.71573 8.71573 2 17 2C25.2843 2 32 8.71573 32 17Z" stroke="#70BF4A" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                                    <path x-show="open" d="M11.166 17.167H23.166M32.166 17.167C32.166 25.4513 25.4503 32.167 17.166 32.167C8.88174 32.167 2.16602 25.4513 2.16602 17.167C2.16602 8.88272 8.88174 2.16699 17.166 2.16699C25.4503 2.16699 32.166 8.88272 32.166 17.167Z" stroke="#70BF4A" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />

                                </svg>


                            </dt>
                            <dd class="p-3 text-gray-600 text-xl space-y-4" x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-y-6" x-transition:enter-end="opacity-100 transform translate-y-0" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 transform translate-y-0" x-transition:leave-end="opacity-0 transform -translate-y-6">
                                <p>{{ $faq->answer }}</p>
                            </dd>
                        </div>
                        @endif
                        @endforeach
                    </dl>
                </div>
            </div>
        </div>

        {{-- Tab 2 Content  --}}
        <div class="tab-panel" :class="{ 'active': activeTab === 1 }" x-show.transition.in.opacity.duration.600="activeTab === 1">
            <div class="flex justify-center mt-10 font-sans">
                <div class="md:w-2/3 space-y-8">

                    <dl class="space-y-5 text-gray-900">
                        @foreach ($faqs as $faq)
                        @if(isset($faq['title']) && $faq['title'] == 2)
                        <div class="border-b" x-data="{ open: false }" x-cloak>
                            <dt class="rounded-md flex items-center justify-between cursor-pointer select-none pb-6" @click="open = !open">
                                <button class="select-text md:text-xl text-lg font-medium">
                                    {{ $faq->question }}
                                </button>
                                <svg width="34" height="34" class="w-7 h-7" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path x-show="!open" d="M17 11V23M11 17H23M32 17C32 25.2843 25.2843 32 17 32C8.71573 32 2 25.2843 2 17C2 8.71573 8.71573 2 17 2C25.2843 2 32 8.71573 32 17Z" stroke="#70BF4A" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                                    <path x-show="open" d="M11.166 17.167H23.166M32.166 17.167C32.166 25.4513 25.4503 32.167 17.166 32.167C8.88174 32.167 2.16602 25.4513 2.16602 17.167C2.16602 8.88272 8.88174 2.16699 17.166 2.16699C25.4503 2.16699 32.166 8.88272 32.166 17.167Z" stroke="#70BF4A" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />

                                </svg>
                            </dt>
                            <dd class="p-3 text-gray-600 text-xl space-y-4" x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-y-6" x-transition:enter-end="opacity-100 transform translate-y-0" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 transform translate-y-0" x-transition:leave-end="opacity-0 transform -translate-y-6">
                                <p>{{ $faq->answer }}</p>
                            </dd>
                        </div>
                        @endif
                        @endforeach
                    </dl>
                </div>
            </div>
        </div>
    </div>
</section>
