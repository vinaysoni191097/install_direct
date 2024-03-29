<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TechnicianFormRequest;
use App\Models\Role;
use App\Models\TechnicianProfile;
use App\Models\User;
use App\Services\TechnicianService;
use App\Services\TechnicianServiceException;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class TechnicianController extends Controller
{
    public function __construct(
        public TechnicianService $technicianService
    ) {
    }


    public function index(User $user): View
    {
        try {
            $response = $this->technicianService->getTechnicians($user);

            return view('admin.technician.index', [
                'technicians' => $response['technicians'],
            ]);
        } catch (TechnicianServiceException) {
            return back()->with('error', 'Unable to access technicians listing');
        }
    }

    public function create(): View
    {
        try {
            return view('admin.technician.create');
        } catch (Exception $e) {
            Log::info('Error while accessing technicians create page' . $e);

            return back()->with('error', 'Unable to access technicians listing');
        }
    }

    public function store(TechnicianFormRequest $request, User $user)
    {
        try {
            $validated = $request->validated();
            $this->technicianService->storeTechnicianProfile($validated, $user);

            return redirect()->route('admin.technicians')->with('success', 'Technician profile created successfully');
        } catch (TechnicianServiceException $e) {
            return back()->with('error', 'Something went wrong. Unable to create profile')->withErrors($validated)->withInput();
        }
    }

    public function view(User $user)
    {
        try {
            return view('admin.technician.view', [
                'technician' => $user,
            ]);
        } catch (Exception $e) {
            Log::info('Error while access technician details' . $e);

            return back()->with('erorr', 'Something went wrong. Unable to fetch details');
        }
    }

    public function edit(User $user)
    {
        try {
            return view('admin.technician.edit', [
                'technician' => $user,
            ]);
        } catch (Exception $e) {
            Log::info('Error while access technician details' . $e);

            return back()->with('erorr', 'Something went wrong. Unable to fetch details');
        }
    }

    public function Update(TechnicianFormRequest $request, User $user)
    {
        try {
            $validated = $request->validated();
            $this->technicianService->updateTechnicianProfile($validated, $user);

            return redirect()->route('admin.technicians')->with('success', 'Technician profile updated successfully');
        } catch (TechnicianServiceException $e) {

            return back()->with('error', 'Something went wrong. Unable to update profile');
        }
    }

    public function delete(User $user)
    {
        try {
            $this->authorize('delete', $user);
            $user->delete();
            return redirect()->route('admin.technicians')->with('success', 'Technician profile deleted successfully');
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong. Unable to delete profile');
        }
    }
}
