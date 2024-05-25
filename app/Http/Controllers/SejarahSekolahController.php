<?php

namespace App\Http\Controllers;

use App\Models\SejarahSekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SejarahSekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sejarahsekolah = SejarahSekolah::all()->first();

        return view('sejarah-sekolah.index', [
            "title" => "Sejarah sekolah",
            "sejarah" => $sejarahsekolah
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $sejarahsekolah = SejarahSekolah::all()->first();

        return view('sejarah-sekolah.edit', [
            "title" => "Edit Sejarah Sekolah",
            "sejarah" => $sejarahsekolah
        ]);
    }

    public function update(Request $request)
    {
        $sejarahsekolah = SejarahSekolah::all()->first();
        $this->authorize('update', $sejarahsekolah);

        $rules = [
            'name' => 'required|max:256',
            'sejarah'   => 'required|max:10024',
            'image' => 'image|file|max:1024',
        ];


        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->post('old-image') && !strpos($sejarahsekolah->image, "default")) Storage::delete($request->post('old-image'));
            $validatedData['image'] = $request->file('image')->store('sejarah-image');
        }

        $sejarahsekolah->update($validatedData);

        return redirect()->route('dashboard.sejarah-sekolah.index')->with('success', 'sejarah sekolah has been updated.');
    }
}
