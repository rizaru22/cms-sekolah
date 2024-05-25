<?php

namespace App\Http\Controllers;
use App\Models\PrestasipenelitianISI;

use Illuminate\Http\Request;

class PrestasipenelitianController extends Controller
{
    public function index()
    {
        $PrestasipenelitianISI = PrestasipenelitianISI::all();

        return view('prestasi_tampilan.penelitian', [
            "title" => "Prestasi Penelitian",
            "PrestasipenelitianISI" => $PrestasipenelitianISI
        ]);
    }
}
