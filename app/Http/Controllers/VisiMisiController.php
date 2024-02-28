<?php

namespace App\Http\Controllers;

use App\Models\VisiMisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VisiMisiController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visimisi = VisiMisi::all()->first();

        return view('visi-misi.index', [
            "title" => "Visi Misi",
            "visimisi" => $visimisi
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $visimisi = VisiMisi::all()->first();

        return view('visi-misi.edit', [
            "title" => "Edit Visi Misi",
            "visimisi" => $visimisi
        ]);
    }

    public function update(Request $request)
    {
        $visimisi = VisiMisi::all()->first();
        $this->authorize('update', $visimisi);

        $rules = [
            'name' => 'required|max:256',
            'visi'   => 'required|max:10024',
            'misi'   => 'required|max:10024',
            'image' => 'image|file|max:1024'
        ];


        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->post('old-image') && !strpos($visimisi->image, "default")) Storage::delete($request->post('old-image'));
            $validatedData['image'] = $request->file('image')->store('image-visimisi');
        }

        $visimisi->update($validatedData);

        return redirect()->route('dashboard.visi-misi.index')->with('success', 'Visi Misi has been updated.');
    }
}
