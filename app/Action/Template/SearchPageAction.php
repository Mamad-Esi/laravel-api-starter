<?php

namespace App\Action\Template;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Redirect;

class SearchPageAction {
    public function handle(Request $request)
    {
        $word = $request->word;
        return [
            'posts' => $this->getPosts($request->get('word'))
        ];
    }

    private function getPosts(  string | null $word) :LengthAwarePaginator
    {
        return Post::where(function ($query) use($word){
                return $query->where('title' , 'like', "%{$word}%")
                        ->orWhere('content' , 'like' , "%{$word}%");
            })
                // ->where('status' , true)
                ->orderBy('created_at' , 'DESC')
                ->paginate(8)
                ->WithQueryString();
    }
}