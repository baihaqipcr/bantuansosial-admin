<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filterableColumns = ['kelamin'];

        $searchableColumns = ['nama_awal_penerima', 'nama_akhir_penerima', 'kelamin', 'email', 'no_tlp'];

        $data['dataPelanggan'] = Pelanggan::filter($request, $filterableColumns)
        ->search($request, $searchableColumns)
        ->paginate(5)->onEachSide(2);
        return view('admin.pelanggan.index', $data);
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
        // dd($request->all());

        $data['nama_awal_penerima'] = $request->nama_awal_penerima;
		$data['nama_akhir_penerima'] = $request->nama_akhir_penerima;
		$data['tgl_lahir'] = $request->tgl_lahir;
		$data['kelamin'] = $request->kelamin;
		$data['role'] = $request->role;
		$data['email'] = $request->email;
		$data['no_tlp'] = $request->no_tlp;
		
		Pelanggan::create($data);
		
		return redirect()->route('pelanggan.index')->with('success','Penambahan Data Berhasil!');
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
         $data['dataPelanggan'] = Pelanggan::findOrFail($id);
         return view('admin.pelanggan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $pelanggan_id = $id;
        $pelanggan    = Pelanggan::findOrFail($pelanggan_id);

        $pelanggan->nama_awal_penerima = $request->nama_awal_penerima;
        $pelanggan->nama_akhir_penerima  = $request->nama_akhir_penerima;
        $pelanggan->tgl_lahir   = $request->tgl_lahir;
        $pelanggan->kelamin     = $request->kelamin;
        $pelanggan->role     = $request->role;
        $pelanggan->email      = $request->email;
        $pelanggan->no_tlp      = $request->no_tlp;
        

        $pelanggan->save();
        return redirect()->route('pelanggan.index')->with('success', 'Perubahan Data Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();
        return redirect()->route('pelanggan.index')->with('Delete', 'Data berhasil dihapus');
    }
}
