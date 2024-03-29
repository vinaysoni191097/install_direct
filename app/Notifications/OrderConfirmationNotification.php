<?php

namespace App\Notifications;

use App\Models\Setting;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderConfirmationNotification extends Notification
{
    use Queueable;

    protected $order;

    protected $user;

    protected $emailTemplate;

    /**
     * Create a new notification instance.
     */
    public function __construct($order, $user, $emailTemplate)
    {
        $this->order = $order;
        $this->user = $user;
        $this->emailTemplate = $emailTemplate;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $orderData = view('templates(Emails).orderItems', [
            'order' => $this->order,
        ])->render();

        $companyProfile = Setting::first();

        $changeable = [
            '[Customer_Name]',
            '[Order_Number]',
            '[Order_Date]',
            '[Items]',
            '[Total_Amount]',
            '[Booking_Amount]',
            '[Pending_Amount]',
            '[Installation_Timeframe]',
            '[Installtion_Address]',
            '[Billing_Address]',
            '[Company_Phone_Number]',
        ];

        $changes = [
            $this->user->name,
            $this->order->order_number,
            $this->order->created_at->format('M d, Y'),
            $orderData,
            $this->order->total_amount,
            number_format($this->order->booking_amount, 2),
            $this->order->payable_amount,
            $this->order->installation_timeframe,
            $this->order->installation_address,
            $this->order->billing_address,
            $companyProfile->company_phone_number,
        ];

        $finalContent = str_replace($changeable, $changes, $this->emailTemplate->mail_body);

        return (new MailMessage)->subject($this->emailTemplate->subject)->view('templates(Emails).base', [
            'content' => $finalContent,
        ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toDatabase($notifiable)
    {
        return [
            'user_id' => $this->user->id,
            'type' => 'order_confirmation',

        ];
    }

    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
