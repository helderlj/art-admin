<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Article */
class ArticleResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'authors' => $this->authors,
            'available_at' => $this->available_at,
            'subtitle' => $this->subtitle,
            'categor_id' => $this->categor_id,
            'file_path' => $this->file_path,
            'cover_path' => $this->cover_path,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
