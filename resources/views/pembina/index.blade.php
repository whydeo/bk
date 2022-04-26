@extends('layouts.dasboard')
@livewireStyles
@section('content')

<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">Data Pembina</h4>
                    <button class="btn btn-primary" id="btn-Tambah-guru" data-toggle="modal"
                        data-target="#exampleModalCenter"> <i class="fas fa-plus"></i> Tambah Pembina</button>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class=" text-primary">
                                <th>
                                    NO
                                </th>
                                <th>
                                    Nama Pembina
                                </th>
                                <th class="text-center">
                                    Jenis Kelamin
                                </th>


                                <th class="text-center">
                                    Aksi
                                </th>
                            </thead>
                            <tbody>
                                @foreach($pembina as $i=>$item)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{$item->nama}}</td>
                                    <td>{{$item->jk}}</td>


                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title-modal"></h5>
                    <button type="button" class="close tutup-modal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div>
                    <form action="{{route('Pembina.store')}}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="masukkan nama panggilan " required>
                                <div class="form-group">
                                    <label for="email">email</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="masukkan email" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">password</label>
                                    <input type="password" class="form-control" name="password" id="password"
                                        placeholder="masukkan password" required>
                                </div>
                                <p class="m-0">level</p>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="level" id="level1" value="paspa">
                                    <label class="form-check-label p-0" for="level1">Pembina Aspa</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="level" id="level1" value="paspi">
                                    <label class="form-check-label p-0" for="level1">Pembina Aspi</label>
                                </div>

                            </div>


                            {{-- @livewire('select') --}}



                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary tutup-modal"
                                    data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    @livewireScripts
    @endsection
