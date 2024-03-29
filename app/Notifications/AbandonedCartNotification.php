<?php

namespace App\Notifications;

use App\Models\EmailTemplate;
use App\Models\Setting;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AbandonedCartNotification extends Notification
{
    use Queueable;

    protected $user;

    public $emailTemplate;

    public $finalContent;

    /**
     * Create a new notification instance.
     */
    public function __construct($user)
    {
        $this->user = $user;

        $this->emailTemplate = EmailTemplate::where('template_used_for', EmailTemplate::ABANDONMENT_CART)->first();
        $companyProfile = Setting::first();
        $changeable = [
            '[Customer_Name]',
            '[Company_Phone_Number]',
            '[Site_URL]',
        ];
        $changes = [
            $this->user->name,
            $companyProfile->company_phone_number,
            $companyProfile->site_url,

        ];
        $this->finalContent = str_replace($changeable, $changes, $this->emailTemplate->mail_body);
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


        return (new MailMessage)->subject($this->emailTemplate->subject)->view('templates(Emails).base', [
            'content' => $this->finalContent,
        ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toDatabase()
    {
        return [
            'user_id' => $this->user->id,
            'type' => 'abandoned_cart_notification',
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
