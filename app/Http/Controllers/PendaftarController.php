<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftar;

class PendaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['dataPendaftar'] = Pendaftar::all();
        return view('admin.pendaftar.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pendaftar.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $data['pendaftar_id']   = $request->pendaftar_id;
            $data['program_id']    = $request->program_id;
            $data['warga_id']      = $request->warga_id;
            $data['keterangan']    = $request->keterangan;

        Pendaftar::create($data);

        return redirect()->route('pendaftar.index')->with('success', 'Penambahan Data Berhasil!');
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
        $data['dataPendaftar'] = Pendaftar::findOrFail($id);
         return view('admin.pendaftar.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pendaftar = Pendaftar::findOrFail($id);

        $pendaftar->program_id    = $request->program_id;
        $pendaftar->warga_id  = $request->warga_id;
        $pendaftar->keterangan  = $request->keterangan;

        $pendaftar->save();

        return redirect()->route('pendaftar.index')->with('Sukses', 'Perubahan Data Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pendaftar = Pendaftar::findOrFail($id);
        $pendaftar->delete();
        return redirect()->route('pendaftar.index')->with('Delete', 'Data berhasil dihapus');
    }
}
