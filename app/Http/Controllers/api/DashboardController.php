<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return Response::json([
            'status' => true,
            'message' => 'You are login :)'
        ]);
    }
}
 