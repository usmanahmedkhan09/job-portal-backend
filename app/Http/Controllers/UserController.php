<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use App\Models\User;
use App\Http\Resources\UserResource;
use App\Traits\FilterCriteria;

class UserController extends Controller
{
        use ApiResponse, FIlterCriteria;
        // Display a listing of the resource.
        public function index()
        {
            $users = User::query()->filter()->simplePaginate(10);
            return $this->successResponse(['users' => UserResource::collection($users)], null, 200);
        }

        // Store a newly created resource in storage.
        public function store(Request $request)
        {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6',
            ]);

            $user = new User([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => bcrypt($request->get('password')),
            ]);

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
            $user->save();

            return $this->successResponse(['user' => $user], 'User has been successfully Updated', 200);
        }

        public function edit($id){
            $user = User::where('id', $id)->first();
            if(! $user){
                return $this->errorResponse('User not found', 404);
            }
            return $this->successResponse(['user' => $user], null, 200);
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
}
