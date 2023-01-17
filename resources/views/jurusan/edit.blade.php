@extends('main.layout')
@section('content')
    <center>
        <h2>UBAH DATA JURUSAN</h2>
        <form action="/jurusan/update/{{ $jurusan->id }}" method="post">
            @csrf
            <table width="50%">
                <tr>
                    <td class="bar">JURUSAN</td>
                    <td class="bar">
                        <input type="text" name="nama_jurusan" value="{{ $jurusan->nama_jurusan }}">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <center>
                            <button type="submit" class="button-primary">UBAH</button>
                        </center>
                    </td>
                </tr>
            </table>
        </form>
    </center>
@endsection