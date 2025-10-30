<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penerima;
use App\Http\Controllers\PenerimaController;

class PenerimaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $data['dataPenerima'] = Penerima::all();
        return view('admin.penerima.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.penerima.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());

            $data['penerima_id']   = $request->penerima_id;
            $data['program_id']    = $request->program_id;
            $data['warga_id']      = $request->warga_id;
            $data['keterangan']    = $request->keterangan;

        Penerima::create($data);

        return redirect()->route('penerima.index')->with('success', 'Penambahan Data Berhasil!');
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
        $data['dataPenerima'] = Penerima::findOrFail($id);
         return view('admin.penerima.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $penerima = Penerima::findOrFail($id);

        $penerima->program_id  = $request->program_id;
        $penerima->warga_id    = $request->warga_id;
        $penerima->keterangan  = $request->keterangan;

        $penerima->save();

        return redirect()->route('penerima.index')->with('Sukses', 'Perubahan Data Berhasil');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pelanggan = Penerima::findOrFail($id);
        $pelanggan->delete();
        return redirect()->route('penerima.index')->with('Delete', 'Data berhasil dihapus');
    }
}
