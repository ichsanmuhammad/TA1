<?php

namespace App\Http\Controllers;

use App\Dokter;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dokters = Dokter::all();
        return view('dokter.index', compact('dokters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dokter.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Dokter::class);

        $validatedData = $request->validate([
            'nama_dokter' => 'required',
            'jam_praktek' => 'required',
            'jumlah_pasien' => 'required|min:10|integer'
        ]);
        Dokter::create($validatedData);
        return redirect('/')->with('pesan', "Dokter $request->nama_dokter Berhasil Disimpan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function show(Dokter $dokter)
    {
        
        return view('dokter.show', compact('dokter'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function edit(Dokter $dokter)
    {
        return view('dokter.edit', compact('dokter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dokter $dokter)
    {
        $validatedData = $request->validate([
            'nama_dokter' => 'required',
            'jam_praktek' => 'required',
            'jumlah_pasien' => 'required|min:10|integer'
        ]);
        $dokter->update($validatedData);
        return redirect('/dokters/'.$dokter->id)->with('pesan', "Dokter $request->nama_dokter Berhasil Di ubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dokter $dokter)
    {
        $this->authorize('delete', $dokter);

        $dokter->delete();
        return redirect('/')->with('pesan', "Dokter $dokter->nama_dokter Berhasil Di hapus");
    }
}
