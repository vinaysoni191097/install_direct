<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BasePriceFormRequest;
use App\Models\BasePrice;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BasePriceController extends Controller
{
    public function index()
    {
        try {
            return view(
                'admin.base-price.index',
                [
                    'basePrices' => BasePrice::latest()->paginate(5),
                ]
            );
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Ops! Something went wrong!');
        }
    }

    public function store(BasePriceFormRequest $request, BasePrice $basePrice)
    {
        try {
            $validator = $request->validated(); // Get the Validator instance
            $basePrice->create([
                'price' => $validator['price'],
            ]);

            return redirect()->back()->with('success', __('Base price created successfully!'));
        } catch (Exception $e) {

            Log::info('error while accessing category create page');

            return redirect()->back()->with('error', 'Ops! Something went wrong!');
        }
    }

    public function update(BasePriceFormRequest $request, BasePrice $basePrice)
    {
        try {
            $validator = $request->validated();
            $basePrice->update([
                'price' => $validator['price'],
            ]);

            return redirect()->back()->with('success', __('Base price updated successfully!'));
        } catch (Exception $e) {
            Log::info('error while editing category');

            return redirect()->back()->with('error', 'Ops! Something went wrong!');
        }
    }

}
