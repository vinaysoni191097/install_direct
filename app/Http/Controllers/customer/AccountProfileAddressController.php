<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\AccountAddressFormRequest;
use App\Models\BillingAddress;
use App\Models\Cart;
use App\Models\CountryAndCity;
use App\Models\Order;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AccountProfileAddressController extends Controller
{
    /* New Address Page */
    public function create()
    {
        try {
            $user = Auth::user();

            return view('customer.add-new-address', [
                'englandCities' => CountryAndCity::EnglandCities()->get(),
                'scotlandCities' => CountryAndCity::ScotlandCities()->get(),
                'walesCities' => CountryAndCity::WalesCities()->get(),
                'user' => $user,
                'orders' => Order::where('user_id', Auth::id())->get(),
                'cartProducts' => Cart::where('user_id', Auth::id())->get(),
            ]);
        } catch (Exception $e) {

            Log::info('Error while access new address page'.$e);

            return redirect()->back()->with('error', 'Ops! Something went wrong. Unable to fetch address');
        }
    }

    /* Add new Address */
    public function store(AccountAddressFormRequest $request, User $user)
    {
        try {

            $validated = $request->validated();

                BillingAddress::create([
                    'user_id' => $user->id,
                    'new_address_full_name' => $validated['shippingFullName'],
                    'phone_number' => $validated['phone_number'],
                    'city' => $validated['city'],
                    'state' => $validated,
                    'address' => $validated['shippingAddress2'],
                    'zip' => $validated['zip'],
                    'country' => 'UK',
                ]);

                return to_route('customer.account.profile')->with('success', 'New Address added successfully!');
      

            return redirect()->back()->with('error', 'You are not authorized to update another user profile.');
        } catch (Exception $e) {

            Log::info('Error while adding new address'.$e);

            return redirect()->back()->with('error', 'Ops! Something went wrong. Unable to add new address')->withErrors($validated)->withInput();
        }
    }

    /* Edit Address */

    public function edit($id)
    {
        try {
            $user = Auth::user();
            $billingAddress = BillingAddress::findOrFail($id);

            return view('customer.edit-address', [
                'englandCities' => CountryAndCity::EnglandCities()->get(),
                'scotlandCities' => CountryAndCity::ScotlandCities()->get(),
                'walesCities' => CountryAndCity::WalesCities()->get(),
                'user' => $user,
                'address' => $billingAddress,
                'orders' => Order::where('user_id', Auth::id())->latest()->get(),
                'cartProducts' => Cart::where('user_id', Auth::id())->get(),
            ]);
        } catch (Exception $e) {
            Log::info('Error while accessing edit address page'.$e);

            return back()->with('error', 'Something went wrong. Unable to access the edit address page');
        }
    }

    /* Update Address */
    public function update(AccountAddressFormRequest $request, $id)
    {
        try {
            $validated = $request->validated();
            $billingAddress = BillingAddress::findOrFail($id);
            $response = $this->authorize('update', $billingAddress);
            if ($response) {
                $billingAddress->update([
                    'new_address_full_name' => $validated['shippingFullName'],
                    'phone_number' => $validated['phone_number'],
                    'city' => $validated['city'],
                    'state' => $validated,
                    'address' => $validated['shippingAddress2'],
                    'zip' => $validated['zip'],
                    'country' => 'UK',
                ]);

                return to_route('customer.account.profile')->with('success', 'Address updated successfully!');
            }

            return redirect()->back()->with('error', 'You are not authorized to update another user profile.');
        } catch (Exception $e) {
            Log::info('Error while adding new address'.$e);

            return redirect()->back()->with('error', 'Ops! Something went wrong. Unable to add new address');
        }
    }

    /* Delete Address */
    public function destroy(BillingAddress $billingAddress)
    {
        try {
            $response = $this->authorize('delete', $billingAddress);
            if ($response) {
                $billingAddress->delete();

                return redirect()->back()->with('success', 'Address removed successfully!');
            }

            return redirect()->back()->with('error', 'You are not authorized to update another user profile.');
        } catch (Exception $e) {
            Log::info('error while deleting address'.$e);

            return redirect()->back()->with('Ops! Something went wrong. Unable to remove address.');
        }
    }
}
