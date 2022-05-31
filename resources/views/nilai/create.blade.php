@extends('layouts.dasboard')
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
      integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

@section('content')
<div class="container">

    <div class="row">

        <form action="{{route('nilairata')}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
        {{-- <div style="overflow-x:auto;"> --}}
            <table class="table table-responsive table-bordered text-center " >
                <tr>
                    <th class="table-success"rowspan="5">No</th>
                    <th class="table-success"rowspan="5" >Nama</th>
                    <th class="table-success"rowspan="5">Jk</th>
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
                    <td>keterangan</td>
                    <td>folow up</td>
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
                    <td></td>
                    <td></td>

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
                    <td></td>
                    <td></td>
                </tr>
                @php
                $no = 0;
                @endphp
                @for($i = 0; $i < (count($data['nama'])); $i++)
                <tr class="small">
                 <th scope="row">{{ ++$no }}</th>
                <td>{{$data['nama'][$i]}}</td>
                <td>{{$data['jk'][$i]}}</td>
                <td>{{$data['kelas'][$i]}}</td>
                <td>{{$data['jurusan'][$i]}}</td>
                <td>{{$data['n1'][$i]}}</td>
                <td>{{$data['n2'][$i]}}</td>
                <td>{{$data['n3'][$i]}}</td>
                <td>{{$data['n4'][$i]}}</td>
                <td>{{$data['n5'][$i]}}</td>
                <td>{{$data['n6'][$i]}}</td>
                <td>{{$data['n7'][$i]}}</td>
                <td>{{$data['n8'][$i]}}</td>
                <td>{{$data['n9'][$i]}}</td>
                <td>{{$data['n10'][$i]}}</td>
                <td>{{$data['n11'][$i]}}</td>
                <td>{{$data['n12'][$i]}}</td>
                <td>{{$data['n13'][$i]}}</td>
                <td>{{$data['n14'][$i]}}</td>
                <td>{{$data['n15'][$i]}}</td>
                <td>{{$data['n16'][$i]}}</td>
                <td>{{$data['n17'][$i]}}</td>
                <td>{{$data['n18'][$i]}}</td>
                <td>{{$data['n19'][$i]}}</td>
                <td>{{$data['n20'][$i]}}</td>
                <td>{{$data['n21'][$i]}}</td>
                <td>{{$data['n22'][$i]}}</td>
                <td>{{$data['n23'][$i]}}</td>
                <td>{{$data['n24'][$i]}}</td>
                <td>{{$data['n25'][$i]}}</td>
                @php
                    $sukri =$data['n1'][$i];
                    $sukru = $data['n2'][$i];
                    $sakra =$data['n3'][$i];
                    $saka = $data['n4'][$i];
                    $sa=$data['n5'][$i];
                    $si=$data['n6'][$i];
                    $su=$data['n7'][$i];
                    $sii =$data['n8'][$i];
                    $sutejo=$data['n9'][$i];
                    $sys = $data['n10'];
                    $syss= $data['n11'][$i];
                    $syssa=$data['n12'][$i];
                    $ema=$data['n13'][$i];
                    $e=$data['n14'][$i];
                    $em=$data['n15'][$i];
                    $ayam=$data['n16'][$i];
                    $sas=$data['n17'][$i];
                    $dbj=$data['n18'][$i];
                    $jbf=$data['n19'][$i];
                    $kmfg=$data['n20'][$i];
                    $kdd=$data['n21'][$i];
                    $dnf=$data['n22'][$i];
                    $nsj=$data['n23'][$i];
                    $jsbd=$data['n24'][$i];
                    $hsdb=$data['n25'][$i] ;
                    // echo $sukri,$sukru;
                @endphp

            @if( $sukri <3 ||$sukru <3 ||$sakra <3 || $saka <3 || $sa <3 || $si <3 || $su <3 || $sii <3 || $sutejo <3|| $sys <3 || $syss <3 || $syssa <3 || $ema <3 ||
            $e <3 || $em <3 || $ayam <3 || $sas <3 || $dbj <3 || $jbf <3 || $kmfg <3 || $kdd <3|| $dnf <3 || $nsj <3 || $jsbd <3 || $hsdb <3  )

                        <input type="hidden" name="nama[]" value="{{$data['nama'][$i]}}">
                        <input type="hidden" name="jk[]" value="{{$data['jk'][$i]}}">
                        <input type="hidden" name="kelas[]" value="{{$data['kelas'][$i]}}">
                        <input type="hidden" name="jurusan[]" value="{{$data['jurusan'][$i]}}">
                        <td><textarea name="keterangan[]" class="form-control" type="text" style="width: 300px"></textarea></td>
                        <td><textarea name="folowup[]" class="form-control"type="text" style="width: 300px"></textarea></td>
                        {{-- <input type="hidden" name="id_nilaiawal[]" value="{{$data['id_nawal'][$i]}}"> --}}
                @else

                    <td>tidak ada</td>
                    <td>tidak ada</td>

                @endif
                @endfor
             </tr>
                  {{-- @foreach ($data as $k =>$siswa )
                <tr class="small">
                    <td>{{$siswa->nama[1]}}</td> --}}
                    {{-- <td>{{$siswa->kelas}}</td>
                    <td>{{$siswa->jurusan}}</td>
                    <td>{{$siswa->n1}}</td>
                    <td>{{$siswa->n2}}</td>
                    <td>{{$siswa->n3}}</td>
                    <td>{{$siswa->n4}}</td>
                    <td>{{$siswa->n5}}</td>
                    <td>{{$siswa->n6}}</td>
                    <td>{{$siswa->n7}}</td>
                    <td>{{$siswa->n8}}</td>
                    <td>{{$siswa->n9}}</td>
                    <td>{{$siswa->n10}}</td>
                    <td>{{$siswa->n11}}</td>
                    <td>{{$siswa->n12}}</td>
                    <td>{{$siswa->n13}}</td>
                    <td>{{$siswa->n14}}</td>
                    <td>{{$siswa->n15}}</td>
                    <td>{{$siswa->n16}}</td>
                    <td>{{$siswa->n17}}</td>
                    <td>{{$siswa->n18}}</td>
                    <td>{{$siswa->n19}}</td>
                    <td>{{$siswa->n20}}</td>
                    <td>{{$siswa->n21}}</td>
                    <td>{{$siswa->n22}}</td>
                    <td>{{$siswa->n23}}</td>
                    <td>{{$siswa->n24}}</td>
                    <td>{{$siswa->n25}}</td> --}}

                        {{-- @if($siswa->n1  || $siswa->n2  || $siswa->n3 || $siswa->n4 || $siswa->n5 || $siswa->n6 || $siswa->n7 || $siswa->n8 || $siswa->n9 || $siswa->n10 || $siswa->n11 || $siswa->n12 || $siswa->n13 || $siswa->n14 || $siswa->n15 || $siswa->n16 || $siswa->n17 || $siswa->n18 || $siswa->n19 || $siswa->n20 || $siswa->n21 || $siswa->n22 || $siswa->n23 || $siswa->n24 || $siswa->n25 < 3    )

                        <td><textarea name="keterangan[]" class="form-control" type="text" style="width: 300px"></textarea></td>
                        <td><textarea name="folowup[]" class="form-control"type="text" style="width: 300px"></textarea></td>
                        <input type="hidden" name="nama[]" value="{{$siswa->nama}}">
                        <input type="hidden" name="kelas[]" value="{{$siswa->kelas}}">
                        <input type="hidden" name="jurusan[]" value="{{$siswa->jurusan}}">
                        <input type="hidden" name="id_nilaiawal[]" value="{{$siswa->id_nawal}}">
                @else

                    <td>tidak ada</td>
                    <td>tidak ada</td>

                @endif --}}
                    {{-- </td> --}}



                {{-- </tr> --}}
                {{-- @empty
                <td colspan="10" class="table-active text-center">Tidak Ada Data</td> --}}
                 {{-- @endforeach --}}
            </table>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
            </form>

        </div>
        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
            crossorigin="anonymous"></script>


</div>
@endsection
