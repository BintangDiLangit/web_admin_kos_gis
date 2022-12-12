<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $token = $request->cookie('token');
        $kos = Http::withToken($token)->post(env('APP_URL_API') . '/api/v1/kost/list');
        $statusCode = $kos->status();
        if ($statusCode == 200) {
            $countKos = $kos->json();
            $countKos = count($countKos['data']);
            return view('home', compact('countKos'));
        }
    }
}