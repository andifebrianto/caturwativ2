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
                            <a href="tambah-gambar" class="btn btn-primary font-weight-bold mb-3">Tambah Gambar</a>

                            {{-- <button type="button" class="btn btn-primary font-weight-bold mb-3" data-bs-toggle="modal"
                                data-bs-target="#tambahModal">Tambah Gambar
                            </button> --}}
                        </p>

                    @endauth
                </div>
            </div>
        </section>

        {{-- Modal add image --}}
        <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Tambah Gambar</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('gallery.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 form-floating">
                                <input class="form-control @error('image') is-invalid @enderror" type="file"
                                    id="image" name="image" onchange="previewImage()">
                                <label for="image"><strong>IMAGE</strong> (max: 20MB)</label>
                                <img class="img-fluid" id="frame">
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">SAVE</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- Alert --}}
        @if (session()->has('success'))
            <div class="container col-md-8 d-flex justify-content-center">
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            </div>
        @endif

        @if ($galleries->count() > 0)
            <div class="album py-3 mb-5">
                <div class="container mb-5">

                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                        @foreach ($galleries as $gallery)
                            <div class="col">
                                <div class="card shadow-sm">
                                    {{-- <a href="/gallery/{{ $gallery->id }}/#hlink">
                                        
                                    </a> --}}
                                    <button type="button" class="btn" data-bs-toggle="modal"
                                        data-bs-target="#gambarModal{{ $gallery->id }}">
                                        <img src="{{ asset('gallery_thumbnails/' . $gallery->thumbnails->name) }}"
                                            class="bd-placeholder-img card-img-top" width="100%" height="225">
                                    </button>


                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            @auth
                                                {{-- <div class="btn-group">
                                                    <form action="/gallery/{{ $gallery->id }}" method="post" class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="badge badge-danger border-0"
                                                            onClick="return confirm('Hapus gambar?')">Delete</button>
                                                    </form>
                                                </div> --}}

                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal{{ $gallery->id }}">
                                                    Delete
                                                </button>

                                            @endauth
                                            <small
                                                class="text-body-secondary"><strong>{{ $gallery->created_at->diffForHumans() }}</strong></small>
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

        @foreach ($galleries as $gallery)
            {{-- Modal Show Image --}}
            <div class="modal fade" id="gambarModal{{ $gallery->id }}" tabindex="-1"
                aria-labelledby="gambarModalLabel{{ $gallery->id }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
                    <div class="modal-content">
                        {{-- <div class="modal-header">
                            <h1 class="modal-title fs-5" id="gambarModalLabel{{ $gallery->id }}">Judul Gambar
                                {{ $gallery->id }}</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div> --}}
                        <div class="modal-body">
                            <img src="{{ asset('storage/' . $gallery->image) }}" class="img-fluid"
                                alt="Gambar {{ $gallery->id }}">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                            @auth
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal{{ $gallery->id }}">
                                    Delete
                                </button>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>

            {{-- Modal Delete Confirmation --}}
            <div class="modal fade" id="deleteModal{{ $gallery->id }}" tabindex="-1"
                aria-labelledby="deleteModalLabel{{ $gallery->id }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="deleteModalLabel{{ $gallery->id }}">Konfirmasi Hapus</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Apakah Anda yakin ingin menghapus gambar ini?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            {{-- <form action="/gallery/{{ $gallery->id }}" method="post"> --}}
                            <form action="{{ route('gallery.destroy', $gallery->id) }}" method="post">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger">DELETE</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </main>

    <script>
        function previewImage() {
            frame.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>

@endsection
