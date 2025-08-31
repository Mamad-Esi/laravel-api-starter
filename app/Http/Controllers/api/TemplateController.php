<?php

namespace App\Http\Controllers\api;

use App\Action\Template\BlogPageAction;
use App\Action\Template\CategoryPageAction;
use App\Action\Template\HomePageAction;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryCollection;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\PostCollection;
use App\Http\Resources\PostResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class TemplateController extends Controller
{
    public function home(HomePageAction $action)
    {
        $result = $action->handle();

        // return Response::json($result);


        return response()->json([
            'posts' => PostResource::collection($result['posts']),
            'randompPosts' => PostResource::collection($result['RandomPosts'])
        ]);


    }

    public function blog(BlogPageAction $action)
    {
        $result = $action->handle();

        // return Response::json($result);
        return response()->json([
          'PostBlog' =>  PostCollection::make($result['PostBlog'])
        ]); 
            
    }

    public function category(Category $category , CategoryPageAction $action)
    {
        $result = $action->handle($category);

        return  response()->json([
            'posts' => PostCollection::make($result['posts']),
            // 'category' => $result['posts'],
            // 'category' => CategoryResource::make($result['posts'])
            'category' => CategoryCollection::make($result['posts'])
        ]);
    }
}