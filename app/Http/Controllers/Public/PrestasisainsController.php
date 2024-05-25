<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use App\Models\PrestasisainsISI;
use App\Models\SchoolProfile;
use Illuminate\Http\Request;

class PrestasisainsController extends Controller
{
    public function index()
    {
        $PrestasisainsISI = PrestasisainsISI::all();

        $schoolProfile = SchoolProfile::first();

        return $this->view('public.prestasi_tampilan.sains', [
            "title" => "Prestasi Sains",
            "PrestasisainsISI" => $PrestasisainsISI,
            "profile" => $schoolProfile
        ]);
    }
}
