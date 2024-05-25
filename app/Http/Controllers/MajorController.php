<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Models\ImageJurusan;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * @access SUPERADMIN
 */
class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $majors = Major::query()->with(['head']);
        $searchKeyword = request('search');

        if ($searchKeyword) {
            $majors = $majors
                ->where('name', 'LIKE',  "%$searchKeyword%")
                ->orWhere('description', 'LIKE', "%$searchKeyword%");
        }

        return view('majors.index', [
            "title" => "Majors",
            "majors" => $majors->latest()->paginate(20)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('majors.create', [
            "title" => "Create New Major",
            "heads" => Teacher::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:256',
            'head_of_major_id'   => 'required|numeric',
            'image' => '|image|file|max:1024',
            'image_major' => 'required|image|file|max:1024',
            'logo_major' => 'required|image|file|max:1024',
            'description'   => 'required|max:512',
            'body'   => 'required',
            'image_carousel.*' => 'sometimes|image|file|max:1024'
        ]);
    
        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('major-images');
        }

        if ($request->hasFile('image_major')) {
            $validatedData['image_major'] = $request->file('image_major')->store('image-majors');
        }
        
        if ($request->hasFile('logo_major')) {
            $validatedData['logo_major'] = $request->file('logo_major')->store('logo-majors');
        }
    
        $imageCarouselPaths = [];
    
        $imageCarouselFiles = $request->file('image_carousel');
    
        if (!empty($imageCarouselFiles)) {
            foreach ($imageCarouselFiles as $image) {
                $path = $image->store('images-carousel');
                $imageCarouselPaths[] = $path;
            }
        }
    
        // Mengonversi array $imageCarouselPaths menjadi satu string dengan pemisah koma
        $imageCarouselPathsString = implode(',', $imageCarouselPaths);
    
        // Set nilai kolom 'image_carousel' dengan string yang telah digabungkan
        $validatedData['image_carousel'] = $imageCarouselPathsString;
    
        $name = $validatedData['name'];
        $validatedData['slug'] = $this->slug($name, Major::class);
    
        Major::create($validatedData);
    
        return redirect()->route("dashboard.majors.index")->with('success', 'New major has been created.');
    }
   
    


    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Major $major)
    {
        return view('majors.show', [
            "title" => "$major->name",
            "major" => $major,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Major $major)
    {
        return view('majors.edit', [
            "title" => "Edit Major",
            "heads" => Teacher::all(),
            "major" => $major
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Major $major)
{
    $rules = [
        'name' => 'required|max:256',
        'head_of_major_id' => 'required|numeric',
        'image' => 'image|file|max:1024',
        'image_major' => 'image|file|max:1024',
        'logo_major' => 'image|file|max:1024',
        'description' => 'required|max:512',
        'body' => 'required',
    ];

    // Tambahkan aturan validasi untuk image_carousel yang ada
    $existingImageCarousels = $major->image_carousel ? explode(',', $major->image_carousel) : [];
    foreach ($existingImageCarousels as $key => $value) {
        $rules["existing_image_carousel.$key"] = 'nullable|image|file|max:1024';
    }

    $validatedData = $request->validate($rules);

    if ($request->file('image')) {
        if ($request->post('old-major-image') && !strpos($major->image, "default")) {
            Storage::delete($request->post('old-major-image'));
        }
        $validatedData['image'] = $request->file('image')->store('major-images');
    }

    if ($request->file('image_major')) {
        if ($request->post('old-image-major') && !strpos($major->image_major, "default")) {
            Storage::delete($request->post('old-image-major'));
        }
        $validatedData['image_major'] = $request->file('image_major')->store('image-majors');
    }

    if ($request->file('logo_major')) {
        if ($request->post('old-major-logo_major') && !strpos($major->logo_major, "default")) {
            Storage::delete($request->post('old-major-logo_major'));
        }
        $validatedData['logo_major'] = $request->file('logo_major')->store('logo-majors');
    }

    // Proses image_carousel yang ada
    $imageCarouselPaths = [];
    foreach ($existingImageCarousels as $key => $value) {
        if ($request->file("existing_image_carousel.$key")) {
            if ($request->post("existing_image_carousel.$key") && !strpos($value, "default")) {
                Storage::delete($request->post("existing_image_carousel.$key"));
            }
            $path = $request->file("existing_image_carousel.$key")->store('images-carousel');
            $imageCarouselPaths[] = $path;
        } else {
            // Jika tidak ada file baru, gunakan file lama
            $imageCarouselPaths[] = $value;
        }
    }

    // Proses image_carousel yang baru
    if ($request->hasFile('new_image_carousel')) {
        foreach ($request->file('new_image_carousel') as $image) {
            $path = $image->store('images-carousel');
            $imageCarouselPaths[] = $path;
        }
    }

    $validatedData['image_carousel'] = implode(',', $imageCarouselPaths);

    if ($request->post('old-name') !== $request->post('name')) {
        $name = $validatedData['name'];
        $validatedData['slug'] = $this->slug($name, Major::class);
    }

    $major->update($validatedData);

    return redirect()->route('dashboard.majors.index')->with('success', 'Major has been updated.');
}
    




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Major $major)
    {

        if ($major->image_carousel && !strpos($major->image_carousel, "default")) {
            Storage::delete($major->image_carousel);
        }

        $major->delete();

        return redirect()->route('dashboard.majors.index')->with('success', 'Major has been deleted.');
    }


   public function removeImageCarousel(Request $request, $majorId)
{
    $index = $request->get('index');

    // Ambil major dari database berdasarkan majorId
    $major = Major::find($majorId);

    if (!$major) {
        return response('Major not found', 404);
    }

    // Hapus gambar dari image_carousel berdasarkan indeks
    $imageCarouselArray = explode(',', $major->image_carousel);

    if (array_key_exists($index, $imageCarouselArray)) {
        $deletedImage = trim($imageCarouselArray[$index]);

        // Hapus gambar dari storage (pastikan untuk menggunakan direktori yang benar)
        if (Storage::exists($deletedImage)) {
            Storage::delete($deletedImage);
        }

        // Hapus gambar dari array image_carousel
        unset($imageCarouselArray[$index]);

        // Gabungkan kembali array image_carousel
        $major->image_carousel = implode(',', $imageCarouselArray);
        $major->save();

        return response('Image removed', 200);
    } else {
        return response('Image not found', 404);
    }
}

}
