<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SolarPanelFormRequest;
use App\Models\Media;
use App\Models\SolarPanel;
use App\Services\SolarPanelService;
use App\Services\SolarPanelServiceException;
use Exception;
use Illuminate\Support\Facades\Log;

class AdminSolarPanelController extends Controller
{
    public function __construct(
        public SolarPanelService $solarPanelService
    ) {
    }

    public function index()
    {
        try {
            return view('admin.panels.index', [
                'panels' => SolarPanel::latest()->paginate(10),
            ]);
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong. Unable to access panel page');
        }
    }

    public function store(SolarPanelFormRequest $request, SolarPanel $panel)
    {
        try {
            $validated = $request->validated(); // Get the Validator instance
            $this->solarPanelService->storeSolarPanels($validated, $panel);

            return redirect()->back()->with('success', __('Panel created successfully!'));
        } catch (SolarPanelServiceException $e) {

            return redirect()->back()->with('error', 'Ops! Something went wrong!');
        }
    }

    public function update(SolarPanelFormRequest $request, SolarPanel $panel)
    {
        try {

            $validated = $request->validated();
            $this->solarPanelService->updateSolarPanel($validated, $panel);

            return redirect()->back()->with('success', __('Panel type updated successfully!'));
        } catch (SolarPanelServiceException $e) {
            return redirect()->back()->with('error', 'Ops! Something went wrong!');
        }
    }

    public function delete(SolarPanel $panel)
    {
        try {
            $panel->delete();

            return redirect()->back()->with('success', __('Panel Type deleted successfully!'));
        } catch (Exception $e) {
            Log::info('Error while deleting category' . $e);

            return redirect()->back()->with('error', 'Ops! Something went wrong!');
        }
    }
}
