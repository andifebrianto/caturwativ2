@extends('layouts.main')

@section('container')
    @if (session()->has('success'))
        <div class="container col-md-8 d-flex justify-content-center pt-3">
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>

        </div>
    @endif
    <!-- User -->
    <div class="container col-lg-6 pt-5 align-items-center">
        <div class="row">
            {{-- <div class="col-lg-12"> --}}
            <div class="section-title mb-0">
                <h4 class="m-0 text-uppercase text-center font-weight-bold">Tentang Kami</h4>

                {{-- @auth
                    <button type="button" class="btn btn-primary font-weight-bold" data-bs-toggle="modal"
                        data-bs-target="#tambahModal">Ubah Profil
                    </button>
                @endauth --}}

            </div>
            <div class="border border-top-0 p-4 mb-3 bg-white">
                {{-- <div class="mb-4">
                        <div class="mb-3"> --}}
                <h5 class="text-uppercase font-weight-bold">Caturwati Library</h5>
                <p class="mb-4">{{ $profil[0]->deskripsi }}</p>
                <div class="mb-3">
                    <div class="d-flex align-items-center mb-2">
                        <i class="fab fa-facebook text-primary mr-2"></i>
                        <h5 class="font-weight-bold mb-0">Facebook</h5>
                    </div>
                    <p class="m-0">
                        <a href="{{ $profil[0]->facebook }}">Endang Caturwati</a></p>
                </div>
                <div class="mb-3">
                    <div class="d-flex align-items-center mb-2">
                        <i class="fab fa-youtube text-primary mr-2"></i>
                        <h5 class="font-weight-bold mb-0">Youtube</h5>
                    </div>
                    <p class="m-0">
                        <a href="{{ $profil[0]->twitter }}">Endang Caturwati</a></p>
                </div>
                <div class="mb-3">
                    <div class="d-flex align-items-center mb-2">
                        <i class="fab fa-instagram text-primary mr-2"></i>
                        <h5 class="font-weight-bold mb-0">Instagram</h5>
                    </div>
                    <p class="m-0">
                        <a href="{{ $profil[0]->instagram }}">endang_caturwati</a></p>
                </div>

                {{-- Tampilan pengaturan baru --}}
                @auth
                    <button type="button" class="btn btn-primary font-weight-bold" data-bs-toggle="modal"
                        data-bs-target="#pengaturanModal"><i class="fas fa-tools"></i> Pengaturan
                    </button>
                @endauth

                {{-- Tampilan pengaturan lama --}}
                {{-- <div class="mb-3">
                    <div class="d-flex align-items-center mb-2">
                        <i class="fab fa-setting text-primary mr-2"></i>

                        <!-- Admin -->
                        <h5 class="font-weight-bold mb-0">Pengaturan</h5>
                    </div>
                    <ul class="dashboard nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/dashboard/books/create">
                                Tambah Buku
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard/categories/create">
                                Tambah Kategori
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page"
                                href="/dashboard/profil/{{ $profil[0]->id }}/edit">
                                Ubah Profil
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/carosel/1/edit">
                                Ubah Carousel
                            </a>
                        </li>
                    </ul>
                    <!-- end admin -->
                </div> --}}
                {{-- </div>
                    </div> --}}
            </div>
            {{-- </div> --}}
        </div>
    </div>

    {{-- Modal Pengaturan --}}
    <div class="modal fade" id="pengaturanModal" tabindex="-1" aria-labelledby="pengaturanModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="pengaturanModal">PENGATURAN</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex">
                    <a href="/dashboard/books/create">
                        <button type="button" class="btn btn-primary font-weight-bold" data-bs-toggle="modal"
                            data-bs-target="#pengaturanModal">Tambah Buku
                        </button>
                    </a>
                    <a href="/dashboard/categories/create">
                        <button type="button" class="btn btn-primary font-weight-bold" data-bs-toggle="modal"
                            data-bs-target="#pengaturanModal">Tambah Kategori
                        </button>
                    </a>
                    <a href="/dashboard/profil/1/edit">
                        <button type="button" class="btn btn-primary font-weight-bold" data-bs-toggle="modal"
                            data-bs-target="#tambahModal">Ubah Profil
                        </button>
                    </a>
                    <a href="/crop-image-upload">
                        <button type="button" class="btn btn-primary font-weight-bold" data-bs-toggle="modal"
                            data-bs-target="#pengaturanModal">Ubah Carosel
                        </button>
                    </a>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
@endsection
