<?php

namespace App\Jobs;

use App\Notifications\ContactUsEnquiryNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ContactUsEnquiryEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $admin;

    protected $enquiryDetails;

    /**
     * Create a new job instance.
     */
    public function __construct($admin, $enquiryDetails)
    {
        $this->admin = $admin;
        $this->enquiryDetails = $enquiryDetails;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->admin->notify(new ContactUsEnquiryNotification($this->admin, $this->enquiryDetails));
    }
}
