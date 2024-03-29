@extends('layouts.main') @section('content')
<section class="min-h-screen flex flex-col sm:justify-center  pt-20 pb-20 md:px-28 px-4 sm:px-10 py-10 mx-2">
    <!--Breadcrumbs-->
    <nav class="flex md:mt-10  mb-9" aria-label="Breadcrumb">
        <ol role="list" class="flex items-center space-x-4">
            <li>
                <div>
                    <a href="{{ route('customer.account.profile') }}" class=" text-sm font-medium text-gray-500 hover:text-gray-700"> Account </a>
                </div>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                    </svg>
                    <a href="{{ route('customer.myOrders') }}" class="ml-2 text-sm font-medium text-gray-500 hover:text-gray-700">Orders</a>
                </div>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                    </svg>
                    <a href="{{ route('customer.order.details', $order) }}" class="ml-2 text-sm font-medium text-gray-500 hover:text-gray-700">Order
                        #{{ $order->order_number }}</a>
                </div>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                    </svg>
                    <a href="#" class="ml-4 text-sm font-medium text-green-600" aria-current="page">Uploads</a>
                </div>
            </li>
        </ol>
    </nav>
    <!-- Order Details-->
    <div class="md:flex justify-between items-end">
        <div>
            <div class="md:text-4xl text-xl font-bold mb-2">Order #{{ $order->order_number }}</div>
            <div class="md:text-xl text-lg gray-text">Please review the information and proceed to upload any required images </b>
            </div>
        </div>

    </div>
    <div class="text-secondary-600 text-lg md:w-1/2 mt-10  flex-1 ">
        <div class="font-semibold text-2xl">Personal Information</div>
        <p class="text-base mb-5">Please review & fill the necessary details below to continue.</p>
        <div class="md:flex w-full gap-20 mt-5">
            <div class="md:w-3/4">
                <div class="border rounded-lg p-6">
                    <div class="w-full">
                        <div class="flex justify-between border-b pb-4 mb-4">
                            <div class="md:text-lg text-base">
                                Full Name
                            </div>
                            <div class="font-semibold md:text-lg text-base">{{ Auth::user()->name }}
                            </div>
                        </div>
                        <div class="flex justify-between border-b pb-4 mb-4">
                            <div class="md:text-lg text-base">Phone Number</div>
                            <div class="font-semibold md:text-lg text-base"> {{ Auth::user()->phone_number }} </div>
                        </div>
                        <div class="flex justify-between border-b pb-4 mb-4">
                            <div class="md:text-lg text-base">Installation Address</div>
                            <div class="font-semibold md:text-lg text-base"> {{ $order->installation_address }}
                            </div>
                        </div>
                        <div class="flex justify-between font-semibold  pb-4 mb-4">
                            <div class="text-xl">Due Amount</div>
                            <div class="font-bold text-xl">£ {{ $order->payable_amount }} </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="font-semibold text-2xl mt-5">Uploads</div>
    <p class="text-base mb-5">Please proceed by uploading the specified images below and image size should be max 3.5
        MB. </p>
    <div class="text-base text-red-500 mb-2 font-semibold">You can upload up to two images only at max.</div>
    <form action="{{ route('customer.pending.document.store', $order) }}" method="post" enctype="multipart/form-data" id="pendingDocumentForm">
        @csrf
        <div class="grid gap-6 md:grid-cols-2" id="upload-sections">
            <div class="border rounded-lg bg-gray-50 p-4">
                <div class="font-medium md:text-xl text-base">{{ __('Front of the house') }} <span class="text-red-600">*</span>
                </div>
                <div class="flex gap-5 rounded bg-grey-50 mt-2">
                    <label class="w-64 flex justify-center gap-2 items-center px-4 py-6 bg-gray-100 text-blue rounded-lg border border-gray-200  tracking-wide  cursor-pointer ">
                        <svg width="30" height="27" viewBox="0 0 30 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.38051 18.6862C-1.61949 19.6862 -0.619495 8.6862 7.38051 9.6862C4.38051 -1.3138 21.3805 -1.3138 20.3805 6.6862C30.3805 3.6862 30.3805 19.6862 21.3805 18.6862M9.38051 14.6862L14.3805 10.6862M14.3805 10.6862L19.3805 14.6862M14.3805 10.6862V25.6862" stroke="#111111" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span class="mt-2 text-base font-medium leading-normal">Upload</span>
                        <input type='file' name="front_of_the_house[]" class="hidden" onchange="handleFileInputChange(event, 'upload-section-0')" multiple required />
                    </label>
                    <div id="upload-section-0-preview" class="flex gap-2"></div>
                </div>
            </div>
            <div class="border rounded-lg bg-gray-50 p-4">
                <div class="font-medium md:text-xl text-base">{{ __('Side of the house') }} <span class="text-red-600">*</span>
                </div>
                <div class="flex gap-5 rounded bg-grey-50 mt-2">
                    <label class="w-64 flex justify-center gap-2 items-center px-4 py-6 bg-gray-100 text-blue rounded-lg border border-gray-200  tracking-wide  cursor-pointer ">
                        <svg width="30" height="27" viewBox="0 0 30 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.38051 18.6862C-1.61949 19.6862 -0.619495 8.6862 7.38051 9.6862C4.38051 -1.3138 21.3805 -1.3138 20.3805 6.6862C30.3805 3.6862 30.3805 19.6862 21.3805 18.6862M9.38051 14.6862L14.3805 10.6862M14.3805 10.6862L19.3805 14.6862M14.3805 10.6862V25.6862" stroke="#111111" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span class="mt-2 text-base font-medium leading-normal">Upload</span>
                        <input type='file' name="side_of_the_house[]" class="hidden" onchange="handleFileInputChange(event, 'upload-section-1')" multiple required />
                    </label>
                    <div id="upload-section-1-preview" class="flex gap-2"></div>
                </div>
            </div>
            <div class="border rounded-lg bg-gray-50 p-4">
                <div class="font-medium md:text-xl text-base">{{ __('Back of the house') }} <span class="text-red-600">*</span>
                </div>
                <div class="flex gap-5 rounded bg-grey-50 mt-2">
                    <label class="w-64 flex justify-center gap-2 items-center px-4 py-6 bg-gray-100 text-blue rounded-lg border border-gray-200  tracking-wide  cursor-pointer ">
                        <svg width="30" height="27" viewBox="0 0 30 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.38051 18.6862C-1.61949 19.6862 -0.619495 8.6862 7.38051 9.6862C4.38051 -1.3138 21.3805 -1.3138 20.3805 6.6862C30.3805 3.6862 30.3805 19.6862 21.3805 18.6862M9.38051 14.6862L14.3805 10.6862M14.3805 10.6862L19.3805 14.6862M14.3805 10.6862V25.6862" stroke="#111111" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span class="mt-2 text-base font-medium leading-normal">Upload</span>
                        <input type='file' name="back_of_the_house[]" class="hidden" onchange="handleFileInputChange(event, 'upload-section-2')" multiple required />
                    </label>
                    <div id="upload-section-2-preview" class="flex gap-2"></div>
                </div>
            </div>
            <div class="border rounded-lg bg-gray-50 p-4">
                <div class="font-medium md:text-xl text-base">{{ __('Fuse Board') }} <span class="text-red-600">*</span> </div>
                <div class="flex gap-5  rounded bg-grey-50 mt-2">
                    <label class="w-64 flex justify-center gap-2 items-center px-4 py-6 bg-gray-100 text-blue rounded-lg border border-gray-200  tracking-wide  cursor-pointer ">
                        <svg width="30" height="27" viewBox="0 0 30 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.38051 18.6862C-1.61949 19.6862 -0.619495 8.6862 7.38051 9.6862C4.38051 -1.3138 21.3805 -1.3138 20.3805 6.6862C30.3805 3.6862 30.3805 19.6862 21.3805 18.6862M9.38051 14.6862L14.3805 10.6862M14.3805 10.6862L19.3805 14.6862M14.3805 10.6862V25.6862" stroke="#111111" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span class="mt-2 text-base font-medium leading-normal">Upload</span>
                        <input type='file' name="fuse_board[]" class="hidden" onchange="handleFileInputChange(event, 'upload-section-3')" multiple required />
                    </label>
                    <div id="upload-section-3-preview" class="flex gap-2"></div>
                </div>
            </div>
            <div class="border rounded-lg bg-gray-50 p-4">
                <div class="font-medium md:text-xl text-base">{{ __('Electric Meter') }} <span class="text-red-600">*</span>
                </div>
                <div class="flex gap-5  rounded bg-grey-50 mt-2">
                    <label class="w-64 flex justify-center gap-2 items-center px-4 py-6 bg-gray-100 text-blue rounded-lg border border-gray-200  tracking-wide  cursor-pointer ">
                        <svg width="30" height="27" viewBox="0 0 30 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.38051 18.6862C-1.61949 19.6862 -0.619495 8.6862 7.38051 9.6862C4.38051 -1.3138 21.3805 -1.3138 20.3805 6.6862C30.3805 3.6862 30.3805 19.6862 21.3805 18.6862M9.38051 14.6862L14.3805 10.6862M14.3805 10.6862L19.3805 14.6862M14.3805 10.6862V25.6862" stroke="#111111" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span class="mt-2 text-base font-medium leading-normal">Upload</span>
                        <input type='file' name="electric_meter[]" class="hidden" onchange="handleFileInputChange(event, 'upload-section-4')" multiple required />
                    </label>
                    <div id="upload-section-4-preview" class="flex gap-2"></div>
                </div>
            </div>
            <div class="border rounded-lg bg-gray-50 p-4">
                <div class="font-medium md:text-xl text-base">Inside of Attic </div>
                <div class="flex gap-5  rounded bg-grey-50 mt-2">
                    <label class="w-64 flex justify-center gap-2 items-center px-4 py-6 bg-gray-100 text-blue rounded-lg border border-gray-200  tracking-wide  cursor-pointer ">
                        <svg width="30" height="27" viewBox="0 0 30 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.38051 18.6862C-1.61949 19.6862 -0.619495 8.6862 7.38051 9.6862C4.38051 -1.3138 21.3805 -1.3138 20.3805 6.6862C30.3805 3.6862 30.3805 19.6862 21.3805 18.6862M9.38051 14.6862L14.3805 10.6862M14.3805 10.6862L19.3805 14.6862M14.3805 10.6862V25.6862" stroke="#111111" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span class="mt-2 text-base font-medium leading-normal">Upload</span>
                        <input type='file' name="inside_of_attic[]" class="hidden" onchange="handleFileInputChange(event, 'upload-section-5')" multiple />
                    </label>
                    <div id="upload-section-5-preview" class="flex gap-2"></div>
                </div>
            </div>
            <div class="border rounded-lg bg-gray-50 p-4">
                <div class="font-medium md:text-xl text-base">Prefered position for battery & Inverter <span class="text-red-600">*</span> </div>
                <div class="flex gap-5  rounded bg-grey-50 mt-2">
                    <label class="w-64 flex justify-center gap-2 items-center px-4 py-6 bg-gray-100 text-blue rounded-lg border border-gray-200  tracking-wide  cursor-pointer ">
                        <svg width="30" height="27" viewBox="0 0 30 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.38051 18.6862C-1.61949 19.6862 -0.619495 8.6862 7.38051 9.6862C4.38051 -1.3138 21.3805 -1.3138 20.3805 6.6862C30.3805 3.6862 30.3805 19.6862 21.3805 18.6862M9.38051 14.6862L14.3805 10.6862M14.3805 10.6862L19.3805 14.6862M14.3805 10.6862V25.6862" stroke="#111111" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span class="mt-2 text-base font-medium leading-normal">Upload</span>
                        <input type='file' name="battery_and_inverter_position[]" class="hidden" onchange="handleFileInputChange(event, 'upload-section-6')" multiple required />
                    </label>
                    <div id="upload-section-6-preview" class="flex gap-2"></div>
                </div>
            </div>
            <div class="border rounded-lg bg-gray-50 p-4">
                <div class="font-medium md:text-xl text-base">Last 3 Months Electricity Bill </div>
                <div class="flex gap-5  rounded bg-grey-50 mt-2">
                    <label class="w-64 flex justify-center gap-2 items-center px-4 py-6 bg-gray-100 text-blue rounded-lg border border-gray-200  tracking-wide  cursor-pointer ">
                        <svg width="30" height="27" viewBox="0 0 30 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.38051 18.6862C-1.61949 19.6862 -0.619495 8.6862 7.38051 9.6862C4.38051 -1.3138 21.3805 -1.3138 20.3805 6.6862C30.3805 3.6862 30.3805 19.6862 21.3805 18.6862M9.38051 14.6862L14.3805 10.6862M14.3805 10.6862L19.3805 14.6862M14.3805 10.6862V25.6862" stroke="#111111" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span class="mt-2 text-base font-medium leading-normal">Upload</span>
                        <input type='file' name="electricity_bills[]" class="hidden" onchange="handleFileInputChange(event, 'upload-section-7')" multiple />
                    </label>
                    <div id="upload-section-7-preview" class="flex gap-2"></div>
                </div>
            </div>
            <div class="border rounded-lg bg-gray-50 p-4">
                <div class="font-medium md:text-xl text-base">Any other images that will help us out</div>
                <div class="flex gap-5  rounded bg-grey-50 mt-2">
                    <label class="w-64 flex justify-center gap-2 items-center px-4 py-6 bg-gray-100 text-blue rounded-lg border border-gray-200  tracking-wide  cursor-pointer ">
                        <svg width="30" height="27" viewBox="0 0 30 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.38051 18.6862C-1.61949 19.6862 -0.619495 8.6862 7.38051 9.6862C4.38051 -1.3138 21.3805 -1.3138 20.3805 6.6862C30.3805 3.6862 30.3805 19.6862 21.3805 18.6862M9.38051 14.6862L14.3805 10.6862M14.3805 10.6862L19.3805 14.6862M14.3805 10.6862V25.6862" stroke="#111111" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span class="mt-2 text-base font-medium leading-normal">Upload</span>
                        <input type='file' name="additional_images[]" class="hidden" onchange="handleFileInputChange(event, 'upload-section-8')" multiple />
                    </label>

                    <div id="upload-section-8-preview" class="flex gap-2"></div>
                </div>
            </div>
        </div>
        <div class="gap-4 mt-4 flex justify-end">
            <a href="{{ route('customer.myOrders') }}">
                <x-secondary-button class=" text-center text-green-600 border-green-600 font-medium text-xl mt-4 px-6 md:mt-0 py-3 ">
                    {{ __('Cancel') }}
                </x-secondary-button>
            </a>
            <x-primary-button class="w-52 md:ml-2 text-xl mt-4 md:mt-0 py-3 text-center" onclick="submitFormHandler(event)">
                {{ __('Submit') }}
            </x-primary-button>

        </div>
    </form>

