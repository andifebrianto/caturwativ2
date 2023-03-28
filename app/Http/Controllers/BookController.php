<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Profil;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $header = 'INFORMASI BUKU';
        if (request('kategori')) {
            $kategori = Category::firstWhere('name', request('kategori'));
            $header = 'KATEGORI : ' . $kategori->name;
        }

        return view('books',[
            'title' => 'Buku',
            'header' => $header,
            'categories' => Category::all(),
            'profil' => Profil::all(),
            'books' => Book::latest()->filter(request(['cari', 'kategori']))
                        ->paginate(10)
        ]);
    }
}
