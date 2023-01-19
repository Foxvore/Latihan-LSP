<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Mengajar;
Use App\Models\Siswa;
Use App\Models\Nilai;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if (session('user')->role == 'guru') {
        //     $nilai = Nilai::whereHas('mengajar', function ($query){
        //         $query->where('guru_id', session('user')->id);
        //     });
        // } else {
        //     $nilai = Nilai::where('nis', session('user')->nis)->get();
        // }
        
        return view('nilai.index', [
            'nilai' => Nilai::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $mengajar = Mengajar::where('guru_id', session('user')->id);
        $mengajar = Mengajar::all();
        return view ('nilai.create', [
            // 'mengajar' => $mengajar->get(),
            'mengajar' => $mengajar,
            // 'siswa' => Siswa::whereIn('kelas_id', $mengajar->get('kelas_id'))->get(),
            'siswa' => Siswa::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data_nilai = $request->validate([
            'mengajar_id' => ['required'],
            'siswa_id' => ['required'],
            'uh' => ['required', 'numeric'],
            'uts' => ['required', 'numeric'],
            'uas' => ['required', 'numeric'],
        ]);

        $data_nilai['na'] = round(($request->uh + $request->uts + $request->uas) / 3);
        Nilai::create($data_nilai);
        return redirect('/nilai/index')->with('success', "Data nilai berhasil ditambah");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Nilai $nilai)
    {
        // $mengajar = Mengajar::where('guru_id', session('user')->id);
        $mengajar = Mengajar::all();
        return view ('nilai.edit', [
            'nilai' => $nilai,
            // 'mengajar' => $mengajar->get(),
            'mengajar' => $mengajar,
            // 'siswa' => Siswa::whereIn('kelas_id', $mengajar->get('kelas_id'))->get(),
            'siswa' => Siswa::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nilai $nilai)
    {
        $data_nilai = $request->validate([
            'mengajar_id' => ['required'],
            'siswa_id' => ['required'],
            'uh' => ['required', 'numeric'],
            'uts' => ['required', 'numeric'],
            'uas' => ['required', 'numeric'],
        ]);

        $data_nilai['na'] = round(($request->uh + $request->uts + $request->uas) / 3);
        $nilai->update($data_nilai);
        return redirect('/nilai/index')->with('success', "Data nilai berhasil diubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nilai $nilai)
    {
        $nilai->delete();
        return back()->with('success', "Data nilai berhasil dihapus");
    }
}
