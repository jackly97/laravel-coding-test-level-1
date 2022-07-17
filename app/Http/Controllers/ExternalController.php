<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class ExternalController extends Controller
{
    public function index()
    {
        $request = Http::get('https://api.publicapis.org/entries');
        $responses = $request->json()['entries'];
        return view('externals.index', compact('responses'));
    }
}
