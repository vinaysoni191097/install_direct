<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PartnerLogoFormRequest;
use App\Models\Media;
use App\Models\sections\PartnerLogo;
use App\Services\PartnerLogoService;
use App\Services\PartnerLogoServiceException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Expr\New_;

class PartnerLogoController extends Controller
{
    public function __construct(
        public PartnerLogoService $partnerLogoService
    ) {
    }

    public function index()
    {
        try {
            return view('admin.sections.logos.index', [
                'logos' => PartnerLogo::latest()->paginate(10),
            ]);
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong. Unable to view logo page');
        }
    }

    public function create()
    {
        try {
            return view('admin.sections.logos.create');
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong. Unable to access create logo page');
        }
    }

    public function store(PartnerLogoFormRequest $request)
    {
        try {
            $validated = $request->validated();
            $this->partnerLogoService->storePartnerLogo($validated);

            return redirect()->route('admin.logos')->with('success', 'Partner Logo added successfully.');
        } catch (PartnerLogoServiceException $e) {

            return back()->with('error', 'Unable to store partner logo');
        }
    }

    public function edit(PartnerLogo $partnerLogo)
    {
        try {
            return view('admin.sections.logos.edit', [
                'logo' => $partnerLogo,
            ]);
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong. Unable to access partner logo page');
        }
    }

    public function update(Request $request, PartnerLogo $partnerLogo)
    {
        try {
            $this->partnerLogoService->updatePartnerLogo($request, $partnerLogo);

            return redirect()->route('admin.logos')->with('success', 'Partner Logo updated successfully.');
        } catch (PartnerLogoServiceException $e) {

            return back()->with('error', 'Something went wrong. Unable to update the details');
        }
    }

    public function delete(PartnerLogo $partnerLogo)
    {
        try {
            $partnerLogo->delete();

            return redirect()->route('admin.logos')->with('success', 'Partner profile delete successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong. Unable to delete profile');
        }
    }
}
