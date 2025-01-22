<?php

namespace App\Traits;

use App\Http\Resources\ApiResponseResource;

trait ApiResponse
{
    /**
     * Send a success response.
     */
    protected function successResponse($data = null, $message = 'Operation successful', $statusCode = 200)
    {
        return new ApiResponseResource([
            'success' => true,
            'status_code' => $statusCode,
            'message' => $message,
            'data'    => $data,
        ]);
    }

    /**
     * Send an error response.
     */
    protected function errorResponse($message = 'Operation failed', $errors = null, $statusCode = 400)
    {
        
        return new ApiResponseResource([
            'success' => false,
            'status_code' => $statusCode,
            'message' => $message,
            'errors'  => $errors,
        ]);
    }
}
