<?php

namespace App\Http\Controllers\AKP;

use App\Http\Controllers\Controller;
use App\Http\Requests\AKP\Pekerjaan\StorePekerjaanRequest;
use App\Http\Requests\AKP\Pekerjaan\UpdatePekerjaanRequest;
use App\Models\AKP\Pekerjaan;
use Illuminate\Http\Request;

class PekerjaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pekerjaans = Pekerjaan::latest()->get();
        return view('akp.pekerjaan.index', compact('pekerjaans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('admin_akses');
        return view('akp.pekerjaan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePekerjaanRequest $request)
    {
        $this->authorize('admin_akses');
        Pekerjaan::create($request->validated());
        return to_route('pekerjaan.index')->with('sukses', 'pekerjaan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AKP\Pekerjaan  $pekerjaan
     * @return \Illuminate\Http\Response
     */
    public function show(Pekerjaan $pekerjaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AKP\Pekerjaan  $pekerjaan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pekerjaan $pekerjaan)
    {
        $this->authorize('admin_akses');
        return view('akp.pekerjaan.edit', compact('pekerjaan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AKP\Pekerjaan  $pekerjaan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePekerjaanRequest $request, Pekerjaan $pekerjaan)
    {
        $this->authorize('admin_akses');
        $pekerjaan->update($request->validated());
        return to_route('pekerjaan.index')->with('sukses', 'pekerjaan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AKP\Pekerjaan  $pekerjaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pekerjaan $pekerjaan)
    {
        $this->authorize('admin_akses');
        $pekerjaan->delete();
        return to_route('pekerjaan.index')->with('sukses', 'pekerjaan berhasil dihapus');
    }
}