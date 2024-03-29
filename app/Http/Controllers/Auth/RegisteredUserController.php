<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserFormRequest;
use App\Jobs\UserRegistrationEmailJob;
use App\Models\EmailTemplate;
use App\Models\User;
use App\Models\UserProfile;
use App\Providers\RouteServiceProvider;
use App\Services\AuthCheckService;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(RegisterUserFormRequest $request): RedirectResponse
    {
        $user = null;

        try {

            $validated = $request->validated();
            $password = $validated['password'];

            DB::transaction(function () use ($validated, &$user, $password) {
                $user = User::create([
                    'name' => $validated,
                    'email' => $validated['email'],
                    'password' => Hash::make($password),
                    'phone_number' => $validated['phone'],
                ]);

                UserProfile::create([
                    'user_id' => $user->id,
                    'first_name' => $validated['first_name'],
                    'last_name' => $validated['last_name'],
                ]);
            });

            if (!$user) {
                throw new Exception('Unable to register.');
            }

            event(new Registered($user));
            Auth::login($user);

            $AuthCheckService = new AuthCheckService;
            $response = $AuthCheckService->userRegisterCheck();

            if ($response) {
                return redirect()->route('customer.property.recommendedProduct')->with('success', 'Information has been saved. Please procced with next steps!');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', __('Ops! Something went wrong. Unable to register user.'))->withErrors($validated)->withInput();
        }

        try {
            if ($user && $user instanceof User) {
                $emailTemplate = EmailTemplate::where('template_used_for', EmailTemplate::USER_REGISTRATION)->first();
                UserRegistrationEmailJob::dispatch($user, $emailTemplate);

                return redirect(RouteServiceProvider::HOME);
            }
        } catch (Exception $e) {
            Log::info('Error while sending email' . $e);

            return redirect(RouteServiceProvider::HOME)->with('info', 'User Registration successful but unable to send welcome email.');
        }
    }
}
