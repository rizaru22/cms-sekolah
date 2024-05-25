<?php

namespace App\Http\Controllers;
use App\Models\PrestasisainsISI;

use Illuminate\Http\Request;

class PrestasisainsController extends Controller
{
    public function index()
    {
        $PrestasisainsISI = PrestasisainsISI::all();

        return view('prestasi_tampilan.sains', [
            "title" => "Prestasi Sains",
            "PrestasisainsISI" => $PrestasisainsISI
        ]);
    }
}

