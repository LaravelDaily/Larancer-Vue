<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Validator;

class ChangePasswordController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Change password.
     *
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function changePassword(Request $request)
    {
        $user = auth('api')->user();

        $this->validator($request->all())->validate();

        if (Hash::check($request->get('current_password'), $user->password)) {
            $user->update(['password' => request('new_password')]);

            return response(null, 202);
        }

        return response()
            ->json(['message' => 'Invalid password'])
            ->setStatusCode(422);
    }

    /**
     * Get a validator for an incoming change password request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed|different:current_password',
        ]);
    }
}
