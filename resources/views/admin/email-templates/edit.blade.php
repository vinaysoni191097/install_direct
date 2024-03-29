@extends('admin.partials.main')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">{{ __('Update Template') }}</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item active">{{ 'Email' }}</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>


    <div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ __('Update Template') }}</h4>
            </div>
            <form action="{{ route('admin.email.template.update', $template) }}" method="post"
                class="px-12 block relative h-screen">
                @method('put')
                @csrf
                <div class="mb-2">
                    <label for="template_used_for" class="form-label">{{ __('Template used for') }}</label>
                    <input type="text" class="form-control cursor-not-allowed" id="template" name="template_user_for"
                        value="{{ $template->slug }}" disabled>
                </div>
                <div class="mb-3">
                    <label for="subject" class="form-label">{{ __('Subject') }}</label>
                    <input type="text" class="form-control" id="subject" name="subject"
                        value="{{ $template->subject }}" required placeholder="Enter email subject">
                    @error('subject')
                        <p class="text-red-600 font-semibold">{{ $message }}</p>
                    @enderror
                </div>
                <textarea id="myTextarea" name="mail_body">{!! $template->mail_body !!}</textarea>
                <div class="flex justify-end mt-4">
                    <button type="submit"
                        class="rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm mb-3 ">{{ 'Update' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('admin/js/tinymce.min.js') }}" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#myTextarea',
            plugins: ' searchreplace autolink directionality visualblocks visualchars image link media  codesample table charmap pagebreak nonbreaking anchor  insertdatetime advlist lists  wordcount linkchecker template autosave  preview code  help  fullscreen  emoticons lists table wordcount ',
            toolbar: 'undo redo print spellcheckdialog formatpainter | blocks fontfamily fontsize | bold italic underline forecolor backcolor | link image | alignleft aligncenter alignright alignjustify | code',
            height: '600px',
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
@endpush
