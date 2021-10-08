@extends('layouts.metrica', [
    'activePage' => 'province',
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
                    <h4 class="page-title">{{ $title }} - Tambah Data</h4>
                </div><!--end page-title-box-->
            </div><!--end col-->
        </div><!--end row-->
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-12">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <form method="POST" action="{{ $storeLink }}">
                            @csrf
                            <div class="form-group">
                                <label for="input-name">Nama</label>
                                <input type="text" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" id="input-name" placeholder="Masukkan nama" value="{{ old('name') }}" required autofocus>
                                @include('layouts.feedback', ['field' => 'name'])
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ $indexLink }}" class="btn btn-danger">Cancel</a>
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div><!-- container -->
@endsection
