<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\uraian_pekerjaan;
use Illuminate\Support\Facades\Auth;

class UraianPekerjaanController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:uraian_pekerjaan-list|uraian_pekerjaan-create|uraian_pekerjaan-edit|uraian_pekerjaan-delete')->only('index', 'show');
        $this->middleware('permission:uraian_pekerjaan-create')->only('create', 'store');
        $this->middleware('permission:uraian_pekerjaan-edit')->only('edit', 'update');
        $this->middleware('permission:uraian_pekerjaan-delete')->only('destroy');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $uraian_pekerjaan = uraian_pekerjaan::all();
        return view('uraian_pekerjaan.index', compact('uraian_pekerjaan'))->with('i');
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
        $uraian_pekerjaan = new uraian_pekerjaan();
        $request->validate([
            'uraian' => 'required',
            'keterangan' => 'required',
            'poin' => 'required',
            'satuan' => 'required',
        ]);
        $uraian_pekerjaan->uraian = $request->uraian;
        $uraian_pekerjaan->keterangan = $request->keterangan;
        $uraian_pekerjaan->poin = $request->poin;
        $uraian_pekerjaan->satuan = $request->satuan;
        $uraian_pekerjaan->inserted_by = Auth::user()->name;
        $uraian_pekerjaan->edited_by = Auth::user()->name;
        $uraian_pekerjaan->save();



        return redirect()->route('uraian_pekerjaan.index')->with('success', 'Pekerjaan ditambahkan.');
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'uraian' => 'required',
            'keterangan' => 'required',
            'poin' => 'required',
            'satuan' => 'required',
            'is_active' => 'required',
        ]);
        
        $uraian_pekerjaan = uraian_pekerjaan::find($id);
        $uraian_pekerjaan->update(['edited_by' => Auth::user()->name]);
        $uraian_pekerjaan->update($request->all());

        return redirect()->route('uraian_pekerjaan.index')->with('success', 'Pekerjaan diupdate.');
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
        return redirect()->route('uraian_pekerjaan.index')->with('success', 'Pekerjaan dihapus.');
    }
}
