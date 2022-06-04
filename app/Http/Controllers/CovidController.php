<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class CovidController extends Controller
{
    public function show(Request $request) {
        $uf = $request->input('uf');
        $response = Http::get('https://covid19-brazil-api.now.sh/api/report/v1/brazil/uf/'.$uf)->collect();
        return view('index', ['response' => $response]);
    }

    public function showGet($uf) {
        $response = Http::get('https://covid19-brazil-api.now.sh/api/report/v1/brazil/uf/'.$uf)->collect();
        return view('index', ['response' => $response]);
    }
}
