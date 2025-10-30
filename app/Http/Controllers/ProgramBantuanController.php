<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ProgramBantuanController;
use App\Models\ProgramBantuan;

class ProgramBantuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['dataProgram'] = ProgramBantuan::all();
        return view('admin.program.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.program.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());

            $data['program_id']   = $request->program_id;
            $data['kode']    = $request->kode;
            $data['nama_program']      = $request->nama_program;
            $data['tahun']    = $request->tahun;
            $data['deskripsi']    = $request->deskripsi;
            $data['anggaran']    = $request->anggaran;

        ProgramBantuan::create($data);

        return redirect()->route('program.index')->with('success', 'Penambahan Data Berhasil!');
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
        $data['dataProgram'] = ProgramBantuan::findOrFail($id);
         return view('admin.program.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $program = ProgramBantuan::findOrFail($id);

        $program->kode    = $request->kode;
        $program->nama_program  = $request->nama_program;
        $program->tahun  = $request->tahun;
        $program->deskripsi  = $request->deskripsi;
        $program->anggaran  = $request->anggaran;

        $program->save();

        return redirect()->route('program.index')->with('Sukses', 'Perubahan Data Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $program = ProgramBantuan::findOrFail($id);
        $program->delete();
        return redirect()->route('program.index')->with('Delete', 'Data berhasil dihapus');
    }
}
