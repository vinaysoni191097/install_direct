<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use Exception;
use Illuminate\Support\Facades\Log;

class EnquiryController extends Controller
{
    public function index()
    {
        try {
            return view('admin.enquiry.index', [
                'enquiries' => Enquiry::with('userData')->latest()->paginate(10),
            ]);
        } catch (Exception $e) {
            Log::info('error while accessing enquiry page'.$e);

            return back()->with('error', 'Ops! Something went wrong. Unable to fetch details');
        }
    }

    public function view(Enquiry $enquiry)
    {
        try {
            return view('admin.enquiry.view', [
                'enquiry' => $enquiry,
            ]);
        } catch (Exception $e) {
            Log::info('error while viewing enquiry'.$e);

            return back()->with('error', 'Ops! Something went wrong. Unable to view the enquiry');
        }
    }

    public function delete(Enquiry $enquiry)
    {
        try {
            $enquiry->delete();

            return redirect()->back()->with('success', __('Enquiry removed successfully!'));
        } catch (Exception $e) {
            Log::info('error while removing enquiry'.$e);

            return back()->with('error', 'Ops! Something went wrong. Unable to remove the enquiry');
        }
    }
}
