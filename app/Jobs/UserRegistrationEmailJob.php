<?php

namespace App\Jobs;

use App\Notifications\RegistrationNotification;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class UserRegistrationEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;

    protected $emailTemplate;

    /**
     * Create a new job instance.
     */
    public function __construct($user, $emailTemplate)
    {
        $this->user = $user;
        $this->emailTemplate = $emailTemplate;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            $this->user->notify(new RegistrationNotification($this->user, $this->emailTemplate));
        } catch (Exception $e) {
            Log::info('User Registration Email Job' . $e);
        }
    }
}
