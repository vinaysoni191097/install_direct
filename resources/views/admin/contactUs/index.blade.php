@extends('admin.partials.main')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">{{ __('All Categories') }}</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item active">{{ 'All Categories' }}</li>
                    </ol>
                </div>

            </div>


        </div>
    </div>
    <div x-data="categoryData">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ __('Contact Us Page- Enquiries') }}</h4>
                <div class="table-responsive">
                    <table class="table table-hover mb-0">

                        <thead class="table-light">
                            <tr>
                                <th>{{ __('SNo.') }}</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Email') }}</th>
                                <th>{{ __('Phone') }}</th>
                                <th>{{ __('Address') }}</th>
                                <th>{{ __('Message') }}</th>
                                <th>{{ __('Date') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($enquiries as $key => $enquiry)
                                <tr>
                                    <td> {{ $key + $enquiries->firstItem() }}</td>
                                    <td> {{ $enquiry->full_name }}</td>
                                    <td> {{ $enquiry->email }}</td>
                                    <td> {{ $enquiry->phone ?? 'NA' }}</td>
                                    <td> {{ $enquiry->address }}</td>
                                    <td> {{ $enquiry->message}}</td>
                                    <td> {{ $enquiry->created_at->format('M d Y') }}</td>
                                    <td class="space-x-2">
                                        {{-- Delete Confirmation Modal  --}}
                                        <x-delete-confirmation-modal :values="$enquiry" :message="'Are you sure you want to remove this enquiry ?'"
                                            routename="{{ route('admin.contactUs.enquiry.delete', $enquiry) }}" />
                                    </td>
                                </tr>
                            @empty
                            <x-no-record-found />


                            @endforelse


                        </tbody>
                    </table>
                    <div class="mt-3">
                        {{ $enquiries->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
@endsection

