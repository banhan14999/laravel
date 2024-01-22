<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class UserController extends Controller
{
    public function getUsers(Request $request)
    {
        // dd("hello");
        // $http = new Client();

        // $response = $http->get(env('APP_URL', 'http://localhost') . '/api/users');

        // $result = json_decode($response->getBody());
        // dd($result);
        return view('user.index');
    }
}
