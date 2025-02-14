<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Traits\ApiResponse;

class CompanyController extends Controller
{
    use ApiResponse;
    public function index()
    {
        try {
            $companies = Company::with('users')->filter()->get();
            return $this->successResponse($companies, null, 200);
        } catch (\Exception $e) {
            return $this->errorResponse('Error retrieving companies', $e->getMessage(), 500);
        }
    }

    public function show($id)
    {
        try {
            $company = Company::findOrFail($id)->get();
            return $this->successResponse(['company' => $company], null, 200);
        } catch (\Exception $e) {
            return $this->errorResponse('Company not found', $e->getMessage(), 404);
        }
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required',
                'description' => 'required',
                'website' => 'required',
                'user_id' => 'required',
            ]);

            $company = Company::create([
                'name' => $validated['name'],
                'description' => $validated['description'],
                'website' => $validated['website'],
            ]);

            $company->users()->attach($request->user_id, ['role' => 'CEO']);

            return $this->successResponse(['company' => $company], 'Company successfully created.', 201);
        } catch (\Exception $e) {
            return $this->errorResponse('Error creating company', $e->getMessage(), 500);
        }
    }

    public function edit($id)
    {
        try {
            $company = Company::with(['skills', 'user', 'category'])->findOrFail($id);
            return $this->successResponse(['company' => $company], null, 200);
        } catch (\Exception $e) {
            return $this->errorResponse('Company not found', $e->getMessage(), 404);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $company = Company::findOrFail($id);
            $validated = $request->validated();

            $company->update($validated);
            return $this->successResponse(['company' => $company], 'Company updated successfully', 200);
        } catch (\Exception $e) {
            return $this->errorResponse('Error updating company', $e->getMessage(), 500);
        }
    }

    public function destroy($id)
    {
        try {
            $company = Company::findOrFail($id);
            $company->delete();
            return $this->successResponse(['company' => $company], 'Company deleted successfully', 200);
        } catch (\Exception $e) {
            return $this->errorResponse('Error deleting company', $e->getMessage(), 500);
        }
    }

    public function getCompanyByUser($id)
    {
        try {
            $company = Company::where('user_id', $id)->get();
            return $this->successResponse(['company' => $company], null, 200);
        } catch (\Exception $e) {
            return $this->errorResponse('Company not found', $e->getMessage(), 404);
        }
    }
}
