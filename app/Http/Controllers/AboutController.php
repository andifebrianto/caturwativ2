<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Profil;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        return view('about',[
            'title' => 'Tentang',
            'profil' => Profil::all(),
            'categories' => Category::all()
        ]);
    }
}
