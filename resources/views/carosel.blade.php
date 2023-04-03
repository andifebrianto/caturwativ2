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
                                            <h2>UBAH CAROSEL</h2>
                                        </div>
                                        <p>Silahkan pilih gambar untuk mengubah Carosel</p>
                                        <form action="/carosel/{{ $carosel->id }}" method="post" enctype="multipart/form-data">
                                            @method('put')
                                            @csrf
                                            
                                            <div class="mb-3 form-floating">
                                                <input class="form-control @error('cover1') is-invalid @enderror"
                                                    type="file" id="cover1" name="cover1" onchange="previewImage1()">
                                                <label for="cover1"><strong>IMAGE</strong> (max: 2MB)</label>
                                                @if ($carosel->cover1)
                                                    <img class="img-preview img-fluid col-sm-5" src="{{ asset('storage/' . $carosel->cover1) }}" id="frame1">
                                                @else
                                                    <img class="img-preview img-fluid col-sm-5" id="frame1">
                                                @endif
                                                @error('cover1')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="mb-3 form-floating">
                                                <input class="form-control @error('cover2') is-invalid @enderror"
                                                    type="file" id="cover2" name="cover2" onchange="previewImage2()">
                                                <label for="cover2"><strong>IMAGE</strong> (max: 2MB)</label>
                                                @if ($carosel->cover2)
                                                    <img class="img-preview img-fluid col-sm-5" src="{{ asset('storage/' . $carosel->cover2) }}" id="frame2">
                                                @else
                                                    <img class="img-preview img-fluid col-sm-5" id="frame2">
                                                @endif
                                                @error('cover2')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="mb-3 form-floating">
                                                <input class="form-control @error('cover3') is-invalid @enderror"
                                                    type="file" id="cover3" name="cover3" onchange="previewImage3()">
                                                <label for="cover3"><strong>IMAGE</strong> (max: 2MB)</label>
                                                @if ($carosel->cover3)
                                                    <img class="img-preview img-fluid col-sm-5" src="{{ asset('storage/' . $carosel->cover3) }}" id="frame3">
                                                @else
                                                    <img class="img-preview img-fluid col-sm-5" id="frame3">
                                                @endif
                                                @error('cover3')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>


                                            <button type="submit" class="btn btn-primary my-3">UBAH</button>
                                            {{-- <input type="submit" class="btn btn-primary" value="Simpan"> --}}
                                            <a href="/" class="btn btn-default">KEMBALI</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewImage1() {
            frame1.src = URL.createObjectURL(event.target.files[0]);
        }
        function previewImage2() {
            frame2.src = URL.createObjectURL(event.target.files[0]);
        }
        function previewImage3() {
            frame3.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>

@endsection