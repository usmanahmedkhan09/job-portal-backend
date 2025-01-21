<?php

namespace App\Http\Controllers;

use App\Models\JobCategory;
use Illuminate\Http\Request;

class JobCategoriesController extends Controller
{
    /**
     * Display a listing of job categories.
     */
    public function index()
    {
        try {
            $jobCategories = JobCategory::select('id', 'name')->get();
            return response()->json([
                'success' => true,
                'statusCode' => 200,
                'data' => [
                    'jobCategories' => $jobCategories
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'statusCode' => 500,
                'message' => 'Error retrieving job categories'
            ], 500);
        }
    }

    /**
     * Store a newly created job category.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255'
            ]);

            $jobCategory = JobCategory::create($validated);

            return response()->json([
                'success' => true,
                'statusCode' => 201,
                'data' => [
                    'jobCategory' => $jobCategory
                ]
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'statusCode' => 500,
                'message' => 'Error creating job category'
            ], 500);
        }
    }

    /**
     * Display the specified job category.
     */
    public function show($id)
    {
        try {
            $jobCategory = JobCategory::findOrFail($id);
            return response()->json([
                'success' => true,
                'statusCode' => 200,
                'data' => [
                    'jobCategory' => $jobCategory
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'statusCode' => 404,
                'message' => 'Job category not found'
            ], 404);
        }
    }

    /**
     * Update the specified job category.
     */
    public function update(Request $request, $id)
    {
        try {
            $jobCategory = JobCategory::findOrFail($id);

            $validated = $request->validate([
                'name' => 'required|string|max:255'
            ]);

            $jobCategory->update($validated);

            return response()->json([
                'success' => true,
                'statusCode' => 200,
                'data' => [
                    'jobCategory' => $jobCategory
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'statusCode' => 404,
                'message' => 'Error updating job category'
            ], 404);
        }
    }

    /**
     * Remove the specified job category.
     */
    public function destroy($id)
    {
        try {
            $jobCategory = JobCategory::findOrFail($id);
            $jobCategory->delete();

            return response()->json([
                'success' => true,
                'statusCode' => 200,
                'message' => 'Job category deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'statusCode' => 404,
                'message' => 'Error deleting job category'
            ], 404);
        }
    }
}
