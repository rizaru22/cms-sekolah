<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use App\Models\PrestasipenelitianISI;
use App\Models\SchoolProfile;
use Illuminate\Http\Request;

class PrestasipenelitianController extends Controller
{
    public function index()
    {
        $PrestasipenelitianISI = PrestasipenelitianISI::all();

        $schoolProfile = SchoolProfile::first();

        return $this->view('public.prestasi_tampilan.penelitian', [
            "title" => "Prestasi Penelitian",
            "PrestasipenelitianISI" => $PrestasipenelitianISI,
            "profile" => $schoolProfile
        ]);
    }
}
