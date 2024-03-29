<?php

namespace App\Services;

use App\Models\Media;
use App\Models\ProductSpecification;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ProductVariationService
{
    public function productVariationStore($validator, $productVariation)
    {
        try {
            //create product variation
            foreach ($validator as $value) {
                $variation = $productVariation->create([
                    'product_id' => $value['parent_product_id'],
                    'title' => $value['title'],
                    'price' => $value['price'],
                    'stock' => $value['stock'],
                    'warranty' => $value['warranty'],
                    'Kwh' => $value['Kwh'],
                ]);

                //Store Media files

                if (isset($value['featured_image']) && $value['featured_image'] != null) {
                    $filename = $value['featured_image'];
                    $path = $filename->store('product_variation_images', 'public');
                    $media = Media::create([
                        'type' => Media::PRODUCT_VARIANT,
                        'product_variant_id' => $variation->id,
                        'path' => $path,
                    ]);
                    $variation->update([
                        'featured_image_id' => $media->id,
                    ]);
                }

                // Adding product specifications to table

                if ($variation->id && isset($value['specification_name']) && isset($value['specification_value'])) {
                    foreach ($value['specification_name'] as $key => $specName) {
                        // Access corresponding specification value
                        $specValue = $value['specification_value'][$key];
                        // Now, you can use $specName and $specValue to create ProductSpecification
                        ProductSpecification::create([
                            'product_variation_id' => $variation->id,
                            'specification_name' => $specName,
                            'specification_value' => $specValue,
                        ]);
                    }
                }
            }

            return true;
        } catch (Exception $e) {
            Log::info('error while creating new product variation'.$e);

            return false;
        }
    }

    public function productVariationUpdate($validator, $productVariation)
    {
        try {
            //update product variation
            $productVariation->update([
                'title' => $validator['title'],
                'price' => $validator['price'],
                'stock' => $validator['stock'],
                'warranty' => $validator['warranty'],
                'Kwh' => $validator['Kwh'],
            ]);
            //Store Media files

            if (isset($validator['featured_image']) && $validator['featured_image'] != null) {
                $filename = $validator['featured_image'];
                $path = $filename->store('product_variation_images', 'public');
                if (! $productVariation->featured_image_id) {
                    $media = Media::create([
                        'type' => Media::PRODUCT_VARIANT,
                        'product_variant_id' => $productVariation->id,
                        'path' => $path,
                    ]);
                    $productVariation->update([
                        'featured_image_id' => $media->id,
                    ]);
                }
                $productVariation->variationImage()->update([
                    'path' => $path,
                ]);
            }

            // Adding product specifications to table

            if (isset($validator['specification_name']) && isset($validator['specification_value'])) {
                $productVariation->variationSpecifications()->delete(); // Removing old values from DB
                foreach ($validator['specification_name'] as $key => $specName) {
                    // Access corresponding specification value
                    $specValue = $validator['specification_value'][$key];
                    // Now, you can use $specName and $specValue to create ProductSpecification
                    ProductSpecification::create([
                        'product_variation_id' => $productVariation->id,
                        'specification_name' => $specName,
                        'specification_value' => $specValue,
                    ]);
                }
            }

            return true;
        } catch (Exception $e) {
            Log::info('error while creating new product variation'.$e);

            return false;
        }
    }

    public function newVariationAddition($request, $productVariation)
    {
        try {
            $validator = Validator::make($request->all(), [
                'parent_product_id' => 'required',
                'price' => 'required|string|max:255',
                'title' => 'required|string|max:255',
                'stock' => 'required|numeric|min:1',
                'warranty' => 'required',
                'specification_value.*' => 'present|required',
                'specification_name.*' => 'present|required',
                'Kwh' => 'required',
                'featured_image' => 'nullable',
            ], $messages = [
                'title.required' => 'The title field is required.',
                'price.required' => 'The Price field is required',
                'stock.required' => 'The stock field is required',
                'stock.min' => 'Stock should be greater than 1',
                'category.required' => 'Please select atleast one category',
                'warranty.required' => 'The warranty field is required',
                'specification_value.*.required' => 'The specification value field is required',
                'specification_name.*.required' => 'The specification name field is required',
            ]);
            if ($validator->fails()) {
                return $messages;
            }
            $validated = $validator->validated();
            $newVariation = $productVariation->create([
                'product_id' => $validated['parent_product_id'],
                'title' => $validated['title'],
                'price' => $validated['price'],
                'stock' => $validated['stock'],
                'warranty' => $validated['warranty'],
                'Kwh' => $validated['Kwh'],
            ]);
            // updating status under parent product for variation
            $newVariation->parentProduct->update([
                'variation' => true,
            ]);
            //Store Media files

            if (isset($validated['featured_image']) && $validated['featured_image'] != null) {
                $filename = $validated['featured_image'];
                $path = $filename->store('product_variation_images', 'public');
                $media = Media::create([
                    'type' => Media::PRODUCT_VARIANT,
                    'product_variant_id' => $validated['parent_product_id'],
                    'path' => $path,
                ]);
                $newVariation->update([
                    'featured_image_id' => $media->id,
                ]);
            }

            // Adding product specifications to table

            if ($newVariation->id && isset($validated['specification_name']) && isset($validated['specification_value'])) {
                foreach ($validated['specification_name'] as $key => $specName) {
                    // Access corresponding specification value
                    $specValue = $validated['specification_value'][$key];
                    // Now, you can use $specName and $specValue to create ProductSpecification
                    ProductSpecification::create([
                        'product_variation_id' => $newVariation->id,
                        'specification_name' => $specName,
                        'specification_value' => $specValue,
                    ]);
                }
            }

            return [$newVariation, true];
        } catch (Exception $e) {
            Log::info('error while creating new variation '.$e);

            return false;
        }
    }
}
