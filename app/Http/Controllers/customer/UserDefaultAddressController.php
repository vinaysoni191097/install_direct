<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class UserDefaultAddressController extends Controller
{
    /* Default Address */

    public function update(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'defaultAddress' => 'required',
            ], [
                'defaultAddress.required' => 'Please select atleast one address',
            ]);
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
            $validated = $validator->validated();
            $user = Auth::user();
            $user->userData->update(
                [
                    'default_address_id' => $validated['defaultAddress'],
                ]
            );

            return redirect()->back()->with('success', 'Default billing address updated successfully');
        } catch (Exception $e) {
            Log::info('error while updating default address'.$e);

            return redirect()->back()->with('error', 'Ops! Something went wrong. Unable to set default address.');
        }
    }
}
