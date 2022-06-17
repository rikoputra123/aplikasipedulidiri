<?php

namespace App\Http\Controllers;

use App\Models\Catatan;
use Illuminate\Http\Request;

class CatatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'tanggal' => 'required|max:10|date',
            'waktu' => 'required|max:5',
            'lokasi' => 'required|max:100',
            'suhu' => 'required|numeric|digits_between:1,4'
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        Catatan::create($validatedData);

        return redirect('/catatan')->with('success', 'Catatan baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Catatan  $catatan
     * @return \Illuminate\Http\Response
     */
    public function show(Catatan $catat)
    {
        if($catat->user->id !== auth()->user()->id) {
            abort(403);
        }

        return $catat;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Catatan  $catatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Catatan $catat)
    {
        if($catat->user->id !== auth()->user()->id) {
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Catatan  $catatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Catatan $catat)
    {
        $validatedData = $request->validate([
            'tanggal' => 'required|max:10|date',
            'waktu' => 'required|max:5',
            'lokasi' => 'required|max:100',
            'suhu' => 'required|numeric|digits_between:1,4'
        ]);

        Catatan::where('id', $catat->id)
                ->update($validatedData);

        return redirect('/catatan')->with('success', 'Catatan berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Catatan  $catatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Catatan $catat)
    {
        Catatan::destroy($catat->id);
        return redirect('/catatan')->with('success', 'Catatan dihapus!');
    }
}
