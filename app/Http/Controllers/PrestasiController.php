<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use App\Models\PrestasiOlahragaIsi;
use App\Models\PrestasiPenelitianIsi;
use App\Models\PrestasiSainsIsi;
use App\Models\PrestasiSeniIsi;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrestasiController extends Controller
{
    public function index()
    {
        // Hitung total count dari tabel-tabel lain
        $countPrestasiOlahraga = PrestasiOlahragaIsi::count();
        $countPrestasiPenelitian = PrestasiPenelitianIsi::count();
        $countPrestasiSains = PrestasiSainsIsi::count();
        $countPrestasiSeni = PrestasiSeniIsi::count();

        // Hitung count dari tabel olahragaisi
        $countOlahragaIsi = DB::table('olahragaisi')->count();

        // Hitung count dari tabel gurupembimbingisi
        $countGurupemanduIsi = DB::table('gurupemanduisi')->count();

        // Ambil data prestasi dari tabel Prestasi
        $prestasi = Prestasi::all()->first();

        return view('prestasi.index', [
            "title" => "Prestasi",
            "prestasi" => $prestasi,
            "countPrestasiOlahraga" => $countPrestasiOlahraga,
            "countPrestasiPenelitian" => $countPrestasiPenelitian,
            "countPrestasiSains" => $countPrestasiSains,
            "countPrestasiSeni" => $countPrestasiSeni,
            "countOlahragaIsi" => $countOlahragaIsi,
            "countGurupemanduIsi" => $countGurupemanduIsi,
        ]);
    }
}
