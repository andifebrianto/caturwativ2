@extends('layouts.main')

@section('container')
    <div class="container-fluid col-lg-9 mb-5 py-5">
        <div class="section-title">
            <div class="container-fluid">
                <div class="row">
                    <div class="page-header">
                        <h2>UBAH PROFIL</h2>
                    </div>
                    <p>Silahkan masukan pembaruan yang diperlukan.</p>
                    <form action="/dashboard/profil/{{ $profil[0]->id }}" method="post">
                        @method('put')
                        @csrf

                        <div class="form-floating mb-3">
                            <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Masukkan deskripsi"
                                required id="floatingTextarea" style="height: 100px">{{ old('deskripsi', $profil[0]->deskripsi) }}</textarea>
                            <label for="floatingTextarea1"><strong>Deskripsi</strong></label>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="twitter" class="form-control @error('twitter') is-invalid @enderror"
                                placeholder="Masukkan twitter" autofocus id="twitter"
                                value="{{ old('twitter', $profil[0]->twitter) }}" required>
                            <label for="twitter"><strong>Twitter</strong></label>
                            @error('twitter')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="facebook"
                                class="form-control @error('facebook') is-invalid @enderror" placeholder="Masukkan facebook"
                                autofocus id="facebook" value="{{ old('facebook', $profil[0]->facebook) }}" required>
                            <label for="facebook"><strong>Facebook</strong></label>
                            @error('facebook')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="instagram"
                                class="form-control @error('instagram') is-invalid @enderror"
                                placeholder="Masukkan instagram" autofocus id="instagram"
                                value="{{ old('instagram', $profil[0]->instagram) }}" required>
                            <label for="instagram"><strong>Instagram</strong></label>
                            @error('instagram')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary my-3">UPDATE PROFIL</button>
                        <a href="/dashboard" class="btn btn-default">BATAL</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
