@extends('layouts.main')

@section('container')
    <div class="container-fluid col-lg-9 mb-3">
        <div class="container py-4 col-12 mb-3">
            <div class="section-title col-md-12 mb-0">
                <div class="col-12">
                    <div class="page-header clearfix">
                        <div class="wrapper">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="page-header">
                                            <h2><center>GAMBAR DETAIL</center></h2>
                                            <a href="/gallery" class="btn btn-primary font-weight-bold mb-3">KEMBALI</a>
                                            <form action="/gallery/{{ $gallery->id }}" method="post" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-danger font-weight-bold mb-3"
                                                    onClick="return confirm('Hapus gambar?')">Delete</button>
                                            </form>
                                        </div>
                                        <img src="{{ asset('storage/' . $gallery->image) }}" class="img-fluid" alt="..." id="hlink">
                                        

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
