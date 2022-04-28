@extends('layouts.dasboard')
@section('content')
<div class="container">

    <div class="row">
        <form action="{{route('imports')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="input-group mb-3">
                <input type="file" name="file" class="form-control" placeholder="Recipient's username"
                    aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-primary" type="submit" id="button-addon2">Import</button>
            </div>
        </form>


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
                @forelse ($data as $siswa )
            <tr>
                <th scope="row">{{ ++$no }}</th>
                {{-- <td>{{ $siswa->siswa}}</td> --}}
                {{-- <td>{{ $siswa->siswa}}</td> --}}
                <td></td>
                <td></td>
                <td></td>
                <td>{{ $siswa->Berkualitas }}</td>
                <td>{{ $siswa->Berbudi }}</td>
                <td>{{ $siswa->Berdaya }}</td>
                <td>{{ $siswa->Berhasil }}</td>
            </tr>
            @empty
            <td colspan="10" class="table-active text-center">Tidak Ada Data</td>
            @endforelse
        </tbody>
    </table>

</div>
@endsection
