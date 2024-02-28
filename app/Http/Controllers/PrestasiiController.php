<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Prestasii;
use App\Models\PrestasiolahragaISI;
use App\Models\PrestasipenelitianISI;
use App\Models\PrestasisainsISI;
use App\Models\PrestasiseniISI;

use Illuminate\Http\Request;

class PrestasiiController extends Controller
{
    public function index()
    {
        // Hitung jumlah baris dari tabel prestasiolahragaisi
        $countPrestasiOlahraga = DB::table('prestasiolahragaisi')->count();
        $countPrestasiPenelitian = DB::table('prestasipenelitianisi')->count();
        $countPrestasiSains = DB::table('prestasisainsisi')->count();
        $countPrestasiSeni = DB::table('prestasiseniisi')->count();

        $prestasii = Prestasii::all()->first();

        return view('prestasi2be.prestasi', [
            "title" => "Prestasi",
            "prestasii" => $prestasii,
            "countPrestasiOlahraga" => $countPrestasiOlahraga,
            "countPrestasiPenelitian" => $countPrestasiPenelitian,
            "countPrestasiSains" => $countPrestasiSains,
            "countPrestasiSeni" => $countPrestasiSeni,
        ]);
    }
}
