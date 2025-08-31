<?php 

namespace App\Action\Template;

use App\Models\Category;

class CategoryPageAction{

    public function handle(Category $category )
    {
        return [
            'posts' => $this->getPosts($category)
        ];
    }

    private function getPosts(Category $category)
    {
        return  $category->posts()
            ->orderBy('created_at' , 'DESC')
            ->with('user')
            ->paginate(3);
    }
}