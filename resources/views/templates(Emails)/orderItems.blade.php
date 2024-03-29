    @foreach ($order->orderItems as $key => $item)
        <p style="font-weight: 600" ;>
            <span>{{ $loop->iteration }}.</span>
            <span>{{ $item->product_name }}</span>{{ __(' *') }}
            <span>{{ $item->quantity }}</span> {{ __('=') }}
            <span> £ {{ number_format($item->price, 2) }}</span>
        </p>
    @endforeach
