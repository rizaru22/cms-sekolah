<?php

namespace App\Http\Controllers;

use App\Models\Gurupemandu;
use App\Models\GurupemanduISI;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class GurupemanduISIController extends Controller
{
    public function index()
    {
        $GurupemanduISI = GurupemanduISI::all();

        return view('guru_pemandu_isi.gurupemanduindex', [
            "title" => "Guru Pemandu",
            "GurupemanduISI" => $GurupemanduISI
        ]);
    }

    public function create()
    {
        return view('guru_pemandu_isi.gurupemanduindex', [
            "title" => "Create New gurupemandu",
            "GurupemanduISI" => GurupemanduISI::all()
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:256',
            'pemandu' => 'required|max:256',
            'image' => 'required|image|file|max:1024'
        ]);

        $validatedData['image'] = $request->file('image')->store('images');

        GurupemanduISI::create($validatedData);

        return redirect()->route("dashboard.prestasi2be.gurupemandu")->with('success', 'New guru pemandu has been created.');
    }

    public function edit(GurupemanduISI $GurupemanduISI)
    {
        return view('guru_pemandu_isi.gurupemanduedit', [
            "title" => "Guru Pemandu",
            "GurupemanduISI" => $GurupemanduISI
        ]);
    }


    public function update(Request $request, GurupemanduISI $GurupemanduISI)
    {
        // Gunakan metode authorize pada instansi GurupemanduISI yang diteruskan
        $this->authorize('update', $GurupemanduISI);

        $rules = [
            'name' => 'required|max:256',
            'pemandu' => 'required|max:256',
            'image' => 'nullable|image|file|max:1024'
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->has('old-image') && !strpos($GurupemanduISI->image, "default")) {
                Storage::delete($request->input('old-image'));
                $validatedData['image'] = $request->file('image')->store('images');
            }
        }

        // Gunakan metode update pada instansi GurupemanduISI yang spesifik
        $GurupemanduISI->update($validatedData);

        return redirect()->route("dashboard.prestasi2be.gurupemandu")->with('success', 'Guru pemandu telah diperbarui.');
    }

    public function destroy(GurupemanduISI $GurupemanduISI)
    {
        // Pastikan bahwa pengguna memiliki izin untuk menghapus GurupemanduISI
        $this->authorize('delete', $GurupemanduISI);

        // Hapus gambar terkait jika bukan gambar default dan gambar ada
        if ($GurupemanduISI->image && !str_contains($GurupemanduISI->image, 'default')) {
            Storage::delete($GurupemanduISI->image);
        }

        // Hapus instansi GurupemanduISI
        $GurupemanduISI->delete();

        return redirect()->route('dashboard.prestasi2be.gurupemandu')->with('success', 'Guru Pemandu has been deleted.');
    }
}
