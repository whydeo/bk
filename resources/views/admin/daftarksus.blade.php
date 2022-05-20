@extends('layouts.dasboard')
@section('content')
@livewireStyles

<div class="container">

    <div class="row">
        <form action="{{route('carijurusan')}}" method="get">
            @csrf
            <div class="form-group w-100 mb-3">
                <label for="search" class="d-block mr-2">Pencarian by kelas</label>
                <select name="search" id="">
                   <option value="rpl">REKAYASA PERANGKAT LUNAK</option>
                   <option value="REKAYASA PERANGKAT LUNAK">REKAYASA PERANGKAT LUNAK</option>
                   <option value="REKAYASA PERANGKAT LUNAK">REKAYASA PERANGKAT LUNAK</option>
                   <option value="REKAYASA PERANGKAT LUNAK">REKAYASA PERANGKAT LUNAK</option>
                   <option value="REKAYASA PERANGKAT LUNAK">REKAYASA PERANGKAT LUNAK</option>
                </select>
                {{-- <input type="text" name="search" class="form-control w-75 d-inline" id="search" placeholder="Masukkan nama pegawai"> --}}
                <button type="submit" class="btn btn-primary mb-1">Cari</button>
            </div>
        </form>

        <form class="form" method="get" action="{{ route('carikelas') }}" role="carikleas">
            @csrf
                @livewire('carikelas')
                <button class="btn btn-primary" type="submit" id="button-addon2">Cari</button>
            </form>
            <br>
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
            @if ($message = Session::get('error'))
            <div class="alert alert-danger">
                <p>{{ $message }}</p>
            </div>
            @endif
        <hr>

        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <form class="form" method="get" action="{{ route('caribulan') }}">
                    <div class="form-group w-100 mb-3">
                        <label for="search" class="d-block mr-2">Pencarian berdasarkan Bulan</label>
                        <input type="month" name="search" class="form-control w-75 d-inline" id="search" placeholder="Masukkan nama pegawai">
                        <button type="submit" class="btn btn-primary mb-1">Cari</button>
                    </div>
                </form>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <form class="form" method="get" action="{{ route('carijk') }}">
                    <div class="form-group w-100 mb-3">
                        <label for="search" class="d-block mr-2">Pencarian berdasarkan asrama</label>
                        <select name="search" id="">
                            <option value="laki laki">ASRAMA PUTRA</option>
                            <option value="perempuan">ASRAMA PUTRI</option>
                         </select>
                        {{-- <input type="text" name="search" class="form-control w-75 d-inline" id="search" placeholder="Masukkan nama pegawai"> --}}
                        <button type="submit" class="btn btn-primary mb-1">Cari</button>
                    </div>
                </form>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
            </div>
        </div>

 {{-- <form action="" method='post' enctype='multipart/form-data'>
                @csrf --}}
    <table class="table  table-hover">
        <thead>
            <tr class="bg-primary" style="color:white">
                <th scope="col">#</th>
                <th scope="col">Nasssma</th>
                <th scope="col">kelas</th>
                <th scope="col">jk</th>
                <th scope="col">jurusan</th>
                <th scope="col">keterangan</th>
                <th scope="col">follow up</th>
                <th scope="col">bulan</th>
                <th scope="col">penilai</th>
                {{-- <th scope="col">Berhasil</th>  --}}
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no = 0;
                    @endphp
                        @forelse ($data as $key=> $datas )
                    <tr>
                {{-- @if (auth()->user()->name == $datas->penilai ) --}}
                <th scope="row">{{ ++$no }}</th>
                <td>{{ $datas->nama }}</td>
                <td>{{ $datas->kelas }}</td>
                <td>{{ $datas->jk }}</td>
                <td>{{ $datas->jurusan }}</td>
                <td>{{ $datas->keterangan }}</td>
                <td>{{ $datas->folowup }}</td>
                <td>{{ $datas->bulan }}</td>
                <td>{{ $datas->penilai}}</td>
                {{-- @endif --}}

                {{-- <td>{{ $siswa->siswa[$key]['id'] }}</td> --}}
                {{-- <td></td>
                <td></td>
                <td></td>
                <td>{{ round($siswa->Berkualitas) }}</td>
                <td>{{ round($siswa->Berbudi)  }}</td>
                <td>{{ round($siswa->Berdaya) }}</td>
                <td>{{ round($siswa->Berhasil) }}</td>
                <td> {{ round(($siswa->Berkualitas+ $siswa->Berbudi+$siswa->Berdaya+$siswa->Berkualitas)/ 4) }}
                </td>
                @if(($siswa->Berkualitas+ $siswa->Berbudi+$siswa->Berdaya+$siswa->Berkualitas)/ 4 <= 3 )


                        <td><textarea name="keterangan[]" class="form-control" type="text"></textarea></td>
                        <td><textarea name="folowup[]" class="form-control"type="text"></textarea></td>
                         <input type="hidden" name="id_poin"value="{{ $siswa->id_poin}}">
                        <input type="hidden"name="id_siswa" value="{{ $siswa->id_siswa}}">
                        <input type="hidden"name="id_guru" value="{{ $siswa->id_guru}}">
                @else

                    <td>tidak ada</td>
                    <td>tidak ada</td>

                @endif --}}
            </tr>
            @empty
            <td colspan="10" class="table-active text-center">Tidak Ada Data</td>
            @endforelse
        </tbody>
    </table>
    {{-- <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Simpan</button>
        </div> --}}
                  {{-- </form> --}}
                  @livewireScripts
</div>
@endsection
