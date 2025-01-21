<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;

class SkillController extends Controller
{
    use ApiResponse;
       /**
     * Display a listing of skill postings.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        try {
            $skills = Skill::filter($request->all())->paginate($request->get('limit', 10));
            return $this->successResponse(['skills' => $skills], null, 200);
        } catch (\Exception $e) {
            return $this->errorResponse('Error retrieving skills', $e->getMessage(), 500);
        }
    }

    /**
     * Store a newly created skill posting.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validated();
            $skill = Skill::create($validated);
            return $this->successResponse(['skills' => $skill], null, 201);
        } catch (\Exception $e) {
            return $this->errorResponse('Error creating skill', $e->getMessage(), 500);
        }
    }

    /**
     * Display the specified skill posting.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        try {
            $skill = Skill::findOrFail($id);
            return $this->successResponse(['skills' => $skill], null, 200);
        } catch (\Exception $e) {
            return $this->errorResponse('skill not found', $e->getMessage(), 404);
        }
    }

    /**
     * Update the specified skill posting.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        try {
            $skill = Skill::findOrFail($id);
            
            $validated = $request->validate([
                'title' => 'string|max:255',
                'description' => 'string',
                'requirements' => 'string',
                'salary_range' => 'string',
                'location' => 'string',
                'status' => 'string'
            ]);

            $skill->update($validated);
            return $this->successResponse(['skills' => $skill], 'skill updated successfully', 200);
        } catch (\Exception $e) {
            return $this->errorResponse('Error updating skill',$e->getMessage(), 500);
        }
    }

    /**
     * Remove the specified skill posting.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        try {
            $skillPosting = Skill::findOrFail($id);
            $skillPosting->delete();
            return $this->successResponse([], 'skill posting deleted successfully', 200);
        } catch (\Exception $e) {
            return $this->errorResponse('Error deleting skill', $e->getMessage(), 500);
        }
    }

    public function getSkillsByCategory($id)
    {
        try {
            $skills = Skill::where('category_id', $id)->get();
            return $this->successResponse(['skills' => $skills], null, 200);
        } catch (\Exception $e) {
            return $this->errorResponse('Error retrieving skill', $e->getMessage(), 500);
        }
    }
}
