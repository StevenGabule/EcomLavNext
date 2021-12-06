<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\{UserCreateRequest, UserUpdateRequest};

class UserController extends Controller
{
  public function index()
  {
    return User::paginate(12);
  }

  public function show(User $user)
  {
    return $user;
  }

  public function store(UserCreateRequest $request) {
    $user = User::create($request->only('first_name', 'last_name', 'email') + ['password' => bcrypt($request->input('password'))]);
    return response()->json(['user' => $user], 201);
  }

  public function update(UserUpdateRequest $request, User $user) {
    $res = $user->update($request->only('first_name', 'last_name', 'email'));
    return response()->json(['result' => $res], 202);
  }
  
  public function destroy(User $user) {
    $user->delete();
    return response()->json(null, 204);
  }
}
