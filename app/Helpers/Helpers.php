<?php

namespace App\Helpers;

use App\Models\Enquiry;
use App\Models\Setting;

class Helpers
{
    public static function generateEnquiryNumber()
    {
        do {
            $randomNumber = mt_rand(100000, 999999); // Generate a random 6-digit number
        } while (Enquiry::where('enquiry_number', $randomNumber)->exists());

        return $randomNumber;
    }

    public static function companyProfile()
    {
        $companyData = Setting::first();

        return $companyData;
    }

    public static function powerUsage()
    {
        $sessionData = session()->all();
        // $result =  $sessionData['powerConsumption'] / 365 * 0.2;
        // $final =  round($result, 2);
        return;
    }
}

function productEnquiries()
{
    return Enquiry::where('is_read', 0)->count();
}
