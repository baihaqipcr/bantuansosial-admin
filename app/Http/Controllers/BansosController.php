<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BansosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataBansos = [
            ['penerima' => 'Joko Amiruddin', 'jenisBantuan' => 'Beras', 'jumlahBantuan' => '5kg', 'status' => 'belum diterima'],
            ['penerima' => 'Jefri Muntaz',  'jenisBantuan' => 'Minyak goreng', 'jumlahBantuan' => '3 Bungkus', 'status' => 'diterima'],
            ['penerima' => 'Juliana Siregar', 'jenisBantuan' => 'Mie Instan', 'jumlahBantuan' => '1 Kardus', 'status' => 'diterima'],
            ['penerima' => 'Susanna', 'jenisBantuan' => 'Beras', 'jumlahBantuan' => '5kg', 'status' => 'belum diterima'],
            ['penerima' => 'Narji', 'jenisBantuan' => 'Mie Instan', 'jumlahBantuan' => '1 kardus', 'status' => 'sedang diproses'],
            ['penerima' => 'Azril', 'jenisBantuan' => 'Minyak Goreng', 'jumlahBantuan' => '2 liter', 'status' => 'belum diterima'],
            ['penerima' => 'Rusdi', 'jenisBantuan' => 'Beras', 'jumlahBantuan' => '5kg', 'status' => 'sedang diproses'],
            ['penerima' => 'Sahroni', 'jenisBantuan' => 'Telur', 'jumlahBantuan' => '1 papan', 'status' => 'sedang diproses'],
            ['penerima' => 'Gatot', 'jenisBantuan' => 'Minyak Goreng', 'jumlahBantuan' => '2 liter', 'status' => 'diterima'],
            ['penerima' => 'Jarot', 'jenisBantuan' => 'Telur', 'jumlahBantuan' => '2 papan', 'status' => 'diterima'],
        ];
          return view('bansos', compact('dataBansos'));


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
        //
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
