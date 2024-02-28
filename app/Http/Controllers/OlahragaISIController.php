<?php

namespace App\Http\Controllers;
use App\Models\OlahragaISI;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class OlahragaISIController extends Controller
{
    public function index()
    {
        $OlahragaISI = OlahragaISI::all();

        return view('olahraga_isi.olahragaindex', [
            "title" => "Olahraga",
            "OlahragaISI" => $OlahragaISI
        ]);
    }

    public function create()
    {
        return view('olahraga_isi.olahragaindex', [
            "title" => "Create New olahraga",
            "OlahragaISI" => OlahragaISI::all()
        ]);
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'title' => 'required|max:256',
        'image_olahraga' => 'required|image|file|max:1024'
    ]);

    $validatedData['image_olahraga'] = $request->file('image_olahraga')->store('olahraga-images');

    OlahragaISI::create($validatedData);

    return redirect()->route("dashboard.prestasi2be.olahraga")->with('success', 'New olahraga has been created.');
}

public function edit(OlahragaISI $OlahragaISI)
{
    return view('olahraga_isi.olahragaedit', [
        "title" => "Olahraga",
        "OlahragaISI" => $OlahragaISI
    ]);
}


    public function update(Request $request, OlahragaISI $OlahragaISI)
{
    // Gunakan metode authorize pada instansi OlahragaISI yang diteruskan
    $this->authorize('update', $OlahragaISI);

    $rules = [
        'title' => 'required|max:256',
        'image_olahraga' => 'nullable|image|file|max:1024'
    ];

    $validatedData = $request->validate($rules);

    if ($request->file('image_olahraga')) {
        if ($request->has('old-image_olahraga') && !strpos($OlahragaISI->image_olahraga, "default")) {
            Storage::delete($request->input('old-image_olahraga'));
            $validatedData['image_olahraga'] = $request->file('image_olahraga')->store('olahraga-images');
        }
    }

    // Gunakan metode update pada instansi OlahragaISI yang spesifik
    $OlahragaISI->update($validatedData);

    return redirect()->route("dashboard.prestasi2be.olahraga")->with('success', 'Guru pemandu telah diperbarui.');
}

public function destroy(OlahragaISI $OlahragaISI)
{
    // Pastikan bahwa pengguna memiliki izin untuk menghapus OlahragaISI
    $this->authorize('delete', $OlahragaISI);

    // Hapus gambar terkait jika bukan gambar default dan gambar ada
    if ($OlahragaISI->image_olahraga && !str_contains($OlahragaISI->image_olahraga, 'default')) {
        Storage::delete($OlahragaISI->image_olahraga);
    }

    // Hapus instansi OlahragaISI
    $OlahragaISI->delete();

    return redirect()->route('dashboard.prestasi2be.olahraga')->with('success', 'Guru Pemandu has been deleted.');
}

}

