<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $header = 'ALL CATEGORIES';
        $pagination = 10;

        return view('/dashboard.categories.index', [
            'title' => 'Dashboard | Categories',
            'profil' => Profil::all(),
            'header' => $header,
            'categories' => Category::latest()->paginate(10)
        ])->with('i', ($request->input('page', 1) - 1) * $pagination);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.categories.create', [
            'title' => 'Dashboard | Tambah Kategori',
            'profil' => Profil::all(),
            'categories' => Category::all()
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
            'name' => 'required|max:255|unique:categories',
            'cover' => 'image|file|max:10240'
        ]);

        if ($request->file('cover')) {
            $validatedData['cover'] = $request->file('cover')->store('category-covers');
        }

        Category::create($validatedData);

        return redirect('/categories')->with('success', 'Kategori berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', [
            'title' => 'Dashboard | Ubah Kategori',
            'profil' => Profil::all(),
            'categories' => Category::all(),
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $rules = [
            'name' => 'required|max:255'
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('cover')) {
            if($category->cover){
                Storage::delete($category->cover);
            }
            $validatedData['cover'] = $request->file('cover')->store('category-covers');
        }

        Category::where('id', $category->id)
            ->update($validatedData);

        return redirect('/categories')->with('success', 'Kategori berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if($category->cover){
            Storage::delete($category->cover);
        }
        Category::destroy($category->id);
        return redirect('/categories')->with('success', 'Kategori berhasil dihapus!');
    }
}