</section>
@endsection

@push('scripts')
<style>
    .uploaded-image {
        width: 9rem;
        /* Adjust width as needed */
        height: 100px;
        /* Adjust height as needed */
        object-fit: cover;
        border: 1px solid #ccc;
        /* Optional border */
        position: relative;
    }

    .remove-icon {
        position: absolute;
        top: 5px;
        right: 5px;
        cursor: pointer;
        font-size: 18px;
        color: red;
    }

</style>
<script type="text/javascript">
    // Add event listeners for file input changes
    const uploadSections = document.querySelectorAll("[name^='file']");
    uploadSections.forEach((section, index) => {
        section.addEventListener("change", (event) => {
            handleFileInputChange(event, `upload-section-${index}`);
        });
    });

    // Function to handle file input change
    function handleFileInputChange(event, sectionId) {
        const input = event.target;
        const files = input.files;
        const preview = document.getElementById(`${sectionId}-preview`);
        const maxFileSize = 10 * 1024 * 1024; //Max Size of Image 10MB
        const maxImagesToShow = 2;
        let imagesAdded = 0;

        while (preview.firstChild) {
            preview.removeChild(preview.firstChild);
        }

        if (files) {
            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                if (file.size > maxFileSize) {
                    alert('Please select images smaller than 10 MB.');
                    continue;
                }
                if (imagesAdded >= maxImagesToShow) {
                    break; // Break loop if maximum images added
                }
                const reader = new FileReader();

                reader.onload = function(e) {
                    const imageContainer = document.createElement("div");
                    imageContainer.classList.add("relative");
                    const image = document.createElement("img");
                    image.src = e.target.result;
                    image.classList.add("uploaded-image");
                    imageContainer.appendChild(image);
                    const removeButton = createRemoveButton(imageContainer);
                    imageContainer.appendChild(removeButton);

                    preview.appendChild(imageContainer);
                };

                reader.readAsDataURL(file);
                imagesAdded++;
            }
        }
    }

    // Function to create remove button for images
    function createRemoveButton(imageContainer) {
        const removeIcon = document.createElement("svg");
        removeIcon.classList.add("remove-icon");
        removeIcon.setAttribute("width", "23");
        removeIcon.setAttribute("height", "24");
        removeIcon.setAttribute("viewBox", "0 0 23 24");
        removeIcon.innerHTML =
            `<svg class="absolute right-0" width="23" height="24" viewBox="0 0 23 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect y="0.0166016" width="23" height="23" rx="11.5" fill="black"
                                fill-opacity="0.65" />
                            <path
                                d="M6.68826 17.2666C6.9371 17.2666 7.17575 17.1678 7.35171 16.9918L16.9752 7.36831C17.1511 7.19235 17.25 6.9537 17.25 6.70486C17.25 6.45602 17.1511 6.21737 16.9752 6.04141C16.7992 5.86545 16.5606 5.7666 16.3117 5.7666C16.0629 5.7666 15.8242 5.86545 15.6483 6.04141L6.02481 15.6649C5.84885 15.8409 5.75 16.0795 5.75 16.3283C5.75 16.5772 5.84885 16.8158 6.02481 16.9918C6.20077 17.1678 6.43942 17.2666 6.68826 17.2666Z"
                                fill="white" stroke="white" stroke-width="0.5" />
                            <path
                                d="M5.82142 7.06392C5.86857 7.17775 5.93768 7.28119 6.02481 7.36831L15.6483 16.9918C15.8243 17.1678 16.0629 17.2666 16.3117 17.2666C16.5606 17.2666 16.7992 17.1678 16.9752 16.9918C17.1511 16.8158 17.25 16.5772 17.25 16.3283C17.25 16.0795 17.1511 15.8409 16.9752 15.6649L7.35171 6.04141C7.26458 5.95429 7.16115 5.88517 7.04732 5.83802C6.93348 5.79087 6.81147 5.7666 6.68826 5.7666C6.56505 5.7666 6.44304 5.79087 6.3292 5.83802C6.21537 5.88517 6.11194 5.95429 6.02481 6.04141C5.93768 6.12854 5.86857 6.23197 5.82142 6.3458C5.77427 6.45964 5.75 6.58165 5.75 6.70486C5.75 6.82808 5.77427 6.95008 5.82142 7.06392Z"
                                fill="white" stroke="white" stroke-width="0.5" />
                        </svg>`;
        removeIcon.addEventListener("click", () => {
            imageContainer.remove();
        });
        return removeIcon;
    }

    //Function to submit form and check validation
    function submitFormHandler(event) {
        event.preventDefault();
        const form = document.getElementById('pendingDocumentForm');
        const requiredFields = ['front_of_the_house[]', 'back_of_the_house[]', 'side_of_the_house[]'
            , 'electric_meter[]'
            , 'fuse_board[]', 'battery_and_inverter_position[]'
        ];
        // Iterate through required fields and check validity
        let isValid = true;
        requiredFields.forEach(fieldName => {
            const field = form.elements[fieldName];
            if (field && !field.checkValidity()) {
                isValid = false;
            }
        });

        if (isValid) {
            // If all required fields are valid, submit the form
            form.submit();
        } else {
            alert('Please fill out all required fields correctly.');
        }

    }

</script>
@endpush
