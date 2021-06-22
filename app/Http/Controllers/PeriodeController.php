<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\periode;

class PeriodeController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:periode-list|periode-create|periode-edit|periode-delete')->only('index', 'show');
        $this->middleware('permission:periode-create')->only('create', 'store');
        $this->middleware('permission:periode-edit')->only('edit', 'update');
        $this->middleware('permission:periode-delete')->only('destroy');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $periode = periode::all();
        return view('periode.index', compact('periode'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('periode.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $periode = new periode();
        $request->validate([
            'nama' => 'required',
            'tanggal_awal' => 'required',
            'tanggal_akhir' => 'required'
        ]);
        $periode->nama = $request->nama;
        $periode->tanggal_awal = $request->tanggal_awal;
        $periode->tanggal_akhir = $request->tanggal_akhir;
        $periode->inserted_by = Auth::user()->name;
        $periode->edited_by = Auth::user()->name;
        $periode->save();

        return redirect()->route('periode.index')->with('success', 'Periode ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\periode  $periode
     * @return \Illuminate\Http\Response
     */
    public function show(periode $periode)
    {
        return view('periode.show', compact('periode'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\periode  $periode
     * @return \Illuminate\Http\Response
     */
    public function edit(periode $periode)
    {
        return view('periode.edit', compact('periode'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\periode  $periode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'tanggal_awal' => 'required',
            'tanggal_akhir' => 'required'
        ]);

        $periode = periode::find($id);        
        $periode->update(['edited_by' => Auth::user()->name]);
        $periode->update($request->all());

        return redirect()->route('periode.index')->with('success', 'Periode diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\periode  $periode
     * @return \Illuminate\Http\Response
     */
    public function destroy(periode $periode)
    {
        $periode->delete();
        return redirect()->route('periode.index')->with('success', 'Periode dihapus.');
    }
}
