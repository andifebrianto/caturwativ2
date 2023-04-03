@extends('layouts.main')

@section('container')

    <section class="py-3 text-center container">
        <div class="row py-lg-0">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="m-0 text-uppercase text-primary">Caturwati<span
                        class="text-white font-weight-normal text-capitalize">Books</span></h1>
                @auth
                    <p>
                        <a href="/dashboard/books/create" class="btn btn-primary font-weight-bold mb-3">Tambah Buku</a>
                    </p>

                @endauth
            </div>
        </div>
    </section>

    @if (session()->has('success'))
        <div class="container col-md-8 d-flex justify-content-center">
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>

        </div>
    @endif

    <div class="container-fluid py-0 pt-0 mb-3" id="container">
        <div class="container py-0">
            <div class="section-title">
                @if ($books->count() > 0)
                    <div class="col-md-12">
                        <div class="page-header clearfix">
                            {{-- <h6 style="text-align: right;" class="pull-left">TOTAL BUKU : {{ $books->total() }} --}}
                            {{-- <br>TOTAL JUDUL : ..</h6> --}}
                            {{-- <a href="/dashboard/books/create" class="btn btn-primary font-weight-bold mb-3">Tambah Buku</a> --}}

                            <h4 style="text-align: center;"><strong>{{ $header }}</strong></h4>
                        </div>
                        <div class="table-responsive table-hover">
                            <table class='table table-bordered table-striped text-center text-uppercase'>
                                <thead class='thead-dark'>
                                    <tr>
                                        <th>
                                            <center>No.</center>
                                        </th>
                                        <th>Kategori</th>
                                        <th>Judul</th>
                                        <th>Penulis</th>
                                        <th>Penerbit</th>
                                        <th>Tahun</th>
                                        <th>Jumlah</th>
                                        <th>Pengaturan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($books as $book)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td><a href="/books?kategori={{ $book->kategori }}" class="text-decoration-none">{{ $book->kategori }}</a>
                                            </td>
                                            <td>{!! $book->judul !!}</td>
                                            <td>{!! $book->penulis !!}</td>
                                            <td>{{ $book->penerbit }}</td>
                                            <td>{{ $book->tahun }}</td>
                                            <td>{{ $book->jumlah }}</td>
                                            <td>
                                                <a href="/dashboard/books/{{ $book->id }}/edit"
                                                    class="badge badge-warning">Edit </a>
                                                <form action="/dashboard/books/{{ $book->id }}" method="post"
                                                    class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="badge badge-danger border-0"
                                                        onClick="return confirm('Hapus data?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                {{ $books->onEachSide(1)->links() }}
                            </div>
                        </div>
                    </div>
                @else
                    <div class="container d-flex justify-content-center">
                        <div class="content">
                            <div class="alert alert-warning" role="alert">
                                Buku tidak ditemukan!
                            </div>
                        </div>
                    </div>
                @endif
            </div>

        </div>
    </div>


@endsection
