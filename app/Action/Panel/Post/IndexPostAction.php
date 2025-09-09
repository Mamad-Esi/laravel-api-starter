<?php

namespace App\Action\Panel\Post;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexPostAction{

    public function handle(Request $request)
    {
        /** @var User */
        $user = Auth::user();

        $posts = Post::with('comments' , 'category' , 'user')
            ->where(function ($query) use ($request) {
                return $query->where('title' , 'like' , "%{$request->get('search')}%")
                    ->orWhere('content' , 'like' , "%{$request->get('search')}%" );
            })
            ->withCount('comments')
            ->orderBy('created_at' , 'DESC')
            ->paginate(6)
            ->withQueryString();

         return [
            'posts' => $posts
         ];   
    }
}