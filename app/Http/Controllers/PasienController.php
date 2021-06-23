<?php

namespace App\Http\Controllers;

use App\Pasien;
use App\Dokter;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pasiens = Pasien::all();
        return view('pasien.index', compact('pasiens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dokters = Dokter::all();
        return view('pasien.create', compact('dokters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nik' => 'required|size:8|unique:pasiens',
            'nama' => 'required|min:3|max:50',
            'jenis_kelamin' => 'required|in:P,L',
            'dokter_id' => 'required',
            'alamat' => ''
        ]);
        Pasien::create($validatedData);
        $request->session()->flash('pesan', "Data {$validatedData['nama']} Berhasil Disimpan");
        return redirect()->route('pasiens.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function show(Pasien $pasien)
    {
        return view('pasien.show', compact('pasien'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function edit(Pasien $pasien)
    {
        $dokters = Dokter::all();
        return view('pasien.edit', compact('pasien','dokters'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pasien $pasien)
    {
        $validatedData = $request->validate([
            'nik' => 'required|size:8|unique:pasiens,nik,'.$pasien->id,
            'nama' => 'required|min:3|max:50',
            'jenis_kelamin' => 'required|in:P,L',
            'dokter_id' => 'required',
            'alamat' => ''
        ]);
        $pasien->update($validatedData);
        return redirect()->route('pasiens.show',['pasien' => $pasien->id])->with('pesan', "Update Data {$validatedData['nama']} Berhasil");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pasien $pasien)
    {
        $pasien->delete();
        return redirect()->route('pasiens.index')->with('hapus', "Hapus data $pasien->nama Berhasil");
    }
}
