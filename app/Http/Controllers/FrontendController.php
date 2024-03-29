<?php

namespace App\Http\Controllers;

use App\Models\sections\AboutUsPage;
use App\Models\sections\Faq;
use App\Models\sections\HomePage;
use App\Models\sections\PartnerLogo;
use App\Models\TeamMember;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class FrontendController extends Controller
{
    public function home(Request $request)
    {
        try {
            // if customer close steps in between , we will remove it's data from session
            if (session()->has('totalArea') || session()->has('zip')) {
                $request->session()->forget([
                    'ownership',
                    'members',
                    'powerConsumption',
                    'electricityRate',
                    'dayRate',
                    'nightRate',
                    'solarInstallation',
                    'latitude',
                    'longitude',
                    'location',
                    'zip',
                    'totalArea',
                ]);
            }

            return view('frontend.index', [
                'user' => Auth::user(),
                'faqs' => Faq::isActive()->get(),
                'logos' => PartnerLogo::isActive()->get(),
                'content' => HomePage::first(),
                'aboutUsContent' => AboutUsPage::first(),
            ]);
        } catch (Exception $e) {
            Log::info('Error on fetching home page'.$e);

            return;
        }
    }

    public function aboutUs()
    {
        try {
            return view('frontend.about-us', [
                'logos' => PartnerLogo::isActive()->get(),
                'members' => TeamMember::get(),
                'content' => AboutUsPage::whereNotNull('page_headline')->first(),
            ]);
        } catch (Exception $e) {
            Log::info('error while accessing frontend about us page'.$e);

            return back()->with('error', 'something went wrong. Unable to access about us page');
        }
    }

    public function contactUs()
    {
        try {
            return view('frontend.contact-us');
        } catch (Exception $e) {
            Log::info('error while accessing frontend contact us page'.$e);

            return back()->with('error', 'something went wrong. Unable to access about us page');
        }
    }

    public function howItWorks()
    {
        try {
            return view('frontend.how-it-work');
        } catch (Exception $e) {
            Log::info('error while accessing frontend contact us page'.$e);

            return back()->with('error', 'something went wrong. Unable to access how it works page');
        }
    }

    public function privacyPolicy()
    {
        try {
            return view('frontend.privacy-policy');
        } catch (Exception $e) {
            Log::info('error while accessing frontend contact us page'.$e);

            return back()->with('error', 'something went wrong. Unable to access privacy policy page');
        }
    }
}
