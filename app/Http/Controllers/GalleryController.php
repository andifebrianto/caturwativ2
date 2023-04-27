<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Gallery;
use App\Models\GalleryThumbnail;
use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index(){
        return view('gallery.index', [
            'title' => 'Gallery',
            'profil' => Profil::all(),
            'categories' => Category::all(),
            'galleries' => Gallery::latest()->get(),
            'thumbs' => GalleryThumbnail::latest()->get()
        ]);
    }

    public function show(Gallery $gallery)
    {
        return view('gallery.show', [
            'title' => 'Gallery',
            'profil' => Profil::all(),
            'categories' => Category::all(),
            'gallery' => $gallery
        ]);
    }

    public function create()
    {
        return view('gallery.create', [
            'title' => 'Tambah Gambar',
            'profil' => Profil::all(),
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|file|max:20480'
        ]);

        $thumb = GalleryThumbnail::latest()->first();
        $validatedData = [
            'thumbnail_id' => $thumb->id
        ];

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('galleries');
        }

        // sleep(2);
        Gallery::create($validatedData);

        return redirect('/gallery')->with('success', 'Gambar berhasil ditambahkan!');
    }

    public function destroy(Gallery $gallery)
    {
        if($gallery->image){
            Storage::delete($gallery->image);
        }

        // Delete thumbnail
        $thumb = GalleryThumbnail::latest()->first();
        $thumb_name = $thumb->name;
        if (!empty($thumb_name)) {
            $filePathDelete = public_path('gallery_thumbnails/' . $thumb_name);
            if (file_exists($filePathDelete)) {
                unlink($filePathDelete);
            }
        }

        Gallery::destroy($gallery->id);
        GalleryThumbnail::destroy($thumb->id);

        return redirect('/gallery')->with('success', 'Gambar berhasil dihapus!');
    }
}
