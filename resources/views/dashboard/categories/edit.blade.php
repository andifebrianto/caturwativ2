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
                                            <h2>UBAH KATEGORI</h2>
                                        </div>
                                        <p>Silahkan isi form untuk menambahkan kategori baru ke dalam database.</p>
                                        <form action="/dashboard/categories/{{ $category->id }}" method="post" enctype="multipart/form-data">
                                            @method('put')
                                            @csrf
                                            <div class="form-floating mb-3">
                                                {{-- <label><strong>Judul Buku</strong></label> --}}
                                                <input type="text" name="name"
                                                    class="form-control @error('name') is-invalid @enderror rounded-top"
                                                    placeholder="Masukkan name" autofocus id="name"
                                                    value="{{ old('name', $category->name) }}" required>
                                                <label for="name"><strong>KATEGORI</strong></label>
                                                @error('name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            
                                            <div class="mb-3 form-floating">
                                                <input class="form-control @error('cover') is-invalid @enderror"
                                                    type="file" id="cover" name="cover" onchange="previewImage()">
                                                <label for="cover"><strong>IMAGE</strong> (max: 2MB)</label>
                                                @if ($category->cover)
                                                    <img class="img-preview img-fluid col-sm-5" src="{{ asset('storage/' . $category->cover) }}" id="frame">
                                                @else
                                                    <img class="img-preview img-fluid col-sm-5" id="frame">
                                                @endif
                                                @error('cover')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>


                                            <button type="submit" class="btn btn-primary my-3">UBAH</button>
                                            {{-- <input type="submit" class="btn btn-primary" value="Simpan"> --}}
                                            <a href="/categories" class="btn btn-default">KEMBALI</a>
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
