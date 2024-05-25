<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use App\Models\GurupemanduISI;
use App\Models\SchoolProfile;
use Illuminate\Http\Request;

class GurupemanduController extends Controller
{
    public function index()
    {
        $GurupemanduISI = GurupemanduISI::all();

        $schoolProfile = SchoolProfile::first();

        return $this->view('public.prestasi2.gurupemandu', [
            "title" => "Guru Pemandu",
            "GurupemanduISI" => $GurupemanduISI,
            "profile" => $schoolProfile
        ]);
    }
}
