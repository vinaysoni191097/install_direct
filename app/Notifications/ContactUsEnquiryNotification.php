<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;

class ContactUsEnquiryNotification extends Notification
{
    use Queueable;

    protected $admin;

    protected $enquiryDetails;

    /**
     * Create a new notification instance.
     */
    public function __construct($admin, $enquiryDetails)
    {
        $this->admin = $admin;
        $this->enquiryDetails = $enquiryDetails;
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
        return (new MailMessage)
            ->greeting('Hi Admin,')
            ->line(new HtmlString(
                'You have received a new enquiry from the contact us page.'.'<br>'.
                    'Here are the Details:'.'<br>'.'<br>'.
                    '<strong>First Name:</strong>'.' '.$this->enquiryDetails->first_name.'<br>'.
                    '<strong>Last Name:</strong>'.' '.$this->enquiryDetails->last_name.'<br>'.
                    '<strong>Email:</strong> '.' '.$this->enquiryDetails->email.'<br>'.
                    '<strong>Message:</strong>'.' '.$this->enquiryDetails->message.'<br>'.
                    '<strong>Address:</strong>'.' '.$this->enquiryDetails->address.'<br>'.
                    '<strong>Phone Number:</strong>'.' '.$this->enquiryDetails->phone
            ))
            ->action('View Details', url('/login'))
            ->salutation('Installs Direct Team');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toDatabase()
    {
        return [
            'user_id' => $this->admin->id,
            'type' => 'contact_us_enquiry',
        ];
    }

    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
