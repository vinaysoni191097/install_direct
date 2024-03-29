<?php

namespace App\Http\Controllers;

use App\Services\PaymentService;
use App\Services\PlaceOrderService;
use App\Services\PlaceOrderServiceException;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PlaceOrderController extends Controller
{
    public function __construct(
        public PlaceOrderService $placeOrderService,
        public PaymentService $paymentService,
    ) {
    }

    public function store(Request $request)
    {
        try {
            $billingAddressId = $this->placeOrderService->billingAddressCheck($request);
            if (!$billingAddressId[0]) {
                return back()->with('error', 'Please add billing address first to proceed further!');
            }
            // $customerId = $this->paymentService->createCustomer();

            // if (!$customerId && $request->save_card) {
            //     $this->paymentService->savePaymentMethod($billingAddressId['billingId'], $request);
            // }
            // $paymentCompleted = $this->paymentService->createPaymentIntent($billingAddressId['billingId'], $request);
            // if ($paymentCompleted) {
            //     $this->placeOrderService->createOrder($billingAddressId['billingId']);
            //     return view('pages.reservation-confirmed');
            // }
            $this->placeOrderService->createOrder($billingAddressId['billingId']);

            return view('pages.reservation-confirmed');
            // return back()->with('error', 'Something went wrong. Unable to complete order. Please try again later');
        } catch (PlaceOrderServiceException $e) {
            return redirect()->back()->with('error', 'Ops! Something went wrong. Unable to complete order. Please try again later');
        }
    }
}
