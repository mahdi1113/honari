<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
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
            'title' => $this->title ,
            'description' => $this->description ,
            'price' => $this->price,
            'duration_course' => $this->duration_course,
            'method_holding' => $this->method_holding,
            'teacher_name' => $this->teacher_name,
            'files' => $this->getFirstMediaUrl('files'),
            'items' => ItemResource::collection($this->whenLoaded('items')),
            'purchases' => PurchaseResource::collection($this->whenLoaded('purchases')),
            'frequentlyQuestions' => FrequentlyQuestionsResource::collection($this->whenLoaded('frequentlyQuestions')),
        ];
    }
}
