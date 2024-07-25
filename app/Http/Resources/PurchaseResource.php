<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Symfony\Component\HttpFoundation\Response;

class PurchaseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if ($this['message']) {
            return [
                'message' => $this['message']
            ];
        } else {
            return [
                'id' => $this->id,
                'buyer_id' => $this->user_id,
                'buyer' => UserResource::make($this->whenLoaded('user')),
                'course_id' => $this->course_id,
                'course' => CourseResource::make($this->whenLoaded('course')),
                'created_at' => $this->created_at,
            ];
        }
    }

    public function withResponse($request, $response)
    {
        if ($this['message']) {
            $response->setStatusCode(Response::HTTP_FORBIDDEN);
        }
    }
}
