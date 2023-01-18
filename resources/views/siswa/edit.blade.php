@extends('main.layout')
@section('content')
    <center>
        <h2>EDIT DATA SISWA</h2>
        <form action="/siswa/update/{{ $siswa->id }}" method="post">
            @csrf
            <table width="50%">
                <tr>
                    <td class="bar">NIS</td>
                    <td class="bar">
                        <input type="text" name="nis" value="{{ $siswa->nis }}" />
                    </td>
                </tr>
                <tr>
                    <td class="bar">NAMA SISWA</td>
                    <td class="bar">
                        <input type="text" name="nama_siswa" value="{{ $siswa->nama_siswa }}" />
                    </td>
                </tr>
                <tr>
                    <td class="bar">JENIA KELAMIN</td>
                    <td class="bar">
                        <input type="radio" name="jk" value="L" {{ $siswa->jk == 'L' ? 'checked' : '' }} />Laki-laki
                        <input type="radio" name="jk" value="P" {{ $siswa->jk == 'P' ? 'checked' : '' }} />Perempuan
                    </td>
                </tr>
                <tr>
                    <td class="bar">ALAMAT</td>
                    <td class="bar">
                        <textarea name="alamat" cols="30" rows="5">{{ $siswa->alamat }}</textarea>
                    </td>
                </tr>
                <tr>
                    <td class="bar">KELAS</td>
                    <td class="bar">
                        <select name="kelas_id">
                            <option>-</option>
                            @foreach ($kelas as $k)
                                @if ($siswa->kelas_id == $k->id) 
                                    <option value="{{ $k->id }}" selected>{{ $k->nama_kelas }} - {{$k->jurusan->nama_jurusan}}</option>
                                @else  
                                    <option value="{{ $k->id }}">{{ $k->nama_kelas }} - {{$k->jurusan->nama_jurusan}}</option>
                                @endif
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="bar">PASSWORD</td>
                    <td class="bar">
                        <input type="password" name="password" value="{{ $siswa->password }}" />
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