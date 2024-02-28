<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use App\Models\PrestasiolahragaISI;
use App\Models\SchoolProfile;
use Illuminate\Http\Request;

class PrestasiolahragaController extends Controller
{
    public function index()
    {
        $PrestasiolahragaISI = PrestasiolahragaISI::all();

        $schoolProfile = SchoolProfile::first();

        return $this->view('public.prestasi_tampilan.olahraga', [
            "title" => "Prestasi Olahraga",
            "PrestasiolahragaISI" => $PrestasiolahragaISI,
            "profile" => $schoolProfile
        ]);
    }
}
