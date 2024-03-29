<?php

namespace App\Services;

use App\Jobs\UserNewPasswordEmailJob;
use App\Models\EmailTemplate;
use App\Models\OrderAssign;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserServiceException extends \Exception
{
};

class UserService

{
    public function getUsers($user)
    {
        try {
            $users = $user::isUser()->latest()->paginate(10);
            $order = OrderAssign::get();
            return [
                'users' => $users,
                'order' => $order
            ];
        } catch (\Exception $e) {
            Log::info('Error while accessing users listing: ' . $e->getMessage());
            throw new UserServiceException('Error accessing user listing');
        }
    }

    public function updateUserData($validator, $user)
    {
        try {
            DB::transaction(function () use ($validator, &$user) {
                $user->update([
                    'name' => $validator,
                    'email' => $validator['email'],
                    'phone_number' => $validator['phone_number'],
                ]);

                $user->userData->update([
                    'first_name' => $validator['first_name'],
                    'last_name' => $validator['last_name'],
                ]);
            });
        } catch (\Exception $e) {
            Log::info('UserServiceException : User Update = ' . $e->getMessage());
            throw new UserServiceException('Error updating updating user');
        }
    }

    public function updateUserPassword($user)
    {
        try {
            $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            $newPassword = substr(str_shuffle($chars), 0, 8);

            $user->update([
                'password' => Hash::make($newPassword),
            ]);
            //sending email to user for new password
            $emailTemplate = EmailTemplate::where('template_used_for', EmailTemplate::NEW_PASSWORD)->first();
            UserNewPasswordEmailJob::dispatch($user, $newPassword, $emailTemplate);
        } catch (\Exception $e) {
            Log::info('Error while generating new password for user' . $e->getMessage());
            throw new UserServiceException('Error while updating password');
        }
    }
}
