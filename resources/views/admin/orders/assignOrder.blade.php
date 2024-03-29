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
                            <th>{{ __('Customer Details') }}</th>
                            <th>{{ __('Order Status') }}</th>
                            <th>{{ __('Assign Status') }}</th>
                            <th>{{ __('Order Date') }}</th>
                            <th>{{ __('Technician Assigned On') }}</th>
                            <th>{{ __('Assigned To') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $key => $order)
                            <tr>
                                <td>{{ $key + $orders->firstItem() }}</td>
                                <td>
                                    <a href="{{ route('admin.order.details', $order) }}">
                                        <div class="ms-2">
                                            <h6 class="mb-0 font-14">#O-{{ $order->order_number }}</h6>
                                        </div>
                                    </a>
                                </td>
                                <td>
                                    {{ $order->customerDetails->name }}
                                    <p class="font-semibold">{{ $order->customerDetails->email }}</p>
                                </td>
                                <td>
                                    <div class="text-xs py-1"> {!! $order->order_status !!}</div>
                                </td>
                                <td>
                                    <div class="text-xs py-1"> {!! $order->technician_order_status !!}</div>
                                </td>
                                <td>{{ $order->created_at->format('d M Y') }}</td>
                                <td>
                                    @if ($order->orderAssigned)
                                        {{ $order->orderAssigned->created_at->format('d M Y') }}
                                    @else
                                    {!! $order->technician_order_status !!}
                                    @endif
                                </td>
                                <td>
                                    @if ($order->orderAssigned)
                                        {{ $order->orderAssigned->technicianDetails->name }}
                                    @else
                                        N/A
                                    @endif
                                </td>

                                <td>
                                    <div class="inline-flex items-center gap-2">
                                        <form action="{{ route('admin.assignOrder.status', $order->order_number) }}"
                                            method="post" id="statusForm-{{ $order->id }}">
                                            @csrf
                                            <select required name="technician"
                                                class="{{ $order->status === $order->work_in_progress ? 'cursor-not-allowed' : 'bg-white' }}"
                                                {{ $order->status === $order->work_in_progress ? 'disabled' : '' }}
                                                onchange="changeOrderStatus({{ $order->id }})"
                                                class="text-gray-900 bg-white py-2 transition-all cursor-pointer rounded-lg border-white">
                                                <option value="" disabled selected>Select Technician</option>
                                                @foreach ($technicians as $technician)
                                                    <option value="{{ $technician->id }}">{{ $technician->name }}</option>
                                                @endforeach
                                            </select>
                                        </form>

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
