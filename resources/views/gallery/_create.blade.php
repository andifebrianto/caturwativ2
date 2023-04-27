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
                                        <h2>TAMBAH GAMBAR</h2>
                                    </div>
                                    <p>Silahkan pilih gambar baru ke dalam database.</p>
                                    <form action="/gallery" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3 form-floating">
                                            <input class="form-control @error('image') is-invalid @enderror"
                                                type="file" id="image" name="image" onchange="previewImage()">
                                            <label for="image"><strong>IMAGE</strong> (max: 10MB)</label>
                                            <img class="img-preview img-fluid col-sm-5" id="frame">
                                            @error('image')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>


                                        <button type="submit" class="btn btn-primary my-3">SIMPAN</button>
                                        <a href="/gallery" class="btn btn-default">KEMBALI</a>
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
    function previewImage() {
        frame.src = URL.createObjectURL(event.target.files[0]);
    }
</script>
    
@endsection