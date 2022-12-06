<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class KosController extends Controller
{
    public function index(Request $request)
    {
        $token = $request->cookie('token');
        $kos = Http::withToken($token)->post(env('APP_URL_API') . '/api/v1/kost/list');
        $data = $kos->json();
        $data = $data['data'];
        return view('kos.index', compact('data'));
    }

    public function add(Request $request)
    {
        $token = $request->cookie('token');
        $image = $request->file('gambar');
        $kos = Http::withToken($token)
            ->attach('gambar[0]', file_get_contents($image), $image->getClientOriginalName())
            ->post(env('APP_URL_API') . '/api/v1/kost/add', [
                'nama_kost' => $request->nama_kost,
                'deskripsi' => $request->deskripsi,
                'harga' => $request->harga,
                'longlat' => $request->longlat,
            ]);

        if ($kos->status() == 200) {
            return redirect()->back();
        }
        return redirect()->back();
    }
    public function update(Request $request, $id)
    {
        # code...
    }
    public function delete(Request $request, $id)
    {
        $token = $request->cookie('token');
        $kos = Http::withToken($token)
            ->delete(env('APP_URL_API') . '/api/v1/kost/delete/' . $id);

        if ($kos->status() == 200) {
            return redirect()->back();
        }
        return redirect()->back();
    }
}