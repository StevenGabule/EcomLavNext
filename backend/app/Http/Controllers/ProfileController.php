<?php

namespace App\Http\Controllers;

use App\Http\Requests\{UpdateInfoRequest, UpdatePasswordRequest};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ProfileController extends Controller
{
    public function me() {
        return Auth::user();
    }

    public function update_info(UpdateInfoRequest $request)
    {
        $user = \Auth::user();
        $user->update($request->only('first_name', 'last_name', 'email'));
        return response($user, Response::HTTP_ACCEPTED);
    }

    public function update_password(UpdatePasswordRequest $request)
    {
        $user = \Auth::user();
        $user->update(['password'=> Hash::make($request->input('password'))]);
        return response($user, Response::HTTP_ACCEPTED); 
    }
}
