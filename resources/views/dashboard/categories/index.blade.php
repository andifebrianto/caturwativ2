@extends('dashboard.layouts.main')

@section('container')
    <div class="container-fluid col-lg-9 mb-3 py-4">
        {{-- <div class="container py-4 col-12 mb-3"> --}}
        <div class="section-title col-md-12 mb-0">
            {{-- <div class="col-12"> --}}
            {{-- <div class="page-header clearfix"> --}}
            {{-- <div class="wrapper"> --}}
            <div class="container-fluid">
                <div class="row">
                    {{-- <div class="col-md-12"> --}}
                    <div class="page-header">
                        <div class="page-header clearfix">
                            {{-- <h6 style="text-align: right;" class="pull-left">TOTAL KATEGORI : {{ $categories->total() }} --}}
                            {{-- <br>TOTAL BUKU : ..</h6> --}}
                            <h4 style="text-align: center;"><strong>{{ $header }}</strong></h4>
                        </div>
                        @if (session()->has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <a href="/dashboard/categories/create" class="btn btn-primary font-weight-bold mb-3 ">Tambah
                            Kategori</a>


                        @if ($categories->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped text-center text-uppercase">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>No.</th>
                                            <th>Kategori</th>
                                            <th>Cover</th>
                                            <th>Pengaturan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $cat)
                                            <tr>
                                                {{-- <td>{{ $categories->count() * ($categories->currentPage() - 1) + $loop->iteration }}</td> --}}
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $cat->name }}</td>
                                                <td>
                                                    @if ($cat->cover)
                                                        <img class="img-preview img-fluid col-sm-5"
                                                            src="{{ asset('storage/' . $cat->cover) }}">
                                                    @else
                                                        <img class="img-preview img-fluid col-sm-5">
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="/dashboard/categories/{{ $cat->id }}/edit"
                                                        class="badge badge-warning">Edit </a>
                                                    <form action="/dashboard/categories/{{ $cat->id }}" method="post"
                                                        class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="badge badge-danger border-0"
                                                            onClick="return confirm('Hapus data?')">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {{ $categories->onEachSide(0)->links() }}
                                </div>
                            </div>
                        @else
                            <div class="col-md-12 text-center">
                                <h4>KATEGORI TIDAK ADA!</h4>
                            </div>
                        @endif
                    </div>
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
