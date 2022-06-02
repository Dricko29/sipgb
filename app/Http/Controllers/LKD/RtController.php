<?php

namespace App\Http\Controllers\LKD;

use App\Models\Rt;
use App\Models\Rw;
use App\Models\Sex;
use App\Models\Dusun;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LKD\Rt\StoreRtRequest;
use App\Http\Requests\LKD\Rt\UpdateRtRequest;

class RtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rts = Rt::with('jk', 'rw.dusun')->get();
        return view('lkd.rt.index', compact('rts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('admin_akses');
        $dusun = Dusun::all();
        $jk = Sex::all();
        return view('lkd.rt.create', compact('dusun', 'jk'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRtRequest $request)
    {
        $this->authorize('admin_akses');
        Rt::create($request->validated());
        return to_route('rt.index')->with('sukses', 'rt berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rt  $rt
     * @return \Illuminate\Http\Response
     */
    public function show(Rt $rt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rt  $rt
     * @return \Illuminate\Http\Response
     */
    public function edit(Rt $rt)
    {
        $this->authorize('admin_akses');
        $dusun = Dusun::all();
        $jk = Sex::all();
        $rw = Rw::where('dusun_id', $rt->rw->dusun->id)->get();
        return view('lkd.rt.edit', compact('rt', 'dusun', 'jk', 'rw'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rt  $rt
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRtRequest $request, Rt $rt)
    {
        $this->authorize('admin_akses');
        $rt->update($request->validated());
        return to_route('rt.index')->with('sukses', 'rt berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rt  $rt
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rt $rt)
    {
        $this->authorize('admin_akses');
        try {
            $rt->delete();
        } catch (\Throwable $th) {
            return back()->with('gagal', 'ada sesuatu yang salah');
        }
        return to_route('rt.index')->with('sukses', 'rt berhasil dihapus');
        
    }

    public function subRw(Request $request)
    {
        $parent_id = $request->dusun_id;

        $subrw = Rw::where('dusun_id', $parent_id)->get();
        return response()->json($subrw);
    }
}