<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductVariationFormRequest;
use App\Http\Requests\ProductVariationUpdateFormRequest;
use App\Models\Product;
use App\Models\ProductVariation;
use App\Services\ProductVariationService;
use Exception;
use Illuminate\Support\Facades\Log;

class ProductVariationController extends Controller
{
    /* Creating New Product */

    public function create(Product $product)
    {
        try {
            return view('admin.products.product-variation', [
                'product' => $product,
            ]);
        } catch (Exception $e) {
            Log::info('error while accessing product variation'.$e);
            toastr()->error('Ops! Something went wrong, Unable to access product variation page');

            return back();
        }
    }

    public function store(ProductVariationFormRequest $request, ProductVariation $productVariation)
    {
        try {
            // Checking if new variation is from Product Edit page or new product addition
            if ($request->parent_product_id) {
                $productVarations = new ProductVariationService;
                $response = $productVarations->newVariationAddition($request, $productVariation);
                if ($response[1] === true) {
                    return redirect()->route('admin.product.edit', $response[0]->parentProduct->slug)->with('success', 'Variation added successfully!');
                }

                return back()->withErrors($response)->withInput();
            }

            //Storing Variation from main product page
            $validator = $request->validated();
            $productVarations = new ProductVariationService;
            $product = $productVarations->productVariationStore($validator['form'], $productVariation);
            if ($product == true) {
                return redirect()->route('admin.products')->with('success', 'Product created successully along with variation');
            }
        } catch (Exception $e) {
            Log::info('error while accessing product variation'.$e);

            return back()->with('error', 'Ops! Something went wrong, Unable to create product variation');
        }
    }

    public function delete(ProductVariation $productVariation)
    {
        try {
            $productVariation->delete();

            return back()->with('success', 'Varaition removed successfully!');
        } catch (Exception $e) {
            Log::info('error while removing product variation'.$e);

            return back()->with('error', 'Ops! Something went wrong, Unable to remove product variation');
        }
    }

    public function update(ProductVariationUpdateFormRequest $request, ProductVariation $productVariation)
    {
        try {
            $validator = $request->validated();
            $productVarations = new ProductVariationService;
            $response = $productVarations->productVariationUpdate($validator, $productVariation);
            if ($response == true) {
                return to_route('admin.product.edit', $productVariation->parentProduct->slug)->with('success', 'Variation status updated successfully!');
            }
        } catch (Exception $e) {
            Log::info('error while updating product variation'.$e);

            return back()->with('error', 'Oops! Something went wrong. Unable to update variation');
        }
    }

    public function cancelVariation(Product $product)
    {
        try {
            $product->update([
                'variation' => false,
            ]);

            return response(['status' => 200]);
        } catch (Exception $e) {
        }
    }
}
