@extends('layouts.main')

@section('container')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-7 px-0">
                <div class="owl-carousel main-carousel position-relative">

                    @foreach ($carosel_thumbs as $thumb)
                        <div class="position-relative overflow-hidden" style="height: 500px;">
                            {{-- <img class="img-fluid h-100" src="{{ asset('storage/' . $carosel->cover1) }}"
                            style="object-fit: cover;"> --}}
                            <img class="img-fluid h-100" src="{{ asset('carosel_thumbnails/' . $thumb->name) }}"
                                style="object-fit: cover;">
                            <div class="overlay">
                                @auth
                                    <a href="/crop-image-upload" class="btn btn-primary font-weight-bold">Ubah Carosel</a>
                                @endauth
                            </div>
                        </div>
                    @endforeach
                    
                </div>
            </div>
            <div class="col-lg-5 px-0">
                <div class="row mx-0">
                    @foreach ($category_4 as $cat)
                        <div class="col-md-6 px-0">
                            <div class="position-relative overflow-hidden" style="height: 250px;">
                                @if ($cat->cover)
                                    <img class="img-preview img-fluid w-100 h-100"
                                        src="{{ asset('storage/' . $cat->cover) }}" style="object-fit: cover;"
                                        id="frame">
                                @else
                                    <img class="img-fluid w-100 h-100" src="img/gambar1.jpg" style="object-fit: cover;">
                                @endif
                                <div class="overlay">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                            href="/books?kategori={{ $cat->name }}">{{ $cat->name }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
