<?php

namespace App\Http\Controllers\admin\sections;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutUsFormRequest;
use App\Models\Media;
use App\Models\sections\AboutUsPage;
use Illuminate\Support\Facades\Storage;

class ManageAboutUsController extends Controller
{
    public function index()
    {
        try {
            return view('admin.sections.about-us.index', [
                'content' => AboutUsPage::first(),
            ]);
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong. Unable to fetch about us page');
        }
    }

    public function store(AboutUsFormRequest $request)
    {
        try {
            $validated = $request->validated();
            $aboutUsPage = AboutUsPage::first();
            $aboutUsPage->update(
                [
                    'page_headline' => $validated['page_headline'],
                    'side_content' => $validated['side_content'],
                    'main_content_title' => $validated['main_content_title'],
                    'main_content_tagline' => $validated['main_content_tagline'],
                    'main_content_section_one' => $validated['main_content_section_one'],
                    'main_content_section_two' => $validated['main_content_section_two'],
                    'main_content_section_three' => $validated['main_content_section_three'],
                ]
            );
            if ($request->hasFile('featured_image')) {
                $oldImagePath = $aboutUsPage->side_picture ?? null;
                // Delete old image if it exists
                if ($oldImagePath && Storage::disk('public')->exists($oldImagePath)) {
                    Storage::disk('public')->delete($oldImagePath);
                }

                $filename = $validated['featured_image'];
                $path = $filename->store('about_us_page', 'public');
                $media = Media::create([
                    'type' => Media::ABOUT_US_PAGE_SIDE_PICTURE,
                    'product_id' => $aboutUsPage->id,
                    'path' => $path,
                ]);
                $aboutUsPage->update([
                    'featured_image_id' => $media->id,
                ]);
            }

            return redirect()->route('admin.aboutUs')->with('success', 'Content updated successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong . Unable to update about us page content');
        }
    }
}
