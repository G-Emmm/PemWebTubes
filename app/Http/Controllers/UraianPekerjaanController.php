<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\uraian_pekerjaan;

class UraianPekerjaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uraian_pekerjaan = uraian_pekerjaan::all();
        return view('uraian_pekerjaan.index')->with('uraian_pekerjaan', $uraian_pekerjaan);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('uraian_pekerjaan.create');
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
            'uraian' => 'required',
            'keterangan' => 'required',
            'poin' => 'required',
            'satuan' => 'required',
            'inserted_by' => 'required',
            'is_active' => 'required',
        ]);

        $input= $request->all();

        $request->request->add(['edited_by' => $input['inserted_by']]);

        uraian_pekerjaan::create($request->all());

        return redirect()->route('uraian_pekerjaan.index')->with('success', 'uraian_pekerjaan ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\uraian_pekerjaan  $uraian_pekerjaan
     * @return \Illuminate\Http\Response
     */
    public function show(uraian_pekerjaan $uraian_pekerjaan)
    {
        return view('uraian_pekerjaan.show', compact('uraian_pekerjaan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\uraian_pekerjaan  $uraian_pekerjaan
     * @return \Illuminate\Http\Response
     */
    public function edit(uraian_pekerjaan $uraian_pekerjaan)
    {
        return view('uraian_pekerjaan.edit', compact('uraian_pekerjaan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\uraian_pekerjaan  $uraian_pekerjaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, uraian_pekerjaan $uraian_pekerjaan)
    {
        $request->validate([
            'uraian' => 'required',
            'keterangan' => 'required',
            'poin' => 'required',
            'satuan' => 'required',
            'edited_by' => 'required',
            'is_active' => 'required',
        ]);

        $uraian_pekerjaan->update($request->all());

        return redirect()->route('uraian_pekerjaan.index')->with('success', 'uraian_pekerjaan diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\uraian_pekerjaan  $uraian_pekerjaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(uraian_pekerjaan $uraian_pekerjaan)
    {
        $uraian_pekerjaan->delete();
        return redirect()->route('uraian_pekerjaan.index')->with('success', 'uraian_pekerjaan dihapus.');
    }
}
