<?php 

namespace App\Action\Template;

use App\Models\Post;

class HomePageAction {

    public function handle()
    {
        return [
            'posts' => $this->getPosts()
        ];
    }

    private function getPosts()
    {
        return Post::with('user' , 'category')
            ->orderBy('created_at' , 'DESC')
            ->take(9)
            ->get();
    }
}