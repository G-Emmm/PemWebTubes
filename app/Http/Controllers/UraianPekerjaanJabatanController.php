<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\uraian_pekerjaan_jabatan;
use App\Models\uraian_pekerjaan;
use App\Models\ref_jabatan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UraianPekerjaanJabatanController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:upj-list|upj-create|upj-edit|upj-delete')->only('index', 'show');
        $this->middleware('permission:upj-create')->only('create', 'store');
        $this->middleware('permission:upj-edit')->only('edit', 'update');
        $this->middleware('permission:upj-delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $uraian_pekerjaan_jabatan = uraian_pekerjaan_jabatan::all();
        return view('uraian_pekerjaan_jabatan.index', compact('uraian_pekerjaan_jabatan'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $uraian_pekerjaan = uraian_pekerjaan::pluck('uraian', 'id')->all();
        $jabatan = ref_jabatan::pluck('nama', 'id')->all();
        return view('uraian_pekerjaan_jabatan.create', compact('uraian_pekerjaan', 'jabatan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $uraian_pekerjaan_jabatan = new uraian_pekerjaan_jabatan();


        $request->validate([
            'id_jabatan' => 'required',
            'id_uraian_pekerjaan' => 'required',
        ]);

        $uraian_pekerjaan_jabatan->id_uraian_pekerjaan_jabatan_composite = (string)$request->id_jabatan . (string)$request->id_uraian_pekerjaan;
        $uraian_pekerjaan_jabatan->inserted_by = Auth::user()->name;
        $uraian_pekerjaan_jabatan->edited_by = Auth::user()->name;
        $uraian_pekerjaan_jabatan->save();


        return redirect()->route('uraian_pekerjaan_jabatan.index')->with('success', 'data ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\uraian_pekerjaan_jabatan  $uraian_pekerjaan_jabatan
     * @return \Illuminate\Http\Response
     */
    public function show(uraian_pekerjaan_jabatan $uraian_pekerjaan_jabatan)
    {
        $id_jabatan = substr($uraian_pekerjaan_jabatan->id_uraian_pekerjaan_jabatan_composite, 0, strlen($uraian_pekerjaan_jabatan->id_uraian_pekerjaan_jabatan_composite)/2);
        $id_uraian_pekerjaan = substr($uraian_pekerjaan_jabatan->id_uraian_pekerjaan_jabatan_composite, strlen($uraian_pekerjaan_jabatan->id_uraian_pekerjaan_jabatan_composite)/2, strlen($uraian_pekerjaan_jabatan->id_uraian_pekerjaan_jabatan_composite)/2);
        $namaJabatan = DB::table('ref_jabatan')
            ->where('ref_jabatan.id', '=', (int)$id_jabatan)
            ->value('ref_jabatan.nama');
        $namaPekerjaan = DB::table('uraian_pekerjaan')
            ->where('uraian_pekerjaan.id', '=', (int)$id_uraian_pekerjaan)
            ->value('uraian_pekerjaan.uraian');

        return view('uraian_pekerjaan_jabatan.show', compact('namaJabatan', 'namaPekerjaan', 'uraian_pekerjaan_jabatan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\uraian_pekerjaan_jabatan  $uraian_pekerjaan_jabatan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $uraian_pekerjaan_jabatan = uraian_pekerjaan_jabatan::find($id);
        
        $id_jabatan = substr($uraian_pekerjaan_jabatan->id_uraian_pekerjaan_jabatan_composite, 0, strlen($uraian_pekerjaan_jabatan->id_uraian_pekerjaan_jabatan_composite)/2);
        $id_uraian_pekerjaan = substr($uraian_pekerjaan_jabatan->id_uraian_pekerjaan_jabatan_composite, strlen($uraian_pekerjaan_jabatan->id_uraian_pekerjaan_jabatan_composite)/2, strlen($uraian_pekerjaan_jabatan->id_uraian_pekerjaan_jabatan_composite)/2);
        
        $uraian_pekerjaan = uraian_pekerjaan::pluck('uraian', 'id')->all();
        $uraian_pekerjaanQuery = DB::table('uraian_pekerjaan')
            ->where('uraian_pekerjaan.id', '=', (int)$id_uraian_pekerjaan);
        $uraianPekerjaanPerJabatan = $uraian_pekerjaanQuery->pluck('uraian_pekerjaan.id', 'uraian_pekerjaan.id');
        
        $jabatan = ref_jabatan::pluck('nama', 'id')->all();
        $jabatanQuery = DB::table('ref_jabatan')
            ->where('ref_jabatan.id', '=', (int)$id_jabatan);
        $jabatanUraianPekerjaan = $jabatanQuery->pluck('ref_jabatan.id', 'ref_jabatan.id');
        
        return view('uraian_pekerjaan_jabatan.edit', compact('uraian_pekerjaan_jabatan', 'uraian_pekerjaan', 'uraianPekerjaanPerJabatan', 'jabatan', 'jabatanUraianPekerjaan'));
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
            'id_uraian_pekerjaan_jabatan_composite' => 'required',
            'edited_by' => 'required',
            'is_active' => 'required',
        ]);

        $uraian_pekerjaan_jabatan->update($request->all());

        return redirect()->route('uraian_pekerjaan_jabatan.index')->with('success', 'data diupdate.');
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
        return redirect()->route('uraian_pekerjaan_jabatan.index')->with('success', 'data dihapus.');
    }
}
