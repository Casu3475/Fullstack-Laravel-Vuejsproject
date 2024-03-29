<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
            'name' => $this->name,
            'icon' => $this->icon,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
            'comments' => CommentResource::collection($this->whenLoaded('comments')),
        ];
    }
}
