<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdateFormRequest;
use App\Jobs\UserNewPasswordEmailJob;
use App\Models\EmailTemplate;
use App\Models\OrderAssign;
use App\Models\User;
use App\Services\UserService;
use App\Services\UserServiceException;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class UserController extends Controller
{
    public function __construct(
        public UserService $userService
    ) {
    }

    public function index(User $user): View
    {
        try {
            $response = $this->userService->getUsers($user);
            return view('admin.users.index', [
                'users' => $response['users'],
                'order' => $response['order'],
            ]);
        } catch (UserServiceException $e) {
            return back()->with('error', 'Something went wrong! Unable to list users');
        }
    }


    public function view(User $user)
    {
        try {
            return view('admin.users.view', [
                'user' => $user,
            ]);
        } catch (Exception $e) {
            Log::info('Error while accessing users view' . $e);

            return back()->with('error', 'Something went wrong! Unable to list users');
        }
    }

    public function edit(User $user)
    {
        try {
            return view('admin.users.edit', [
                'user' => $user,
            ]);
        } catch (Exception $e) {
            Log::info('Error while accessing users edit page' . $e);

            return back()->with('error', 'Something went wrong! Unable to list users');
        }
    }

    public function update(UserUpdateFormRequest $request, User $user)
    {
        try {
            $validator = $request->validated(); // Get the Validator instance
            $this->userService->updateUserData($validator, $user);
            return redirect()->route('admin.users')->with('success', 'User updated successfully!');
        } catch (UserServiceException $e) {
            return back()->with('error', 'An error has occurred please try again later.');
        }
    }

    public function delete(User $user)
    {
        try {
            $response =  $this->authorize('delete', $user);
            if ($response) {
                $user->delete();
                return redirect()->route('admin.users')->with('success', 'User deleted successfully!');
            }
        } catch (Exception $e) {
            Log::info('Error while deleting users' . $e);

            return back()->with('error', 'An error has occurred please try again later.');
        }
    }

    public function passwordreset(User $user)
    {
        try {
            $this->userService->updateUserPassword($user);
            return back()->with('success', 'New password generated and email sent to user.');
        } catch (UserServiceException) {
            return back()->with('error', 'Ops! Something went wrong. Unable to generate new password.');
        }
    }
}
