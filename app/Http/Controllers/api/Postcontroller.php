<?php

namespace App\Http\Controllers\Api;

use App\Action\Panel\Post\IndexPostAction;
use App\Action\Panel\Post\StorePostAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostCollection;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class Postcontroller extends Controller
{
    public function index( IndexPostAction $action , Request $request)
    {
        $result = $action->handle($request);

        return Response::json([
            'posts' => PostCollection::make($result['posts'])
        ]);
    }

    public function me()
    {
        $user = Auth::user();
        return Response::json([
            'data' => UserResource::make($user)
        ]);
    }

    public function store(StorePostAction $action , StorePostRequest $request)
    {
        $data = $request->validated();

        $result = $action->handle($data);

        // return response()->json([
        //     "post" => $result['posts'],
        //     'message' => "post '{$result['post']->title}' has been created "
        // ]);
        return response()->json([
            "post" => $result['post'],
            'message' => "post '{$result['post']->title}' has been created"
        ]);
    }
}
