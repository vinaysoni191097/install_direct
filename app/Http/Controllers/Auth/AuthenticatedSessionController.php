<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Services\AuthCheckService;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        try {

            $request->authenticate();
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
                //  Created service to check if session is having enquiry values or not
                $user = User::find(Auth::id());
                $AuthCheckService = new AuthCheckService;
                $response = $AuthCheckService->userLoginCheck();
                if ($response == true && session()->has('ownership')) {
                    $request->session()->regenerate();

                    return redirect()->route('customer.property.recommendedProduct')->with('success', 'Information has been saved. Please procced with next steps!');
                } elseif (! $response) {
                    toastr()->error('Ops! Unable to capture information. Please try again.');
                    $request->session()->regenerate();

                    return redirect()->intended(RouteServiceProvider::HOME);
                }

                // If "remember me" is checked, set cookies with user input for convenience
                if ($request->has('remember')) {
                    Cookie::queue('email', $request->email, 60 * 24 * 30);
                    Cookie::queue('password', $request->password, 60 * 24 * 30);
                } else {
                    $user->update([
                        'remember_token' => null,
                    ]);
                    Cookie::expire('email');
                    Cookie::expire('password');
                }
                $request->session()->regenerate();

                return redirect()->intended(RouteServiceProvider::HOME);
            }
        } catch (Exception $e) {
            Log::info('error while loging into portal'.$e);

            return back()->withErrors(['password' => 'Invalid credentails']);
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return to_route('login');
    }
}
