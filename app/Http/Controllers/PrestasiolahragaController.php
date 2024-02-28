<?php

namespace App\Http\Controllers;
use App\Models\PrestasiolahragaISI;

use Illuminate\Http\Request;

class PrestasiolahragaController extends Controller
{
    public function index()
    {
        $PrestasiolahragaISI = PrestasiolahragaISI::all();

        return view('prestasi_tampilan.olahraga', [
            "title" => "Prestasi Olahraga",
            "PrestasiolahragaISI" => $PrestasiolahragaISI
        ]);
    }
}
