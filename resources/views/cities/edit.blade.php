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
                        <a href="{{ $indexLink }}" class="btn btn-primary"><i class="fas fa-list"></i> Kembali ke List</a>
                    </div>
                    <h4 class="page-title">{{ $title }} - Edit Data</h4>
                </div><!--end page-title-box-->
            </div><!--end col-->
        </div><!--end row-->
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-12">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <form method="POST" action="{{ $updateLink }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="input-name">Nama</label>
                                <input type="text" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" id="input-name" placeholder="Masukkan nama" value="{{ $city->name }}" required autofocus>
                                @include('layouts.feedback', ['field' => 'name'])
                            </div>

                            <div class="form-group">
                                <label for="input-province_id">Provinsi</label>
                                <select name="province_id" class="form-control {{ $errors->has('province_id') ? ' is-invalid' : '' }}" id="input-province_id" required>
                                    @foreach ($provinces as $province)
                                        <option value="{{ $province->id }}" @if($province->id == $city->province_id) selected @endif>{{ $province->name }}</option>
                                    @endforeach
                                </select>
                                @include('layouts.feedback', ['field' => 'province_id'])
                            </div>

                            <div class="form-group">
                                <label for="input-total_population">Total Populasi</label>
                                <input type="number" name="total_population" class="form-control {{ $errors->has('total_population') ? ' is-invalid' : '' }}" id="input-total_population" placeholder="Masukkan total populasi" value="{{ $city->total_population }}" required autofocus>
                                @include('layouts.feedback', ['field' => 'total_population'])
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
