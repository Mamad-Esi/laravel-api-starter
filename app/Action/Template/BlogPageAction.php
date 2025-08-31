<?php

namespace App\Action\Template;

use App\Models\Post;

class BlogPageAction {

    public function handle()
    {
        return [
            'PostBlog' => $this->getPostBlog()
        ];
    }

    private function getPostBlog()
    {
        return Post::with('user' , 'category')
                ->orderBy('created_at' , 'DESC')
                ->paginate(5);
    }

}