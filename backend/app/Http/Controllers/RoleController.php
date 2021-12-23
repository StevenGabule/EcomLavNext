<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleController extends Controller
{
  public function index()
  {
    return response()->json(['roles' => Role::all()], 200);
  }

  public function store(Request $request)
  {
    $role = Role::create($request->only('name'));
    return response()->json(['role' => role], Response::HTTP_CREATED);
  }

  public function show(Role $role)
  {
    return response()->json(['role' => $role], 200);
  }

  public function update(Request $request, Role $role)
  {
    $role->update($request->only('name'));
    return response()->json(['role' => $role], 201);
  }

  public function destroy(Role $role)
  {
    $role->delete();
    return response()->json(null, 204);
  }
}
