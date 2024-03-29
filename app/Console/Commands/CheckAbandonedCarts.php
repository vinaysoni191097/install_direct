<?php

namespace App\Console\Commands;

use App\Models\Cart;
use App\Notifications\AbandonedCart48ReminderNotification;
use App\Notifications\AbandonedCartNotification;
use Illuminate\Console\Command;

class CheckAbandonedCarts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-abandoned-carts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        try {
            $abandonedCarts = Cart::get();
            foreach ($abandonedCarts as $key => $cart) {
                $user = $cart->userDetails;
                if ($cart->created_at <= now()->subDays(3)) {
                    $user->notify(new AbandonedCartNotification($user));
                } elseif ($cart->created_at <= now()->subDays(7)) {
                    $user->notify(new AbandonedCart48ReminderNotification($user));
                }
            }
        } catch (\Exception $e) {
        }
    }
}
