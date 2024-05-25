<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\PrestasisainsISI;

use Illuminate\Http\Request;

class PrestasisainsISIController extends Controller
{
    public function index()
    {
        $PrestasisainsISI = PrestasisainsISI::all()->first();

        return view('prestasi_isi.sainsindex', [
            "title" => "Prestasi Sains",
            "PrestasisainsISI" => $PrestasisainsISI
        ]);
    }

    public function create()
    {
        return view('prestasi_isi.sainsindex', [
            "title" => "Create New Prestasi sains",
            "PrestasisainsISI" => PrestasisainsISI::all()
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image_lomba' => 'required|image|file|max:1024',
            'nama_lomba' => 'required|max:256',
            'tingkat' => 'required|max:256',
            'tanggal_pelaksanaan' => 'required|max:256',
            'peringkat' => 'required|max:256',
            'nama_peserta' => 'required|max:256',
            'nama_pembimbing' => 'required|max:256'
        ]);

        $validatedData['image_lomba'] = $request->file('image_lomba')->store('lomba-images');

       PrestasisainsISI::create($validatedData);

        return redirect()->route("dashboard.prestasi_tampilan.sains")->with('success', 'New Prestasi sains has been created.');
    }

    public function edit(PrestasisainsISI $PrestasisainsISI)
{
    return view('prestasi_isi.sainsedit', [
        "title" => "Prestasi sains",
        "PrestasisainsISI" => $PrestasisainsISI
    ]);
}


    public function update(Request $request, PrestasisainsISI $PrestasisainsISI)
{
    // Gunakan metode authorize pada instansi GurupemanduISI yang diteruskan
    $this->authorize('update', $PrestasisainsISI);

    $rules = [
        'image_lomba' => 'nullable|image|file|max:1024',
            'nama_lomba' => 'required|max:256',
            'tingkat' => 'required|max:256',
            'tanggal_pelaksanaan' => 'required|max:256',
            'peringkat' => 'required|max:256',
            'nama_peserta' => 'required|max:256',
            'nama_pembimbing' => 'required|max:256'
    ];

    $validatedData = $request->validate($rules);

    if ($request->file('image_lomba')) {
        if ($request->has('old-image_lomba') && !strpos($PrestasisainsISI->image_lomba, "default")) {
            Storage::delete($request->input('old-image_lomba'));
            $validatedData['image_lomba'] = $request->file('image_lomba')->store('lomba-images');
        }
    }

    // Gunakan metode update pada instansi PrestasisainsISI yang spesifik
    $PrestasisainsISI->update($validatedData);

    return redirect()->route("dashboard.prestasi_tampilan.sains")->with('success', 'Prestasi telah diperbarui.');
}

public function destroy(PrestasisainsISI $PrestasisainsISI)
{
    // Pastikan bahwa pengguna memiliki izin untuk menghapus PrestasisainsISI
    $this->authorize('delete', $PrestasisainsISI);

    // Hapus gambar terkait jika bukan gambar default dan gambar ada
    if ($PrestasisainsISI->image && !str_contains($PrestasisainsISI->image_lomba, 'default')) {
        Storage::delete($PrestasisainsISI->image_lomba);
    }

    // Hapus instansi PrestasisainsISI
    $PrestasisainsISI->delete();

    return redirect()->route('dashboard.prestasi_tampilan.sains')->with('success', 'Prestasi has been deleted.');
}
}

