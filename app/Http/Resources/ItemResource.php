<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
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
            'topic' => $this->topic,
            'title' => $this->title ,
            'description' => $this->description,
            'status' => $this->status,
            'duration' => $this->duration,
            'video_url' => $this->when(
                $this->status === 'public' || $request->user()->purchasesCourse->contains($this->course->id),
                function () {
                    return $this->getFirstMediaUrl('videos');
                },
                false // این مقدار برگردانده می‌شود اگر شرط برقرار نباشد
            ),
            'course' => CourseResource::make($this->whenLoaded('course')),
        ];
    }
}
