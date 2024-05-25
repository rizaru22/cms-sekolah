<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Prestasi;
use App\Models\PrestasiOlahragaIsi;
use App\Models\PrestasiPenelitianIsi;
use App\Models\PrestasiSainsIsi;
use App\Models\PrestasiSeniIsi;
use App\Models\SchoolProfile;
use Illuminate\Http\Request;
use View;
use Illuminate\Support\Facades\DB;

class PrestasiController extends Controller
{
    public function index()
    {

        $countPrestasiOlahraga = PrestasiOlahragaIsi::count();
        $countPrestasiPenelitian = PrestasiPenelitianIsi::count();
        $countPrestasiSains = PrestasiSainsIsi::count();
        $countPrestasiSeni = PrestasiSeniIsi::count();

        // Hitung count dari tabel olahragaisi
        $countOlahragaIsi = DB::table('olahragaisi')->count();

        // Hitung count dari tabel gurupembimbingisi
        $countGurupemanduIsi = DB::table('gurupemanduisi')->count();

        $Prestasi = Prestasi::first();

        $schoolProfile = SchoolProfile::first();

        return $this->view('public.prestasi.index', [
            "title" => "Prestasi",
            "Prestasi" => $Prestasi,
            "profile" => $schoolProfile,
            "countPrestasiOlahraga" => $countPrestasiOlahraga,
            "countPrestasiPenelitian" => $countPrestasiPenelitian,
            "countPrestasiSains" => $countPrestasiSains,
            "countPrestasiSeni" => $countPrestasiSeni,
            "countOlahragaIsi" => $countOlahragaIsi,
            "countGurupemanduIsi" => $countGurupemanduIsi,
        ]);
    }
}
