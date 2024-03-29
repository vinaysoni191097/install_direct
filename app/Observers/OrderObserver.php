<?php

namespace App\Observers;

use App\Models\Cart;
use App\Models\InstallationAddress;
use App\Models\Order;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class OrderObserver
{
    /**
     * Handle the Order "created" event.
     */
    public function created(Order $order): void
    {
        try {
            Cart::where('user_id', Auth::id())->delete();
            InstallationAddress::where('user_id', Auth::id())->delete();
            session()->forget([
                'zip',
                'ownership',
                'members',
                'powerConsumption',
                'electricityRate',
                'dayRate',
                'nightRate',
                'solarInstallation',
                'latitude',
                'longitude',
                'location',
                'totalArea',
                'rooftopCordinates'
            ]);
        } catch (Exception $e) {
            Log::info('Error while removing cart products from table' . $e);
        }
    }

    /**
     * Handle the Order "updated" event.
     */
    public function updated(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "deleted" event.
     */
    public function deleted(Order $order): void
    {
        try {
            $order->orderItems->delete();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Handle the Order "restored" event.
     */
    public function restored(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "force deleted" event.
     */
    public function forceDeleted(Order $order): void
    {
        //
    }
}
