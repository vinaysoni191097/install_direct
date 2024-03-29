@extends('admin.partials.main')
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">{{ __('Technicians') }}</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
                    <li class="breadcrumb-item active">{{ 'All technicians' }}</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ __('All Technicians') }}</h4>
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <div class="flex justify-content-end gap-4">
                        <a href="{{ route('admin.technician.create') }}">
                            <button type="button" class="rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 mb-3">
                                {{ 'Add Technician' }}
                            </button>
                        </a>
                    </div>
                    <thead class="table-light">
                        <tr>
                            <th>{{ __('SNo.') }}</th>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Email') }}</th>
                            <th>{{ __('Phone Number') }}</th>
                            <th>{{ __('Assigned Order') }}</th>
                            <th>{{ __('Availability Status') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($technicians->count() > 0)
                        @foreach ($technicians as $key => $technician)
                        <tr>
                            <th> {{ $key + $technicians->firstItem() }}</th>
                            <td>{{ $technician->name }}</td>
                            <td>{{ $technician->email }}</td>
                            <td>{{ $technician->phone_number }}</td>
                            <td>NA</td>
                            <td>{!! $technician->availability_status !!}</td>
                            <td class="flex space-x-2">
                                <a href="{{ route('admin.technician.view', $technician) }}" class="inline-block">
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#16a34a" aria-hidden="true">
                                        <path d="M12 15a3 3 0 100-6 3 3 0 000 6z"></path>
                                        <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd"></path>
                                        <title>{{ __('View') }}</title>
                                    </svg>
                                </a>

                                <a href="{{ route('admin.technician.edit', $technician) }}">
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="#16a34a" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1">
                                        </path>
                                        <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z">
                                        </path>
                                        <path d="M16 5l3 3"></path>
                                    </svg>
                                </a>
                                {{-- Delete Confirmation Modal  --}}
                                @if ($technician->order_assigned_status)
                                <x-delete-confirmation-modal :values="$technician" :message="'Are you sure you want to remove this technician ?'" routename="{{ route('admin.technician.delete', $technician->slug) }}" />
                                @else
                                <button type="button" disabled class=" cursor-not-allowed">
                                    <svg class="w-5 h-5 " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentcolor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0">
                                        </path>
                                        <title>{{ __("Can't delete technician. Order is assigned") }}</title>
                                    </svg>
                                </button>
                                @endif

                            </td>
                        </tr>
                        @endforeach
                        @else
                        <x-no-record-found />
                        @endif
                    </tbody>
                </table>
            </div>

        </div>
        {{ $technicians->links() }}
    </div>
</div>
@endsection
