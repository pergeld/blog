<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $published_date = \Carbon\Carbon::now()->format('Y-m-d');
        $published_time = "00:00";
        $expires_date = \Carbon\Carbon::now()->addYear()->format('Y-m-d');
        $expires_time = "23:59";

        if (! empty($this->published_at)) {
            $published_date = $this->published_at->format('Y-m-d');
            $published_time = $this->published_at->format('H:i');
        }

        if (! empty($this->expires_at)) {
            $expires_date = $this->expires_at->format('Y-m-d');
            $expires_time = $this->expires_at->format('H:i');
        }

        return [
            'id' => $this->id,
            'title' => $this->title,
            'lead' => $this->lead,
            'content' => $this->content,
            'is_visible' => $this->is_visible,
            'published_date' => $published_date,
            'published_time' => $published_time,
            'expires_date' => $expires_date,
            'expires_time' => $expires_time,
            'imageUpload' => $this->imageUpload,
        ];
    }
}
