<?php

namespace App\Action\Template;

use App\Models\Post;

class SinglePageAction {

    public function handle() 
    {
        return [
            'post' => $this->getPost()
        ];
    }

    private function getPost()
    {
        return Post::with('category' , 'user')
        ->firstOrFail();
    }
}