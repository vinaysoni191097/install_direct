<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use App\Models\Order;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        try {

            if (Auth::user()->is_admin) {
                return view('admin.dashboard', [
                    'users' => User::isUser()->get()->count(),
                    'technicians' => User::isTechnician()->get()->count(),
                    'orders' => Order::get()->count(),
                    'enquiries' => Enquiry::get()->count(),
                ]);
            }

            return to_route('home');
        } catch (Exception $e) {
            Log::info('Error while accessing dashboard'.$e);

            return back();
        }
    }
}
