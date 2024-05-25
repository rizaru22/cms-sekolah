<?php

namespace App\Http\Controllers;
use App\Models\PrestasiseniISI;

use Illuminate\Http\Request;

class PrestasiseniController extends Controller
{
    public function index()
    {
        $prestasiseniISI = PrestasiseniISI::all();

        return view('prestasi_tampilan.seni', [
            "title" => "Prestasi Seni",
            "prestasiseniISI" => $prestasiseniISI
        ]);
    }
}

