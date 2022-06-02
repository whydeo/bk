@extends('layouts.dasboard')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

{{-- ini buat print  --}}

{{-- ini buat print  --}}


@section('content')

@livewireStyles

<div class="container">

    <div class="row">
        <form action="{{route('carijsn')}}" method="get">
            @csrf
        <div class="input-group mb-1">
            <div class="input-group-prepend">
                <button type="submit" class="btn btn-primary mb-1">Cari</button> </div>
            <select name="search" class="custom-select " id="inputGroupSelect01">
              <option selected>PILIH JURUSAN</option>
              <option value="REKAYASA PERANGKAT LUNAK">REKAYASA PERANGKAT LUNAK</option>
              <option value="MULTIMEDIA">MULTIMEDIA</option>
              <option value="BISNIS KONSTRUKSI PROPERTI">BISNIS KONSTRUKSI PROPERTI</option>
              <option value="TATABOGA">TATABOGA</option>
              <option value="TEKNIK KENDARAAN RINGAN OTOMOTIF">TEKNIK KENDARAAN RINGAN OTOMOTIF</option>

            </select>
          </div>
        </form>
        <div class="container">
            <form class="form" method="get" action="{{ route('nilai') }}" role="carikleas">
                @csrf
                @livewire('carikelas')
                <button class="btn btn-primary" type="submit" id="button-addon2">Cari</button>
                </form>
        </div>
            {{-- <br> --}}
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
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <form class="form" method="get" action="{{ route('cariblan') }}">
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

            </div>

        <hr>


        <br>
        <br>

        <div id="dvContents" >
            <table cellspacing="0" rules="all" border="1"class="table table-responsive table-bordered text-center ">

            <tr>
                <th class="table-success"rowspan="5">No</th>
                <th class="table-success"rowspan="5" >Nama</th>
                {{-- <th class="table-success"rowspan="5">Jk</th> --}}
                <th class="table-success"rowspan="5">Kelas</th>
                <th class="table-success"rowspan="5">Jurusan</th>

            </tr>
            <tr>
                <!-- <th class="table-secondary text-center" colspan="4">1</th> -->

            </tr>
            <tr class="table-success text-center">
                <td class="small" colspan="6">Berbudi</td>
                <td class="small" colspan="6">Berkualitas</td>
                <td class="small" colspan="6">Berdaya</td>
                <td class="small" colspan="7">Berhasil</td>

            </tr>
            <tr class="table-warning small text-center">
                <td colspan="2">Relasi Dengan Tuhan</td>
                <td colspan="2">Berhati Tulus </td>
                <td colspan="2">Menjauhi Kejahatan </td>
                <td colspan="2">Bertanggung-jawab </td>
                <td colspan="2">Disiplin </td>
                <td colspan="2">Jujur </td>
                <td colspan="2">Kreatif </td>
                <td colspan="2">Inovatif </td>
                <td colspan="2">Antusias </td>
                <td colspan="3">Berintegritas & Dapat dipercaya
                </td>
                <td colspan="2">Menjadi Teladan
                </td>
                <td colspan="2">Kerendahan Hati
                </td>


            </tr>
            <tr class="table-success small">
                {{-- <td ></td> --}}

                {{-- <td > </td> --}}
                <td>Menjalankan kewajiban ibadah(
                    sholat jumat untuk muslim, dan ibadah gereja untuk kristen)</td>
                <td>Menjaga Kesucian Hidup(
                    Tidak melanggar norma/pergaulan melampaui batas) </td>
                <td>Memperhatikan orang lain seperti diri sendiri ingin diperlakukan oleh orang lain
                </td>
                <td>Tidak membalas kejahatan dengan kejahatan
                </td>
                <td>Tidak melakukan hal-hal yang jahat di saat sendirian maupun berkelompok
                </td>
                <td> Tidak melakukan hal-hal yang mencelakakan dan merugikan orang lain
                </td>
                <td>Melaksanakan semua tugas tepat seperti yang diperintahkan dengan tuntas
                </td>
                <td>Siap & bersedia menerima semua konsekuensi akan tindakan dan hasil kerja yang dihasilkan
                </td>
                <td> Mentaati semua peraturan yang sudah ditentukan dengan konsisten
                </td>
                <td>Mentaati setiap kegiatan sekolah & asrama yang ditentukan dengan konsisten
                </td>
                <td> Berani berbicara tentang kebenaran dengan konsisten
                </td>
                <td>Berani bertindak benar dengan konsisten
                </td>
                <td> Mampu beradaptasi dalam setiap kondisi
                </td>
                <td>Memiliki solusi dalam masalah
                </td>
                <td>Rajin belajar sesuatu hal yang baru, baik dan berguna bagi diri sendiri dan sekitar
                </td>
                <td>Menghargai Waktu
                </td>
                <td>Mengembangkan kemampuan diri secara maximal, sehingga bisa menjadi berkat bagi orang lain
                </td>
                <td> Membawa diri sendiri & lingkungan sekitar ke arah yang lebih baik (menjadi agen perubahan)
                </td>
                <td>Keselarasan antara pikiran, perkataan & perbuatan
                </td>
                <td>Menjadi pribadi yang bisa dipercaya orang lain
                </td>
                <td>Bertanggung jawab & memelihara barang-barang yayasan yang dipinjamkan
                </td>
                <td>Menjadi contoh & teladan yang baik bagi orang lain
                </td>
                <td>Membangun sebuah komunikasi yang baik, sehat, saling membangun, manasehati, menguatkan satu dengan yang lain
                </td>
                <td>Tunduk pada Otoritas yang ada
                </td>
                <td>Menerima kondisi pribadi dengan hati bersyukur
                </td>

            </tr>
            @php
            $no = 0;
            @endphp
            @foreach($data as $key => $value)


            <tr class="small">
             <th scope="row">{{ ++$no }}</th>
            <td>{{$value->nama}}</td>
            {{-- <td>{{$value->jk}}</td> --}}
            <td>{{$value->kelas}}</td>
            <td>{{$value->jurusan}}</td>
            <td>{{$value->n1}}</td>
            <td>{{$value->n2}}</td>
            <td>{{$value->n3}}</td>
            <td>{{$value->n4}}</td>
            <td>{{$value->n5}}</td>
            <td>{{$value->n6}}</td>
            <td>{{$value->n7}}</td>
            <td>{{$value->n8}}</td>
            <td>{{$value->n9}}</td>
            <td>{{$value->n10}}</td>
            <td>{{$value->n11}}</td>
            <td>{{$value->n12}}</td>
            <td>{{$value->n13}}</td>
            <td>{{$value->n14}}</td>
            <td>{{$value->n15}}</td>
            <td>{{$value->n16}}</td>
            <td>{{$value->n17}}</td>
            <td>{{$value->n18}}</td>
            <td>{{$value->n19}}</td>
            <td>{{$value->n20}}</td>
            <td>{{$value->n21}}</td>
            <td>{{$value->n22}}</td>
            <td>{{$value->n23}}</td>
            <td>{{$value->n24}}</td>
            <td>{{$value->n25}}</td>
            @endforeach
        </tr>
        </table>

    <br />
    <input type="button" onclick="PrintTable();" value="Print" />
 @livewireScripts
</div>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
crossorigin="anonymous"></script>
@endsection
