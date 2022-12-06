@extends('layouts.master')


@section('title')
    User
@endsection
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col">
                        <h4 class="page-title">Data User</h4>
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
                    <h4 class="card-title">List User</h4>
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
                                                            <th>Nama User</th>
                                                            <th>Email</th>
                                                            <th>Nomor HP</th>
                                                            {{-- <th class="text-right">Action</th> --}}
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($data as $item)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $item['nama'] }}</td>
                                                                <td>{{ $item['email'] }}</td>
                                                                <td>{{ $item['nomor_hp'] }}</td>
                                                                {{-- <td class="text-right">
                                                                    <div class="dropdown d-inline-block">
                                                                        <a class="dropdown-toggle arrow-none" id="dLabel11"
                                                                            data-bs-toggle="dropdown" href="#"
                                                                            role="button" aria-haspopup="false"
                                                                            aria-expanded="false">
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
                                                                                    User
                                                                                </button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </td> --}}
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
