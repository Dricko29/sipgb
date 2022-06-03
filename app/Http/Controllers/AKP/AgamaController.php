<?php

namespace App\Http\Controllers\AKP;

use App\Http\Controllers\Controller;
use App\Models\AKP\Agama;
use App\Http\Requests\AKP\Agama\StoreAgamaRequest;
use App\Http\Requests\AKP\Agama\UpdateAgamaRequest;

class AgamaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agamas = Agama::latest()->get();
        return view('akp.agama.index', compact('agamas')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('admin_akses');
        return view('akp.agama.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAgamaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAgamaRequest $request)
    {
        $this->authorize('admin_akses');
        Agama::create($request->validated());
        return to_route('agama.index')->with('sukses', 'agama berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AKP\Agama  $agama
     * @return \Illuminate\Http\Response
     */
    public function show(Agama $agama)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AKP\Agama  $agama
     * @return \Illuminate\Http\Response
     */
    public function edit(Agama $agama)
    {
        $this->authorize('admin_akses');
        return view('akp.agama.edit', compact('agama'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAgamaRequest  $request
     * @param  \App\Models\AKP\Agama  $agama
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAgamaRequest $request, Agama $agama)
    {
        $this->authorize('admin_akses');
        $agama->update($request->validated());
        return to_route('agama.index')->with('sukses', 'agama berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AKP\Agama  $agama
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agama $agama)
    {
        $this->authorize('admin_akses');
        try {
            $agama->delete();
        } catch (\Throwable $th) {
            return back()->with('gagal', 'ada sesuatu yang salah !!!');
        }

        return to_route('agama.index')->with('sukses', 'agama berhasil dihapus');
    }
}