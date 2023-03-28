<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalbuku = DB::table('books')->sum('jumlah');

        return view('/dashboard.index',[
            'title' => 'Dashboard',
            'profil' => Profil::all(),
            'categories' => Category::all(),
            'books' => Book::all(),
            'totalbuku' => $totalbuku
        ]);
    }
}
