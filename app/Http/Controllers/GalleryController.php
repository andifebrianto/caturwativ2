<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Gallery;
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
            'galleries' => Gallery::latest()->get()
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
            'image' => 'required|image|file|max:10240'
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('galleries');
        }

        Gallery::create($validatedData);

        return redirect('/gallery')->with('success', 'Gambar berhasil ditambahkan!');
    }

    public function destroy(Gallery $gallery)
    {
        if($gallery->image){
            Storage::delete($gallery->image);
        }
        Gallery::destroy($gallery->id);
        return redirect('/gallery')->with('success', 'Gambar berhasil dihapus!');
    }
}
