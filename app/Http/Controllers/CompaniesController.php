<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Companies;
use App\Traits\ApiResponse;

class CompaniesController extends Controller
{
    use ApiResponse;
    public function index()
    {
        try {
            $companies = Companies::filter()->get();
            return $this->successResponse($companies, null, 200);
        } catch (\Exception $e) {
            return $this->errorResponse('Error retrieving companies', $e->getMessage(), 500);
        }

        $companies = Companies::all();
    }

    public function show($id)
    {
        try {
            $company = Companies::findOrFail($id)->get();
            return $this->successResponse(['company' => $company], null, 200);
        } catch (\Exception $e) {
            return $this->errorResponse('Company not found', $e->getMessage(), 404);
        }
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validated();
            $company = Companies::create($validated);

            return $this->successResponse(['company' => $company], null, 201);
        } catch (\Exception $e) {
            return $this->errorResponse('Error creating company', $e->getMessage(), 500);
        }
    }

    public function edit($id)
    {
        try {
            $company = Companies::with(['skills', 'user', 'category'])->findOrFail($id);
            return $this->successResponse(['company' => $company], null, 200);
        } catch (\Exception $e) {
            return $this->errorResponse('Company not found', $e->getMessage(), 404);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $company = Companies::findOrFail($id);
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
            $company = Companies::findOrFail($id);
            $company->delete();
            return $this->successResponse(['company' => $company], 'Company deleted successfully', 200);
        } catch (\Exception $e) {
            return $this->errorResponse('Error deleting company', $e->getMessage(), 500);
        }
    }
}
