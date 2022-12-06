@extends('layouts.master')


@section('title')
    Kos
@endsection
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col">
                        <h4 class="page-title">Data Kos</h4>
                    </div>
                </div>
                <!--end row-->
            </div>
            <!--end page-title-box-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">List Kos</h4>
                    <button type="button" class="btn btn-outline-primary btn-sm mt-3" data-bs-toggle="modal"
                        data-bs-target="#exampleModalCenter">
                        Tambah Data
                    </button>
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kos</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="/kos" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="col-lg-12">
                                            <div class="mb-3 row">
                                                <label for="example-text-input"
                                                    class="col-sm-2 form-label align-self-center mb-lg-0 text-end">Nama
                                                    Kos</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="text" name="nama_kost"
                                                        value="" id="example-text-input">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="example-text-input"
                                                    class="col-sm-2 form-label align-self-center mb-lg-0 text-end">Deskripsi</label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control" name="deskripsi" id="" cols="30" rows="10"></textarea>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="example-text-input"
                                                    class="col-sm-2 form-label align-self-center mb-lg-0 text-end">Harga</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="text" name="harga" value=""
                                                        id="example-text-input">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="example-text-input"
                                                    class="col-sm-2 form-label align-self-center mb-lg-0 text-end">Longitude
                                                    Latitude</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="text" name="longlat" value=""
                                                        id="example-text-input">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="example-text-input"
                                                    class="col-sm-2 form-label align-self-center mb-lg-0 text-end">Gambar</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="file" name="gambar" value=""
                                                        id="example-text-input">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table mb-0 table-centered">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama Kos</th>
                                                            <th>Deskripsi</th>
                                                            <th>Harga</th>
                                                            <th>Longitude Latitude</th>
                                                            <th>Gambar</th>
                                                            <th class="text-right">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($data as $item)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $item['nama_kost'] }}</td>
                                                                <td>{{ $item['deskripsi'] }}</td>
                                                                <td>{{ $item['harga'] }}</td>
                                                                <td>{{ $item['longlat'] }}</td>
                                                                <td><img src="{{ json_decode($item['gambar'])[0] }}"
                                                                        class="rounded-circle thumb-xs me-1">
                                                                    Micromin
                                                                </td>
                                                                <td class="text-right">
                                                                    <div class="dropdown d-inline-block">
                                                                        <a class="dropdown-toggle arrow-none"
                                                                            id="dLabel11" data-bs-toggle="dropdown"
                                                                            href="#" role="button"
                                                                            aria-haspopup="false" aria-expanded="false">
                                                                            <i
                                                                                class="las la-ellipsis-v font-20 text-muted"></i>
                                                                        </a>
                                                                        <div class="dropdown-menu dropdown-menu-right"
                                                                            aria-labelledby="dLabel11">
                                                                            <form
                                                                                action="{{ route('kos.delete', $item['id']) }}"
                                                                                method="post">
                                                                                @csrf
                                                                                @method('delete')
                                                                                <button type="submit"
                                                                                    class="dropdown-item">
                                                                                    Delete
                                                                                    Kos
                                                                                </button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                <!--end /table-->
                                            </div>
                                            <!--end /tableresponsive-->
                                        </div>
                                        <!--end card-body-->
                                    </div>
                                    <!--end card-->
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </div>
                        <!--end page-title-box-->
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->
@endsection
