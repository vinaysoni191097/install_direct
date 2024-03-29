<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
{
    public function index()
    {
        try {
            return view('admin.settings.index', [
                'companyData' => Setting::first(),
            ]);
        } catch (Exception $e) {
            return back()->with('error', 'Unable to fetch settings page');
        }
    }

    public function update(Request $request, Setting $setting)
    {
        try {

            $validator = Validator::make($request->all(),
                [
                    'company_name' => ['required', 'max:100', 'regex:/^[a-zA-Z\s]+$/'],
                    'company_email' => ['required', 'email'],
                    'company_phone_number' => ['required', 'numeric', 'digits_between:9,10'],
                    'site_url' => 'required',
                ],
                messages: [
                    'regex' => 'Numeric and special characters are not allowed.',
                ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $setting->update([
                'company_name' => $request->company_name,
                'company_email' => $request->company_email,
                'company_phone_number' => $request->company_phone_number,
                'facebook_url' => $request->facebook_url,
                'instagram_url' => $request->instagram_url,
                'site_url' => $request->site_url,
                'x_url' => $request->x_url,
                'linkedIn_url' => $request->linkedIn_url,
            ]);

            return back()->with('success', 'Comapny profile updated successfully!');
        } catch (Exception $e) {

            return back()->with('error', 'Something went wrong. Unable to update data');
        }
    }
}
