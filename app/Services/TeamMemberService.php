<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class TeamMemberServiceException extends \Exception
{
};
class TeamMemberService
{
    public function getTeamMembers($teamMember)
    {
        try {
            $members = $teamMember::latest()->paginate(10);
            return ['members' => $members];
        } catch (\Exception $e) {
            Log::info('Error while accessing members listing' . $e->getMessage());

            throw new TeamMemberServiceException('Error while listing members' . $e->getMessage());
        }
    }


    public function storeTeamMemberProfile($validated, $teamMember)
    {
        try {
            $teamMember->create([
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'email' => $validated['email'],
                'phone_number' => $validated['phone'],
                'description' => $validated['description'],
                'designation' => $validated['designation'],
                'twitter_url' => $validated['twitter_url'],
                'linkedIn_url' => $validated['linkedIn_url'],
            ]);
            if (array_key_exists('featured_image', $validated) && $validated['featured_image'] != null) {
                $filename = $validated['featured_image'];
                $path = $filename->store('team_members', 'public');
                $teamMember->update([
                    'profile_picture' => $path,
                ]);
            }
        } catch (\Exception $e) {
            Log::info('Error while storing team member details' . $e->getMessage());

            throw new TeamMemberServiceException('Error while storing team member details' . $e->getMessage());
        }
    }


    public function updateTeamMemberProfile($validated, $teamMember)
    {
        try {
            $teamMember->update([
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'email' => $validated['email'],
                'phone_number' => $validated['phone'],
                'description' => $validated['description'],
                'designation' => $validated['designation'],
                'twitter_url' => $validated['twitter_url'],
                'linkedIn_url' => $validated['linkedIn_url'],
            ]);
            if (array_key_exists('featured_image', $validated) && $validated['featured_image'] != null) {
                $filename = $validated['featured_image'];
                $oldImagePath = $teamMember->profile_picture ?? null;
                // Delete old image if it exists
                if ($oldImagePath && Storage::disk('public')->exists($oldImagePath)) {
                    Storage::disk('public')->delete($oldImagePath);
                }
                $path = $filename->store('team_members', 'public');
                $teamMember->update([
                    'profile_picture' => $path,
                ]);
            }
        } catch (\Exception $e) {
            Log::info('Error while updating team member details' . $e->getMessage());

            throw new TeamMemberServiceException('Error while updating team member details' . $e->getMessage());
        }
    }
}
