<?php

namespace App\Http\Controllers\Public;

use App\Models\VisiMisi;
use App\Models\SchoolProfile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use View;

class VisiMisiController extends Controller
{
    public function index()
    {
        $visimisi = VisiMisi::first();

        $schoolProfile = SchoolProfile::first();

        return $this->view('public.visi-misi.index', [
            "title" => "Visi Misi",
            "visimisi" => $visimisi,
            "profile" => $schoolProfile
        ]);
    }
}
