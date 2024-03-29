<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductTag;
use App\Models\SolarPanel;
use App\Services\ProductService;
use Exception;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function index()
    {
        try {
            return view('admin.products.index', [
                'products' => Product::latest()->paginate(10),

            ]);
        } catch (Exception $e) {
            Log::info('error while accessing product listing page');

            return back()->with('error', 'Ops! Something went wrong!');
        }
    }

    public function create()
    {
        try {
            return view('admin.products.create', [
                'categories' => ProductCategory::active()->get(),
                'tags' => ProductTag::active()->get(),
                'inverters' => Product::active()->inverters()->get(),
            ]);
        } catch (Exception $e) {
            Log::info('error while accessing product create page');

            return back()->with('error', 'Ops! Something went wrong!');
        }
    }

    public function view(Product $product)
    {
        try {
            return view('admin.products.view', [
                'product' => $product,
                'productVariations' => $product->productVariations,
            ]);
        } catch (Exception $e) {
            Log::info('Error while accessing product view page'.$e);

            return back()->with('error', 'Ops! Something went wrong, Unable to access product view page');
        }
    }

    public function edit(Product $product)
    {
        try {
            return view('admin.products.edit', [
                'product' => $product,
                'categories' => ProductCategory::active()->get(),
                'productVariations' => $product->productVariations,
                'inverters' => Product::active()->inverters()->get(),
            ]);
        } catch (Exception $e) {
            Log::info('Error while accessing product'.$e);

            return back()->with('error', 'An error has occurred please try again later.');
        }
    }

    public function store(ProductFormRequest $request, Product $products)
    {
        try {
            $validator = $request->validated();

            /* Created service to check all conditions */
            $productStore = new ProductService;
            $product = $productStore->productStore($products, $validator, $request);

            if ($request->productVariation == null && $product == true) {
                return redirect()->route('admin.products')->with('success', 'Product created successfully!');
            }
            if ($product == true) {
                return redirect()->route('admin.product.variation.create', $product)->with('Product created successfully! Please add product variation');
            }
        } catch (Exception $e) {

            Log::info('error while creating product');

            return back()->with('error', 'Ops! Something went wrong!');
        }
    }

    public function update(ProductFormRequest $request, Product $product)
    {
        try {
            $validator = $request->validated();
            $productStore = new ProductService;
            $response = $productStore->productUpdate($product, $validator, $request);
            if ($response == true) {
                return redirect()->route('admin.product.edit', $product->slug)->with('success', 'Product updated successfully!');
            }
        } catch (Exception $e) {
            Log::info('error while updating product'.$e);

            return back()->with('error', 'Ops! Something went wrong!');
        }
    }

    public function delete(Product $product)
    {
        try {
            $product->delete();

            return redirect()->route('admin.products')->with('success', 'Product Deleted Successfully!');
        } catch (Exception $e) {
            Log::info('Error while deleting product'.$e);

            return back()->with('error', 'Ops! Something went wrong! Unable to delete');
        }
    }
}
