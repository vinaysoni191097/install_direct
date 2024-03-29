<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactFormRequest;
use App\Jobs\ContactUsEnquiryEmailJob;
use App\Models\ContactUsEnquiry;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Log;

class ContactUsEnquiryController extends Controller
{
    public function index()
    {
        try {
            return view('admin.contactUs.index', [
                'enquiries' => ContactUsEnquiry::paginate(10),
            ]);
        } catch (Exception $e) {
            return back()->with('error', 'Unable to fetch details');
        }
    }

    public function delete(ContactUsEnquiry $contactUsEnquiry)
    {
        try {
            $contactUsEnquiry->delete();

            return back()->with('success', 'Enquiry successfully removed from system');
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong. Unable to delete query');
        }
    }

    public function store(ContactFormRequest $request)
    {
        try {
            $validated = $request->validated();
            $enquiryDetails = ContactUsEnquiry::create($validated);
            $admin = User::where('role_id', 1)->first();
            ContactUsEnquiryEmailJob::dispatch($admin, $enquiryDetails);

            return view('frontend.thankyou');
        } catch (Exception $e) {
            Log::info('error while processing contact-us enquery'.$e);

            return back()->with('error', 'Something went wrong. Unable to process enquery');
        }
    }
}
