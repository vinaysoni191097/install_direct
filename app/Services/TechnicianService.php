<?php

namespace App\Services;

use App\Models\Role;
use App\Models\TechnicianProfile;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class TechnicianServiceException extends \Exception
{
};
class TechnicianService
{
    public function getTechnicians($technicians)
    {
        try {
            $technicians = User::isTechnician()->latest()->paginate(10);
            return ['technicians' => $technicians];
        } catch (\Exception $e) {
            Log::info('Error while accessing technicians listing page' . $e->getMessage());
            throw new  TechnicianServiceException('Error while listing technicians list');
        }
    }


    public function storeTechnicianProfile($validated, $user)
    {
        try {
            $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            $password = substr(str_shuffle($chars), 0, 8);
            DB::transaction(function () use ($validated, &$user, $password) {
                $user = User::create([
                    'name' => $validated,
                    'role_id' => Role::TECHNICIAN,
                    'email' => $validated['email'],
                    'password' => Hash::make($password),
                    'phone_number' => $validated['phone'],
                ]);

                TechnicianProfile::create([
                    'user_id' => $user->id,
                    'first_name' => $validated['first_name'],
                    'last_name' => $validated['last_name'],
                    'address' => $validated['address'],
                    'city' => $validated['city'],
                    'state' => $validated['state'],
                    'zip' => $validated['zip'],
                    'country' => $validated['country'],
                ]);
            });
        } catch (\Exception $e) {
            Log::info('Error while creating technician profile' . $e->getMessage());
            throw new TechnicianServiceException('Error while storing technician profile data' . $e->getMessage());
        }
    }


    public function updateTechnicianProfile($validated, $user)
    {
        try {
            DB::transaction(function () use ($validated, &$user) {
                $user->update([
                    'name' => $validated,
                    'email' => $validated['email'],
                    'phone_number' => $validated['phone'],
                ]);

                $user->technicianData->update([
                    'first_name' => $validated['first_name'],
                    'last_name' => $validated['last_name'],
                    'address' => $validated['address'],
                    'city' => $validated['city'],
                    'state' => $validated['state'],
                    'zip' => $validated['zip'],
                    'country' => $validated['country'],
                ]);
            });
        } catch (\Exception $e) {
            Log::info('Error while updating technician profile' . $e->getMessage());
            throw new TechnicianServiceException('Error while updating technician profile' . $e->getMessage());
        }
    }
}
