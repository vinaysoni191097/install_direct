<?php

namespace App\Notifications;

use App\Models\Setting;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AdminOrderConfirmationNotification extends Notification
{
    use Queueable;

    protected $admin;

    protected $order;

    protected $user;

    protected $adminEmailTemplate;

    /**
     * Create a new notification instance.
     */
    public function __construct($admin, $order, $user, $adminEmailTemplate)
    {
        $this->admin = $admin;
        $this->order = $order;
        $this->user = $user;
        $this->adminEmailTemplate = $adminEmailTemplate;
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
            '[Customer_Email]',
            '[Customer_Phone_Number]',
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
            $this->user->email,
            $this->user->phone_number,
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

        $finalContent = str_replace($changeable, $changes, $this->adminEmailTemplate->mail_body);
        $subject = str_replace('[Order_Number]', $this->order->order_number, $this->adminEmailTemplate->subject);

        return (new MailMessage)->subject($subject)->view('templates(Emails).base', [
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
            'user_id' => $this->admin->id,
            'type' => 'admin_order_confirmation',

        ];
    }

    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
