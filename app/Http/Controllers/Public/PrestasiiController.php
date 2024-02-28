<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use App\Models\Prestasii;
use App\Models\PrestasiolahragaISI;
use App\Models\PrestasipenelitianISI;
use App\Models\PrestasisainsISI;
use App\Models\PrestasiseniISI;
use App\Models\SchoolProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrestasiiController extends Controller
{
    public function index()
    {
        $countPrestasiOlahraga = DB::table('prestasiolahragaisi')->count();
        $countPrestasiPenelitian = DB::table('prestasipenelitianisi')->count();
        $countPrestasiSains = DB::table('prestasisainsisi')->count();
        $countPrestasiSeni = DB::table('prestasiseniisi')->count();

        $Prestasii = Prestasii::first();

        $schoolProfile = SchoolProfile::first();

        return $this->view('public.prestasi2.prestasi', [
            "title" => "Prestasi",
            "Prestasii" => $Prestasii,
            "profile" => $schoolProfile,
            "countPrestasiOlahraga" => $countPrestasiOlahraga,
            "countPrestasiPenelitian" => $countPrestasiPenelitian,
            "countPrestasiSains" => $countPrestasiSains,
            "countPrestasiSeni" => $countPrestasiSeni,
        ]);
    }
}
