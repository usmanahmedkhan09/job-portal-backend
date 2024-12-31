<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ApiResponseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'success' => $this->resource['success'] ?? true,
            'statusCode' => $this->resource['status_code'] ?? 200,
            'message' => $this->resource['message'] ?? null,
            'data'    => $this->resource['data'] ?? null,
            'errors'  => $this->resource['errors'] ?? null,
        ];
    }
}
