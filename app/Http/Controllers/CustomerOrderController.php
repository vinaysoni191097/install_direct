<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CustomerOrderController extends Controller
{
    public function index(Order $order)
    {
        try {
                $user = Auth::user();

                return view('customer.orders.order', [
                    'user' => $user,
                    'orders' => $order->where('user_id', Auth::id())->latest()->get(),
                    'cartProducts' => Cart::where('user_id', Auth::id())->get(),
                ]);
        } catch (Exception $e) {

            Log::info('error while accessing order page' . $e);

            return to_route('customer.account.profile');
        }
    }

    public function view(Order $order)
    {
        try {
            return view('customer.orders.order-detail', [
                'order' => $order,
                'user' => Auth::user(),
            ]);
        } catch (Exception $e) {
            Log::info('Error while accessing order details page' . $e);

            return back()->with('errors', 'Something went wrong. Unable to fetch order details page');
        }
    }
}
