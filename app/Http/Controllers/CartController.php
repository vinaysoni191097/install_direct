<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CountryAndCity;
use App\Models\InstallationAddress;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function store(Request $request)
    {

        try {

            $panelData = $request->merge(['formData' => json_decode($request->input('formData'), true)]);
            $validator = Validator::make($request->formData, [
                'selectedProductsInfo' => 'required',
            ]);
            if ($validator->fails()) {
                return back()->with('error', 'Please select products first to proceed further.');
            }
            $validated = $validator->validated();

            foreach ($validated['selectedProductsInfo'] as $key => $value) {
                Cart::updateOrCreate(
                    [
                        'user_id' => Auth::id(),
                        'category_id' => $value['categoryId'],
                    ],
                    [
                        'user_id' => Auth::id(),
                        'product_id' => $value['productId'],
                        'product_variation_id' => $value['productVariationValue'],
                        'quantity' => $value['quantity'],
                        'category_id' => $value['categoryId'],
                        'panel_id' => $request['formData']['panelId'],
                        'panel_quantity' => $request['formData']['panelQuantity'],
                    ],
                );
            }
            // Saving installtion address for checkout

            $queryData = session()->all();

            InstallationAddress::create([
                'user_id' => Auth::id(),
                'address' => $queryData['location'],
                'installation_timeframe' => $queryData['solarInstallation'],
                'zip' => $queryData['zip'],
                'country' => 'UK',
            ]);

            return to_route('customer.checkout')->with('success', 'Items added successfully. Please proceed ahead with billing details.');
        } catch (Exception $e) {

            Log::info('error while processing cart' . $e);

            return back()->with('error', 'Something went wrong. Unable to process order');
        }
    }

    public function view()
    {
        try {

            return view('pages.checkout', [
                'user' => Auth::user(),
                'englandCities' => CountryAndCity::EnglandCities()->get(),
                'scotlandCities' => CountryAndCity::ScotlandCities()->get(),
                'walesCities' => CountryAndCity::WalesCities()->get(),
                'cartProducts' => Cart::where('user_id', Auth::id())->whereNotNull('product_id')->get(),
                'panels' => Cart::where('user_id', Auth::id())->first(),

            ]);
        } catch (Exception $e) {

            Log::info('error while retrieving checkout page' . $e);

            return back()->with('error', 'Something went wrong. Unable to process order');
        }
    }

    /*  if customer is having pending order and want to setup new order */
    public function delete()
    {
        try {
            Cart::where('user_id', Auth::id())->delete();
            InstallationAddress::where('user_id', Auth::id())->delete();

            return redirect()->route('dashboard')->with('success', 'Old Order deleted successully. Please create new one!');
        } catch (Exception $e) {
            Log::info('Error while deleting product from cart' . $e);

            return back()->with('error', 'Something went wrong. Unable to remove product from cart');
        }
    }
}
