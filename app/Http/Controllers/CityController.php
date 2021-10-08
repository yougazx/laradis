<?php

namespace App\Http\Controllers;

use App\Http\Requests\CityRequest;
use App\Models\City;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;

class CityController extends Controller
{
    private $title;

    public function __construct()
    {
        $this->title = 'Data Kota';
    }

    public function index()
    {
        $cities = City::with('province')
            ->when(request('province_id'), function ($query) {
                return $query->where('province_id', request('province_id'));
            })
            ->when(request('name'), function ($query) {
                return $query->where('name', 'like',  '%'.request('name').'%');
            })
            ->latest()
            ->paginate(10);

        $createLink = route('city.create');

        $title = $this->title;

        $provinces = Province::all();

        return view('cities.index', compact('cities', 'createLink', 'title', 'provinces'));
    }

    public function create()
    {
        $storeLink = route('city.store');
        $indexLink = route('city.index');

        $title = $this->title;

        $provinces = Province::all();

        return view('cities.create', compact('storeLink', 'indexLink', 'title', 'provinces'));
    }

    public function show(City $city)
    {
        $editLink = route('city.edit', $city);
        $deleteLink = route('city.destroy', $city);
        $indexLink = route('city.index');

        $title = $this->title;

        return view('cities.show', compact('city', 'editLink', 'indexLink', 'deleteLink', 'title'));
    }

    public function store(CityRequest $request)
    {
        City::create($request->all());

        return redirect()->route('city.index')->with('success', 'Sukses menambah data');;
    }

    public function edit(City $city)
    {
        $updateLink = route('city.update', $city);
        $indexLink = route('city.index');

        $title = $this->title;

        $provinces = Province::all();

        return view('cities.edit', compact('updateLink', 'indexLink', 'city', 'title', 'provinces'));
    }

    public function update(CityRequest $request, City $city)
    {
        $city->update($request->all());

        return redirect()->route('city.index')->with('success', 'Sukses mengubah data');;
    }

    public function destroy(City $city)
    {
        $city->delete();

        return redirect()->route('city.index')->with('success', 'Sukses menghapus data');;
    }
}
