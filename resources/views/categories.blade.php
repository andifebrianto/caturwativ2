@extends('layouts.main')

@section('container')
    {{-- tampilan kategori lama --}}
    {{-- <div class="container-fluid col-lg-9 pt-3">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title mb-0">
                    <h4 class="m-0 text-uppercase font-weight-bold">Semua Kategori</h4>
                </div>
            </div>
        </div>
        
        <div style="justify-content: space-between;">
            <div class="row">
                @foreach ($categories as $cat)
                    <div class=" position-relative overflow-hidden pt-3 px-3" style="height: 250px; width: 200px;">
                        @if ($cat->cover)
                            <img class="img-preview img-fluid h-100" src="{{ asset('storage/' . $cat->cover) }}"
                                style="object-fit: cover;" id="frame">
                        @else
                            <img class="img-fluid h-100" src="img/buku1.jpg" style="object-fit: cover;">
                        @endif

                        <div class="overlay">
                            <div class="mb-1">
                                @auth
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                        href="/books?kategori={{ $cat->name }}">{{ $cat->name }}</a>
                                @else
                                    <a
                                        class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2">{{ $cat->name }}</a>
                                @endauth
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div> --}}


    {{-- tampilan kategori baru --}}
    <main>
        <section class="pt-3 text-center container">
            <div class="row py-lg-0">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="m-0 text-uppercase text-primary">Caturwati<span
                            class="text-white font-weight-normal text-capitalize">Category</span></h1>
                    @auth
                        <p>
                            <a href="/dashboard/categories/create" class="btn btn-primary font-weight-bold mb-3">Tambah
                                Kategori</a>
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

        @if ($categories->count() > 0)
            <div class="album py-3 mb-5">
                <div class="container mb-5">

                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                        @foreach ($categories as $category)
                            <div class="col">
                                <div class="card shadow-sm">
                                    {{-- <a href="/gallery/{{ $gallery->id }}/#hlink"> --}}
                                    @if ($category->cover)
                                    <img src="{{ asset('storage/' . $category->cover) }}"
                                        class="bd-placeholder-img card-img-top" width="100%" height="225">
                                    @else
                                    <img src="img/gambar1.jpg"
                                        class="bd-placeholder-img card-img-top" width="100%" height="225">
                                    @endif
                                    {{-- </a> --}}
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            @auth
                                                <div class="btn-group">
                                                    <a href="/dashboard/categories/{{ $category->id }}/edit">
                                                        <button class="badge badge-warning border-0">EDIT</button>
                                                    </a>
                                                    <form action="/dashboard/categories/{{ $category->id }}" method="post"
                                                        class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="badge badge-danger border-0 mx-1"
                                                            onClick="return confirm('Hapus kategori?')">Delete</button>
                                                    </form>
                                                </div>

                                                <a class="text-decoration-none"
                                                    href="/books?kategori={{ $category->name }}"><small
                                                        class="text-body-secondary text-uppercase"><strong>{{ $category->name }}</strong></small>
                                                </a>
                                            @else
                                                <small
                                                    class="text-body-secondary text-uppercase"><strong>{{ $category->name }}</strong></small>
                                            @endauth
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        @else
            <div class="container d-flex justify-content-center">
                <div class="content">
                    <div class="alert alert-warning" role="alert">
                        Kategori tidak ditemukan!
                    </div>
                </div>
            </div>
        @endif

    </main>

@endsection
