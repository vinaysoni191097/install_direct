<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductTagFormRequest;
use App\Models\ProductTag;
use Exception;
use Illuminate\Support\Facades\Log;

class ProductTagController extends Controller
{
    public function index()
    {
        try {
            return view('admin.tags.index', [
                'tags' => ProductTag::latest()->paginate(10),
            ]);
        } catch (Exception $e) {
            Log::info('error while accessing product listing page');

            return redirect()->back()->with('error', 'Ops! Something went wrong!');
        }
    }

    public function store(ProductTagFormRequest $request, ProductTag $tag)
    {
        try {
            $validator = $request->validated(); // Get the Validator instance
            $tag->create([
                'title' => $validator['title'],
                'description' => $validator['description'],
            ]);

            return redirect()->back()->with('success', 'Tag created successfully.');
        } catch (Exception $e) {

            Log::info('error while creating tag');

            return redirect()->back()->with('error', 'Ops! Something went wrong!.');
        }
    }

    public function update(ProductTagFormRequest $request, ProductTag $tag)
    {
        try {
            $validator = $request->validated(); // Get the Validator instance
            $tag->update([
                'title' => $validator['title'],
                'description' => $validator['description'],
            ]);

            return redirect()->back()->with('success', __('Tag updated successfully.'));
        } catch (Exception $e) {

            Log::info('error while updating tag');

            return redirect()->back()->with('error', 'Ops! Something went wrong!');
        }
    }

    public function delete(ProductTag $tag)
    {
        try {

            $tag->delete();

            return redirect()->back()->with('success', __('Tag deleted successfully'));
        } catch (Exception $e) {
            Log::info('Error while deleting tag' . $e);

            return redirect()->back()->with('error', 'Ops! Something went wrong!');
        }
    }
}
