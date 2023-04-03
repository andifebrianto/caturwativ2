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
    <div class="container col-lg-6 pt-3 align-items-center">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title mb-0">
                    <h4 class="m-0 text-uppercase text-center font-weight-bold">Tentang Kami</h4>
                </div>
                <div class="bg-white border border-top-0 p-4 mb-3">
                    <div class="mb-4">
                        <div class="mb-3">
                            <h5 class="text-uppercase font-weight-bold">Caturwati Library</h5>
                            <p class="mb-4">{{ $profil[0]->deskripsi }}</p>
                            <div class="mb-3">
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fab fa-facebook text-primary mr-2"></i>
                                    <h5 class="font-weight-bold mb-0">Facebook</h5>
                                </div>
                                <p class="m-0"></i>{{ $profil[0]->facebook }}</p>
                            </div>
                            <div class="mb-3">
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fab fa-twitter text-primary mr-2"></i>
                                    <h5 class="font-weight-bold mb-0">Twitter</h5>
                                </div>
                                <p class="m-0"></i>{{ $profil[0]->twitter }}</p>
                            </div>
                            <div class="mb-3">
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fab fa-instagram text-primary mr-2"></i>
                                    <h5 class="font-weight-bold mb-0">Instagram</h5>
                                </div>
                                <p class="m-0"></i>{{ $profil[0]->instagram }}</p>
                            </div>

                            <div class="mb-3">
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fab fa-setting text-primary mr-2"></i>

                                    <!-- Admin -->
                                    <h5 class="font-weight-bold mb-0">Pengaturan</h5>
                                </div>
                                <ul class="dashboard nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="/dashboard/books/create">
                                            <span data-feather="home" class="align-text-bottom m-0"></span>
                                            Tambah Buku
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/dashboard/categories/create">
                                            <span data-feather="file" class="align-text-bottom"></span>
                                            Tambah Kategori
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page"
                                            href="/dashboard/profil/{{ $profil[0]->id }}/edit">
                                            <span data-feather="home" class="align-text-bottom"></span>
                                            Ubah Profil
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="/carosel/1/edit">
                                            <span data-feather="home" class="align-text-bottom"></span>
                                            Ubah Carousel
                                        </a>
                                    </li>
                                </ul>
                                <!-- end admin -->
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    @endsection
