<?php

namespace App\Http\Controllers;
use App\Models\OlahragaISI;

use Illuminate\Http\Request;

class OlahragaController extends Controller
{
    public function index()
    {
        $OlahragaISI = OlahragaISI::all();

        return view('prestasi2be.olahraga', [
            "title" => "Olahraga",
            "OlahragaISI" => $OlahragaISI
        ]);
    }
}

