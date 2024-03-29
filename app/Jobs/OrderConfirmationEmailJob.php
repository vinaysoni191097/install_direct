<?php

namespace App\Jobs;

use App\Models\User;
use App\Notifications\AdminOrderConfirmationNotification;
use App\Notifications\BookingConfirmationNotification;
use App\Notifications\OrderConfirmationNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class OrderConfirmationEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $order;

    protected $user;

    protected $emailTemplate;

    protected $adminEmailTemplate;

    protected $bookingTemplate;

    /**
     * Create a new job instance.
     */
    public function __construct($order, $user, $emailTemplate, $adminEmailTemplate, $bookingTemplate)
    {
        $this->order = $order;
        $this->user = $user;
        $this->emailTemplate = $emailTemplate;
        $this->adminEmailTemplate = $adminEmailTemplate;
        $this->bookingTemplate = $bookingTemplate;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            $admin = User::isAdmin()->first();
            $this->user->notify(new OrderConfirmationNotification($this->order, $this->user, $this->emailTemplate));
            $this->user->notify(new BookingConfirmationNotification($this->order, $this->user, $this->bookingTemplate));
            $admin->notify(new AdminOrderConfirmationNotification($admin, $this->order, $this->user, $this->adminEmailTemplate));
        } catch (\Exception $e) {
            Log::info('Error while running job'.$e);
            // Retry the job after 5 minutes if sending fails
            $this->release(300); // 300 seconds = 5 minutes
        }
    }
}
