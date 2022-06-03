<?php

namespace App\Http\Controllers\AKP;

use App\Http\Controllers\Controller;
use App\Http\Requests\AKP\Hubungan\StoreHubunganRequest;
use App\Http\Requests\AKP\Hubungan\UpdateHubunganRequest;
use App\Models\AKP\Hubungan;
use Illuminate\Http\Request;

class HubunganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hubungans = Hubungan::latest()->get();
        return view('akp.hubungan.index', compact('hubungans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('admin_akses');
        return view('akp.hubungan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\AKP\Hubungan\StoreHubunganRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHubunganRequest $request)
    {
        $this->authorize('admin_akses');
        Hubungan::create($request->validated());
        return to_route('hubungan.index')->with('sukses', 'hubungan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AKP\Hubungan  $hubungan
     * @return \Illuminate\Http\Response
     */
    public function show(Hubungan $hubungan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AKP\Hubungan  $hubungan
     * @return \Illuminate\Http\Response
     */
    public function edit(Hubungan $hubungan)
    {
        $this->authorize('admin_akses');
        return view('akp.hubungan.edit', compact('hubungan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\AKP\Hubungan\StoreHubunganRequest  $request
     * @param  \App\Models\AKP\Hubungan  $hubungan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHubunganRequest $request, Hubungan $hubungan)
    {
        $this->authorize('admin_akses');
        $hubungan->update($request->validated());
        return to_route('hubungan.index')->with('sukses', 'hubungan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AKP\Hubungan  $hubungan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hubungan $hubungan)
    {
        $this->authorize('admin_akses');
        try {
            $hubungan->delete();
        } catch (\Throwable $th) {
            return back()->with('gagal', 'ada sesuatu yang salah');
        }
        return to_route('hubungan.index')->with('sukses', 'hubungan berhasil dihapus');
        
        
    }
}