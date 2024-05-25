<?php

namespace App\Http\Controllers\Public;

use Illuminate\Http\Request;
use App\Models\SejarahSekolah;
use App\Models\SchoolProfile;
use App\Http\Controllers\Controller;
use View;

class SejarahSekolahController extends Controller
{
    public function index()
    {
        // Mengambil data sejarah sekolah
        $sejarahsekolah = SejarahSekolah::first();

        // Mengambil data profil sekolah
        $schoolProfile = SchoolProfile::first();

        // Mengirimkan data ke tampilan
        return $this->view('public.sejarah-sekolah.index', [
            "title" => "Sejarah sekolah",
            "sejarah" => $sejarahsekolah,
            "profile" => $schoolProfile
        ]);
    }
}



