@extends('admin.partials.main')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">{{ __('Home Page') }}</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item active">{{ 'Home Page' }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="card">
            <h3 class="font-bold text-xl text-gray-800 leading-tight px-4 py-2 mt-2">
                Edit Home Page
            </h3>
            <form action="{{ route('admin.home.page.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="grid  grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">
                        <div class="col-span-full">
                            <div class="mb-3">
                                <label for="banner_image" class="form-label text-black">{{ __('Home Page Banner') }}
                                </label>
                                <input id="banner_image" name="banner_image" type="file" style="display: block;"
                                    onchange="fileChosen(event)" accept="image/x-png,image/gif,image/jpeg">
                                @if ($content && $content->banner_image_id)
                                    <img class="inline-block w-32 h-32  shadow border border-white mt-2"
                                        src="{{ asset('storage/' . $content->bannerImage->path) }}" id="featuredImage"
                                        alt="">
                                @else
                                    <img class="inline-block w-32 h-32  shadow border border-white mt-2"
                                        src="{{ asset('images/no-image.png') }}" id="featuredImage" alt="">
                                @endif

                            </div>
                            <x-input-error :messages="$errors->get('banner_image')" class="mt-1" />
                        </div>

                        <div class="col-span-full">
                            <label for="banner_headline"
                                class="block text-sm  leading-6 text-black font-bold">{{ __('Banner Text Headline') }}
                                <sup class="text-red-600">*</sup>
                            </label>
                            <div class="mt-2">
                                <input type="text" name="banner_headline"
                                    value="{{ $content->banner_headline ?? old('banner_headline') }}" maxlength="200"
                                    class="block w-full rounded-md border-1 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            <x-input-error :messages="$errors->get('banner_headline')" class="mt-1" />
                        </div>

                        <div class="col-span-full">
                            <label for="banner_tagline"
                                class="block text-sm  leading-6 text-black font-bold">{{ __('Banner Text Tagline') }}
                                <sup class="text-red-600">*</sup>
                            </label>
                            <div class="mt-2">
                                <input type="text" name="banner_tagline"
                                    value="{{ $content->banner_tagline ?? old('banner_tagline') }}" maxlength="200"
                                    class="block w-full rounded-md border-1 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            <x-input-error :messages="$errors->get('banner_tagline')" class="mt-1" />
                        </div>

                        <div class="col-span-full">
                            <div class="mb-3">
                                <label for="specifications" class="form-label text-black">{{ __('Key Features') }}
                                    <sup class="text-red-600">*</sup>
                                </label>
                                <div class="w-full flex gap-4 items-center" x-data="specificationsHandler()">
                                    <table class="w-1/2">
                                        {{-- <div x-text="JSON.stringify(specifications)"></div> --}}
                                        <tbody>
                                            <template x-for="(specification, index) in specifications"
                                                :key="index">
                                                <tr>
                                                    <td>
                                                        <input type="text" x-model="specification.key_feature"
                                                            name="specification_name[]"
                                                            class="w-full px-3 py-2 mb-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                                                            placeholder="Enter specification name" />
                                                    </td>
                                                    <td class="px-2">
                                                        <button type="button"
                                                            @click.prevent="removeField()"
                                                            x-show="specifications.length > 1 || (specification.name !== '' )">
                                                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 15 15" fill="#ff0000">
                                                                <path
                                                                    d="M3.64 2.27L7.5 6.13L11.34 2.29C11.5114 2.1076 11.7497 2.0029 12 2C12.5523 2 13 2.4477 13 3C13.0047 3.2478 12.907 3.4866 12.73 3.66L8.84 7.5L12.73 11.39C12.8948 11.5512 12.9915 11.7696 13 12C13 12.5523 12.5523 13 12 13C11.7423 13.0107 11.492 12.9127 11.31 12.73L7.5 8.87L3.65 12.72C3.4793 12.8963 3.2453 12.9971 3 13C2.4477 13 2 12.5523 2 12C1.9953 11.7522 2.093 11.5134 2.27 11.34L6.16 7.5L2.27 3.61C2.1052 3.4488 2.0085 3.2304 2 3C2 2.4477 2.4477 2 3 2C3.2404 2.0029 3.4701 2.0998 3.64 2.27Z">
                                                                </path>
                                                            </svg>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </template>
                                        </tbody>
                                    </table>

                                    <div class="w-32">
                                        <button type="button" @click.prevent="addNewField()"
                                            class="bg-green-500 text-white font-semibold rounded-md p-2">
                                            {{ __('Add More') }}
                                        </button>
                                    </div>
                                </div>
                                <div class="flex gap-4">
                                    @error('specification_name.*')
                                        <p class="text-red-600 mt-2 font-semibold">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-span-full">
                            <div class="mb-3">
                                <label for="center_banner_image"
                                    class="form-label text-black">{{ __('Center Banner Image') }}
                                </label>
                                <input id="center_banner_image" name="center_banner_image" type="file"
                                    style="display: block;" onchange="fileChosen(event)"
                                    accept="image/x-png,image/gif,image/jpeg">
                                @if ($content && $content->center_banner_image_id)
                                    <img class="inline-block w-32 h-32  shadow border border-white mt-2"
                                        src="{{ asset('storage/' . $content->centerBannerImage->path) }}"
                                        id="featuredImage" alt="">
                                @else
                                    <img class="inline-block w-32 h-32  shadow border border-white mt-2"
                                        src="{{ asset('images/no-image.png') }}" id="featuredImage" alt="">
                                @endif

                            </div>
                            <x-input-error :messages="$errors->get('center_banner_image')" class="mt-1" />
                        </div>

                        <div class="col-span-full">
                            <label for="center_banner_headline"
                                class="block text-sm  leading-6 text-black font-bold">{{ __('Center Banner Headline') }}
                            </label>
                            <div class="mt-2">
                                <input type="text" name="center_banner_headline"
                                    value="{{ $content->center_banner_headline ?? old('center_banner_headline') }}"
                                    maxlength="200"
                                    class="block w-full rounded-md border-1 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            <x-input-error :messages="$errors->get('center_banner_headline')" class="mt-1" />
                        </div>

                        <div class="col-span-full">
                            <label for="banner_headline"
                                class="block text-sm  leading-6 text-black font-bold">{{ __('Center Banner Text') }}
                            </label>

                            <div class="mt-2">
                                <textarea id="myTextarea" name="center_banner_text"
                                    class="block w-full rounded-md border-1 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ $content->center_banner_text ?? old('center_banner_text') }}</textarea>
                            </div>
                            <x-input-error :messages="$errors->get('center_banner_text')" class="mt-1" />



                        </div>
                    </div>
                    <div class="flex items-center justify-end gap-x-6 border-t border-gray-900/10  py-4 mt-5">
                        <a href="{{ route('dashboard') }}" type="button"
                            class="rounded-md bg-gray-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">{{ __('Cancel') }}</a>
                        <button type="submit"
                            class="rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500">{{ __('Save') }}</button>
                    </div>
                </div>
            </form>
        </div>
    @endsection

    @push('scripts')
        <script src="{{ asset('admin/js/tinymce.min.js') }}" referrerpolicy="origin"></script>
        <script>
            tinymce.init({
                selector: '#myTextarea',
                plugins: ' searchreplace autolink directionality visualblocks visualchars image link media  codesample table charmap pagebreak nonbreaking anchor  insertdatetime advlist lists  wordcount linkchecker autosave  preview code  help  fullscreen  emoticons lists table wordcount ',
                toolbar: 'undo redo print spellcheckdialog formatpainter | blocks fontfamily fontsize | bold italic underline forecolor backcolor | link image | alignleft aligncenter alignright alignjustify | code',
                height: '300px',
                file_picker_callback: (cb, value, meta) => {
                    const input = document.createElement('input');
                    input.setAttribute('type', 'file');
                    input.setAttribute('accept', 'image/*');

                    input.addEventListener('change', (e) => {
                        const file = e.target.files[0];

                        const reader = new FileReader();
                        reader.addEventListener('load', () => {
                            /*
                              Note: Now we need to register the blob in TinyMCEs image blob
                              registry. In the next release this part hopefully won't be
                              necessary, as we are looking to handle it internally.
                            */
                            const id = 'blobid' + (new Date()).getTime();
                            const blobCache = tinymce.activeEditor.editorUpload.blobCache;
                            const base64 = reader.result.split(',')[1];
                            const blobInfo = blobCache.create(id, file, base64);
                            blobCache.add(blobInfo);

                            /* call the callback and populate the Title field with the file name */
                            cb(blobInfo.blobUri(), {
                                title: file.name
                            });
                        });
                        reader.readAsDataURL(file);
                    });

                    input.click();
                },
            });
        </script>
        <script type="text/javascript">
            function fileChosen(event) {
                const image = document.getElementById("featuredImage");
                const reader = new FileReader();

                reader.onload = function(e) {
                    image.src = e.target.result;
                };

                reader.readAsDataURL(event.target.files[0]);
            }
        </script>

        <script>
            function specificationsHandler() {
                return {
                    specifications: @json($content->keyFeatures ?? null),
                    addNewField() {
                        this.specifications.push({
                            specification_name: '',
                        });
                    },
                    removeField(index) {
                        this.specifications.splice(index, 1);
                    },
                };
            }
        </script>
    @endpush
