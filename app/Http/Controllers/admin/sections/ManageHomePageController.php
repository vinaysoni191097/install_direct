<?php

namespace App\Http\Controllers\admin\sections;

use App\Http\Controllers\Controller;
use App\Http\Requests\HomePageFormRequest;
use App\Models\sections\HomePage;
use App\Services\HomePageService;
use Illuminate\Support\Facades\Log;

class ManageHomePageController extends Controller
{
    public function index()
    {
        try {
            return view('admin.sections.home.index', [
                'content' => HomePage::first(),
            ]);
        } catch (\Exception $e) {
            Log::info('Error while accessing manage frontend page section'.$e);

            return back()->with('error', 'Something went wrong. Unable to access home page');
        }
    }

    public function store(HomePageFormRequest $request)
    {
        try {
            $validator = $request->validated();
            $homePageStoreService = new HomePageService;
            $response = $homePageStoreService->storeHomePageData($validator);
            if ($response) {
                return back()->with('success', 'Information saved successfully');
            }
        } catch (\Exception $e) {
            Log::info('Error while storing home page content information'.$e);

            return back()->with('error', 'Something went wrong. Unable to store information');
        }
    }
}
