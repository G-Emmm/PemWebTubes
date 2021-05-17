<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\skp_target;
use App\Models\skp_realisasi;


class SkpRealisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skp_realisasi = skp_realisasi::all();
        return view('skp_realisasi.index')->with('skp_realisasi', $skp_realisasi);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('skp_realisasi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_skp_target' => 'required',
            'lokasi' => 'required',
            'jml_realisasi' => 'required',
            'keterangan' => 'required',
            'path_bukti' => 'required',
            'inserted_by' => 'required',
            'edited_by' => 'required',
            'tanggal_awal' => 'required',
            'tanggal_akhir' => 'required',
        ]);

        skp_realisasi::create($request->all());

        return redirect()->route('skp_realisasi.index')->with('success', 'skp_realisasi ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\skp_realisasi  $skp_realisasi
     * @return \Illuminate\Http\Response
     */
    public function show(skp_realisasi $skp_realisasi)
    {
        return view('skp_realisasi.show', compact('skp_realisasi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\skp_realisasi  $skp_realisasi
     * @return \Illuminate\Http\Response
     */
    public function edit(skp_realisasi $skp_realisasi)
    {
        return view('skp_realisasi.edit', compact('skp_realisasi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\skp_realisasi  $skp_realisasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, skp_realisasi $skp_realisasi)
    {
        $request->validate([
            'id_skp_target' => 'required',
            'lokasi' => 'required',
            'lokasi' => 'required',
            'jml_realisasi' => 'required',
            'keterangan' => 'required',
            'path_bukti' => 'required',
            'inserted_by' => 'required',
            'edited_by' => 'required',
            'tanggal_awal' => 'required',
            'tanggal_akhir' => 'required',
        ]);

        $skp_realisasi->update($request->all());

        return redirect()->route('skp_realisasi.index')->with('success', 'skp_realisasi diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\skp_realisasi  $skp_realisasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(skp_realisasi $skp_realisasi)
    {
        $skp_realisasi->delete();
        return redirect()->route('skp_realisasi.index')->with('success', 'skp_realisasi dihapus.');
    }
}
