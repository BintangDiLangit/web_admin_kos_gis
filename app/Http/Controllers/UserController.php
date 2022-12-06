<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $token = $request->cookie('token');
        $response = Http::withToken($token)->post(env('APP_URL_API') . '/api/v1/list_user');
        $data = $response->json();
        $data = $data['data'];
        return view('user.index', compact('data'));
    }
}