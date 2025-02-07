<?php

namespace App\Http\Controllers;

use App\Models\JobsApplication;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;

class JobsApplicationController extends Controller
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
            $jobApplications = JobsApplication::filter() ->with(['user' => function ($query) {
                $query->select('id', 'name'); // Specify the columns you want
            }], 'job')->simplePaginate()->withQueryString();

            // dd( JobPosting::filter()->get());
            return $this->successResponse($jobApplications, null, 200);
        } catch (\Exception $e) {
            return $this->errorResponse('Error retrieving job applications', $e->getMessage(), 500);
        }
    }
}
