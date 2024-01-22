<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private UserService $user_service;

    public function __construct(UserService $user_service)
    {
        $this->user_service = $user_service;
    }

    public function getUsers(Request $request)
    {
        try {
            $users = $this->user_service->getUsers();
            
            return response()->json([
                'result' => true,
                'users' => $users,
            ], 200); 
        } catch (\Throwable $e) {
            return response()->json([
                'result' => false,
                'message' => 'Internal Server Error',
            ], 500);
        }
    }
}
