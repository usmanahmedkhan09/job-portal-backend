<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobPostingRequest;
use App\Models\JobPosting;
use App\Models\jobSearchHistory;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class JobPostingController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of job postings.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        try {
            $jobPostings = JobPosting::filter() ->with(['user' => function ($query) {
                $query->select('id', 'name'); // Specify the columns you want
            }], 'skills') ->orderBy('created_at', 'desc') ->get();

            return $this->successResponse($jobPostings, null, 200);
        } catch (\Exception $e) {
            return $this->errorResponse('Error retrieving job postings', $e->getMessage(), 500);
        }
    }

    public function getJobByUser(Request $request)
    {
        try {
            $jobPostings = JobPosting::filter()->where('user_id', auth()->user()->id)->with(['user' => function ($query) {
                $query->select('id', 'name'); // Specify the columns you want
            }], 'skills')->simplePaginate(10);

            Log::info('Job postings retrieved successfully', ['jobPostings' => $jobPostings]);
            return $this->successResponse($jobPostings, null, 200);
        } catch (\Exception $e) {
            return $this->errorResponse('Error retrieving job postings', $e->getMessage(), 500);
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

            $jobPosting = JobPosting::create($request->except('skills'));
            $jobPosting->skills()->attach($request->skills);

            return $this->successResponse(['jobPostings' => $jobPosting], null, 201);
        } catch (\Exception $e) {
            return $this->errorResponse('Error creating job posting', $e->getMessage(), 500);
        }
    }

    public function edit($id)
    {
        try {
            $jobPosting = JobPosting::with(['skills', 'user', 'category'])->findOrFail($id);
            return $this->successResponse(['job' => $jobPosting], null, 200);
        } catch (\Exception $e) {
            return $this->errorResponse('Job posting not found', $e->getMessage(), 404);
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
            $jobPosting = JobPosting::findOrFail($id)->with(['user' => function ($query) {
                $query->select('id', 'name'); // Specify the columns you want
            }], 'skills')->get();
            return $this->successResponse(['job' => $jobPosting], null, 200);
        } catch (\Exception $e) {
            return $this->errorResponse('Job posting not found', $e->getMessage(), 404);
        }
    }

    /**
     * Update the specified job posting.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(JobPostingRequest $request, $id)
    {
        try {
            $jobPosting = JobPosting::findOrFail($id);
            $validated = $request->validated();

            $jobPosting->update($request->except('skills'));
            $jobPosting->skills()->sync($request->skills);
            return $this->successResponse(['jobPostings' => $jobPosting], 'Job updated successfully', 200);
        } catch (\Exception $e) {
            return $this->errorResponse('Error updating job posting', $e->getMessage(), 500);
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
            return $this->successResponse(['jobPostings' => $jobPosting], 'Job posting deleted successfully', 200);
        } catch (\Exception $e) {
            return $this->errorResponse('Error deleting job posting', $e->getMessage(), 500);
        }
    }

  
}
