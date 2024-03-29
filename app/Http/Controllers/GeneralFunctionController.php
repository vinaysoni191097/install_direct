<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

class GeneralFunctionController extends Controller
{
    public function addAdmin(User $user)
    {
        try {
            $user = new User;
            $user->name = 'Admin';
            $user->role_id = 1;
            $user->email = 'admin1@admin.com';
            $user->password = bcrypt('password');
            $user->save();

            $user->userData->first_name = 'Admin';
            $user->userData->last_name_name = 'Admin';

            return 'Admin created successfully!';
        } catch (Exception $e) {
            Log::info('Error while creating admin . $e');

            return $e;
        }
    }

    public function runSeeders()
    {
        try {
            Artisan::call('migrate:fresh');
            Artisan::call('db:seed');

            return 'Success!';
        } catch (Exception $e) {
            return $e;
        }
    }
}
