<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::query()->latest()->paginate(20)->withQueryString();
        $searchKeyword = request('search');

        if ($searchKeyword) {
            $pages = $pages->where('title', 'LIKE', "%$searchKeyword%")
                ->orWhere('body', 'LIKE', "%$searchKeyword%");
        }

        return view('pages.index', [
            "title" => "Pages",
            "pages" => $pages
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create', [
            "title" => "Create New Page",
            "menus" => Menu::all()
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
            'title' => 'required|max:256',
            'menu_id'   => 'required|numeric',
            'image.*' => 'image|file|max:1024',
            'body'   => 'required'
        ]);

        $imagePaths = [];
    
        $imageFiles = $request->file('image');
    
        if (!empty($imageFiles)) {
            foreach ($imageFiles as $image) {
                $path = $image->store('page-images');
                $imagePaths[] = $path;
            }
        }
    
        // Mengonversi array $imagePaths menjadi satu string dengan pemisah koma
        $imagePathsString = implode(',', $imagePaths);
    
        // Set nilai kolom 'image_' dengan string yang telah digabungkan
        $validatedData['image'] = $imagePathsString;

        $title = $validatedData['title'];
        $validatedData['slug'] = $this->slug($title, Page::class);

        Page::create($validatedData);

        return redirect()->route("dashboard.pages.index")->with('success', 'New page has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        return view('pages.show', [
            "title" => "$page->title",
            "page" => $page
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        // $this->authorize('update', $page); // sudah di middleware

        return view('pages.edit', [
            "title" => "Edit Page",
            "menus" => Menu::all(),
            "page" => $page
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        // $this->authorize('update', $page); // sudah di middleware

        $rules = [
            'title' => 'required|max:256',
            'menu_id'   => 'required|numeric',
            'body'   => 'required'
        ];

        if ($request->slug !== $page->slug) {
            $rules['slug'] = 'required|unique:posts';
        }

        // Tambahkan aturan validasi untuk image yang ada
    $existingImage = $page->image ? explode(',', $page->image) : [];
    foreach ($existingImage as $key => $value) {
        $rules["existing_image.$key"] = 'nullable|image|file|max:1024';
    }


        $validatedData = $request->validate($rules);

        // Proses image yang ada
    $imagePaths = [];
    foreach ($existingImage as $key => $value) {
        if ($request->file("existing_image.$key")) {
            if ($request->post("existing_image.$key") && !strpos($value, "default")) {
                Storage::delete($request->post("existing_image.$key"));
            }
            $path = $request->file("existing_image.$key")->store('page-images');
            $imagePaths[] = $path;
        } else {
            // Jika tidak ada file baru, gunakan file lama
            $imagePaths[] = $value;
        }
    }

    // Proses image yang baru
    if ($request->hasFile('new_image')) {
        foreach ($request->file('new_image') as $image) {
            $path = $image->store('page-images');
            $imagePaths[] = $path;
        }
    }

    $validatedData['image'] = implode(',', $imagePaths);

        if ($request->post('old-title') !== $request->post('title')) {
            $title = $validatedData['title'];
            $validatedData['slug'] = $this->slug($title, Page::class);
        }

        $page->update($validatedData);

        return redirect()->route('dashboard.pages.index')->with('success', 'Page has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $this->authorize('delete', $page);

        if ($page->image && !strpos($page->image, "default")) Storage::delete($page->image);
        $page->delete();
        return redirect()->route('dashboard.pages.index')->with('success', 'Page has been deleted.');
    }

    public function removeImage(Request $request, $pageId)
    {
        $index = $request->get('index');
    
        // Ambil page dari database berdasarkan pageId
        $page = page::find($pageId);
    
        if (!$page) {
            return response('page not found', 404);
        }
    
        // Hapus gambar dari image berdasarkan indeks
        $imageArray = explode(',', $page->image);
    
        if (array_key_exists($index, $imageArray)) {
            $deletedImage = trim($imageArray[$index]);
    
            // Hapus gambar dari storage (pastikan untuk menggunakan direktori yang benar)
            if (Storage::exists($deletedImage)) {
                Storage::delete($deletedImage);
            }
    
            // Hapus gambar dari array image
            unset($imageArray[$index]);
    
            // Gabungkan kembali array image
            $page->image = implode(',', $imageArray);
            $page->save();
    
            return response('Image removed', 200);
        } else {
            return response('Image not found', 404);
        }
    }
}
