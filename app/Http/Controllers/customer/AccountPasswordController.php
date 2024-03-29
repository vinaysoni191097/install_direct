<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserPasswordFormRequest;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AccountPasswordController extends Controller
{
    /* Change Password Page*/

    public function create()
    {
        try {
            return view('customer.change-password');
        } catch (Exception $e) {
            Log::info('Error while accessing password page'.$e);

            return redirect()->back()->with('error', 'Ops! Unable to fetch password update page');
        }
    }

    /*  Update Password */

    public function update(UserPasswordFormRequest $request, User $user)
    {
        try {
            $validated = $request->validated();
            // Check if old password matches the stored password
            if (! Hash::check($request->old_password, $user->password)) {
                return redirect()->back()->withErrors(['old_password' => 'The old password is incorrect'])->withInput();
            }
            $response = Gate::inspect('update', $user);
            if ($response->allowed()) {
                $user->password = Hash::make($validated['new_password']);
                $user->save();

                return redirect()->back()->with('success', 'Password changed successfully!');
            }

            return redirect()->back()->with('error', 'You are not authorized to update another user profile.');
        } catch (Exception $e) {
            Log::info('Error while updating password'.$e);

            return redirect()->back()->with('error', 'Ops! Something went wrong. Unable to update password');
        }
    }
}
