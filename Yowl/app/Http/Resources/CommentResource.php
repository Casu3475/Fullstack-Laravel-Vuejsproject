<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'url' => $this->url,
            'likes' => $this->likes,
            'reports' => $this->reports,
            'userId' => $this->user_id,
            'categoryId' => $this->category_id,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
            'responses' => ResponseResource::collection($this->whenLoaded('responses')),
            'media' => MediaResource::collection($this->whenLoaded('media')),
        ];
    }
}
