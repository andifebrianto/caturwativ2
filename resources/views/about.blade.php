@extends('layouts.main')

@section('container')
<!-- User -->
<div class="container col-lg-6 pt-5 align-items-center">
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

                      
</div>
</div>
</div>
                
                
            </div>
        </div>
    </div>



@endsection