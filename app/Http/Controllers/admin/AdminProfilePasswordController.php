<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordFormRequest;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AdminProfilePasswordController extends Controller
{
    public function view()
    {
        try {
            return view('admin.profile.password');
        } catch (Exception $e) {
            Log::info('Error while accessing password page'.$e);

            return back()->with('error', 'Something went wrong, Unable to access the password page.');
        }
    }

    public function update(PasswordFormRequest $request, User $user)
    {
        try {
            // Check if old password matches the stored password
            if (! Hash::check($request->old_password, $user->password)) {
                return redirect()->back()->withErrors(['old_password' => 'The old password is incorrect'])->withInput();
            }
            $validated = $$request->validated();
            $user->password = Hash::make($validated['new_password']);
            $user->save();

            return redirect()->back()->with('success', 'Password changed successfully!');
        } catch (Exception $e) {
            Log::info('Error while updating password'.$e);

            return back()->with('error', 'Ops! Something went wrong. Unable to update password.');
        }
    }
}
