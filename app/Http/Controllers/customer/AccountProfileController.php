<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserAccountProfileFormRequest;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class AccountProfileController extends Controller
{
    public function index()
    {
        try {
            $user = Auth::user();

            return view('customer.account', [
                'user' => $user,
                'orders' => Order::where('user_id', Auth::id())->latest()->get(),
                'cartProducts' => Cart::where('user_id', Auth::id())->get(),
            ]);
        } catch (Exception $e) {
            Log::info('Error while accessing account profile'.$e);

            return redirect()->back()->with('error', 'Ops! Something went wrong. Unable to access account page');
        }
    }

    /* Account information update*/
    public function update(UserAccountProfileFormRequest $request, User $user)
    {
        try {
            $validated = $request->validated();
            $response = Gate::inspect('update', $user);
            if ($response->allowed()) {
                $user->update([
                    'name' => $validated,
                    'phone_number' => $validated['phone'],
                ]);
                $user->userData->update([
                    'first_name' => $validated['first_name'],
                    'last_name' => $validated['last_name'],
                ]);
                if ($request->hasFile('profile_picture')) {
                    $oldImagePath = Storage::get('public/'.$user->userData->profile_picture);
                    if ($oldImagePath) {
                        Storage::delete($oldImagePath);
                    }
                    $filename = $validated['profile_picture'];
                    $path = $filename->store('profile_pictures', 'public');
                    $user->userData->update([
                        'profile_picture' => $path,
                    ]);
                }

                return redirect()->back()->with('success', 'Account profile updated successfully!');
            } else {

                return redirect()->back()->with('error', 'You are not authorized to update another user profile.');
            }
        } catch (Exception $e) {
            Log::info('Error while updating account profile information'.$e);

            return redirect()->back()->with('error', 'Ops! Something went wrong. Unable to update account information.');
        }
    }
}
