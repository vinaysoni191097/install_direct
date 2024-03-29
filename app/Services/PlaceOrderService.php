<?php

namespace App\Services;

use App\Helpers\Helpers;
use App\Jobs\OrderConfirmationEmailJob;
use App\Models\BillingAddress;
use App\Models\Cart;
use App\Models\EmailTemplate;
use App\Models\InstallationAddress;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class PlaceOrderServiceException extends \Exception
{
};
class PlaceOrderService
{
    public function billingAddressCheck($request)
    {
        try {
            if ($request->addressId == null) {
                $validator = Validator::make($request->all(), [
                    'shippingFullName' => 'required|min:1|max:255',
                    'phone_number' => 'required|min:1|max:255',
                    'city' => 'required',
                    'country' => 'required',
                    'shippingAddress2' => 'required',
                    'zip' => 'required',
                ], [
                    'shippingFullName.required' => 'The first name field is required.',
                    'phone_number.required' => 'The phone number field is required.',
                    'city.required' => 'Please select atleast one city.',
                    'country.required' => 'Please select atleast one country.',
                ]);

                if ($validator->fails()) {
                    return [
                        false,
                        back()->with('error')->withErrors($validator)->withInput(),
                    ];
                }
                $validated = $validator->validated();
                $newBillingAddress = BillingAddress::create([
                    'user_id' => Auth::id(),
                    'new_address_full_name' => $validated['shippingFullName'],
                    'phone_number' => $validated['phone_number'],
                    'city' => $validated['city'],
                    'country' => $validated['country'],
                    'address' => $validated['shippingAddress2'],
                    'zip' => $validated['zip'],
                ]);

                return [
                    true,
                    'billingId' => $newBillingAddress->id,
                ];
            }

            return [
                true,
                'billingId' => $request->addressId,
            ];
        } catch (Exception $e) {
            Log::info('Error while checking billing address' . $e);

            return false;
        }
    }

    public function createOrder($billingAddressId)
    {
        try {
            $panels = Cart::where('user_id', Auth::id())->first();
            $uniqueOrderNumber = Helpers::generateEnquiryNumber();
            $cart = Cart::with('products', 'productVariations')->where('user_id', Auth::id())->get();
            $billingAddress = BillingAddress::findorFail($billingAddressId)->where('user_id', Auth::id())->first();
            $installation = InstallationAddress::where('user_id', Auth::id())->first();
            $session = session()->all();

            DB::beginTransaction();
            $order = Order::create([
                'user_id' => Auth::id(),
                'order_number' => $uniqueOrderNumber,
                'installation_address' => $installation->address,
                'billing_name' => $billingAddress->new_address_full_name,
                'billing_address' => $billingAddress->full_address,
                'installation_timeframe' => $installation->installation_timeframe,
                'booking_amount' => Cart::BOOKING_AMOUNT,
                'rooftop_cordinates' => $session['rooftopCordinates'],
                'installation_address_latitude' => $session['latitude'],
                'installation_address_longitude' => $session['longitude']

            ]);
            if ($order) {
                foreach ($cart as $key => $value) {
                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_name' => $value->product_variation_id ? $value->productVariations->title : $value->products->title,
                        'price' => $value->product_variation_id ? $value->productVariations->price : $value->products->price,
                        'quantity' => $value->quantity,
                        'Kwh' => $value->product_variation_id ? $value->productVariations->Kwh : $value->products->Kwh,
                        'warranty' => $value->warranty,
                        'product_image' => $value->products->productImage->path ?? null,
                    ]);
                }

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_name' => $panels->solarPanels->title . $panels->solarPanels->watts,
                    'price' => $panels->solarPanels->price,
                    'quantity' => $panels->panel_quantity,
                    'product_image' => $panels->solarPanels->productImage->path ?? null,
                ]);
                DB::commit();
                $user = User::findorFail(Auth::id());
                $emailTemplate = EmailTemplate::where('template_used_for', EmailTemplate::ORDER_CONFIRMATION)->first();
                $adminEmailTemplate = EmailTemplate::where('template_used_for', EmailTemplate::ADMIN_ORDER_CONFIRMATION)->first();
                $bookingTemplate = EmailTemplate::where('template_used_for', EmailTemplate::BOOKING_CONFIRMATION)->first();
                OrderConfirmationEmailJob::dispatch($order, $user, $emailTemplate, $adminEmailTemplate, $bookingTemplate);

                return true;
            }
            DB::rollBack();

            return false;
        } catch (PlaceOrderServiceException $e) {
            Log::info('Error while creating order entry' . $e);
            throw new PlaceOrderServiceException('Error while creating order entry' . $e);
        }
    }
}
