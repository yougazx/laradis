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
                            <input type="text" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" id="input-name" placeholder="Enter name" value="{{ old('name', $province->name) }}" required disabled>
                        </div>

                        @can('Edit Province')
                        <a href="{{ $editLink }}"  class="btn btn-warning"><i class="fa fa-pencil-alt"></i> Edit</a>
                        @endcan

                        @can('Delete Province')
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
