<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function loginView()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $login = Http::post(
            env('APP_URL_API') . '/api/v1/login',
            [
                'identitas' => $request->identitas,
                'password' => $request->password,
            ]
        );

        $statusCode = $login->status();
        if ($statusCode == 200) {
            $data = $login->json();
            $data = $data['data'];
            Cookie::queue(Cookie::make('token', $data['token']));
            Cookie::queue(Cookie::make('nama', $data['user']['nama']));
            $kos = Http::withToken($data['token'])->post(env('APP_URL_API') . '/api/v1/kost/list');
            $statusCode = $kos->status();
            if ($statusCode == 200) {
                $countKos = $kos->json();
                $countKos = count($countKos['data']);
                return view('home', compact('countKos'));
            }
        }
        return view('auth.login');
    }

    public function logout(Request $request)
    {
        $token = $request->cookie('token');
        Http::withToken($token)
            ->post(env('APP_URL_API') . '/api/v1/logout');

        return view('auth.login');
    }
}