<?php

namespace App\Http\Resources;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
        'id' => $this->id,
        'title' => $this->title,
        'content' => $this->content,
        'slug' => $this->slug,
        'status' => $this->status ? 'active' : 'inactive' ,
        // 'thumbnail' => $this->thubnail,
	    'created_at' => $this->created_at->format('Y M D'),

        'user_id' => $this->whenLoaded('user' , $this->user->id ),
        'user_title' => $this->whenLoaded('user' , $this->user->title),
        'category' => $this->whenLoaded('category' , CategoryResource::make($this->category)),

        // 'category_id' => $this->whenLoaded('category' , $this->category->id),
        // 'name' => $this->whenLoaded('category' , $this->category->name),

        ];
    }
}
