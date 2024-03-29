<?php

namespace App\Http\Controllers\admin;

use App\Enum\OrderStatus;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderAssign;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function index()
    {
        try {
            return view('admin.orders.index', [
                'orders' => Order::latest()->paginate(10),
                'status' => OrderStatus::allStatus(),
            ]);
        } catch (Exception $e) {
            Log::info('error while accessing orders listing page'.$e->getMessage());

            return back()->with('error', 'Unable to list orders');
        }
    }

    public function view(Order $order)
    {
        try {
            return view('admin.orders.view', [
                'order' => $order,
            ]);
        } catch (Exception $e) {
            Log::info('Error while listing order details page'.$e);

            return back()->with('error', 'Something went wrong. Unable to view order details');
        }
    }

    public function status(Request $request, Order $order)
    {
        try {
            $order->update([
                'status' => $request->status,
            ]);
            if ($request->status != OrderStatus::IN_PROGRESS && $order->orderAssigned) {
                $technician = User::findOrFail($order->assigned_technician);
                $technician->technicianData->update([
                    'availability' => true,
                ]);
                $order->orderAssigned->delete();
            }

            return back()->with('success', 'Order status changed successfully!');
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong.Unable to change order status');
        }
    }

    public function orderDetailsPdf(Order $order)
    {
        try {
            $pdf = Pdf::loadView('admin.orders.order-details-pdf', [
                'order' => $order,
            ]);
            $pdfName = 'OrderDetails_'.$order->order_number.'.pdf';

            return $pdf->download($pdfName);
        } catch (Exception $e) {
            Log::info('Error while downloading order Details'.$e);

            return back()->with('error', 'Something went wrong. Unable to download PDF.');
        }
    }

    public function assignOrder()
    {
        try {
            return view('admin.orders.assignOrder', [
                'orders' => Order::latest()->paginate(10),
                'technicians' => User::availableTechnicians()->get(),
                // 'assignedTechnician' => OrderAssign::get()
            ]);
        } catch (Exception $e) {
            Log::info('Error while access order assignment page'.$e);

            return back()->with('error', 'Something went wrong. Please try after sometime');
        }
    }

    public function assignOrderStatus(Request $request, Order $order)
    {
        try {
            DB::transaction(function () use ($order, $request) {
                OrderAssign::create([
                    'order_id' => $order->id,
                    'technician_id' => $request->technician,
                ]);
                $technician = User::findOrFail($request->technician);
                $technician->technicianData->update([
                    'availability' => false,
                ]);
                $order->update([
                    'status' => OrderStatus::IN_PROGRESS['value'],
                ]);
            });

            return back()->with('sucess', 'Order assigned to technician successfully');
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong. Unable to assign order to technician');
        }
    }

    public function delete(Order $order)
    {
        try {
            $order->delete();

            return back()->with('success', 'User Order Removed successfully');
        } catch (\Exception $e) {
            Log::info('Error while removing user order'.$e);

            return back()->with('error', 'Something went wrong. Unable to remove data');
        }
    }
}
