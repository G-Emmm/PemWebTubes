<?php

namespace App\Http\Controllers;

use App\Models\ref_unit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RefUnitController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ref_unit-list|ref_unit-create|ref_unit-edit|ref_unit-delete')->only('index', 'show');
        $this->middleware('permission:ref_unit-create')->only('create', 'store');
        $this->middleware('permission:ref_unit-edit')->only('edit', 'update');
        $this->middleware('permission:ref_unit-delete')->only('destroy');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ref_unit = ref_unit::all();
        return view('ref_unit.index', compact('ref_unit'))->with('i');
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
        $ref_unit = new ref_unit();
        $request->validate([
            'nama' => 'required',
            'level' => 'required'
        ]);

        $ref_unit->inserted_by = Auth::user()->name;
        $ref_unit->edited_by = Auth::user()->name;
        $ref_unit->save();

        return redirect()->route('ref_unit.index')->with('success', 'Unit ditambahkan.');
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