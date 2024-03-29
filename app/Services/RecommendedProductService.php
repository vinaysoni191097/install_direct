<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Log;

class RecommendedProductService
{
    public function recommendedProduct()
    {
        try {
            $standardPanelSize = 2;
            $recommendedPanles = round(session('totalArea') / $standardPanelSize);

            return $recommendedPanles;
        } catch (Exception $e) {
            Log::info('Error while calculating recommended Product'.$e);

            return false;
        }
    }
}
