<?php

namespace App\Notifications;

use App\Models\Setting;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RegistrationNotification extends Notification
{
    use Queueable;

    protected $user;

    protected $emailTemplate;

    public $finalContent;


    /**
     * Create a new notification instance.
     */
    public function __construct($user, $emailTemplate)
    {
        $this->user = $user;
        $this->emailTemplate = $emailTemplate;
        $this->finalContent = null;


        $companyProfile = Setting::first();
        $changeable = [
            '[Customer_Name]',
            '[facebook_url]',
            '[x_url]',
            '[instagram_url]',
            '[Company_Phone_Number]',
        ];
        $changes = [
            $this->user->name,
            $companyProfile->facebook_url,
            $companyProfile->x_url,
            $companyProfile->instagram_url,
            $companyProfile->company_phone_number,
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
    public function toDatabase($notifiable)
    {
        return [
            'user_id' => $this->user->id,
            'type' => 'registration',
            'subject' => $this->emailTemplate->subject,
            'email_content' => $this->finalContent,
        ];
    }

    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
