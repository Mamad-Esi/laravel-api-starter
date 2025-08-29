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

        // 'created_at' => optional($this->created_at)->format('Y M D'),
	    'created_at' => $this->created_at->format('Y M D'),


        // 'user_id' => $this->whenLoaded('user', fn() => $this->user->id),
        // 'user_title' => $this->whenLoaded('user', fn() => $this->user->title),

        // یوزر فقط id و name
        'user'      => $this->whenLoaded('user', fn() => [
            'id'   => $this->user->id,
            'name' => $this->user->name,
            'about_description' => $this->user->about_description,
            'about' =>$this->user->about
        ]),

        'category' => $this->whenLoaded('category' , fn() => [
            'id' => $this->category->id,
            'name' => $this->category->name
            
        ]),
        // 'category' => $this->whenLoaded('category' , CategoryResource::make($this->category)),

        'category_id' => $this->whenLoaded('category' , $this->category->id),
        // 'name' => $this->whenLoaded('category' , $this->category->name),

        ];
    }
}
