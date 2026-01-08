<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use App\Models\VerifikasiLapangan;
use App\Http\Controllers\Controller;

class VerifikasiLapanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        $verifikasi_lapangan = VerifikasiLapangan::with('pendaftar')->get();
        return view('admin.verifikasi.index', compact('verifikasi_lapangan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $verifikasi_lapangan = VerifikasiLapangan::all();
        return view('admin.verifikasi.create', compact('verifikasi_lapangan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'pelanggan_id' => 'required',
        'petugas' => 'required',
        'tanggal_verifikasi' => 'required|date',
        'skor' => 'required|numeric',
        'catatan' => 'nullable',
        'foto_verifikasi' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048'
    ]);

    $filePath = null;
    if ($request->hasFile('foto_verifikasi')) {
        $filePath = $request->file('foto_verifikasi')
            ->store('verifikasi_lapangan', 'public');
    }

    VerifikasiLapangan::create([
        'pelanggan_id' => $request->pelanggan_id,
        'petugas' => $request->petugas,
        'tanggal_verifikasi' => $request->tanggal_verifikasi,
        'skor' => $request->skor,
        'catatan' => $request->catatan,
        'foto_verifikasi' => $filePath
    ]);

    return redirect()->route('verifikasi.index')
        ->with('success', 'Verifikasi lapangan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $verifikasi = VerifikasiLapangan::findOrFail($id);
        $pelanggan = Pelanggan::all();

        return view('verifikasi.edit', compact('verifikasi', 'pelanggan'));
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

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $verifikasi = VerifikasiLapangan::findOrFail($id);

        $verifikasi->update($request->all());

        return redirect()->route('verifikasi.index')
            ->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        VerifikasiLapangan::findOrFail($id)->delete();

        return redirect()->route('verifikasi.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
