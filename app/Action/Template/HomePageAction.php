<?php 

namespace App\Action\Template;

use App\Models\Post;

class HomePageAction {

    public function handle()
    {
        return [
            'posts' => $this->getPosts(),
            'RandomPosts' => $this->getRandomPosts()
        ];
    }

    private function getPosts()
    {
        return Post::with('user' , 'category')
            ->orderBy('created_at' , 'DESC')
            ->take(9)
            ->get();
    }

    private function getRandomPosts()
    {
        return Post::with('user' , 'category')
            ->InRandomOrder()
            ->orderBy('created_at' , 'DESC')
            ->take(9)
            ->get();
    }
}