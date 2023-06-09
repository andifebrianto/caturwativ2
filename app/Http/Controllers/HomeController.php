<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Profil;
use App\Models\Carosel;
use Illuminate\Http\Request;
use App\Models\CaroselThumbnail;

class HomeController extends Controller
{
    public function index()
    {
        return view('home',[
            'title' => 'Home',
            'profil' => Profil::all(),
            'categories' => Category::all(),
            'category_4' => Category::latest()->limit(4)->get(),
            'carosel' => Carosel::first(),
            'carosel_thumbs' => CaroselThumbnail::latest()->limit(4)->get()
        ]);
    }
}
