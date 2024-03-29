<?php

namespace App\Http\Controllers\customer;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\SolarPanel;
use App\Services\AuthCheckService;
use App\Services\RecommendedProductService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use function App\Helpers\powerUsage;

class PropertyController extends Controller
{
    public function query(Request $request)
    {
        try {
            session()->put([
                'zip' => $request->zip,
            ]);
            return view('frontend.property-info');
        } catch (Exception $e) {
            Log::info('Error while fetching property information page');
            toastr()->error('Ops! Something went wrong. Please try again later');
            return back();
        }
    }

    public function propertyInformation(Request $request)
    {
        try {
            session()->put([
                'ownership' => $request->ownership,
                'members' => $request->members,
                'powerConsumptionInputValue' => $request->powerConsumptionInputValue,
                'KwhValue' => $request->KwhValue,
                'amountValue' => $request->amountValue,
                'electricityRate' => $request->electricityRate,
                'dayRate' => $request->dayRate,
                'nightRate' => $request->nightRate,
                'solarInstallation' => $request->solarInstallation,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'location' => $request->location,
            ]);

            return view('property.map');
        } catch (Exception $e) {
            Log::info('Error while accessing map page' . $e);

            return back()->with('error', 'Ops! Something went wrong, Unable to load next step!');
        }
    }

    public function areaDetails(Request $request)
    {
        try {
            session()->put([
                'totalArea' => $request->totalArea,
                'rooftopCordinates' => $request->rooftopCordinates
            ]);
            $AuthCheckService = new AuthCheckService;
            //  If customer is already logged in
            $response = $AuthCheckService->userLoginCheck();
            if ($response == true && session()->has('ownership')) {
                return redirect()->route('customer.property.recommendedProduct')->with('success', 'Information has been saved. Please procced with next steps!');
            }

            return to_route('register');
        } catch (Exception $e) {
            Log::info('error while saving total area' . $e);

            return back()->with('error', 'Ops! unable to fetch total area');
        }
    }

    public function recommendedProduct(Request $request)
    {
        try {
            $filteredProducts = $request['panel_type'] ?? 400;
            $recommendedProduct = new RecommendedProductService;

            return view('pages.recommended-panel', [
                'categories' => ProductCategory::active()->with('products')->get(),
                'products' => Product::active()
                    ->with('productImage', 'productVariations')
                    // ->filter($filteredProducts)
                    ->get(),
                'maximumPanels' => $recommendedProduct->recommendedProduct(),
                'panels' => SolarPanel::get(),
                'filteredProducts' => $filteredProducts,
                'dailyUsage' => Helpers::powerUsage() ?? false,
            ]);
        } catch (Exception $e) {
            Log::info('error while accessing recommended panel page' . $e);

            return redirect()->route('dashboard')->with('error', 'Ops! Unable to load product. Please try again later!');
        }
    }
}
