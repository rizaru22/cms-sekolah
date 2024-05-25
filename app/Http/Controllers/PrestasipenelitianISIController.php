<?php

namespace App\Http\Controllers;

use App\Models\Prestasipenelitian;
use Illuminate\Support\Facades\Storage;
use App\Models\PrestasipenelitianISI;

use Illuminate\Http\Request;

class PrestasipenelitianISIController extends Controller
{
    public function index()
    {
        $PrestasipenelitianISI = PrestasipenelitianISI::all();

        return view('prestasi_isi.penelitianindex', [
            "title" => "Prestasi Penelitian",
            "PrestasipenelitianISI" => $PrestasipenelitianISI
        ]);
    }

    public function create()
    {
        return view('prestasi_isi.penelitianindex', [
            "title" => "Create New Prestasi penelitian",
            "PrestasipenelitianISI" => PrestasipenelitianISI::all()
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

       PrestasipenelitianISI::create($validatedData);

        return redirect()->route("dashboard.prestasi_tampilan.penelitian")->with('success', 'New Prestasi Penelitian has been created.');
    }

    public function edit(PrestasipenelitianISI $PrestasipenelitianISI)
{
    return view('prestasi_isi.penelitianedit', [
        "title" => "Prestasi Penelitian",
        "PrestasipenelitianISI" => $PrestasipenelitianISI
    ]);
}


    public function update(Request $request, PrestasipenelitianISI $PrestasipenelitianISI)
{
    // Gunakan metode authorize pada instansi GurupemanduISI yang diteruskan
    $this->authorize('update', $PrestasipenelitianISI);

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
        if ($request->has('old-image_lomba') && !strpos($PrestasipenelitianISI->image_lomba, "default")) {
            Storage::delete($request->input('old-image_lomba'));
            $validatedData['image_lomba'] = $request->file('image_lomba')->store('lomba-images');
        }
    }

    // Gunakan metode update pada instansi PrestasipenelitianISI yang spesifik
    $PrestasipenelitianISI->update($validatedData);

    return redirect()->route("dashboard.prestasi_tampilan.penelitian")->with('success', 'Prestasi telah diperbarui.');
}

public function destroy(PrestasipenelitianISI $PrestasipenelitianISI)
{
    // Pastikan bahwa pengguna memiliki izin untuk menghapus PrestasipenelitianISI
    $this->authorize('delete', $PrestasipenelitianISI);

    // Hapus gambar terkait jika bukan gambar default dan gambar ada
    if ($PrestasipenelitianISI->image && !str_contains($PrestasipenelitianISI->image_lomba, 'default')) {
        Storage::delete($PrestasipenelitianISI->image_lomba);
    }

    // Hapus instansi PrestasipenelitianISI
    $PrestasipenelitianISI->delete();

    return redirect()->route('dashboard.prestasi_tampilan.penelitian')->with('success', 'Prestasi has been deleted.');
}
}

