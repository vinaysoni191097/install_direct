<?php

namespace App\Services;

use App\Helpers\Helpers;
use App\Models\Enquiry;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthCheckService
{
    public function userLoginCheck()
    {
        try {
            if (Auth::user()) {
                if (session()->has('ownership')) {
                    $uniqueEnquiryNumber = Helpers::generateEnquiryNumber();
                    $queryData = session()->all();
                    Enquiry::create([
                        'user_id' => Auth::id(),
                        'ownership' => $queryData['ownership'],
                        'members' => $queryData['members'],
                        'power_consumption' => $queryData['powerConsumptionInputValue'],
                        'consumption_amount_value' => $queryData['amountValue'],
                        'consumption_kwh_value' => $queryData['KwhValue'],
                        'elec_rate_type' => $queryData['electricityRate'],
                        'day_rate' => $queryData['dayRate'],
                        'night_rate' => $queryData['nightRate'],
                        'installation_timeframe' => $queryData['solarInstallation'],
                        'location_address' => $queryData['location'],
                        'total_area' => $queryData['totalArea'],
                        'latitude' => $queryData['latitude'],
                        'longitude' => $queryData['longitude'],
                        'rooftop_cordinates' => $queryData['rooftopCordinates'],
                        'enquiry_number' => $uniqueEnquiryNumber,
                    ]);

                    return true;
                }

                return true;
            }

            return false;
        } catch (Exception $e) {
            Log::info('Error while saving enquiry information' . $e);
            return false;
        }
    }

    public function userRegisterCheck()
    {
        try {
            if (session()->has('ownership')) {
                $queryData = session()->all();
                $uniqueEnquiryNumber = Helpers::generateEnquiryNumber();
                Enquiry::create([
                    'user_id' => Auth::id(),
                    'ownership' => $queryData['ownership'],
                    'members' => $queryData['members'],
                    'power_consumption' => $queryData['powerConsumptionInputValue'],
                    'consumption_amount_value' => $queryData['amountValue'],
                    'consumption_kwh_value' => $queryData['KwhValue'],
                    'elec_rate_type' => $queryData['electricityRate'],
                    'day_rate' => $queryData['dayRate'],
                    'night_rate' => $queryData['nightRate'],
                    'installation_timeframe' => $queryData['solarInstallation'],
                    'location_address' => $queryData['location'],
                    'total_area' => $queryData['totalArea'],
                    'latitude' => $queryData['latitude'],
                    'longitude' => $queryData['longitude'],
                    'enquiry_number' => $uniqueEnquiryNumber,
                ]);

                return true;
            }

            return false;
        } catch (Exception $e) {
            Log::info('Error while saving enquiry information on new registration' . $e);
            return false;
        }
    }
}
