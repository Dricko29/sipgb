<?php

namespace App\Http\Controllers\LKD;

use App\Http\Controllers\Controller;
use App\Http\Requests\LKD\Dusun\StoreDusunRequest;
use App\Http\Requests\LKD\Dusun\UpdateDusunRequest;
use App\Models\Dusun;
use App\Models\Sex;
use Illuminate\Http\Request;

class DusunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dusuns = Dusun::with('jk')->get();
        return view('lkd.dusun.index', compact('dusuns'));
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
        return view('lkd.dusun.create', compact('jk'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDusunRequest $request)
    {
        $this->authorize('admin_akses');
        Dusun::create($request->validated());
        return to_route('dusun.index')->with('sukses', 'dusun berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dusun  $dusun
     * @return \Illuminate\Http\Response
     */
    public function show(Dusun $dusun)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dusun  $dusun
     * @return \Illuminate\Http\Response
     */
    public function edit(Dusun $dusun)
    {
        $this->authorize('admin_akses');
        $jk = Sex::all();
        return view('lkd.dusun.edit', compact('dusun', 'jk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dusun  $dusun
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDusunRequest $request, Dusun $dusun)
    {
        $this->authorize('admin_akses');
        $dusun->update($request->validated());
        return to_route('dusun.index')->with('sukses', 'dusun berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dusun  $dusun
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dusun $dusun)
    {
        $this->authorize('admin_akses');
        try {
            $dusun->delete();
        } catch (\Throwable $th) {
            return back()->with('gagal', 'ada sesuatu yang salah');
        }
        return to_route('dusun.index')->with('sukses', 'dusun berhasil dihapus');
    }
}