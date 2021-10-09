<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\City;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        $cities_pop = City::select(DB::raw('SUM(total_population) as total_population'), DB::raw('provinces.name as province_name'))
            ->join('provinces', 'provinces.id', 'province_id')
            ->groupBy('province_id')
            ->get();

        $cities = City::when(request('province_id'), function ($query) {
                return $query->where('province_id', request('province_id'));
            })
            ->get();

        $provinces = Province::all();

        return view('reports.index', compact('provinces', 'cities_pop', 'cities', 'provinces'));
    }
}
