@extends('layouts.main')

@section('container')

    <main>

        <section class="py-3 text-center container">
            <div class="row py-lg-0">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="m-0 text-uppercase text-primary">Caturwati<span
                            class="text-white font-weight-normal text-capitalize">Gallery</span></h1>
                    @auth
                        <p>
                            <a href="/gallery/create" class="btn btn-primary font-weight-bold mb-3">Tambah Gambar</a>
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

        @if ($galleries->count() > 0)
            <div class="album py-3">
                <div class="container">

                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                        @foreach ($galleries as $gallery)
                            <div class="col">
                                <div class="card shadow-sm">
                                    <a href="/gallery/{{ $gallery->id }}/#hlink">
                                        <img src="{{ asset('storage/' . $gallery->image) }}"
                                            class="bd-placeholder-img card-img-top" width="100%" height="225">
                                    </a>
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            @auth
                                                <div class="btn-group">
                                                    <form action="/gallery/{{ $gallery->id }}" method="post" class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="badge badge-danger border-0"
                                                            onClick="return confirm('Hapus gambar?')">Delete</button>
                                                    </form>
                                                </div>

                                            @endauth
                                            <small class="text-body-secondary"><strong>{{ $gallery->created_at->diffForHumans() }}</strong></small>
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
                    Gambar tidak ditemukan!
                </div>
            </div>
        </div>
        @endif

    </main>

@endsection
