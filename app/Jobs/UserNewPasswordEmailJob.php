<?php

namespace App\Jobs;

use App\Notifications\NewPasswordNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UserNewPasswordEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;

    protected $newPassword;

    protected $emailTemplate;

    /**
     * Create a new job instance.
     */
    public function __construct($user, $newPassword, $emailTemplate)
    {
        $this->user = $user;
        $this->newPassword = $newPassword;
        $this->emailTemplate = $emailTemplate;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            $this->user->notify(new NewPasswordNotification($this->user, $this->newPassword, $this->emailTemplate));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
