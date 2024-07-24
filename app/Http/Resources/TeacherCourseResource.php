<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TeacherCourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id ,
            'name' => $this->name ,
            'cv' => $this->cv ,
            'evidence' => $this->evidence ,
            'user_id' => $this->user_id ,
            'user' => UserResource::make( $this->whenLoaded( 'user' ) ) ,
            'courses' => CourseResource::collection($this->whenLoaded('courses')),
        ];
    }
}
