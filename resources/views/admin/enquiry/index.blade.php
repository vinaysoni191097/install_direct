@extends('admin.partials.main')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">{{ __('All Enquiries') }}</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item active">{{ 'All Enquiries' }}</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ __('Enquiries') }}</h4>
                <div class="table-responsive">
                    <table class="table table-hover mb-0 ">

                        <thead class="table-light">
                            <tr>
                                <th>{{ __('SNo.') }}</th>
                                <th>{{ __('User') }}</th>
                                <th>{{ __('Date') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($enquiries as $key => $enquiry)
                                <tr>
                                    <td>{{ $key + $enquiries->firstItem() }}</td>
                                    <td>
                                        <span class="font-semibold block">{{ $enquiry->userData->name ?? 'N/A' }}</span>
                                        <span>{{ $enquiry->userData->email ?? 'N/A' }}</span>
                                    </td>
                                    <td>{{ $enquiry->created_at->format('d M y / (h:i a)') }}</td>
                                    <td>
                                        <div class="space-x-2 cursor-pointer">
                                            <a href="{{ route('admin.enquiry.view', $enquiry) }}" class="inline-block">
                                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor">
                                                    <path fill="none" stroke="currentColor" stroke-width="2"
                                                        d="M12,21 C7,21 1,16 1,12 C1,8 7,3 12,3 C17,3 23,8 23,12 C23,16 17,21 12,21 Z M12,7 C9.23875,7 7,9.23875 7,12 C7,14.76125 9.23875,17 12,17 C14.76125,17 17,14.76125 17,12 C17,9.23875 14.76125,7 12,7 L12,7 Z">
                                                    </path>
                                                    <title>{{ __('View') }}</title>
                                                </svg>
                                            </a>
                                            {{-- <a href="">
                                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" viewBox="0 0 24 24" fill="none" stroke="#252b3b"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                    </path>
                                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                    </path>
                                                    <title>{{ __('Edit') }}</title>
                                                </svg>
                                            </a> --}}

                                            {{-- Delete Confirmation Modal  --}}
                                            <x-delete-confirmation-modal :values="$enquiry" :message="'Are you sure you want to remove this enquiry ?'"
                                                routename="{{ route('admin.enquiry.delete', $enquiry->slug) }}" />
                                        </div>

                                    </td>
                                </tr>
                            @empty
                            <x-no-record-found />


                            @endforelse
                        </tbody>

                    </table>
                </div>
                
            </div>
            {{ $enquiries->links() }}
        </div>
    </div>
@endsection
