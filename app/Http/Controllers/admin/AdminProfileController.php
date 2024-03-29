<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminProfileFormRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminProfileController extends Controller
{
    public function view()
    {
        try {
            return view('admin.profile.view', [
                'user' => Auth::user(),
            ]);
        } catch (Exception $e) {
            Log::info('Error while accessing Admin Profile Page' . $e);

            return back()->with('error', 'Unable to access profile page');
        }
    }

    public function update(AdminProfileFormRequest $request, User $user)
    {
        try {
            $validated = $request->validated();
            $user->update([
                'name' => $validated,
                'phone_number' => $validated['phone'],
            ]);
            $user->userData->update([
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
            ]);
            if ($request->hasFile('profile_picture')) {
                $oldImagePath = Storage::get('public/' . $user->userData->profile_picture);
                if ($oldImagePath) {
                    Storage::delete($oldImagePath);
                }
                $filename = $request->profile_picture;
                $path = $filename->store('profile_pictures', 'public');
                $user->userData->update([
                    'profile_picture' => $path,
                ]);
            }

            return redirect()->back()->with('success', 'Account profile updated successfully!');
        } catch (Exception $e) {

            Log::info('Error while updating account profile information' . $e);

            return redirect()->back()->with('error', 'Ops! Something went wrong. Unable to update account information.');
        }
    }
}
