@extends('layouts.metrica', [
    'activePage' => 'report',
    'activeModule' => '',
])

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h4>Jumlah Penduduk Per Provinsi</h4>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Provinsi</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cities_pop as $city)
                                    <tr>
                                        <td>{{ $city->province_name }}</td>
                                        <td>{{ $city->total_population }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end col -->
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h4>Jumlah Penduduk Per Kabupaten</h4>
                        <form method="get">
                            <div class="row mb-2">
                                <div class="col-md-8">
                                    <select class="form-control" name="province_id">
                                        @foreach ($provinces as $province)
                                            <option value="{{ $province->id }}">{{ $province->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-success">Cari</button>
                                    <a href="{{ route('report.index') }}" class="btn btn-danger">Reset</a>
                                </div>
                            </div>
                        </form>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Kabupaten</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cities as $city)
                                    <tr>
                                        <td>{{ $city->name }}</td>
                                        <td>{{ $city->total_population }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- end row -->
    </div><!-- container -->
@endsection
