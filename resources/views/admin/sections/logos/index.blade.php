@extends('admin.partials.main')
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">{{ __('Manage Partner Logo Section') }}</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
                    <li class="breadcrumb-item active">{{ 'Logo Section' }}</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div>
    <div class="card">
        <div class="card-body">

            <div class="table-responsive">
                <div class="flex justify-content-end gap-4">
                    <a href="{{ route('admin.logo.create') }}">
                        <button type="button" class="rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 mb-3">
                            {{__('Add Partner Logos')}}
                        </button>
                    </a>
                </div>
                {{-- @if ($faqs->isNotEmpty()) --}}
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="font-bold text-black">{{__('S No.')}}</th>
                            <th class="font-bold text-black">{{__('Logo')}}</th>
                            <th class="font-bold text-black">{{__('Partner name')}}</th>
                            <th class="font-bold text-black">{{__('Status')}}</th>
                            <th class="font-bold text-black">{{__('Created')}}</th>
                            <th class="font-bold text-black">{{__('Actions')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($logos as $key => $logo )
                        <tr x-data="statusHandler({{ $key }})" >
                            <td>{{ $key + $logos->firstItem() }}</td>
                            <td>
                                @if ($logo->featured_image_id)
                                <img class="inline-block w-16 h-16 rounded-full" src="{{ asset('storage/' . $logo->partnerLogo->path) }}" name="product_image" value="{{ $logo->featured_image_id }}" id="profile-image" alt="">
                                @else
                                <img class="inline-block w-16 h-16 rounded-full" src="{{ asset('images/no-image.png') }}" alt="">
                                @endif
                            </td>
                            <td>{{$logo->partner_name}}</td>

                            <td>
                                <div>
                                    <button class="flex items-center transition ease-in-out duration-300 w-10 h-4 bg-gray-200 rounded-full focus:outline-none" x-bind:class="{ 'bg-green-500': {{ $logo->isActivated ? 'true' : 'false' }} }" @click.prevent="showModal({{ $logo->status }})">
                                        <div class="transition ease-in-out duration-300 rounded-full h-5 w-5 bg-white shadow border" x-bind:class="{ 'transform translate-x-full': {{ $logo->isActivated ? 'true' : 'false' }} }">
                                        </div>
                                    </button>

                                    <x-status-confirmation title="{{ $logo->isActivated ? 'De-activate Partner Logo' : 'Activate Partner Logo' }}" routename="{{ route('admin.logo.update.status', $logo) }}" />
                                </div>
                            </td>
                            <td>{{$logo->created_at->format('H D Y')}}</td>
                            <td>
                                <div class="flex gap-2 items-center">
                                    <a href="{{route('admin.logo.edit', $logo)}}">
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="#16a34a" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1">
                                            </path>
                                            <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z">
                                            </path>
                                            <path d="M16 5l3 3"></path>
                                        </svg>
                                        <title>Edit</title>
                                    </a>
                                    {{-- Delete Confirmation Modal  --}}
                                    <x-delete-confirmation-modal :values="$logo" :message="'Are you sure you want to remove this logo ?'" routename="{{ route('admin.logo.delete', $logo->slug) }}" />

                                </div>
                            </td>
                        </tr>
                        @empty
                        <x-no-record-found />
                        @endforelse

                    </tbody>
                </table>
                {{-- @endif --}}
            </div>

        </div>

    </div>
</div>
@endsection
@push('scripts')
<script>
    function statusHandler(index) {
        return {
            deActivate: false
            , showConfirmation: false
            , buttonMessage: 'Activate'
            , newStatusValue: 1
            , showModal: function(statusValue) {
                this.active = !this.active;
                this.showConfirmation = true;
                if (statusValue == 1) {
                    this.buttonMessage = "Deactivate";
                    this.deActivate = true;
                    this.newStatusValue = 0;
                }

            }
            , exitModalHandler: function() {
                this.showConfirmation = false;
            }
        }
    }

</script>
@endpush
