<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'user_name' => $this->user_name ,
            'phone' => $this->phone ,
            'role' => $this->role ,
            'cell_number' => $this->phone,
            'created_at' => $this->created_at ,
            'files' => $this->getFirstMediaUrl('files'),
        ];
    }
}
