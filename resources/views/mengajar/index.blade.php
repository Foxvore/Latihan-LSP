@extends('main.layout')
@section('content')
    <center>
        <h2>LIST DATA MENGAJAR</h2>
        <a href="/mengajar/create" class="button-primary">Tambah Data Mengajar</a>
        @if (session('success'))
            <p class="text-success">{{ session('success') }}</p>
        @endif
        @if (session('error'))
            <p class="text-danger">{{ session('error') }}</p>
        @endif

        <table cellpading="10" style="text-align: center">
            <tr>
                <th>NO</th>
                <th>GURU</th>
                <th>MATA PELAJARAN</th>
                <th>KELAS</th>
                <th>ACTION</th>
            </tr>
            @foreach ($mengajar as $meng)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $meng->guru->nama_guru }}</td>
                    <td>{{ $meng->mapel->nama_mapel }}</td>
                    <td>{{ $meng->kelas->nama_kelas }}</td>
                    <td>
                        <a href="/mengajar/edit/{{ $meng->id }}" class="button-warning">EDIT</a>
                        <a href="/mengajar/destroy/{{ $meng->id }}" class="button-danger" onclick="return alert('Yakin Hapus?">HAPUS</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </center>
@endsection