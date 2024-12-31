<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Resources\RoleResource;
use App\Traits\ApiResponse;

class RoleController extends Controller
{
    use ApiResponse;

    // Display a listing of roles
    public function index()
    {
        $roles = Role::all();
        return $this->successResponse(['roles' => RoleResource::collection($roles)], null, 200);
    }

    // Store a new role
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles',
        ]);

        $role = Role::create([
            'name' => $request->get('name'),
        ]);

        return $this->successResponse(['role' => $role], 'Role has been created', 201);
    }

    // Display the specified role
    public function show($id)
    {
        $role = Role::find($id);
        if (!$role) {
            return $this->errorResponse('Role not found', 404);
        }
        return $this->successResponse(['role' => $role], 'Role found', 200);
    }

    // Update the specified role
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,' . $id,
        ]);

        $role = Role::find($id);
        if (!$role) {
            return $this->errorResponse('Role not found', 404);
        }

        $role->update([
            'name' => $request->get('name')
        ]);

        return $this->successResponse(['role' => $role], 'Role has been updated', 200);
    }

    // Delete the specified role
    public function destroy($id)
    {
        $role = Role::find($id);
        if (!$role) {
            return $this->errorResponse('Role not found', 404);
        }

        $role->delete();
        return $this->successResponse(null, 'Role has been deleted', 200);
    }
}
