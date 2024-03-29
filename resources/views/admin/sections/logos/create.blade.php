@extends('admin.partials.main')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">{{ __('Add Partner logo') }}</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
                    <li class="breadcrumb-item active">{{ 'Partner Logo Section' }}</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div>
    <form action="{{ route('admin.logo.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <h3 class="font-bold text-xl text-gray-800 leading-tight px-4 py-2 mt-2">
                Add Partner Logo
            </h3>
            <div class="card-body">
                <div class="grid  grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">
                    <div class="col-span-full">
                        <label for="street-question" class="block text-sm  leading-6 text-black font-bold">{{__('Partner Name')}}
                            <sup class="text-red-600">*</sup>
                        </label>
                        <div class="mt-2">
                            <input type="text" value="{{old('partner_name')}}" id="partner_name" name="partner_name" required maxlength="250" class="block w-full rounded-md border-1 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                        <x-input-error :messages="$errors->get('partner_name')" class="mt-1" />
                    </div>
                    <div class="col-span-full">
                        <div class="mb-3">
                            <label for="featured_image" class="form-label text-black">{{ __('Partner Logo') }}
                                <sup class="text-red-600">*</sup>
                            </label>
                            <input id="featured_image" value="{{old('featured_image')}}" name="featured_image" type="file" style="display: block;" onchange="fileChosen(event)" accept="image/x-png,image/gif,image/jpeg">

                            <div class="image-preview-container relative mt-2 w-2/6">
                                <div id="closeImagePreview" class="close-icon hidden absolute w-3/4 text-red-500 font-extrabold text-xl cursor-pointer right-1 ">
                                    &times;
                                </div>
                                <img class="w-36 h-full object-contain hidden" id="featuredImage" src="" alt="Uploaded Image" />
                            </div>
                        </div>
                        <x-input-error :messages="$errors->get('featured_image')" class="mt-1" />
                    </div>

                </div>
                <div class="flex items-center justify-end gap-x-6 border-t border-gray-900/10  py-4 mt-10">
                    <a href="{{route('admin.logos')}}" type="button" class="rounded-md bg-gray-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600 mb-3">Cancel</a>
                    <button type="submit" class="rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 mb-3">Save</button>
                </div>
            </div>

        </div>
    </form>
</div>
@endsection
@push('scripts')
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
            image.src = "";

            // Hide the close button after closing the image preview
            closeButton.classList.add("hidden");
        });
    }

</script>
@endpush
