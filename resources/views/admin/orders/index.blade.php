@extends('admin.partials.main')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">{{ __('All Orders') }}</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item active">{{ 'All Orders' }}</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="card">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table mb-0 table-hover text-center">
                    <thead class="table-light">
                        <tr>
                            <th>{{ __('SNo.') }}</th>
                            <th>{{ __('Order#') }}</th>
                            <th>{{ __('Customer Name') }}</th>
                            <th>{{ __('Current Status') }}</th>
                            <th>{{ __('Technician') }}</th>
                            <th>{{ __('Pending Amount') }}</th>
                            <th>{{ __('Date') }}</th>
                            <th>{{ __('Document Upload Status') }}</th>
                            <th>{{ __('Change Status') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $key => $order)
                            <tr>
                                <td>{{ $key + $orders->firstItem() }}</td>
                                <td>
                                    <div class="ms-2">
                                        <h6 class="mb-0 font-14">#O-{{ $order->order_number }}</h6>
                                    </div>
                                </td>
                                <td>{{ $order->customerDetails->name }}</td>
                                <td>
                                    <div class="text-xs py-1 w-32"> {!! $order->order_status !!}</div>
                                </td>
                                <td>
                                    <div class="text-xs py-1"> {!! $order->technician_order_status !!}</div>
                                </td>
                                <td>£ {{ $order->payable_amount }}</td>
                                <td>{{ $order->created_at->format('d M Y') }}</td>
                                <td>
                                    @if ($order->document_uploaded)
                                        <span
                                            class="bg-green-50  border-green-300 text-green-500 rounded-full px-4 py-1">{{ __('Uploaded') }}</span>
                                    @else
                                        <span
                                            class="bg-orange-50  border-orange-300 text-orange-500 rounded-full px-4 py-1">{{ __('Pending') }}</span>
                                    @endif
                                </td>

                                <td>
                                    <form action="{{ route('admin.order.status', $order->order_number) }}" method="post"
                                        id="statusForm-{{ $order->id }}">
                                        @csrf
                                        <select required name="status" onchange="changeOrderStatus({{ $order->id }})"
                                            class="text-gray-900 bg-white py-2 px-2 transition-all cursor-pointer rounded-lg  border border-black">
                                            <option value="" disabled selected>Change Status</option>
                                            @foreach ($status as $key => $value)
                                                <option value="{{ $value['value'] }}"
                                                    @if ($value['value'] == $order->status) selected @endif>{{ $value['name'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </form>
                                </td>
                                <td>
                                    <div class="inline-flex items-center gap-2">
                                        <a title="View" href="{{ route('admin.order.details', $order) }}">
                                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"
                                                fill="#000">
                                                <defs></defs>
                                                <title>View Details</title>
                                                <path
                                                    d="M30.94,15.66A16.69,16.69,0,0,0,16,5,16.69,16.69,0,0,0,1.06,15.66a1,1,0,0,0,0,.68A16.69,16.69,0,0,0,16,27,16.69,16.69,0,0,0,30.94,16.34,1,1,0,0,0,30.94,15.66ZM16,25c-5.3,0-10.9-3.93-12.93-9C5.1,10.93,10.7,7,16,7s10.9,3.93,12.93,9C26.9,21.07,21.3,25,16,25Z"
                                                    transform="translate(0 0)"></path>
                                                <path
                                                    d="M16,10a6,6,0,1,0,6,6A6,6,0,0,0,16,10Zm0,10a4,4,0,1,1,4-4A4,4,0,0,1,16,20Z"
                                                    transform="translate(0 0)"></path>
                                                <rect id="_Transparent_Rectangle_" data-name="<Transparent Rectangle>"
                                                    class="cls-1" width="32" height="32" style="fill:none"></rect>
                                            </svg>
                                        </a>
                                        <a href="{{ route('admin.order.details.download', $order) }}"
                                            class="text-gray-700">
                                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" width="24"
                                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                                <polyline points="7 10 12 15 17 10"></polyline>
                                                <line x1="12" y1="15" x2="12" y2="3"></line>
                                                <title>{{ __('Download Order Details') }}</title>
                                            </svg>
                                        </a>
                                        {{-- Delete Confirmation Modal  --}}
                                        <x-delete-confirmation-modal :values="$order" :message="'Are you sure you want to remove this order ?'"
                                            routename="{{ route('admin.order.delete', $order->order_number) }}" />




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
        {{ $orders->links() }}
    </div>
@endsection

@push('scripts')
    <script>
        function changeOrderStatus(id) {
            const form = document.getElementById(`statusForm-${id}`);
            form.submit();
        }
    </script>
@endpush
