<?php

namespace App\Http\Controllers\LKD;

use App\Http\Controllers\Controller;
use App\Http\Requests\LKD\Rw\StoreRwRequest;
use App\Http\Requests\LKD\Rw\UpdateRwRequest;
use App\Models\Dusun;
use App\Models\Rw;
use App\Models\Sex;
use Illuminate\Http\Request;

class RwController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rws = Rw::with('jk', 'dusun')->get();
        return view('lkd.rw.index', compact('rws'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('admin_akses');
        $jk = Sex::all();
        $dusun = Dusun::all(); 
        return view('lkd.rw.create', compact('jk', 'dusun'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRwRequest $request)
    {
        $this->authorize('admin_akses');
        Rw::create($request->validated());
        return to_route('rw.index')->with('sukses', 'rw berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rw  $rw
     * @return \Illuminate\Http\Response
     */
    public function show(Rw $rw)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rw  $rw
     * @return \Illuminate\Http\Response
     */
    public function edit(Rw $rw)
    {
        $this->authorize('admin_akses');
        $jk = Sex::all();
        $dusun = Dusun::all(); 
        return view('lkd.rw.edit', compact('rw','jk','dusun'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rw  $rw
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRwRequest $request, Rw $rw)
    {
        $this->authorize('admin_akses');
        $rw->update($request->validated());
        return to_route('rw.index')->with('sukses', 'rw berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rw  $rw
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rw $rw)
    {
        $this->authorize('admin_akses');
        try {
            $rw->delete();
        } catch (\Throwable $th) {
            return back()->with('gagal', 'ada sesuatu yang salah');
        }
        return to_route('rw.index')->with('sukses', 'rw berhasil dihapus');
    }
}