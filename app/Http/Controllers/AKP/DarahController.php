<?php

namespace App\Http\Controllers\AKP;

use App\Http\Controllers\Controller;
use App\Http\Requests\AKP\Darah\StoreDarahRequest;
use App\Http\Requests\AKP\Darah\UpdateDarahRequest;
use App\Models\AKP\Darah;
use Illuminate\Http\Request;

class DarahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $darahs = Darah::latest()->get();
        return view('akp.darah.index', compact('darahs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('admin_akses');
        return view('akp.darah.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDarahRequest $request)
    {
        $this->authorize('admin_akses');
        Darah::create($request->validated());
        return to_route('darah.index')->with('sukses', 'darah berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AKP\Darah  $darah
     * @return \Illuminate\Http\Response
     */
    public function show(Darah $darah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AKP\Darah  $darah
     * @return \Illuminate\Http\Response
     */
    public function edit(Darah $darah)
    {
        $this->authorize('admin_akses');
        return view('akp.darah.edit', compact('darah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AKP\Darah  $darah
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDarahRequest $request, Darah $darah)
    {
        $this->authorize('admin_akses');
        $darah->update($request->validated());
        return to_route('darah.index')->with('sukses', 'darah berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AKP\Darah  $darah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Darah $darah)
    {
        $this->authorize('admin_akses');
        try {
            $darah->delete();
        } catch (\Throwable $th) {
            return back()->with('gagal', 'ada sesuatu yang salah !!!');
        }

        return to_route('darah.index')->with('sukses', 'darah berhasil dihapus');
    }
}