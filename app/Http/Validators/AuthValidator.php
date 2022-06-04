<?php

namespace App\Http\Validators;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AuthValidator
{
    /**
     * VALIDATE LOGIN DATA
     *
     * @param   object  $request        The request in object.
     *
     * @return  object                  Return validation result in object
     */
    public function validateLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6|max:20',
        ]);

        return $validator;
    }

    /**
     * VALIDATE SIGN UP DATA
     *
     * @param   object  $request        The request in object.
     *
     * @return  object                  Return validation result in object
     */
    public function validateSignup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3|max:100',
            'email' => 'required|email|unique:users|',
            'password' => 'required|min:6|max:20',
            'confirm_password' => 'required|same:password',
        ]);

        return $validator;
    }

    /**
     * VALIDATE - UPDATE PROFILE
     *
     * @param   object  $request        The request in object.
     *
     * @return  object                  Return validation result in object
     */
    public function validateUpdateProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3|max:100',
            'password' => 'nullable|min:6|max:20|' . Rule::requiredIf(!empty($request->confirm_password)),
            'confirm_password' => 'nullable|same:password|' . Rule::requiredIf(!empty($request->password)),
        ]);

        return $validator;
    }
}
