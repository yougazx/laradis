@extends('layouts.metrica', [
    'activePage' => 'city',
    'activeModule' => '',
])

@section('content')
    <div class="container mt-3">

        <!-- Page-Title -->
        <div class="row mb-2">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="float-right">
                        <a href="{{ $createLink }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</a>
                    </div>
                    <h4 class="page-title">{{ $title }}</h4>
                </div><!--end page-title-box-->
            </div><!--end col-->
        </div><!--end row-->
        <!-- end page title end breadcrumb -->

        <div class="card mb-2">
            <div class="card-body">
                <form method="get">
                    <div class="row">
                        <div class="col-md-4">
                            <label>Pilih Provinsi</label>
                            <select class="form-control" name="province_id">
                                <option value="">Semua</option>
                                @foreach ($provinces as $province)
                                    <option value="{{ $province->id }}" @if($province->id == request('province_id')) selected @endif>{{ $province->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>Pencarian</label>
                            <input type="text" name="name" placeholder="Masukkan nama kota" class="form-control">
                        </div>
                        <div class="col-md-2 mt-4 pt-2">
                            <button type="submit" class="btn btn-success" >Cari</button>
                            <a href="{{ route('city.index') }}" class="btn btn-danger">Reset</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Alert -->
        @if (session('success'))
            <div class="alert alert-success">
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <div class="row">
            <div class="col-12">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Provinsi</th>
                                    <th>Total Populasi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cities as $city)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $city->name }}</td>
                                        <td>{{ $city->province->name }}</td>
                                        <td>{{ $city->total_population }}</td>
                                        <td>
                                            @include('layouts.action', [
                                                'showLink' => route('city.show', $city->id),
                                                'editLink' => route('city.edit', $city->id),
                                                'deleteLink' => route('city.destroy', $city->id),
                                            ])
                                        </td>
                                    </td>
                                @endforeach
                            </tbody>
                        </table>
                        {!! $cities->links() !!}
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div><!-- container -->
@endsection
