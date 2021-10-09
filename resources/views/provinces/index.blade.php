@extends('layouts.metrica', [
    'activePage' => 'province',
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
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($provinces as $province)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $province->name }}</td>
                                        <td>
                                            @include('layouts.action', [
                                                'showLink' => route('province.show', $province->id),
                                                'editLink' => route('province.edit', $province->id),
                                                'deleteLink' => route('province.destroy', $province->id),
                                            ])
                                        </td>
                                    </td>
                                @endforeach
                            </tbody>
                        </table>
                        {!! $provinces->links() !!}
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div><!-- container -->
@endsection
