<?php

namespace App\Http\Controllers;

use App\Models\pegawai;
use App\Models\User;
use App\Models\ref_unit;
use App\Models\ref_jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PegawaiController extends Controller
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
        $pegawai = pegawai::all();
        return view('pegawai.index', compact('pegawai'))->with('i');
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
        $pegawai = new pegawai();
              

        $request->validate([
            'kode_pegawai' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'id_unit' => 'required',
            'id_jabatan' => 'required',
            'id_user' => 'required',
        ]);
        

        $pegawai->kode_pegawai = $request->kode_pegawai;
        $pegawai->nama = $request->nama;
        $pegawai->alamat = $request->alamat;
        $pegawai->id_unit = $request->id_unit;
        $pegawai->id_jabatan = $request->id_jabatan;
        $pegawai->id_user = $request->id_user;
        $pegawai->inserted_by = Auth::user()->name;
        $pegawai->edited_by = Auth::user()->name;
        $pegawai->save();

        return redirect()->route('pegawai.index')->with('success', 'Pegawai ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show(pegawai $pegawai)
    {
        $namaUnit = DB::table('ref_unit')
            ->join('pegawai', 'ref_unit.id', '=', 'pegawai.id_unit')
            ->value('ref_unit.nama');
        $namaJabatan = DB::table('ref_jabatan')
            ->join('pegawai', 'ref_jabatan.id', '=', 'pegawai.id_jabatan')
            ->value('ref_jabatan.nama');
        return view('pegawai.show', compact('pegawai', 'namaUnit', 'namaJabatan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pegawai = pegawai::find($id);
        
        $unit = ref_unit::pluck('nama', 'id')->all();
        $unitQuery = DB::table('ref_unit')
            ->join('pegawai', 'ref_unit.id', '=', 'pegawai.id_unit');
        $unitPegawai = $unitQuery->pluck('ref_unit.id', 'ref_unit.id');
        
        $jabatan = ref_jabatan::pluck('nama', 'id')->all();
        $jabatanQuery = DB::table('ref_jabatan')
            ->join('pegawai', 'ref_jabatan.id', '=', 'pegawai.id_jabatan');
        $jabatanPegawai = $jabatanQuery->pluck('ref_jabatan.id', 'ref_jabatan.id');
        
        $user = User::pluck('name', 'id')->all();
        $userQuery = DB::table('pegawai')
            ->where('pegawai.id', $id)
            ->join('users', 'pegawai.id_user', '=', 'users.id');
        $userPegawai = $userQuery->pluck('users.id', 'users.id');

        return view('pegawai.edit', compact('pegawai', 'unit', 'unitPegawai', 'jabatan', 'jabatanPegawai', 'user', 'userPegawai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_unit' => 'required',
            'kode_pegawai' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'is_active' => 'required',
            'id_unit' => 'required',
            'id_jabatan' => 'required',
            'id_user' => 'required'
        ]);
        $pegawai = pegawai::find($id);
        $pegawai->update(['id_unit' => $request->id_unit]);
        $pegawai->update(['id_jabatan' => $request->id_jabatan]);
        $pegawai->update(['id_user' => $request->id_user]);
        $pegawai->update(['edited_by' => Auth::user()->name]);
        $pegawai->update($request->all());

        return redirect()->route('pegawai.index')->with('success', 'Pegawai diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy(pegawai $pegawai)
    {
        $pegawai->delete();
        return redirect()->route('pegawai.index')->with('success', 'Pegawai dihapus.');
    }
}
