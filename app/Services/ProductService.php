<?php

namespace App\Services;

use App\Models\BatteryInverterCompatibility;
use App\Models\Media;
use App\Models\Product;
use App\Models\ProductSpecification;
use Exception;
use Illuminate\Support\Facades\Log;

class ProductService
{
    public function productStore($products, $validator, $request)
    {
        try {

            // Creating Product

            $product = $products->create([
                'title' => $validator['title'],
                'description' => $validator['description'],
                'price' => $validator['price'],
                'category_id' => $validator['category'],
                'stock' => $validator['stock'],
                'Kwh' => $validator['Kwh'],
                'warranty' => $request->warranty,
                'variation' => $request->productVariation,
            ]);

            // If featured Image is there then it wil be added to media table

            if ($request->hasFile('featured_image')) {
                $filename = $request->featured_image;
                $path = $filename->store('product_images', 'public');
                $media = Media::create([
                    'type' => Media::PRODUCT,
                    'product_id' => $product->id,
                    'path' => $path,
                ]);
                $product->update([
                    'featured_image_id' => $media->id,
                ]);
            }

            // Adding product specifications to table
            if ($validator['specification_name'] && $validator['specification_value'] != null) {
                if ($product->id && $validator['specification_name'] && $validator['specification_value']) {
                    $specifications = array_map(function ($name, $value) use ($product) {
                        return new ProductSpecification([
                            'product_id' => $product->id,
                            'specification_name' => $name,
                            'specification_value' => $value,
                        ]);
                    }, $validator['specification_name'], $validator['specification_value']);
                    $product->productSpecifications()->saveMany($specifications);
                }
            }


            // Adding panel compatibility
            if (isset($validator['inverter_compatibility'])) {
                $compatibleProducts = array_map(function ($value) use ($product) {
                    return new BatteryInverterCompatibility([
                        'battery_id' => $product->id,
                        'inverter_id' => $value,
                    ]);
                }, $validator['inverter_compatibility']);
                $product->batteryInverterCompatibility()->saveMany($compatibleProducts);
            }

            return [$product, true];
        } catch (Exception $e) {

            Log::info('error while creating new product'.$e);

            return false;
        }
    }

    public function productUpdate($product, $validator, $request)
    {
        try {
            $product->update([
                'title' => $validator['title'],
                'description' => $validator['description'],
                'price' => $validator['price'],
                'stock' => $validator['stock'],
                'Kwh' => $validator['Kwh'],
                'warranty' => $request->warranty,
                'variation' => $request->productVariation,
                'category_id' => $validator['category'],
            ]);
            // If featured Image is there then it wil be updated to media table
            if ($request->hasFile('featured_image')) {
                $filename = $request->featured_image;
                $path = $filename->store('product_images', 'public');
                if (! $product->featured_image_id) {

                    $media = Media::create([
                        'type' => Media::PRODUCT,
                        'product_id' => $product->id,
                        'path' => $path,
                    ]);
                    $product->update([
                        'featured_image_id' => $media->id,
                    ]);
                }
                $product->productImage()->update([
                    'path' => $path,
                ]);
            }
            // Adding product specifications to table
            if ($validator['specification_name'] && $validator['specification_value']) {
                if ($validator['specification_name'] && $validator['specification_value']) {
                    $product->productSpecifications()->delete(); // Removing Older specificaitons first
                    $specifications = array_map(function ($name, $value) use ($product) {
                        return new ProductSpecification([
                            'product_id' => $product->id,
                            'specification_name' => $name,
                            'specification_value' => $value,
                        ]);
                    }, $validator['specification_name'], $validator['specification_value']);
                    $product->productSpecifications()->saveMany($specifications);
                }
            }
            // Adding product compatibility with panels
            if (isset($validator['inverter_compatibility'])) {
                $product->batteryInverterCompatibility()->delete(); // Removing Older specificaitons first
                $compatibleProducts = array_map(function ($value) use ($product) {
                    return new BatteryInverterCompatibility([
                        'battery_id' => $product->id,
                        'inverter_id' => $value,
                    ]);
                }, $validator['inverter_compatibility']);
                $product->batteryInverterCompatibility()->saveMany($compatibleProducts);
            }

            return true;
        } catch (Exception $e) {
            Log::info('error while creating new product'.$e);

            return false;
        }
    }
}
