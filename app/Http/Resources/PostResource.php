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
        'link' => $this->link,
	    'created_at' => $this->created_at->format('Y M D'),

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

        ];
    }
}
