<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BasePrice;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductTag;
use App\Models\sections\Faq;
use App\Models\sections\PartnerLogo;
use App\Models\SolarPanel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class StatusChangeController extends Controller
{
    //   Change Product Status

    public function productStatusChange(Request $request, Product $product)
    {
        try {
            $product->update([
                'status' => $request->newStatus,
            ]);

            return redirect()->route('admin.products')->with('succes', 'Product status updated successfully!');
        } catch (Exception $e) {
            Log::info('Error while updating product Status'.$e);
            toastr()->error('An error occured while updating status. Please try again later!');

            return back();
        }
    }

    // Change Product Tags Status

    public function tagStatusChange(Request $request, ProductTag $tag)
    {
        try {
            $tag->update([
                'status' => $request->newStatus,
            ]);

            return redirect()->back()->with('success', __('Tag status updated sucessfully.'));
        } catch (Exception $e) {
            Log::info('Error while updating category Status'.$e);

            return redirect()->back()->with('error', __('Ops! Something went wrong!. Unable to update the status.'));
        }
    }

    // Change Product Category Status

    public function categoryStatusChange(Request $request, ProductCategory $category)
    {
        try {
            $category->update([
                'status' => $request->newStatus,
            ]);

            return redirect()->back()->with('success', __('Category status updated successfully!'));
        } catch (Exception $e) {
            Log::info('Error while updating category Status'.$e);

            return redirect()->back()->with('error', 'Ops! Something went wrong!');
        }
    }

    // Change FAQ Status

    public function faqStatusChange(Request $request, Faq $faq)
    {
        try {
            $faq->update([
                'status' => $request->newStatus,
            ]);

            return redirect()->back()->with('success', __('FAQ status updated successfully!'));
        } catch (Exception $e) {
            Log::info('Error while updating FAQ Status'.$e);

            return redirect()->back()->with('error', 'Ops! Something went wrong!');
        }
    }

    //Change partner logo status

    public function partnerLogoStatusChange(Request $request, PartnerLogo $partnerLogo)
    {
        try {
            $partnerLogo->update([
                'status' => $request->newStatus,
            ]);

            return redirect()->back()->with('success', __('Status updated successfully!'));
        } catch (Exception $e) {
            Log::info('Error while updating partner prfile Status'.$e);

            return redirect()->back()->with('error', 'Ops! Something went wrong!');
        }
    }

    //Change panel status

    public function panelStatusChange(Request $request, SolarPanel $panel)
    {
        try {
            $panel->update([
                'status' => $request->newStatus,
            ]);

            return redirect()->back()->with('success', __('Category status updated successfully!'));
        } catch (Exception $e) {
            Log::info('Error while updating category Status'.$e);

            return redirect()->back()->with('error', 'Ops! Something went wrong!');
        }
    }
        //Change base price status

    public function basePriceStatusChange(Request $request, BasePrice $basePrice)
    {
        try {
            $basePrice->update([
                'status' => $request->newStatus,
            ]);

            return redirect()->back()->with('success', __('Base price status updated successfully!'));
        } catch (Exception $e) {
            Log::info('Error while updating category Status'.$e);

            return redirect()->back()->with('error', 'Ops! Something went wrong!');
        }
    }
}
