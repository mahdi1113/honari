<?php

namespace App\Http\Resources;

use App\Services\Media\Resources\MediaResource;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'creator_id' => $this->user_id,
            'status' => $this->status,
            'creator' => UserResource::make($this->whenLoaded('creator')),
            'thumbnail' => $this->getFirstMediaUrl('files', 'thumbnail'),
            'article_image' => $this->getFirstMediaUrl('files', 'article-image'),
            'tiny' => $this->getFirstMediaUrl('tinymce_images', 'article-image-tinymce'),
            'files' => $this->getFirstMediaUrl('files'),
        ];
    }
}
