<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use App\Models\User;
use App\Http\Resources\UserResource;
use App\Models\Company;
use App\Models\Permission;
use App\Traits\FilterCriteria;

class UserController extends Controller
{
        use ApiResponse, FIlterCriteria;
        // Display a listing of the resource.
        public function index()
        {
            $users = User::query()->with('permissions')->with('roles')->filter()->simplePaginate(10);
            return $this->successResponse($users, null, 200);
        }

        // Store a newly created resource in storage.
        public function store(Request $request)
        {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6',
                'company_name' => 'required|unique:companies,name',
                'company_website' => 'required',
                'company_description' => 'required',
            ]);

            $company = Company::create([
                'name' => $request->get('company_name'),
                'website' => $request->get('company_website'),
                'description' => $request->get('company_description'),
            ]);
 
            $user = new User([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => bcrypt($request->get('password')),
                'company_id' => $company->id,
            ]);

            $user->assignRole($request->roles);
            $user->givePermissionTo($request->permissions);
            $user->save();

            return $this->successResponse(['user' => $user], 'User has been added', 201);
        }

        // Display the specified resource.
        public function show($id)
        {
            $user = User::where('id', $id)->first();
            if(! $user){
                return $this->errorResponse('User not found', 404);
            }
            return $this->successResponse(['user' => $user], 'User has been successfully find', 201);
        }

        // Update the specified resource in storage.
        public function update(Request $request, $id)
        {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email,' . $id,
                'password' => 'nullable|min:6',
            ]);

            $user = User::where('id', $id)->first();
            if(! $user){
                return $this->errorResponse('User not found', 404);
            }
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            if ($request->get('password')) {
                $user->password = bcrypt($request->get('password'));
            }

            $user->syncRoles($request->roles);
            $user->syncPermissions($request->permissions);
            $user->save();
            $user->load(['permissions', 'roles']);

            return $this->successResponse(['user' => new UserResource($user)], 'User has been successfully Updated', 200);
        }

        public function edit($id){
            $user = User::with('permissions')->with('roles')->where('id', $id)->first();
            if(! $user){
                return $this->errorResponse('User not found', 404);
            }
            return $this->successResponse(['user' => new UserResource($user)], null, 200);
        }

        // Remove the specified resource from storage.
        public function destroy($id)
        {   
            $user = User::where('id', $id)->first();
            if(! $user){
                return $this->errorResponse('User not found', 404);
            }
            $user->delete();

            return $this->successResponse(['user' => $user], 'User has been successfully deleted', 200);;
        }

        public function createUserAgainstCompany(Request $request){
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6',
                'company_id' => 'required|exists:companies,id'
            ]);

            $user = new User([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => bcrypt($request->get('password')),
                'company_id' => $request->get('company_id'),
            ]);

            $user->assignRole($request->role ?? 'employee');
            
            $user->save();

            return $this->successResponse(['user' => $user], 'User has been added', 201);
        }

        public function getUsersByCompanyId($id){
            $users = User::where('company_id', $id)->with(['company', 'roles'])->get();
            return $this->successResponse(['users' => $users], null, 200);
        }
}
