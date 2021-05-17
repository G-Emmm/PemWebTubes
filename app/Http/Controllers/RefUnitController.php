<?php

namespace App\Http\Controllers;

use App\Models\ref_unit;
use App\Models\User;
use Illuminate\Http\Request;

class RefUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ref_unit = ref_unit::all();
        return view('ref_unit.index')->with('ref_unit', $ref_unit);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ref_unit.create');
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
            'nama' => 'required',
            'level' => 'required',
            'inserted_by' => 'required',
            'edited_by' => 'required',
            'is_active' => 'required'
        ]);

        ref_unit::create($request->all());

        return redirect()->route('ref_unit.index')->with('success', 'Ref Unit ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ref_unit  $ref_unit
     * @return \Illuminate\Http\Response
     */
    public function show(ref_unit $ref_unit)
    {
        return view('ref_unit.show', compact('ref_unit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ref_unit  $ref_unit
     * @return \Illuminate\Http\Response
     */
    public function edit(ref_unit $ref_unit)
    {
        return view('ref_unit.edit', compact('ref_unit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ref_unit  $ref_unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ref_unit $ref_unit)
    {
        $request->validate([
            'nama' => 'required',
            'level' => 'required',
            'is_active' => 'required'
        ]);

        $ref_unit->update($request->all());

        return redirect()->route('ref_unit.index')->with('success', 'Ref Unit diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ref_unit  $ref_unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(ref_unit $ref_unit)
    {
        $ref_unit->delete();
        return redirect()->route('ref_unit.index')->with('success', 'Ref Unit dihapus.');
    }
}
