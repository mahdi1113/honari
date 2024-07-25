<?php

namespace App\Http\Resources\PurchasedCourses;

use App\Http\Resources\TeacherCourseResource;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Symfony\Component\HttpFoundation\Response;


class PurchasedCoursesResource extends JsonResource
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
                'title' => $this->title,
                'users' => UserResource::collection($this->whenLoaded('users')),
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
