<?php

namespace App\Http\Controllers;
use App\Models\SchoolProfile;
use App\Models\GurupemanduISI;

use Illuminate\Http\Request;

class GurupemanduController extends Controller
{
    public function index()
    {
        $gurupemanduISI = GurupemanduISI::all();
        $schoolProfile = SchoolProfile::first();

        return view('prestasi2be.gurupemandu', [
            "title" => "Guru Pemandu",
            "GurupemanduISI" => $gurupemanduISI,
            "schoolProfile" => $schoolProfile
        ]);
    }
    
}

