<?php

namespace App\Http\Controllers;

use App\Karyawan;
use Illuminate\Http\Request;
use App\Jabatan;
use App\Pendidikan;
use App\Status;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karyawan = Karyawan::all();
        return view('karyawan.index', compact('karyawan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jabatans = Jabatan::all();
        $pendidikans = Pendidikan::all();
        $statuses = Status::all();
        return view('karyawan.create', compact('jabatans','pendidikans','statuses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateDate = $request->validate([
            'nama' => 'required|min:2|max:40',
            'jenis_kelamin' => 'required',
            'jabatan_id' => 'required',
            'status_id' => 'required',
            'nomor_telepon' => 'required',
            'umur' => 'required',
            'pendidikan_id' => 'required'
        ]);
        $karyawan = Karyawan::create($validateDate);

        $request->session()->flash('pesan', "Data {$validateDate['nama']} Berhasil Disimpan");
        return redirect()->route('karyawan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function show(Karyawan $karyawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function edit(Karyawan $karyawan)
    {
        $jabatans = Jabatan::all();
        $pendidikans = Pendidikan::all();
        $statuses = Status::all();
        return view('karyawan.edit', [
            'karyawan' => $karyawan,
            'jabatans' => $jabatans,
            'pendidikans' => $pendidikans,
            'statuses' => $statuses
        ]);
        // return view('karyawan.edit', compact('karyawan','jabatans','pendidikans','statuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Karyawan $karyawan)
    {
        $validateDate = $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'jabatan_id' => 'required',
            'status_id' => 'required',
            'nomor_telepon' => 'required',
            'umur' => 'required',
            'pendidikan_id' => 'required'
        ]);
        $karyawan->update($validateDate);
        $karyawan->save();

        return redirect()->route('karyawan.index',  ['karyawan' => $karyawan->id])->with('pesan', "Update data {$validateDate['nama']} Berhasil");
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Karyawan $karyawan)
    {
        $karyawan->delete();
        return redirect()->route('karyawan.index')->with('pesan', "Hapus data $karyawan->nama Berhasil");
    }
}
