<?php

namespace App\Http\Controllers;

use App\Models\ref_jabatan;
use App\Models\User;
use Illuminate\Http\Request;

class RefJabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ref_jabatan = ref_jabatan::all();
        return view('ref_jabatan.index')->with('ref_jabatan', $ref_jabatan);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ref_jabatan.create');
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
            'keterangan' => 'required',
            'nama' => 'required',
            'inserted_by' => 'required',
            'edited_by' => 'required',
            'is_active' => 'required'
        ]);

        ref_jabatan::create($request->all());

        return redirect()->route('ref_jabatan.index')->with('success', 'Ref Jabatan ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ref_jabatan  $ref_jabatan
     * @return \Illuminate\Http\Response
     */
    public function show(ref_jabatan $ref_jabatan)
    {
        return view('ref_jabatan.show', compact('ref_jabatan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ref_jabatan  $ref_jabatan
     * @return \Illuminate\Http\Response
     */
    public function edit(ref_jabatan $ref_jabatan)
    {
        return view('ref_jabatan.edit', compact('ref_jabatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ref_jabatan  $ref_jabatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ref_jabatan $ref_jabatan)
    {
        $request->validate([
            'keterangan' => 'required',
            'nama' => 'required',
            'inserted_by' => 'required',
            'edited_by' => 'required',
            'is_active' => 'required'
        ]);

        $ref_jabatan->update($request->all());

        return redirect()->route('ref_jabatan.index')->with('success', 'Ref Jabatan diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ref_jabatan  $ref_jabatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(ref_jabatan $ref_jabatan)
    {
        $ref_jabatan->delete();
        return redirect()->route('ref_jabatan.index')->with('success', 'ref_jabatan dihapus.');
    }
}