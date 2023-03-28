<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Profil;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('categories',[
            'title' => 'Kategori',
            'profil' => Profil::all(),
            'categories' => Category::latest()->get()
        ]);
    }
}
