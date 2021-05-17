<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\uraian_pekerjaan_jabatan;
use App\Models\uraian_pekerjaan;
use App\Models\ref_jabatan;

class UraianPekerjaanJabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uraian_pekerjaan_jabatan = uraian_pekerjaan_jabatan::all();
        return view('uraian_pekerjaan_jabatan.index')->with('uraian_pekerjaan_jabatan', $uraian_pekerjaan_jabatan);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('uraian_pekerjaan_jabatan.create');
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
            'id_jabatan' => 'required',
            'id_uraian_pekerjaan' => 'required',
            'inserted_by' => 'required',
            'is_active' => 'required',
        ]);

        $input= $request->all();

        $request->request->add(['edited_by' => $input['inserted_by']]);

        uraian_pekerjaan_jabatan::create($request->all());

        return redirect()->route('uraian_pekerjaan_jabatan.index')->with('success', 'uraian_pekerjaan_jabatan ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\uraian_pekerjaan_jabatan  $uraian_pekerjaan_jabatan
     * @return \Illuminate\Http\Response
     */
    public function show(uraian_pekerjaan_jabatan $uraian_pekerjaan_jabatan)
    {
        return view('uraian_pekerjaan_jabatan.show', compact('uraian_pekerjaan_jabatan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\uraian_pekerjaan_jabatan  $uraian_pekerjaan_jabatan
     * @return \Illuminate\Http\Response
     */
    public function edit(uraian_pekerjaan_jabatan $uraian_pekerjaan_jabatan)
    {
        return view('uraian_pekerjaan_jabatan.edit', compact('uraian_pekerjaan_jabatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\uraian_pekerjaan_jabatan  $uraian_pekerjaan_jabatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, uraian_pekerjaan_jabatan $uraian_pekerjaan_jabatan)
    {
        $request->validate([
            'id_jabatan' => 'required',
            'id_uraian_pekerjaan' => 'required',
            'edited_by' => 'required',
            'is_active' => 'required',
        ]);

        $uraian_pekerjaan_jabatan->update($request->all());

        return redirect()->route('uraian_pekerjaan_jabatan.index')->with('success', 'uraian_pekerjaan_jabatan diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\uraian_pekerjaan_jabatan  $uraian_pekerjaan_jabatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(uraian_pekerjaan_jabatan $uraian_pekerjaan_jabatan)
    {
        $uraian_pekerjaan_jabatan->delete();
        return redirect()->route('uraian_pekerjaan_jabatan.index')->with('success', 'uraian_pekerjaan_jabatan dihapus.');
    }
}
