<?php

namespace App\Notifications;

use App\Models\Setting;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BookingConfirmationNotification extends Notification
{
    use Queueable;

    protected $order;

    protected $user;

    protected $bookingTemplate;

    public $finalContent;

    /**
     * Create a new notification instance.
     */
    public function __construct($order, $user, $bookingTemplate)
    {
        $this->order = $order;
        $this->user = $user;
        $this->bookingTemplate = $bookingTemplate;


        $companyProfile = Setting::first();

        $changeable = [
            '[Customer_Name]',
            '[Order_Number]',
            '[Reservation_Date]',
            '[Total_Amount]',
            '[Booking_Amount]',
            '[Pending_Amount]',
            '[Company_Phone_Number]',
        ];
        $changes = [
            $this->user->name,
            $this->order->order_number,
            $this->order->created_at->format('M d, Y'),
            $this->order->total_amount,
            number_format($this->order->booking_amount, 2),
            $this->order->payable_amount,
            $companyProfile->company_phone_number,
        ];

        $this->finalContent = str_replace($changeable, $changes, $this->bookingTemplate->mail_body);
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


        return (new MailMessage)->subject($this->bookingTemplate->subject)->view('templates(Emails).base', [
            'content' => $this->finalContent,
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
            'type' => 'admin_order_confirmation',
            'email_content' => $this->finalContent

        ];
    }

    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
