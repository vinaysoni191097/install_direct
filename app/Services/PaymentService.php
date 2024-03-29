<?php

namespace App\Services;

use App\Models\BillingAddress;
use App\Models\Cart;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Stripe\StripeClient;

class PaymentService
{
    // Creating customer on stripe
    public function createCustomer()
    {
        try {
            $stripe = new StripeClient(config('services.stripePayment.secret_key'));
            $user = User::findOrFail(Auth::id());
            if (! $user->stripe_customer_id) {
                $customerId = $stripe->customers->create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'phone' => $user->phone_number,
                ]);
                $user->update([
                    'stripe_customer_id' => $customerId->id,
                ]);
            }

            return $user->stripe_customer_id;
        } catch (Exception $e) {
            Log::info('Error while creating stripe customer'.$e);

            return false;
        }
    }

    // Saving user card information if user selected save card

    public function savePaymentMethod($billingAddressId, $request)
    {
        try {
            $user = Auth::user();
            $stripe = new StripeClient(config('services.stripePayment.secret_key'));
            $address = BillingAddress::findOrFail($billingAddressId);

            $stripe->paymentMethods->update([
                $request->paymentMethodId,
                'billing_details' => [
                    'address' => [
                        'line1' => $address->address,
                        'city' => $address->city,
                        'country' => 'UK',
                        'state' => $address->country,
                        'postal_code' => $address->zip,
                    ],
                ],
                'customer' => $user->stripe_customer_id,
            ]);

            return true;
        } catch (Exception $e) {
            Log::info('Error while creating payment method for customer'.$e);

            return false;
        }
    }

    // Creating Final payment

    public function createPaymentIntent($billingAddressId, $request)
    {
        try {
            $user = Auth::user();
            $address = BillingAddress::findOrFail($billingAddressId);
            $stripe = new StripeClient(config('services.stripePayment.secret_key'));

            $stripe->paymentIntents->create([
                'amount' => Cart::BOOKING_AMOUNT * 100,
                'currency' => 'GBP',
                'automatic_payment_methods' => [
                    'enabled' => true,
                ],
                'confirm' => true,
                'description' => 'Reservation Amount',
                'customer' => $user->stripe_customer_id,
                'payment_method' => $request->paymentMethodId,
                'off_session' => true,
                'receipt_email' => $user->email,
                'shipping' => [
                    'name' => $user->name,
                    'address' => [
                        'line1' => $address->address,
                        'postal_code' => $address->zip,
                        'city' => $address->city,
                        'state' => $address->country,
                        'country' => 'GB',
                    ],
                ],
            ]);

            return true;
        } catch (Exception $e) {
            Log::info('Error while completing payment'.$e);

            return false;
        }
    }
}
