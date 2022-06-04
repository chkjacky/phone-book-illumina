<?php

namespace App\Http\Controllers;

use App\Http\Validators\AuthValidator;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    // DEFAULT CONSTRUCTOR
    public function __construct()
    {
        $this->authValidator = new AuthValidator();
        $this->user = new User();
    }

    /**
     * DISPLAY SIGN UP PAGE
     * 
     */
    public function showSignUp()
    {
        return view('signup');
    }

    /**
     * USER SIGN UP
     * 
     * @param   object  $request        The request in object.
     * 
     */
    public function signUp(Request $request)
    {
        // Validate form data
        $validator = $this->authValidator->validateSignup($request);

        if ($validator->fails()) {
            // return $validator->errors()->toArray();
            return back()->withErrors($validator->errors()->toArray());
        }

        // Set the user data
        $userData = [
            'role_id' => 2, // Normal user role
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->confirm_password),
        ];

        // Create new user
        $result = DB::transaction(function () use ($userData) {
            return $this->addUser($userData);
        });

        // $flashSession = $this->setFlashSession($request, 'success', 'saved');

        return redirect()->to('login')->with('success', 'Your account is created!');;
    }

    /**
     * DISPLAY LOGIN PAGE
     * 
     */
    public function showLogin()
    {
        return view('login', ['data' => 'something']);
    }

    /**
     * USER LOGIN
     * 
     * @param   object  $request        The request in object.
     * 
     */
    public function login(Request $request)
    {
        $validator = $this->authValidator->validateLogin($request);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors()->toArray());
        }

        $user = $this->getUserDataByEmail($request->email);

        if ($user && Hash::check($request->password, $user->password)) {
            $sessionData = [
                'user' => $user,
            ];

            $this->setSession($sessionData);

            if (empty(session()->get('user')['id'])) {
                return back()->withInput();
            }

            return redirect()->to('menu');

        } else {
            return back()->with('failed', 'Email and password mismatched!');
        }
    }

    /**
     * LOGOUT BY DESTROYING SESSION
     *
     */
    public function logout(Request $request)
    {
        // Delete all session data
        $request->session()->flush();

        return redirect()->to('login');
    }

    //---------------------------------------------------------------------

    //  PRIVATE
    //  FUNCTIONS

    /**
     * ADD NEW USER
     *
     * MODEL: User
     *
     * @param   array   $userData       The array of the user data.
     *
     * @return  bool                    Return the boolean after insertion
     */
    private function addUser(array $userData)
    {
        return $this->user->addUser($userData);
    }

    /**
     * SET SESSION
     *
     * @param   array   $sessionData    The array of session (key and value)
     *
     * @return  object                  Return session data
     */
    private function setSession(array $sessionData)
    {
        session($sessionData);
    }

    /**
     * SET FLASH SESSION DATA
     *
     * @param   mixed  $request, $key, $value       Use to create flash session
     * 
     * @return  object                              Return flash session data
     */
    private function setFlashSession(Request $request, string $key, string $value)
    {
        return $request->session()->flash($key, $value);
    }

    /**
     * GET USER DATA BY EMAIL
     *
     * @param   string  $email          The email of the user.
     * 
     * @return  object                  Return the user data in object
     */
    private function getUserDataByEmail(string $email)
    {
        return $this->user->getUserDataByEmail($email);
    }
}
