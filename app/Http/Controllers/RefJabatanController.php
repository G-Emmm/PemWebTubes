<?php

namespace App\Http\Controllers;

use App\Models\ref_jabatan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RefJabatanController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ref_jabatan-list|ref_jabatan-create|ref_jabatan-edit|ref_jabatan-delete')->only('index', 'show');
        $this->middleware('permission:ref_jabatan-create')->only('create', 'store');
        $this->middleware('permission:ref_jabatan-edit')->only('edit', 'update');
        $this->middleware('permission:ref_jabatan-delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ref_jabatan = ref_jabatan::all();
        return view('ref_jabatan.index', compact('ref_jabatan'))->with('i');
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
        $ref_jabatan = new ref_jabatan();
        $request->validate([
            'nama' => 'required',
            'keterangan' => 'required'
        ]);
        $ref_jabatan->nama = $request->nama;
        $ref_jabatan->keterangan = $request->keterangan;
        $ref_jabatan->inserted_by = Auth::user()->name;
        $ref_jabatan->edited_by = Auth::user()->name;
        $ref_jabatan->save();

        return redirect()->route('ref_jabatan.index')->with('success', 'Jabatan ditambahkan.');
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'keterangan' => 'required',
            'is_active' => 'required'
        ]);
        
        $ref_jabatan = ref_jabatan::find($id);
        $ref_jabatan->update(['edited_by' => Auth::user()->name]);
        $ref_jabatan->update($request->all());

        return redirect()->route('ref_jabatan.index')->with('success', 'Jabatan diperbarui.');
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
        return redirect()->route('ref_jabatan.index')->with('success', 'Jabatan dihapus.');
    }
}
