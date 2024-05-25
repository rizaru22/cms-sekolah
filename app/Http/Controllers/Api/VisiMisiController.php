<?php

namespace App\Http\Controllers\Api;

use App\Models\VisiMisi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VisiMisiController extends Controller
{
    public function index()
    {
        $visimisi = VisiMisi::all()->first();
        return response()->json([
            "success"   => true,
            "data" => $visimisi
        ]);
    }
}
