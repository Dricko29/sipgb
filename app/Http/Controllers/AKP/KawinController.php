<?php

namespace App\Http\Controllers\AKP;

use App\Http\Controllers\Controller;
use App\Http\Requests\AKP\Kawin\StoreKawinRequest;
use App\Http\Requests\AKP\Kawin\UpdateKawinRequest;
use App\Models\AKP\Kawin;
use Illuminate\Http\Request;

class KawinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kawins = Kawin::latest()->get();
        return view('akp.kawin.index', compact('kawins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('admin_akses');
        return view('akp.kawin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKawinRequest $request)
    {
        $this->authorize('admin_akses');
        Kawin::create($request->validated());
        return to_route('kawin.index')->with('sukses', 'status kawin berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AKP\Kawin  $kawin
     * @return \Illuminate\Http\Response
     */
    public function show(Kawin $kawin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AKP\Kawin  $kawin
     * @return \Illuminate\Http\Response
     */
    public function edit(Kawin $kawin)
    {
        $this->authorize('admin_akses');
        return view('akp.kawin.edit', compact('kawin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AKP\Kawin  $kawin
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKawinRequest $request, Kawin $kawin)
    {
        $this->authorize('admin_akses');
        $kawin->update();
        return to_route('kawin.index')->with('sukses', 'status kawin berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AKP\Kawin  $kawin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kawin $kawin)
    {
        $this->authorize('admin_akses');
        try {
            $kawin->delete();
        } catch (\Throwable $th) {
            return back()->with('gagal', 'ada sesuatu yang salah !!!');
        }
        return to_route('kawin.index')->with('sukses', 'status kawin berhasil dihapus');

    }
}