<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobPostingRequest;
use App\Models\JobPosting;
use Illuminate\Http\Request;

class JobPostingController extends Controller
{
    /**
     * Display a listing of job postings.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        try {
            $jobPostings = JobPosting::filter($request->all())->paginate($request->get('limit', 10));
            return response()->json($jobPostings);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error retrieving job postings', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Store a newly created job posting.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(JobPostingRequest $request)
    {
        try {
            $validated = $request->validated();

            $jobPosting = JobPosting::create($validated);
            return response()->json($jobPosting, 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error creating job posting', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified job posting.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        try {
            $jobPosting = JobPosting::findOrFail($id);
            return response()->json($jobPosting);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Job posting not found', 'error' => $e->getMessage()], 404);
        }
    }

    /**
     * Update the specified job posting.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        try {
            $jobPosting = JobPosting::findOrFail($id);
            
            $validated = $request->validate([
                'title' => 'string|max:255',
                'description' => 'string',
                'requirements' => 'string',
                'salary_range' => 'string',
                'location' => 'string',
                'status' => 'string'
            ]);

            $jobPosting->update($validated);
            return response()->json($jobPosting);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error updating job posting', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified job posting.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        try {
            $jobPosting = JobPosting::findOrFail($id);
            $jobPosting->delete();
            return response()->json(['message' => 'Job posting deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error deleting job posting', 'error' => $e->getMessage()], 500);
        }
    }
}
