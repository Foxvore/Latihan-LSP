<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurusan;
use App\Models\Kelas;

class JurusanController extends Controller
{
    public function index()
    {
        return view('jurusan.index', [
            'jurusan' => Jurusan::all()
        ]);
    }

    public function create()
    {
        return view('jurusan.create');
    }

    public function store(Request $request)
    {
        $data_jurusan = $request->validate([
            'nama_jurusan' => ['required']
        ]);

        Jurusan::create($data_jurusan);
        return redirect('/jurusan/index')->with('success', "Data jurusan berhasil ditambah");
    }

    public function edit(Jurusan $jurusan)
    {
        return view('jurusan.edit', [
            'jurusan' => $jurusan
        ]);
    }

    public function update(Request $request, Jurusan $jurusan)
    {
        $data_jurusan = $request->validate([
            'nama_jurusan' => ['required']
        ]);

        $jurusan->update($data_jurusan);
        return redirect('/jurusan/index')->with('success', "Data jurusan berhasil diubah");
    }

    public function destroy(Jurusan $jurusan)
    {
        $kelas = Kelas::where('jurusan_id', $jurusan->id)->first();
        if ($kelas) {
            return back()->with('error', "$jurusan->nama_jurusan masih digunakan di menu kelas!");
        }

        $jurusan->delete();
        return back()->with('success', "Data jurusan berhasil di hapus");
    }
}
