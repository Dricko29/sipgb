<?php

namespace App\Http\Controllers\AKP;

use App\Http\Controllers\Controller;
use App\Http\Requests\AKP\Bahasa\StoreBahasaRequest;
use App\Http\Requests\AKP\Bahasa\UpdateBahasaRequest;
use App\Models\AKP\Bahasa;
use Illuminate\Http\Request;

class BahasaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bahasa = Bahasa::latest()->get();
        return view('akp.bahasa.index', compact('bahasa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('admin_akses');
        return view('akp.bahasa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBahasaRequest $request)
    {
        $this->authorize('admin_akses');
        Bahasa::create($request->validated());
        return to_route('bahasa.index')->with('sukses', 'bahasa berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AKP\Bahasa  $bahasa
     * @return \Illuminate\Http\Response
     */
    public function show(Bahasa $bahasa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AKP\Bahasa  $bahasa
     * @return \Illuminate\Http\Response
     */
    public function edit(Bahasa $bahasa)
    {
        $this->authorize('admin_akses');
        return view('akp.bahasa.edit', compact('bahasa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AKP\Bahasa  $bahasa
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBahasaRequest $request, Bahasa $bahasa)
    {
        $this->authorize('admin_akses');
        $bahasa->update($request->validated());
        return to_route('bahasa.index')->with('sukses', 'bahasa berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AKP\Bahasa  $bahasa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bahasa $bahasa)
    {
        $this->authorize('admin_akses');
        try {
            $bahasa->delete();
        } catch (\Throwable $th) {
            return back()->with('gagal', 'bahasa berhasil dihapus');
        }
        return to_route('bahasa.index')->with('sukses', 'bahasa berhasil dihapus');
    }
}