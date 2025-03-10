<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use App\Models\Permission;
use App\Http\Resources\PermissionResource;
use App\Traits\FilterCriteria;

class PermissionController extends Controller
{
    use ApiResponse, FilterCriteria;

    // Display a listing of permissions
    public function index(Request $request)
    {   
        $paginate = $request->boolean('paginate') ? true : false;
        $permissions = $paginate ? Permission::query()->filter()->simplePaginate(10) : Permission::all();
        return $this->successResponse(['permissions' => PermissionResource::collection($permissions)], null, 200);
    }

    // Store a new permission
    public function store(Request $request) 
    {
        $request->validate([
            'name' => 'required|unique:permissions',
        ]);

        $permission = Permission::create([
            'name' => $request->get('name'),
        ]);

        return $this->successResponse(['permission' => $permission], 'Permission has been created', 201);
    }

    // Display the specified permission
    public function show($id)
    {
        $permission = Permission::find($id);
        if (!$permission) {
            return $this->errorResponse('Permission not found', 404);
        }
        return $this->successResponse(['permission' => $permission], null, 200);
    }

    // Update the specified permission
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name,' . $id,
        ]);

        $permission = Permission::find($id);
        if (!$permission) {
            return $this->errorResponse('Permission not found', 404);
        }

        $permission->update([
            'name' => $request->get('name'),
            'description' => $request->get('description')
        ]);

        return $this->successResponse(['permission' => $permission], 'Permission has been updated', 200);
    }

    // Delete the specified permission
    public function destroy($id)
    {
        $permission = Permission::find($id);
        if (!$permission) {
            return $this->errorResponse('Permission not found', 404);
        }

        $permission->delete();
        return $this->successResponse(null, 'Permission has been deleted', 200);
    }
}
