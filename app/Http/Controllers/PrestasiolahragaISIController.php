<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\PrestasiolahragaISI;

use Illuminate\Http\Request;

class PrestasiolahragaISIController extends Controller
{
    public function index()
    {
        $PrestasiolahragaISI = PrestasiolahragaISI::all();

        return view('prestasi_isi.olahragaindex', [
            "title" => "Prestasi Olahraga",
            "PrestasiolahragaISI" => $PrestasiolahragaISI
        ]);
    }

    public function create()
    {
        return view('prestasi_isi.olahragaindex', [
            "title" => "Create New Prestasi olahraga",
            "PrestasiolahragaISI" => PrestasiolahragaISI::all()
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

       PrestasiolahragaISI::create($validatedData);

        return redirect()->route("dashboard.prestasi_tampilan.olahraga")->with('success', 'New Prestasi olahraga has been created.');
    }

    public function edit(PrestasiolahragaISI $PrestasiolahragaISI)
{
    return view('prestasi_isi.olahragaedit', [
        "title" => "Prestasi olahraga",
        "PrestasiolahragaISI" => $PrestasiolahragaISI
    ]);
}


    public function update(Request $request, PrestasiolahragaISI $PrestasiolahragaISI)
{
    // Gunakan metode authorize pada instansi GurupemanduISI yang diteruskan
    $this->authorize('update', $PrestasiolahragaISI);

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
        if ($request->has('old-image_lomba') && !strpos($PrestasiolahragaISI->image_lomba, "default")) {
            Storage::delete($request->input('old-image_lomba'));
            $validatedData['image_lomba'] = $request->file('image_lomba')->store('lomba-images');
        }
    }

    // Gunakan metode update pada instansi PrestasiolahragaISI yang spesifik
    $PrestasiolahragaISI->update($validatedData);

    return redirect()->route("dashboard.prestasi_tampilan.olahraga")->with('success', 'Prestasi telah diperbarui.');
}

public function destroy(PrestasiolahragaISI $PrestasiolahragaISI)
{
    // Pastikan bahwa pengguna memiliki izin untuk menghapus PrestasiolahragaISI
    $this->authorize('delete', $PrestasiolahragaISI);

    // Hapus gambar terkait jika bukan gambar default dan gambar ada
    if ($PrestasiolahragaISI->image && !str_contains($PrestasiolahragaISI->image_lomba, 'default')) {
        Storage::delete($PrestasiolahragaISI->image_lomba);
    }

    // Hapus instansi PrestasiolahragaISI
    $PrestasiolahragaISI->delete();

    return redirect()->route('dashboard.prestasi_tampilan.olahraga')->with('success', 'Prestasi has been deleted.');
}
}

