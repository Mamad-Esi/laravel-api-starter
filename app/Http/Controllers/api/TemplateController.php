<?php

namespace App\Http\Controllers\api;

use App\Action\Template\HomePageAction;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
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
}