@extends('admin.partials.main')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">{{ __('About us Page') }}</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item active">{{ 'About Us Page' }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div>
        <form action="{{ route('admin.aboutUs.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <h3 class="font-bold text-xl text-gray-800 leading-tight px-4 py-2 mt-2">
                    Edit About Us Page
                </h3>
                <div class="card-body">
                    <div class="grid  grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">
                        <div class="col-span-full">
                            <label for="street-question"
                                class="block text-sm  leading-6 text-black font-bold">{{ __('Page Headline  ') }}
                                <sup class="text-red-600">*</sup>
                            </label>
                            <div class="mt-2">
                                <input type="text" name="page_headline"
                                    value="{{ $content->page_headline ?? old('page_headline') }}" maxlength="200"
                                    class="block w-full rounded-md border-1 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            <x-input-error :messages="$errors->get('page_headline')" class="mt-1" />
                        </div>

                        <div class="col-span-full">
                            <label for="street-tab"
                                class="block text-sm leading-6 text-black font-bold">{{ __('Page Side Content') }}
                            </label>
                            <div class="mt-2">
                                <textarea id="myTextarea" name="side_content"
                                    class="block w-full rounded-md border-1 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ $content->side_content ?? old('side_content') }}</textarea>
                            </div>
                            <x-input-error :messages="$errors->get('side_content')" class="mt-1" />
                        </div>

                        <div class="col-span-full">
                            <div class="mb-3">
                                <label for="featured_image" class="form-label text-black">{{ __('Side Content Image') }}
                                </label>
                                <input id="featured_image" name="featured_image" type="file" style="display: block;"
                                    onchange="fileChosen(event)" accept="image/x-png,image/gif,image/jpeg">
                                @if ($content && $content->sidePicture)
                                    <img class="inline-block w-32 h-32  shadow border border-white mt-2"
                                        src="{{ asset('storage/' . $content->sidePicture->path) }}" id="featuredImage"
                                        alt="">
                                @else
                                    <img class="inline-block w-32 h-32  shadow border border-white mt-2"
                                        src="{{ asset('images/no-image.png') }}" id="featuredImage" alt="">
                                @endif

                            </div>
                            <x-input-error :messages="$errors->get('featured_image')" class="mt-1" />
                        </div>

                        <hr class="col-span-full">
                        <div class="col-span-full">
                            <label for="main_content_title"
                                class="block text-sm  leading-6 text-black font-bold">{{ __('Main Content Title') }}
                            </label>
                            <div class="mt-2">
                                <input type="text" name="main_content_title"
                                    value="{{ $content->main_content_title ?? old('main_content_title') }}" maxlength="200"
                                    class="block w-full rounded-md border-1 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            <x-input-error :messages="$errors->get('main_content_title')" class="mt-1" />
                        </div>
                        <div class="col-span-full">
                            <label for="main_content_tagline"
                                class="block text-sm  leading-6 text-black font-bold">{{ __('Main Content Tagline') }}
                            </label>
                            <div class="mt-2">
                                <input type="text" name="main_content_tagline"
                                    value="{{ $content->main_content_tagline ?? old('main_content_tagline') }}"
                                    maxlength="200"
                                    class="block w-full rounded-md border-1 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            <x-input-error :messages="$errors->get('main_content_tagline')" class="mt-1" />
                        </div>
                        <div class="col-span-full">
                            <label for="street-tab"
                                class="block text-sm leading-6 text-black font-bold">{{ __('Page Content Section One') }}
                            </label>
                            <div class="mt-2">
                                <textarea id="myTextarea" name="main_content_section_one"
                                    class="block w-full rounded-md border-1 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ $content->main_content_section_one ?? old('main_content_section_one') }}</textarea>
                            </div>
                            <x-input-error :messages="$errors->get('main_content_section_one')" class="mt-1" />
                        </div>

                        <div class="col-span-full">
                            <label for="street-tab"
                                class="block text-sm leading-6 text-black font-bold">{{ __('Page Content Section Two') }}
                            </label>
                            <div class="mt-2">
                                <textarea id="myTextarea" name="main_content_section_two"
                                    class="block w-full rounded-md border-1 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ $content->main_content_section_two ?? old('main_content_section_two') }}</textarea>
                            </div>
                            <x-input-error :messages="$errors->get('main_content_section_two')" class="mt-1" />
                        </div>

                        <div class="col-span-full">
                            <label for="street-tab"
                                class="block text-sm leading-6 text-black font-bold">{{ __('Page Content Section Three') }}
                            </label>
                            <div class="mt-2">
                                <textarea id="myTextarea" name="main_content_section_three"
                                    class="block w-full rounded-md border-1 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ $content->main_content_section_three ?? old('main_content_section_three') }}</textarea>
                            </div>
                            <x-input-error :messages="$errors->get('main_content_section_three')" class="mt-1" />
                        </div>

                    </div>
                    <div class="flex items-center justify-end gap-x-6 border-t border-gray-900/10  py-4 mt-10">
                        <a href="{{ route('dashboard') }}" type="button"
                            class="rounded-md bg-gray-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600 mb-3">{{__('Cancel')}}</a>
                        <button type="submit"
                            class="rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 mb-3">{{__('Save')}}</button>
                    </div>
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
@endpush
