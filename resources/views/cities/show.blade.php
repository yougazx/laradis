@extends('layouts.metrica', [
    'activePage' => 'city',
    'activeModule' => '',
])

@section('content')
    <div class="container mt-5">
        <!-- Page-Title -->
        <div class="row mb-2">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="float-right">
                        <a href="{{ $indexLink }}" class="btn btn-primary"><i class="fas fa-list"></i> Kembali ke List</a>
                    </div>
                    <h4 class="page-title">{{ $title }} - Detail Data</h4>
                </div><!--end page-title-box-->
            </div><!--end col-->
        </div><!--end row-->
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-12">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="input-name">Nama</label>
                            <input type="text" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" id="input-name" placeholder="Enter name" value="{{ old('name', $city->name) }}" required disabled>
                        </div>

                        <div class="form-group">
                            <label for="input-province_name">Provinsi</label>
                            <input type="text" name="province_name" class="form-control {{ $errors->has('province_name') ? ' is-invalid' : '' }}" id="input-province_name" placeholder="Enter province_name" value="{{ old('name', $city->province->name) }}" required disabled>
                        </div>

                        <div class="form-group">
                            <label for="input-total_population">Total Penduduk</label>
                            <input type="text" name="total_population" class="form-control {{ $errors->has('total_population') ? ' is-invalid' : '' }}" id="input-total_population" placeholder="Enter total_population" value="{{ old('name', $city->total_population) }}" required disabled>
                        </div>

                        @can('Edit City')
                        <a href="{{ $editLink }}"  class="btn btn-warning"><i class="fa fa-pencil-alt"></i> Edit</a>
                        @endcan

                        @can('Delete City')
                        <form method="POST" action="{{ $deleteLink }}"  onsubmit="return confirm('Anda yakin ingin menghapus data ini?');" style="display: inline">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                        </form>
                        @endcan

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div><!-- container -->
@endsection
