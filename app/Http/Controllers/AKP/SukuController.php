<?php

namespace App\Http\Controllers\AKP;

use App\Http\Controllers\Controller;
use App\Http\Requests\AKP\Suku\StoreSukuRequest;
use App\Http\Requests\AKP\Suku\UpdateSukuRequest;
use App\Models\AKP\Suku;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;

class SukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Suku::latest()->get();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', 'akp.suku.action')
                ->toJson();
        }
        return view('akp.suku.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('admin_akses');
        return view('akp.suku.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSukuRequest $request)
    {
        $this->authorize('admin_akses');
        Suku::create($request->validated());
        return to_route('suku.index')->with('sukses', 'suku berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AKP\Suku  $suku
     * @return \Illuminate\Http\Response
     */
    public function show(Suku $suku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AKP\Suku  $suku
     * @return \Illuminate\Http\Response
     */
    public function edit(Suku $suku)
    {
        $this->authorize('admin_akses');
        return view('akp.suku.edit', compact('suku'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AKP\Suku  $suku
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSukuRequest $request, Suku $suku)
    {
        $this->authorize('admin_akses');
        $suku->update($request->validated());
        return to_route('suku.index')->with('sukses', 'suku berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AKP\Suku  $suku
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suku $suku)
    {
        $this->authorize('admin_akses');
        try {
            $suku->delete();
        } catch (\Throwable $th) {
            return back()->with('gagal', 'suku berhasil dihapus');
        }
        return to_route('suku.index')->with('sukses', 'suku berhasil dihapus');
    }
}