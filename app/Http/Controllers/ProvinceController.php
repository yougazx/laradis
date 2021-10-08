<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProvinceRequest;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;

class ProvinceController extends Controller
{
    private $title;

    public function __construct()
    {
        $this->title = 'Data Provinsi';
    }

    public function index()
    {
        $provinces = Province::latest()->paginate(10);

        $createLink = route('province.create');

        $title = $this->title;

        return view('provinces.index', compact('provinces', 'createLink', 'title'));
    }

    public function create()
    {
        $storeLink = route('province.store');
        $indexLink = route('province.index');

        $title = $this->title;

        return view('provinces.create', compact('storeLink', 'indexLink', 'title'));
    }

    public function show(Province $province)
    {
        $editLink = route('province.edit', $province);
        $deleteLink = route('province.destroy', $province);
        $indexLink = route('province.index');

        $title = $this->title;

        return view('provinces.show', compact('province', 'editLink', 'indexLink', 'deleteLink', 'title'));
    }

    public function store(ProvinceRequest $request)
    {
        Province::create($request->all());

        return redirect()->route('province.index')->with('success', 'Sukses menambah data');
    }

    public function edit(Province $province)
    {
        $updateLink = route('province.update', $province);
        $indexLink = route('province.index');

        $title = $this->title;

        return view('provinces.edit', compact('updateLink', 'indexLink', 'province', 'title'));
    }

    public function update(ProvinceRequest $request, Province $province)
    {
        $province->update($request->all());

        return redirect()->route('province.index')->with('success', 'Sukses mengedit data');
    }

    public function destroy(Province $province)
    {
        $province->delete();

        return redirect()->route('province.index')->with('success', 'Sukses menghapus data');;
    }
}
