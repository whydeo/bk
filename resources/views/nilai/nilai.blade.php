@extends('layouts.dasboard')
@section('content')
<div class="container">

    <div class="row">

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Nis</th>
                <th scope="col">kelas</th>
                <th scope="col">Berkualitas</th>
                <th scope="col">Berbudi</th>
                <th scope="col">Berdaya</th>
                <th scope="col">Berhasil</th>
            </tr>
        </thead>
        <tbody>
            @php
            $no = 0;
            @endphp
                @forelse ($datas as $data )
            <tr>
                <th scope="row">{{ ++$no }}</th>
                {{-- <td>{{ $data->data}}</td> --}}
                {{-- <td>{{ $data->data}}</td> --}}
                <td></td>
                <td></td>
                <td></td>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->kelas }}</td>
                <td>{{ $data->jurusan }}</td>
                <td>{{ $data->keterangan }}</td>
                <td>{{ $data->folowup }}</td>
            </tr>
            @empty
            <td colspan="10" class="table-active text-center">Tidak Ada Data</td>
            @endforelse
        </tbody>
    </table>

</div>
@endsection
