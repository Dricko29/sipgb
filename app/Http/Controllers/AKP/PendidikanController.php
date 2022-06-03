<?php

namespace App\Http\Controllers\AKP;

use App\Http\Controllers\Controller;
use App\Http\Requests\AKP\Pendidikan\StorePendidikanRequest;
use App\Http\Requests\AKP\Pendidikan\UpdatePendidikanRequest;
use App\Models\AKP\Pendidikan;


class PendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pendidikans = Pendidikan::latest()->get();
        return view('akp.pendidikan.index', compact('pendidikans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('admin_akses');
        return view('akp.pendidikan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\AKP\Pendidikan\StorePendidikanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePendidikanRequest $request)
    {
        $this->authorize('admin_akses');
        Pendidikan::create($request->validated());
        return to_route('pendidikan.index')->with('sukses', 'pendidikan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AKP\Pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function show(Pendidikan $pendidikan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AKP\Pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pendidikan $pendidikan)
    {
        $this->authorize('admin_akses');
        return view('akp.pendidikan.edit', compact('pendidikan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\AKP\Pendidikan\UpdatePendidikanRequest $request
     * @param  \App\Models\AKP\Pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePendidikanRequest $request, Pendidikan $pendidikan)
    {
        $this->authorize('admin_akses');
        $pendidikan->update($request->validated());
        return to_route('pendidikan.index')->with('sukses', 'pendidikan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AKP\Pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pendidikan $pendidikan)
    {
        $this->authorize('admin_akses');
        try {
            $pendidikan->delete();
        } catch (\Throwable $th) {
            return back()->with('gagal', 'ada sesuatu yang salah !!!');
        }
        return to_route('pendidikan.index')->with('sukses', 'pendidikan berhasil dihapus');
    }
}