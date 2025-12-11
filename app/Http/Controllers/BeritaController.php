<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.media.detail');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Simpan berita dulu
        $berita = Berita::create([
            'judul' => $request->judul,
            'isi'   => $request->isi,
            // tambahkan field lain
        ]);

        // 2. Upload media (jika ada)
        if ($request->hasFile('media_files')) {
            foreach ($request->file('media_files') as $file) {

                $filename = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('uploads/berita', $filename, 'public');

                Media::create([
                    'ref_table' => 'berita',
                    'ref_id'    => $berita->id,
                    'file_name' => $filename,
                    'mime_type' => $file->getMimeType(),
                ]);
            }
        }

        return redirect()->route('berita.index');
    }

    // ====================
    // SHOW
    // ====================
    public function show($id)
    {
        $berita = Berita::findOrFail($id);

        // Ambil semua media untuk berita
        $media = Media::where('ref_table', 'berita')
            ->where('ref_id', $id)
            ->get();

        return view('admin.berita.detail', compact('berita', 'media'));
    }

    // ====================
    // UPDATE
    // ====================
    public function update(Request $request, $id)
    {
        $jadwal = JadwalPosyandu::findOrFail($id);

        if ($request->hasFile('media_files')) {
            foreach ($request->file('media_files') as $file) {

                $filename = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('uploads/jadwal_posyandu', $filename, 'public');

                Media::create([
                    'ref_table' => 'jadwal_posyandu',
                    'ref_id'    => $jadwal->id,
                    'file_name' => $filename,
                    'mime_type' => $file->getMimeType()
                ]);
            }
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
