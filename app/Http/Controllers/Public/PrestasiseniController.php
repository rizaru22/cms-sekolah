<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use App\Models\PrestasiseniISI;
use App\Models\SchoolProfile;
use Illuminate\Http\Request;

class PrestasiseniController extends Controller
{
    public function index()
    {
        $PrestasiseniISI = PrestasiseniISI::all();

        $schoolProfile = SchoolProfile::first();

        return $this->view('public.prestasi_tampilan.seni', [
            "title" => "Prestasi Seni",
            "PrestasiseniISI" => $PrestasiseniISI,
            "profile" => $schoolProfile
        ]);
    }
}
