<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCategoryFormRequest;
use App\Models\ProductCategory;
use Exception;
use Illuminate\Support\Facades\Log;

class ProductCategoryController extends Controller
{
    public function index()
    {
        try {
            return view(
                'admin.categories.index',
                [
                    'categories' => ProductCategory::latest()->paginate(10),
                ]
            );
        } catch (Exception $e) {
            Log::info('error while accessing category listing page');

            return redirect()->back()->with('error', 'Ops! Something went wrong!');
        }
    }

    public function store(ProductCategoryFormRequest $request, ProductCategory $category)
    {
        try {
            $validator = $request->validated(); // Get the Validator instance
            $category->create([
                'title' => $validator['title'],
                'description' => $validator['description'],
            ]);

            return redirect()->back()->with('success', __('Category created successfully!'));
        } catch (Exception $e) {

            Log::info('error while accessing category create page');

            return redirect()->back()->with('error', 'Ops! Something went wrong!');
        }
    }

    public function update(ProductCategoryFormRequest $request, ProductCategory $category)
    {
        try {

            $validator = $request->validated();
            $category->update([
                'title' => $validator['title'],
                'description' => $validator['description'],
            ]);

            return redirect()->back()->with('success', __('Category updated successfully!'));

        } catch (Exception $e) {
            Log::info('error while editing category');

            return redirect()->back()->with('error', 'Ops! Something went wrong!');
        }
    }

    public function delete(ProductCategory $category)
    {
        try {
            if ($category) {
                $category->delete();

                return redirect()->back()->with('success', __('Category deleted successfully!'));

            }
        } catch (Exception $e) {
            Log::info('Error while deleting category'.$e);

            return redirect()->back()->with('error', 'Ops! Something went wrong!');
        }
    }
}
