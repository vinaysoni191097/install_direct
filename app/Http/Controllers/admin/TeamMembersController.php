<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeamMemberFormRequest;
use App\Models\TeamMember;
use App\Models\User;
use App\Services\TeamMemberService;
use App\Services\TeamMemberServiceException;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class TeamMembersController extends Controller
{
    public function __construct(
        public TeamMemberService $teamMemberService
    ) {
    }


    public function index(TeamMember $teamMember): View
    {
        try {
            $response = $this->teamMemberService->getTeamMembers($teamMember);
            return view('admin.members.index', [
                'members' => $response['members'],
            ]);
        } catch (TeamMemberServiceException $e) {

            return back()->with('error', 'Something went wrong! Unable to list team members');
        }
    }

    public function create()
    {
        try {
            return view('admin.members.create');
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong. Unable to access new team member page');
        }
    }

    public function store(TeamMemberFormRequest $request, TeamMember $teamMember)
    {
        try {
            $validated = $request->validated();
            $this->teamMemberService->storeTeamMemberProfile($validated, $teamMember);

            return redirect()->route('admin.team.members')->with('success', 'Team member added successfully!');
        } catch (TeamMemberServiceException $e) {

            return back()->with('error', 'Something went wrong. Unable to store member details.');
        }
    }

    public function view(TeamMember $teamMember)
    {
        try {
            return view('admin.members.view', [
                'member' => $teamMember,
            ]);
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong. Unable to view details');
        }
    }

    public function edit(TeamMember $teamMember)
    {
        try {
            return view('admin.members.edit', [
                'member' => $teamMember,
            ]);
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong. Unable to view details');
        }
    }

    public function update(TeamMemberFormRequest $request, TeamMember $teamMember)
    {
        try {
            $validated = $request->validated();
            $this->teamMemberService->updateTeamMemberProfile($validated, $teamMember);

            return redirect()->route('admin.team.members')->with('success', 'Team member updated successfully!');
        } catch (TeamMemberServiceException $e) {

            return back()->with('error', 'Something went wrong. Unable to update member details.');
        }
    }

    public function delete(TeamMember $teamMember)
    {
        try {
            $this->authorize('delete', $teamMember);
            $teamMember->delete();

            return redirect()->route('admin.team.members')->with('success', 'Member Profile deleted successfully!');
        } catch (Exception $e) {
            return back()->with('error', 'Unable to delete member profile');
        }
    }
}
