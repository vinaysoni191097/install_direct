<?php

namespace App\Http\Controllers\customer;

use App\Enum\PropertyImageType;
use App\Http\Controllers\Controller;
use App\Http\Requests\PendingDocumentsUploadRequest;
use App\Models\Order;
use App\Models\PropertyImage;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PendingDocumentsController extends Controller
{
    public function __construct(
        public PropertyImageType $propertyImageType
    ) {
    }

    public function view(Order $order)
    {
        try {
            $response = $this->authorize('view', $order);
            if ($response) {
                return view('customer.orders.document-upload', [
                    'order' => $order,
                ]);
            }

            return back()->with('error', 'You are not authorized to view other order details');
        } catch (Exception $e) {
            Log::info('Error while accessing pending documents upload page'.$e);

            return back()->with('error', 'Something went wrong. Unable to access documents upload page. ');
        }
    }

    public function store(PendingDocumentsUploadRequest $request, Order $order)
    {
        try {
            $validated = $request->validated();
            $response = $this->authorize('update', $order);
            if ($response) {
                $images = [];
                foreach ($validated as $key => $value) {
                    foreach ($value as $image) {
                        $uniqueName = Str::uuid()->toString(); // Generate a unique name for each image
                        $imageName = $uniqueName.'.'.$image->getClientOriginalExtension();
                        $imageExtension = $image->getClientOriginalExtension(); // Extract image extension
                        $path = $image->storeAs('pending_documents', $imageName, 'public');

                        $images[] = new PropertyImage([
                            'order_id' => $order->id,
                            'image_type' => $this->propertyImageType->getImageType(strtoupper($key)),
                            'image_path' => $path,
                            'image_name' => $imageName,
                            'image_extension' => $imageExtension,
                            'driver' => config('filesystems.default'),
                        ]);
                    }
                }
                if (count($images) > 0) {
                    $order->propertyImages()->saveMany($images);
                    $order->update([
                        'document_uploaded' => true,
                    ]);

                    return redirect()->route('customer.order.details', $order)->with('success', 'Property Images uploaded successfully.');
                }
            }

            return back()->with('error', 'Something went wrong. Unable to upload images. Please try again later.');
        } catch (Exception $e) {
            Log::info('Error while uploading pending documents'.$e);

            return back()->with('error', 'Something went wrong. Unable to upload images. Please try again later.');
        }
    }
}
