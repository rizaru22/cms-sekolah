<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SejarahSekolah;
use Illuminate\Http\Request;

class SejarahSekolahController extends Controller
{
    public function index()
    {
        $sejarahsekolah = SejarahSekolah::all()->first();
        return response()->json([
            "success"   => true,
            "data" => $sejarahsekolah
        ]);
    }
}
