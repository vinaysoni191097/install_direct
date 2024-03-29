<?php

namespace App\Services;

use App\Models\Media;
use App\Models\sections\HomePage;
use App\Models\sections\HomePageBannerSpecification;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class HomePageService
{
    public function storeHomePageData($validator)
    {
        try {
            $homePage = HomePage::first();
            $homePage->update(
                [
                    'banner_headline' => $validator['banner_headline'],
                    'banner_tagline' => $validator['banner_tagline'],
                    'center_banner_text' => $validator['center_banner_text'],
                    'center_banner_headline' => $validator['center_banner_headline'],
                ]
            );

            if ($validator['specification_name']) {
                $homePage->keyFeatures()->delete();
                $keyFeatures = array_map(function ($value) use ($homePage) {
                    return new HomePageBannerSpecification([
                        'page_id' => $homePage->id,
                        'key_feature' => $value,
                    ]);
                }, $validator['specification_name']);
                $homePage->keyFeatures()->saveMany($keyFeatures);
            }

            if ($validator['banner_image'] ?? false) {
                $oldImagePath = $homePage->bannerImage->path ?? null;
                // Delete old image if it exists
                if ($oldImagePath && Storage::disk('public')->exists($oldImagePath)) {
                    Storage::disk('public')->delete($oldImagePath);
                }
                $filename = $validator['banner_image'];
                $path = $filename->store('home_page_banners', 'public');
                $media = Media::create([
                    'type' => Media::HOME_BANNER,
                    'product_id' => $homePage->id,
                    'path' => $path,
                ]);
                $homePage->update([
                    'banner_image_id' => $media->id,
                ]);
            }

            if ($validator['center_banner_image'] ?? false) {
                $oldImagePath = $homePage->centerBannerImage->path ?? null;
                // Delete old image if it exists
                if ($oldImagePath && Storage::disk('public')->exists($oldImagePath)) {
                    Storage::disk('public')->delete($oldImagePath);
                }
                $filename = $validator['center_banner_image'];
                $path = $filename->store('home_page_banners', 'public');
                $media = Media::create([
                    'type' => Media::HOME_CENTER_BANNER,
                    'product_id' => $homePage->id,
                    'path' => $path,
                ]);
                $homePage->update([
                    'center_banner_image_id' => $media->id,
                ]);
            }

            return true;
        } catch (\Exception $e) {
            Log::info('Error while storing home page information' . $e->getMessage());

            return false;
        }
    }
}
