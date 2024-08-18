<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Symfony\Component\HttpFoundation\Response;

class FrequentlyQuestionsResource extends JsonResource
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
                'title' => $this->title,
                'description' => $this->description,
                'course_id' => $this->course_id,
                'course' => CourseResource::make($this->whenLoaded('course')),
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
