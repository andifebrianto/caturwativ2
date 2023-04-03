<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Profil;
use Illuminate\Http\Request;

class DashboardBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $header = 'INFORMASI BUKU';
        $pagination = 10;

        if (request('kategori')) {
            $book = Book::firstWhere('kategori', request('kategori'));
            $header = 'KATEGORI : ' . $book->kategori;
        }

        return view('dashboard.books.index',[
            'title' => 'Dashboard | Books',
            'profil' => Profil::all(),
            'categories' => Category::all(),
            'header' => $header,
            'books' => Book::latest()->filter(request(['cari', 'kategori']))
                        ->paginate(10)->appends($request->except('page'))
        ])->with('i', ($request->input('page', 1) - 1) * $pagination);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.books.create',[
            'title' => 'Dashboard | Tambah Buku',
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
        // dd($request);
        $validatedData = $request->validate([
            'kategori' => 'required',
            'judul' => 'required|max:255',
            'penulis' => 'max:255',
            'penerbit' => 'max:255',
            'tahun' => '',
            'jumlah' => ''
        ]);

        Book::create($validatedData);
        return redirect('/books')->with('success', 'Buku berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('dashboard.books.edit',[
            'title' => 'Dashboard | Ubah Buku',
            'profil' => Profil::all(),
            'categories' => Category::all(),
            'book' => $book
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $validatedData = $request->validate([
            'kategori' => 'required',
            'judul' => 'required|max:255',
            'penulis' => 'max:255',
            'penerbit' => 'max:255',
            'tahun' => '',
            'jumlah' => ''
        ]);

        Book::where('id', $book->id)
            ->update($validatedData);

        return redirect('/books')->with('success', 'Data Buku berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        Book::destroy($book->id);
        return redirect('/books')->with('success', 'Buku berhasil dihapus!');
    }
}
