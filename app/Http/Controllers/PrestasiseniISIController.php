<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\PrestasiseniISI;

use Illuminate\Http\Request;

class PrestasiseniISIController extends Controller
{
    public function index()
    {
        $PrestasiseniISI = PrestasiseniISI::all()->first();

        return view('prestasi_isi.seniindex', [
            "title" => "Prestasi Seni",
            "PrestasiseniISI" => $PrestasiseniISI
        ]);
    }

    public function create()
    {
        return view('prestasi_isi.seniindex', [
            "title" => "Create New Prestasi seni",
            "PrestasiseniISI" => PrestasiseniISI::all()
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

       PrestasiseniISI::create($validatedData);

        return redirect()->route("dashboard.prestasi_tampilan.seni")->with('success', 'New Prestasi seni has been created.');
    }

    public function edit(PrestasiseniISI $PrestasiseniISI)
{
    return view('prestasi_isi.seniedit', [
        "title" => "Prestasi seni",
        "PrestasiseniISI" => $PrestasiseniISI
    ]);
}


    public function update(Request $request, PrestasiseniISI $PrestasiseniISI)
{
    // Gunakan metode authorize pada instansi GurupemanduISI yang diteruskan
    $this->authorize('update', $PrestasiseniISI);

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
        if ($request->has('old-image_lomba') && !strpos($PrestasiseniISI->image_lomba, "default")) {
            Storage::delete($request->input('old-image_lomba'));
            $validatedData['image_lomba'] = $request->file('image_lomba')->store('lomba-images');
        }
    }

    // Gunakan metode update pada instansi PrestasiseniISI yang spesifik
    $PrestasiseniISI->update($validatedData);

    return redirect()->route("dashboard.prestasi_tampilan.seni")->with('success', 'Prestasi telah diperbarui.');
}

public function destroy(PrestasiseniISI $PrestasiseniISI)
{
    // Pastikan bahwa pengguna memiliki izin untuk menghapus PrestasiseniISI
    $this->authorize('delete', $PrestasiseniISI);

    // Hapus gambar terkait jika bukan gambar default dan gambar ada
    if ($PrestasiseniISI->image && !str_contains($PrestasiseniISI->image_lomba, 'default')) {
        Storage::delete($PrestasiseniISI->image_lomba);
    }

    // Hapus instansi PrestasiseniISI
    $PrestasiseniISI->delete();

    return redirect()->route('dashboard.prestasi_tampilan.seni')->with('success', 'Prestasi has been deleted.');
}
}


