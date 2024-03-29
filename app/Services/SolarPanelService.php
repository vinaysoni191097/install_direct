<?php

namespace App\Services;

use App\Models\Media;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class SolarPanelServiceException extends \Exception
{
};
class SolarPanelService
{

    public function storeSolarPanels($validated, $panel)
    {
        try {
            $panel->create([
                'title' => $validated['title'],
                'watts' => $validated['watts'],
                'price' => $validated['price'],
                'description' => $validated['description'],
            ]);
            if (array_key_exists('featured_image', $validated) && $validated['featured_image'] != null) {
                $filename = $validated['featured_image'];
                $path = $filename->store('solar_panels', 'public');
                $media = Media::create([
                    'type' => Media::PRODUCT,
                    'product_id' => $panel->id,
                    'path' => $path,
                ]);
                $panel->update([
                    'featured_image_id' => $media->id,
                ]);
            }
        } catch (\Exception $e) {
            Log::info('Error while storing panel type create page' . $e->getMessage());

            throw new SolarPanelServiceException('Error while storing panel type create page' . $e->getMessage());
        }
    }

    public function updateSolarPanel($validated, $panel)
    {
        try {
            $panel->update([
                'title' => $validated['title'],
                'watts' => $validated['watts'],
                'price' => $validated['price'],
                'description' => $validated['description'],
            ]);

            if (array_key_exists('featured_image', $validated) && $validated['featured_image'] != null) {
                $filename = $validated['featured_image'];
                $oldImagePath = $panel->profile_picture ?? null;
                // Delete old image if it exists
                if ($oldImagePath && Storage::disk('public')->exists($oldImagePath)) {
                    Storage::disk('public')->delete($oldImagePath);
                }
                $path = $filename->store('solar_panels', 'public');
                $panel->update([
                    'profile_picture' => $path,
                ]);
            }
        } catch (\Exception $e) {
            Log::info('error while editing panel type' . $e->getMessage());

            throw new SolarPanelServiceException('Error while editing panel type' . $e->getMessage());
        }
    }
}
