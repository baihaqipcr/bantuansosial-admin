<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penerima;

class PenerimaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['dataPenerima'] = Pelanggan::all();
        return view('admin.penerima_bantuan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data['pelanggan_id'] = $request->pelanggan_id;
        $data['program_id']  = $request->program_id;
        $data['warga_id']   = $request->warga_id;
        $data['keterangan']     = $request->keterangan;

        Pelanggan::create($data);

        return redirect()->route('penerima_bantuan.index')->with('success', 'Penambahan Data Berhasil!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
