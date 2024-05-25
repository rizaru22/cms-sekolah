<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use App\Models\OlahragaISI;
use App\Models\SchoolProfile;
use Illuminate\Http\Request;

class OlahragaController extends Controller
{
    public function index()
    {
        $OlahragaISI = OlahragaISI::all();

        $schoolProfile = SchoolProfile::first();

        return $this->view('public.prestasi2.olahraga', [
            "title" => "OlahragaISI",
            "OlahragaISI" => $OlahragaISI,
            "profile" => $schoolProfile
        ]);
    }
}
