<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoryCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => CategoryResource::collection($this->collection),
            'meta' => [
                // 'current_page' => $this->current_page(),
                // 'total' => $this->total(),
                // 'per_page' => $this->perPage(),
                // 'next_page' => $this->nextPage(),
                
                // this is true
                'current_page' => $this->currentPage(),
                'total'        => $this->total(),
                'per_page'     => $this->perPage(),
                'last_page'    => $this->lastPage(),
                'next_page'    => $this->nextPageUrl(),
            ]
        ];
    }
}
