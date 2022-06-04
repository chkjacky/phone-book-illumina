<?php

namespace App\Http\Controllers;

use App\Http\Validators\AuthValidator;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    // DEFAULT CONSTRUCTOR
    public function __construct()
    {
        $this->user = new User();
        $this->authValidator = new AuthValidator();
    }

    /**
     * DISPLAY PROFILE PAGE
     */
    public function showProfile()
    {
        // Get user ID from the session data
        $userId = session()->get('user')['id'];

        // Pass user data to the recruitment form
        return view('profile', $this->getUserDataById($userId));
    }

    /**
     * UPDATE PROFILE
     *
     * @param   object  $request        The request data in object
     *
     */
    public function editProfile(Request $request)
    {
        // Validate form data
        $validator = $this->authValidator->validateUpdateProfile($request);

        if ($validator->fails()) {
            // return $validator->errors()->toArray();
            return back()->withErrors($validator->errors()->toArray());
        }

        // Get user ID from the session data
        $userId = session()->get('user')['id'];

        $response = DB::transaction(function () use ($userId, $request) {
            return $this->user->updateUserData($userId, $this->setProfileData($request));
        });

        if (!$response) {
            return back()->withInput();
        }

        return redirect('profile')->with('success', 'Your profile is updated!');
    }

    /**
     * GET USER DATA BY USER
     *
     */
    private function getUserDataById(int $userId)
    {
        return $this->user->getUserDataById($userId);
    }

    /**
     * SET PROFILE DATA
     *
     * @param   object  $request        The request data in object
     *
     */
    private function setProfileData(Request $request)
    {
        if (empty($request->password)) {
            return [
                'name' => $request->name,
            ];
        }

        return [
            'name' => $request->name,
            'password' => Hash::make($request->password),
        ];
    }
}
