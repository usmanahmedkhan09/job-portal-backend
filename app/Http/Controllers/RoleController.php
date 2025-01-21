<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Http\Resources\RoleResource;
use App\Traits\ApiResponse;
use App\Traits\FilterCriteria;

class RoleController extends Controller
{
    use ApiResponse, FilterCriteria;

    // Display a listing of roles
    public function index()
    {
        $roles = Role::query()->with('permissions')->filter()->simplePaginate(10);
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
         
        $role->syncPermissions($request->permissions);
        return $this->successResponse(['role' => $role], 'Role has been created', 201);
    }

    // Display the specified role
    public function show($id)
    {
        $role = Role::with('permissions')->find($id);
        if (!$role) {
            return $this->errorResponse('Role not found', 404);
        }
        return $this->successResponse(['role' => $role], null, 200);
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

        $role->syncPermissions($request->permissions);

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
