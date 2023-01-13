@extends('main.layout')
@section('content')
    <center>
        <br>
        <h2>TAMBAH DATA GURU</h2>
        <form action="/guru/update/{{ $guru->id }}" method="post">
            @csrf
            <table width="50%">
                <tr>
                    <th width="25%">NIP</th>
                    <td width="25%">
                        <input type="text" name="nip" value="{{ $guru->nip }}">
                    </td>
                </tr>
                <tr>
                    <th width="25%">NAMA GURU</th>
                    <td width="25%">
                        <input type="text" name="nama_guru" value="{{ $guru->nama_guru }}">
                    </td>
                </tr>
                <tr>
                    <th width="25%">JENIS KELAMIN</th>
                    <td width="25%">
                        <input type="radio" name="jk" value="L" {{ $guru->jk == 'L' ? 'cheked' : '' }}>Laki-Laki
                        <input type="radio" name="jk" value="P" {{ $guru->jk == 'P' ? 'cheked' : '' }}>Perempuan
                    </td>
                </tr>
                <tr>
                    <th width="25%">ALAMAT</th>
                    <td width="25%">
                        <textarea name="alamat" cols="30" rows="5">{{ $guru->alamat }}</textarea>
                    </td>
                </tr>
                <tr>
                    <th width="25%">PASSWORD</th>
                    <td width="25%">
                        <input type="password" name="password" value="{{ $guru->password }}">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <center>
                            <button class="button-primary" type="submit">UBAH</button>
                        </center>
                    </td>
                </tr>
            </table>
        </form>
    </center>
@endsection