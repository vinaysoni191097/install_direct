<?php

namespace App\Services;

use App\Models\Media;
use App\Models\sections\PartnerLogo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PartnerLogoServiceException extends \Exception
{
};

class PartnerLogoService
{
    public function  storePartnerLogo($validated)
    {
        try {
            DB::transaction(function () use ($validated) {
                $logo = PartnerLogo::create([
                    'partner_name' => $validated['partner_name'],
                ]);

                $filename = $validated['featured_image'];
                $path = $filename->store('partner_logos', 'public');
                $media = Media::create([
                    'type' => Media::PARTNER_LOGO,
                    'product_id' => $logo->id,
                    'path' => $path,
                ]);
                $logo->update([
                    'featured_image_id' => $media->id,
                ]);
            });
        } catch (\Exception $e) {
            Log::info('Error while storing partner logos' . $e->getMessage());
            throw new PartnerLogoServiceException('Error while storing partner logos' . $e->getMessage());
        }
    }

    public function updatePartnerLogo($request, $partnerLogo)
    {
        try {
            $validator = Validator::make($request->all(), [
                'partner_name' => 'required|max:250',
                'featured_image' => 'nullable',
            ]);
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
            $validated = $validator->validated();
            DB::transaction(function () use ($validated, $partnerLogo, $request) {
                $partnerLogo->update([
                    'partner_name' => $validated['partner_name'],
                ]);
                if ($request->hasFile('featured_image')) {
                    $filename = $validated['featured_image'];
                    $oldImagePath = $partnerLogo->partnerLogo->path ?? null;
                    // Delete old image if it exists
                    if ($oldImagePath && Storage::disk('public')->exists($oldImagePath)) {
                        Storage::disk('public')->delete($oldImagePath);
                    }
                    $path = $filename->store('partner_logos', 'public');
                    $partnerLogo->partnerLogo->update([
                        'type' => Media::PARTNER_LOGO,
                        'path' => $path,
                    ]);
                }
            });
        } catch (\Exception $e) {
            Log::info('Error while updating the partner logo profile' . $e->getMessage());
            throw new PartnerLogoServiceException('Error while updating the partner logo profile' . $e->getMessage());
        }
    }
}
