<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Install Direct') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <!-- Scripts -->
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default" defer></script>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/form-validate.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>

</head>

<body class="antialiased">
    <main>
        <section class="m-auto" style="padding-bottom:200px">

            <div>
                <div style=" border-radius: 6px; padding: 10px; display: table; width: 100%;">
                    <div style="display:table-row;">
                        <img style="width: 100%; height: 5% ; object-fit: cover ; object-position: center"
                            src="http://installdirect.test/images/small-logo.png" alt="">
                        <div style="display: table-cell; vertical-align: top; width: 55%; padding: 0px 20px" width="60%">
                            <div class="min-w-0 flex-1">
                                <div>www.installsdirect.co.uk</div>
                                <div>Example@example.com</div>
                                <div>+91 00000 00000</div>
                            </div>
                        </div>
                        <div style="display: table-cell; vertical-align: top; width: 30%; " width="20%"
                            align="right">
                            <div>Business address</div>
                            <div>City, State, IN - 000 000</div>
                            <div>TAX ID 00XXXXX1234X0XX</div>
                        </div>
                    </div>
                </div>

                <div style="background-color: #ffffff;padding: 20px; border-radius: 6px; border:1px solid #dddddd">
                    <table style="width: 100%;">
                        <tr>
                            <td style="width: 40%;">
                                <p>Billed to </p>
                                <p style="font-weight: 600;">{{ $order->billing_name }}</p>
                                <p>{{ $order->billing_address }}</p>
                                <p>{{ $order->customerDetails->phone_number }}</p>
                            </td>
                            <td style="width: 20%;">
                                <p>Invoice number</p>
                                <p style="font-weight: 600;">#{{ $order->order_number }}</p>
                            </td>
                            <td style="width: 40%;" align="right">
                                <p>Due Amount</p>
                                <p style="font-size: 22px; font-weight: bold; color:#1c9b1c">£
                                    {{ $order->payable_amount }}</p>
                            </td>
                        </tr>
                    </table>

                    <table style="width: 100%; margin-top: 10px;">
                        <tbody>
                            <tr>
                                <td style="width: 40%;">
                                    <p>Subject</p>
                                    <p style="font-weight: 600;">Solar Panels Installation</p>
                                </td>
                                <td style="width: 20%;">
                                    <p>Invoice date</p>
                                    <p style="font-weight: 600;">{{ $order->created_at->format(' M d ,  Y') }}</p>
                                </td>
                                {{-- <td style="width: 40%;" align="right">
                                <p>Due date</p>
                                <p style="font-weight: 600;">15 Aug, 2023</p>
                            </td> --}}
                            </tr>
                        </tbody>

                    </table>


                    <table style="width: 100%; margin-top: 20px;">
                        <thead style="border-top: 1px solid #ccc; border-bottom: 1px solid #ccc; padding: 10px 0;">
                            <tr>
                                <th style="padding: 5px;" align="left">Item Detail</th>
                                <th style="padding: 5px;" align="left">Qty</th>
                                <th style="padding: 5px;" align="left">Rate</th>
                                <th style="padding: 5px;" align="right">Amount</th>

                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($order->orderItems as $item)
                                <tr>
                                    <td style="width: 55%; padding: 10px">
                                        <p style="font-weight: 600" ;>{{ $item->product_name }} </p>
                                    </td>
                                    <td style="width: 15%; padding: 10px;">{{ $item->quantity }}</td>
                                    <td style="width: 15%;">£ {{ number_format($item->price, 2) }}</td>
                                    <td align="right" style="width: 15%;">£ {{ number_format($item->quantity * $item->price,2)}}
                                    </td>
                                </tr>
                            @endforeach



                        </tbody>
                        <tfoot style="border-top:1px solid #ccc">
                            <tr>
                                <th scope="row" align="right" style="font-weight: 500; padding-top: 20px;"
                                    colspan="3" style="align-items: right;">
                                    Subtotal
                                </th>

                                <td style="padding: 5px;" align="right">
                                    £ {{ $order->total_amount }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="row" align="right" style="font-weight: 500;" colspan="3">
                                    Booking Amount
                                </th>

                                <td style="padding: 5px;" align="right">
                                    - £ {{ number_format($order->booking_amount, 2) }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="row" style="font-weight: 500;" colspan="3" align="right">
                                    Due Amount
                                </th>

                                <td style="padding: 5px;" align="right">
                                    £ {{ $order->payable_amount }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="row" colspan="3" align="right">
                                    Total
                                </th>

                                <td style="padding: 5px; font-weight: 600;" align="right">
                                    £ {{ $order->payable_amount }}
                                </td>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>

        </section>
    </main>
</body>

</html>
