<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function hello()
    {
        return response()->json([
            'name' => "Huynh Ba Nhan",
        ], 200);
    }
}
