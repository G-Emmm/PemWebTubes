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
    // function __construct()
    // {
    //     $this->middleware('permission:upj-list|upj-create|upj-edit|upj-delete')->only('index', 'show');
    //     $this->middleware('permission:upj-create')->only('create', 'store');
    //     $this->middleware('permission:upj-edit')->only('edit', 'update');
    //     $this->middleware('permission:upj-delete')->only('destroy');
    // }

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

        $uraian_pekerjaan_jabatan->id_jabatan = $request->id_jabatan;
        $uraian_pekerjaan_jabatan->id_uraian_pekerjaan = $request->id_uraian_pekerjaan;
        $uraian_pekerjaan_jabatan->inserted_by = Auth::user()->name;
        $uraian_pekerjaan_jabatan->edited_by = Auth::user()->name;
        $uraian_pekerjaan_jabatan->save();


        return redirect()->route('uraian_pekerjaan_jabatan.index')->with('success', 'uraian_pekerjaan_jabatan ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\uraian_pekerjaan_jabatan  $uraian_pekerjaan_jabatan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $uraian_pekerjaan_jabatan = DB::table('uraian_pekerjaan_jabatan');
        $jabatan = DB::table('ref_jabatan');
        $uraian_pekerjaan = DB::table('uraian_pekerjaan');
        $namaJabatan = $jabatan
            ->join($uraian_pekerjaan_jabatan, $jabatan->id, '=', $uraian_pekerjaan_jabatan->id_jabatan)
            ->join($uraian_pekerjaan, $uraian_pekerjaan_jabatan->id_uraian_pekerjaan, '=', $uraian_pekerjaan->id)
            ->where($uraian_pekerjaan_jabatan->id, '=', $id)
            ->value($jabatan->nama);
        $namaPekerjaan = $jabatan
            ->join($uraian_pekerjaan_jabatan, $jabatan->id, '=', $uraian_pekerjaan_jabatan->id_jabatan)
            ->join($uraian_pekerjaan, $uraian_pekerjaan_jabatan->id_uraian_pekerjaan, '=', $uraian_pekerjaan->id)
            ->where($uraian_pekerjaan_jabatan->id, '=', $id)
            ->get();
        return view('uraian_pekerjaan_jabatan.show', compact('namaJabatan', 'namaPekerjaan'));
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
