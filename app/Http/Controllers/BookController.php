<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Profil;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $header = 'INFORMASI BUKU';
        $pagination = 10;
        $keyword = $request->get('cari');
        
        if (request('kategori')) {
            $kategori = Category::firstWhere('name', request('kategori'));
            $header = 'KATEGORI : ' . $kategori->name;
        }

        $books = Book::latest()->filter(request(['cari', 'kategori']))
        ->paginate(10)->appends($request->except('page'));

        // highlight pencarian
        foreach ($books as $book)
        {
            $book->judul = str_replace($keyword, '<span class="highlight">'.$keyword.'</span>', $book->judul);
            $book->penulis = str_replace($keyword, '<span class="highlight">'.$keyword.'</span>', $book->penulis);
        }

        return view('books',[
            'title' => 'Buku',
            'header' => $header,
            'categories' => Category::all(),
            'profil' => Profil::all(),
            'books' => $books
        ])->with('i', ($request->input('page', 1) - 1) * $pagination);
    }
}
