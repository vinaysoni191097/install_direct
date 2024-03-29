<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;

class UserEmailNotificationController extends Controller
{
    public function view(User $user, Notification $notification)
    {
        try {

            return view('admin.users.sent-email', [
                'email' => $notification,
                'user' => $user
            ]);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
