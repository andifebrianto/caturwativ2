@extends('layouts.main')

@section('container')
    <div class="container-fluid col-lg-9 mb-5 py-5">
        <div class="section-title">
            <div class="container-fluid">
                <div class="row">
                    <div class="page-header">
                        <h2>UBAH DATA BUKU</h2>
                    </div>
                    <p>Silahkan masukan pembaruan yang diperlukan.</p>
                    <form action="/dashboard/books/{{ $book->id }}" method="post" enctype="multipart/form-data">
                        @method('put')
                        @csrf

                        <div class="form-floating mb-3">
                            {{-- <label><strong>Judul Buku</strong></label> --}}
                            <input type="text" name="judul"
                                class="form-control @error('judul') is-invalid @enderror rounded-top"
                                placeholder="Masukkan judul" autofocus id="judul"
                                value="{{ old('judul', $book->judul) }}" required>
                            <label for="judul"><strong>JUDUL</strong></label>
                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            {{-- <label><strong>Kategori</strong></label> --}}

                            <select name="kategori" class="form-select" id="floatingSelect">
                                @foreach ($categories as $cat)
                                    @if (old('kategori', $book->kategori) == $cat->name)
                                        <option value="{{ $cat->name }}" selected>{{ $cat->name }}</option>
                                    @else
                                        <option value="{{ $cat->name }}">{{ $cat->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <label for="floatingSelect"><strong>KATEGORI</strong></label>
                        </div>
                        <div class="form-floating mb-3">
                            {{-- <label><strong>Nama Penulis</strong></label><br><em>Jika 2 penulis atau lebih gunakan enter</em> --}}
                            <textarea name="penulis" class="form-control @error('penulis') is-invalid @enderror" placeholder="Masukkan nama penulis"
                                required id="floatingTextarea" style="height: 100px">{{ old('penulis', $book->penulis) }}</textarea>
                            <label for="floatingTextarea1"><strong>PENULIS</strong> (Jika 2 penulis atau lebih gunakan
                                enter)</label>
                            @error('penulis')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            {{-- <label><strong>Penerbit</strong></label><br><em>Jika 2 penerbit atau lebih gunakan enter</em> --}}
                            <textarea name="penerbit" class="form-control @error('penerbit') is-invalid @enderror" placeholder="Masukkan penerbit"
                                required id="floatingTextarea2" style="height: 100px">{{ old('penerbit', $book->penerbit) }}</textarea>
                            <label for="floatingTextarea2"><strong>PENERBIT</strong> (Jika 2 penerbit atau lebih gunakan
                                enter)</label>
                            @error('penerbit')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            {{-- <label><strong>Tahun</strong></label> --}}
                            <input type="number" name="tahun" class="form-control @error('tahun') is-invalid @enderror"
                                placeholder="Masukkan tahun" value="{{ old('tahun', $book->tahun) }}" required
                                id="floatingTahun">
                            <label for="floatingTahun"><strong>TAHUN</strong></label>
                            @error('tahun')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            {{-- <label><strong>Jumlah</strong></label> --}}
                            <input type="number" value="{{ old('jumlah', $book->jumlah) }}"
                                placeholder="Masukkan jumlah buku" name="jumlah"
                                class="form-control @error('jumlah') is-invalid @enderror rounded-bottom" required
                                id="floatingJumlah">
                            <label for="floatingJumlah"><strong>JUMLAH</strong></label>
                            @error('jumlah')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary my-3">UPDATE BUKU</button>
                        {{-- <input type="submit" class="btn btn-primary" value="Simpan"> --}}
                        <a href="/books" class="btn btn-default">BATAL</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
