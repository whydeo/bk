@extends('layouts.dasboard')


@section('content')
{{-- <H1>HALLO {{auth()->user()->username}}
</H1> --}}
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
        <div>

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Nis</th>
                        <th scope="col">kelas</th>
                        <th scope="col">jurusan</th>
                        <th scope="col">jenis kelamin</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no = 0;
                    @endphp
                    @forelse ($data as $siswa)
                    <tr>
                        <th scope="row">{{ ++$no }}</th>
                        <td>{{ $siswa->siswa->nama_siswa }}</td>
                        <td>{{ $siswa->Berkualitas }}</td>
                        <td>{{ $siswa->Berbudi }}</td>
                        <td>{{ $siswa->Berdaya }}</td>
                        <td>{{ $siswa->Berhasil }}</td>
                    </tr>
                    @empty
                    <td colspan="6" class="table-active text-center">Tidak Ada Data</td>
                    @endforelse
                </tbody>
            </table>
        </div>
 @endsection
