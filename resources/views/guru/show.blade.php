@extends('layouts.dasboard')

@section('content')

<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">Data guru</h4>
                    {{-- <button class="btn btn-primary" id="btn-Tambah-guru" data-toggle="modal" --}}
                        {{-- data-target="#exampleModalCenter"> <i class="fas fa-plus"></i> Tambah guru</button> --}}

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class=" text-primary">
                                <th>
                                    Nama Guru
                                </th>
                                <th class="text-center">
                                    Kelas
                                </th>
                                <th class="text-center">
                                    mapel
                                </th>
                                <th class="text-center">
                                    Aksi
                                </th>
                                    <th class="text-center">
                                        Aksi
                                    </th>

            <tr>
                <td>{{$gurus->nama}}</td>
                <td>{{$gurus->mapel->nama_mapel}}</td>
                <td>{{$gurus->kelas->kelas}}</td>
                <td>{{$gurus->email}}</td>
                {{-- <td>{{$gurus->user->password}}</td> --}}
            </tr>
        </table>



    </div>
</div>
@endsection
