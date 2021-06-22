<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\skp_target;
use App\Models\uraian_pekerjaan;
use App\Models\uraian_pekerjaan_jabatan;
use App\Models\pegawai;


class SkpTargetController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:pegawai-list|pegawai-create|pegawai-edit|pegawai-delete')->only('index', 'show');
        $this->middleware('permission:pegawai-create')->only('create', 'store');
        $this->middleware('permission:pegawai-edit')->only('edit', 'update');
        $this->middleware('permission:pegawai-delete')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $skp_target = skp_target::all();
        return view('skp_target.index', compact('skp_target'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unit =ref_unit::pluck('nama', 'id')->all();
        $jabatan = ref_jabatan::pluck('nama', 'id')->all();
        $user = User::pluck('name', 'id')->all();
        return view('pegawai.create', compact('unit', 'jabatan', 'user'));
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
            'id_pegawai' => 'required',
            'id_periode' => 'required',
            'id_jabatan' => 'required',
            'inserted_by' => 'required',
            'edited_by' => 'required',
            'id_uraian_pekerjaan' => 'required',
            'id_uraian_pekerjaan_jabatan' => 'required',
            'jml_target' => 'required',

        ]);

        skp_target::create($request->all());

        return redirect()->route('skp_target.index')->with('success', 'skp_target ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\skp_target  $skp_target
     * @return \Illuminate\Http\Response
     */
    public function show(skp_target $skp_target)
    {
        return view('skp_target.show', compact('skp_target'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\skp_target  $skp_target
     * @return \Illuminate\Http\Response
     */
    public function edit(skp_target $skp_target)
    {
        return view('skp_target.edit', compact('skp_target'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\skp_target  $skp_target
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, skp_target $skp_target)
    {
        $request->validate([
            'id_pegawai' => 'required',
            'id_periode' => 'required',
            'id_jabatan' => 'required',
            'inserted_by' => 'required',
            'edited_by' => 'required',
            'id_uraian_pekerjaan' => 'required',
            'id_uraian_pekerjaan_jabatan' => 'required',
            'jml_target' => 'required',
        ]);

        $skp_target->update($request->all());

        return redirect()->route('skp_target.index')->with('success', 'skp_target diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\skp_target  $skp_target
     * @return \Illuminate\Http\Response
     */
    public function destroy(skp_target $skp_target)
    {
        $skp_target->delete();
        return redirect()->route('skp_target.index')->with('success', 'skp_target dihapus.');
    }
}
