@extends('main.layout')
@section('content')
    <center>
        <br>
        <h2>EDIT DATA NILAI</h2>
        <form action="/nilai/update/{{ $nilai->id }}" method="post">
            @csrf
            <table width="50%">
                <tr>
                    <td class="bar">MAPEL & GURU MAPEL</td>
                    <td class="bar">
                        <select name="mengajar_id">
                            <option>-</option>
                            @foreach ($mengajar as $each)
                                <option value="{{ $each->id }}" @if ($each->id == $nilai->mengajar_id) selected @endif>
                                    {{ $each->guru->nama_guru }} - {{ $each->mapel->nama_mapel}}
                                </option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="bar">SISWA</td>
                    <td class="bar">
                        <select name="siswa_id">
                            <option>-</option>
                            @foreach ($siswa as $each)
                                <option value="{{ $each->id }}" @if ($each->id == $nilai->siswa_id) selected @endif>
                                    {{ $each->nama_siswa}}
                                </option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="bar">UH</td>
                    <td class="bar">
                        <input type="number" name="uh" value="{{ $nilai->uh }}">
                    </td>
                </tr>
                <tr>
                    <td class="bar">UTS</td>
                    <td class="bar">
                        <input type="number" name="uts" value="{{ $nilai->uts }}">
                    </td>
                </tr>
                <tr>
                    <td class="bar">UAS</td>
                    <td class="bar">
                        <input type="number" name="uas" value="{{ $nilai->uas }}">
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