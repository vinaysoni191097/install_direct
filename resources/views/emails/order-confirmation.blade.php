<table style="width: 100%; margin-top: 20px;">
    <thead
        style="border-top: 1px solid #ccc; border-bottom: 1px solid #ccc; padding: 10px 0;">
        <tr>
            <th style="padding: 5px; color: #000;" align="left">S No.</th>
            <th style="padding: 5px; color: #000;" align="left">Product Name</th>
            <th style="padding: 5px; color: #000;" align="left">Qty</th>
            <th style="padding: 5px; color: #000;" align="left">price</th>
            <th style="padding: 5px; color: #000;" align="right">Total Price</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($order->orderItems as $key => $item)
            <tr>
                <td style="width: 20%; padding: 5px">
                    <p style="font-weight: 600" ;>{{ $loop->iteration }} </p>
                </td>
                <td style="width: 35%; padding: 5px; color: #000;">
                    {{ $item->product_name }}
                </td>
                <td style="width: 15%; color: #000; padding: 5px;">
                    {{ $item->quantity }}</td>
                <td align="right" style="width: 15%; color: #000;">
                    £ {{ number_format($item->price, 2) }}
                </td>
                <td align="right" style="width: 15%; color: #000;">
                    £ {{ number_format($item->quantity * $item->price, 2) }}
                </td>
            </tr>
        @endforeach

    </tbody>
    <tfoot style="border-top:1px solid #ccc">
        <tr>
            <th scope="row" align="right" style="font-weight: 600; color: #000;"
                colspan="4" style="align-items: right;">
                <p style="color: #000;">Subtotal:</p>
            </th>

            <td style="color: #000;" align="right">
                £ {{ $order->total_amount }}
            </td>
        </tr>
        <tr>
            <th scope="row" align="right" style="font-weight: 500; color: #000;"
                colspan="4">
                Booking Amount:
            </th>

            <td style="padding: 5px; color: #000;" align="right">
                - £ {{ number_format($order->booking_amount, 2) }}
            </td>
        </tr>
        <tr>
            <th scope="row" style="font-weight: 500; color: #000;" colspan="4"
                align="right">
                Due Amount:
            </th>

            <td style="padding: 5px; color: #000;" align="right">
                £ {{ $order->payable_amount }}
            </td>
        </tr>
        <tr>
            <th scope="row" style="color: #000;" colspan="4" align="right">
                Total:
            </th>

            <td style="padding: 5px; font-weight: 600; color: #000;" align="right">
                £ {{ $order->payable_amount }}
            </td>
        </tr>
    </tfoot>
</table>