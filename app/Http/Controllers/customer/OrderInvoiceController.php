<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Support\Facades\Log;

class OrderInvoiceController extends Controller
{
    public function view(Order $order)
    {
        try {
            $response = $this->authorize('view', $order);
            if ($response) {
                $pdf = Pdf::loadView('customer.orders.invoice', ['order' => $order]);
                $pdfName = 'Invoice_' . $order->order_number . '.pdf';

                return $pdf->download($pdfName);
            }

            return back()->with('error', 'You are not authorized to download other order invoice');
        } catch (Exception $e) {
            Log::info('Error while downloading order invoice' . $e);

            return back()->with('error', 'Something went wrong. Unable to download invoice.');
        }
    }
}
