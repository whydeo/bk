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
 {{-- <form action="" method='post' enctype='multipart/form-data'>
                @csrf --}}
    <table class="table  table-hover">
        <thead>
            <tr class="bg-primary" style="color:white">
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">kelas</th>
                <th scope="col">jk</th>
                <th scope="col">jurusan</th>
                <th scope="col">keterangan</th>
                <th scope="col">follow up</th>
                <th scope="col">bulan</th>
                {{-- <th scope="col">Berhasil</th>  --}} 
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no = 0;
                    @endphp
                        @forelse ($data as $key=> $datas )
                    <tr>
                @if (auth()->user()->name == $datas->penilai )
                <th scope="row">{{ ++$no }}</th>
                <td>{{ $datas->nama }}</td>
                <td>{{ $datas->kelas }}</td>
                <td>{{ $datas->jk }}</td>
                <td>{{ $datas->jurusan }}</td>
                <td>{{ $datas->keterangan }}</td>
                <td>{{ $datas->folowup }}</td>
                <td>{{ $datas->bulan }}</td>
                @endif

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

</div>
@endsection
