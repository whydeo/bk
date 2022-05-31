<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>Tabel Rekap</title>
</head>

<style id = "table_style" type="text/css">
    body
    {
        font-family: Arial;
        font-size: 12pt;
        display: block;   /* Not really needed in all cases */
        position: relative;
        width: auto;
        height: auto;
        overflow: visible;
    }
    table
    {
        border: 1px solid #ccc;
        border-collapse: collapse;
    }
    table th
    {
        background-color: #f8f8f4;
        color: #333;
        font-weight: bold;
    }
    table th, table td
    {
        padding: 5px;
        border: 1px solid #ccc;
    }
</style>
<script type="text/javascript">
    function PrintTable() {
        var printWindow = window.open('', '', 'height=200,width=400');
        printWindow.document.write('<html><head><title>Table Contents</title>');

        //Print the Table CSS.
        var table_style = document.getElementById("table_style").innerHTML;
        printWindow.document.write('<style type = "text/css">');
        printWindow.document.write(table_style);
        printWindow.document.write('</style>');
        printWindow.document.write('</head>');

        //Print the DIV contents ie. the HTML Table.
        printWindow.document.write('<body>');
        var divContents = document.getElementById("dvContents").innerHTML;
        printWindow.document.write(divContents);
        printWindow.document.write('</body>');

        printWindow.document.write('</html>');
        printWindow.document.close();
        printWindow.print();
    }
</script>
{{-- ini buat print  --}}

<body>
    <div class="container" id="dvContents">
        <br>
        <br>
        <table class="table table-bordered " id="printTable">
        <b><center>RAPORT KARAKTER SISWA TAHUN PELAJARAN 2021/2022</center></b>
        <br>
        <br>
        <b>Nama Siswa: {{$data[0]->nama}}</b>
        <br>
        <b>Kelas: {{$data[0]->kelas}}</b>
        <br>
        <b>Semester :{{$data[0]->semester}}</b>
        <br>
        <br>
            <tr>
                <th  >No</th>
                <th >Faktor Penilaian Karakter</th>
                <th >Belum berkembang</th>
                <th >Mulai Berkembang</th>
                <th >Sudah Berkembang</th>
                <th >Membudaya</th>
            </tr>

            <tr class="table text-center" style="background-color : khaki" >
                <td>I</td>
                <td colspan="5">Berbudi = Takut akan Tuhan</td>

            </tr>
            <tr class="table small text-center"  style="background-color:darkseagreen">
                <td>A.</td>
                <td>Relasi Dengan Tuhan</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr class=" small">
                <td>1</td>
                <td>Menjalankan kewajiban ibadah(
                    sholat jumat untuk muslim, dan ibadah gereja untuk kristen)</td>
                    <td> @if($data[0]->n1 == 1) v @endif</td>
                    <td>@if($data[0]->n1 == 2) v @endif</td>
                    <td>@if($data[0]->n1 == 3) v @endif</td>
                    <td>@if($data[0]->n1 == 4) v @endif</td>
            </tr>
            <tr class=" small">
                <td>2</td>
                <td>Menjaga Kesucian Hidup(
                    Tidak melanggar norma/pergaulan melampaui batas) </td>
                    <td> @if($data[0]->n2 == 1) v @endif</td>
                    <td>@if($data[0]->n2 == 2) v @endif</td>
                    <td>@if($data[0]->n2 == 3) v @endif</td>
                    <td>@if($data[0]->n2 == 4) v @endif</td>
            </tr>
            <tr class="table small text-center"  style="background-color:darkseagreen" >
                <td>B.</td>
                <td>Berhati Tulus</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
            </tr>
            <tr class=" small">
                <td>1</td>
                <td>Memperhatikan orang lain seperti diri sendiri ingin diperlakukan oleh orang lain
                </td>
                <td> @if($data[0]->n3 == 1) v @endif</td>
                    <td>@if($data[0]->n3 == 2) v @endif</td>
                    <td>@if($data[0]->n3 == 3) v @endif</td>
                    <td>@if($data[0]->n3 == 4) v @endif</td>
            </tr>
            <tr class=" small">
                <td>2</td>
                <td>Tidak membalas kejahatan dengan kejahatan</td>
                <td> @if($data[0]->n4 == 1) v @endif</td>
                <td>@if($data[0]->n4 == 2) v @endif</td>
                <td>@if($data[0]->n4 == 3) v @endif</td>
                <td>@if($data[0]->n4 == 4) v @endif</td>
            </tr>
            <tr class="table small text-center"  style="background-color:darkseagreen">
                <td>C.</td>
                <td>Menjauhi Kejahatan</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr class=" small">
                <td>1</td>
                <td>Tidak melakukan hal-hal yang jahat di saat sendirian maupun berkelompok</td>
                <td> @if($data[0]->n5 == 1) v @endif</td>
                <td>@if($data[0]->n5 == 2) v @endif</td>
                <td>@if($data[0]->n5 == 3) v @endif</td>
                <td>@if($data[0]->n5 == 4) v @endif</td>
            </tr>
            <tr class=" small">
                <td>2</td>
                <td> Tidak melakukan hal-hal yang mencelakakan dan merugikan orang lain</td>
                <td> @if($data[0]->n6 == 1) v @endif</td>
                <td>@if($data[0]->n6 == 2) v @endif</td>
                <td>@if($data[0]->n6 == 3) v @endif</td>
                <td>@if($data[0]->n6 == 4) v @endif</td>
            </tr>
            <tr class="table text-center" style="background-color : khaki">
                <td>II</td>
                <td colspan="5">Berkualitas</td>

            </tr>
            <tr class="table small text-center"  style="background-color:darkseagreen">
                <td>A.</td>
                <td>Bertanggung jawab</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr class=" small">
                <td>1</td>
                <td>Tidak melakukan hal-hal yang jahat di saat sendirian maupun berkelompok</td>
                <td> @if($data[0]->n7 == 1) v @endif</td>
                <td>@if($data[0]->n7 == 2) v @endif</td>
                <td>@if($data[0]->n7 == 3) v @endif</td>
                <td>@if($data[0]->n7 == 4) v @endif</td>
            </tr>
            <tr class=" small">
                <td>2</td>
                <td> Tidak melakukan hal-hal yang mencelakakan dan merugikan orang lain</td>
                <td> @if($data[0]->n8 == 1) v @endif</td>
                <td>@if($data[0]->n8 == 2) v @endif</td>
                <td>@if($data[0]->n8 == 3) v @endif</td>
                <td>@if($data[0]->n8 == 4) v @endif</td>
            </tr>
            <tr class="table small text-center"  style="background-color:darkseagreen">
                <td>B.</td>
                <td>Disiplin</td>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
            </tr>
            <tr class=" small">
                <td>1</td>
                <td>Melaksanakan semua tugas tepat seperti yang diperintahkan dengan tuntas </td>
                <td> @if($data[0]->n9 == 1) v @endif</td>
                <td>@if($data[0]->n9 == 2) v @endif</td>
                <td>@if($data[0]->n9 == 3) v @endif</td>
                <td>@if($data[0]->n9 == 4) v @endif</td>
            </tr>
            <tr class=" small">
                <td>2</td>
                <td>Siap & bersedia menerima semua konsekuensi akan tindakan dan hasil kerja yang dihasilkan  </td>
                <td> @if($data[0]->n10 == 1) v @endif</td>
                <td>@if($data[0]->n10 == 2) v @endif</td>
                <td>@if($data[0]->n10 == 3) v @endif</td>
                <td>@if($data[0]->n10 == 4) v @endif</td>
            </tr>
            <tr class="table small text-center"  style="background-color:darkseagreen">
                <td>C.</td>
                <td>Jujur</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr class=" small">
                <td>1</td>
                <td> Berani berbicara tentang kebenaran dengan konsisten</td>
                <td> @if($data[0]->n11 == 1) v @endif</td>
                <td>@if($data[0]->n11 == 2) v @endif</td>
                <td>@if($data[0]->n11 == 3) v @endif</td>
                <td>@if($data[0]->n11 == 4) v @endif</td>
            </tr>
            <tr class=" small">
                <td>2</td>
                <td>Bertindak benar dengan konsisten</td>
                <td> @if($data[0]->n12 == 1) v @endif</td>
                <td>@if($data[0]->n12 == 2) v @endif</td>
                <td>@if($data[0]->n12 == 3) v @endif</td>
                <td>@if($data[0]->n12 == 4) v @endif</td>
            </tr>




            <tr class="table text-center" style="background-color : khaki">
                <td>III</td>
                <td colspan="5">Berdaya</td>

            </tr>
            <tr class="table small text-center"  style="background-color:darkseagreen">
                <td>A.</td>
                <td>Kreatif</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr class=" small">
                <td>1</td>
                <td> Mampu beradaptasi dalam setiap situasi  </td>
                <td> @if($data[0]->n13 == 1) v @endif</td>
                <td>@if($data[0]->n13 == 2) v @endif</td>
                <td>@if($data[0]->n13 == 3) v @endif</td>
                <td>@if($data[0]->n13 == 4) v @endif</td>
            </tr>
            <tr class=" small">
                <td>2</td>
                <td> Memiliki solusi dalam masalah</td>
                <td> @if($data[0]->n14== 1) v @endif</td>
                <td>@if($data[0]->n14== 2) v @endif</td>
                <td>@if($data[0]->n14== 3) v @endif</td>
                <td>@if($data[0]->n14== 4) v @endif</td>
            </tr>
            <tr class="table small text-center"  style="background-color:darkseagreen">
                <td>B.</td>
                <td>Inovatif</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr class=" small">
                <td>1</td>
                <td>Rajin belajar sesuatu hal yang baru, baik dan berguna bagi diri sendiri dan sekitar</td>
                <td> @if($data[0]->n15 == 1) v @endif</td>
                <td>@if($data[0]->n15 == 2) v @endif</td>
                <td>@if($data[0]->n15 == 3) v @endif</td>
                <td>@if($data[0]->n15 == 4) v @endif</td>
            </tr>
            <tr class=" small">
                <td>2</td>
                <td>Menghargai Waktu</td>
                <td> @if($data[0]->n16 == 1) v @endif</td>
                <td>@if($data[0]->n16 == 2) v @endif</td>
                <td>@if($data[0]->n16 == 3) v @endif</td>
                <td>@if($data[0]->n16 == 4) v @endif</td>
            </tr>
            <tr class="table small text-center"  style="background-color:darkseagreen">
                <td>C.</td>
                <td>Antusias</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr class=" small">
                <td>1</td>
                <td>Mengembangkan kemampuan diri secara maximal, sehingga bisa menjadi berkat bagi orang lain</td>
                <td> @if($data[0]->n17 == 1) v @endif</td>
                <td>@if($data[0]->n17 == 2) v @endif</td>
                <td>@if($data[0]->n17 == 3) v @endif</td>
                <td>@if($data[0]->n17 == 4) v @endif</td>
                {{-- <td></td> --}}
            </tr>
            <tr class=" small">
                <td>2</td>
                <td> Membawa diri sendiri & lingkungan sekitar ke arah yang lebih baik (menjadi agen perubahan) </td>
                <td> @if($data[0]->n18 == 1) v @endif</td>
                <td>@if($data[0]->n18 == 2) v @endif</td>
                <td>@if($data[0]->n18 == 3) v @endif</td>
                <td>@if($data[0]->n18 == 4) v @endif</td>
            </tr>

            <tr class="table text-center" style="background-color : khaki">
                <td>IV</td>
                <td colspan="5">Berhasil = Berkenan di hadapan Tuhan & manusia</td>

            </tr>
            <tr class="table small text-center"  style="background-color:darkseagreen">
                <td>A.</td>
                <td>Memiliki Integritas / Dapat dipercaya</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr class=" small">
                <td>1</td>
                <td>Keselarasan antara pikiran, perkataan & perbuatan </td>
                <td> @if($data[0]->n19 == 1) v @endif</td>
                <td>@if($data[0]->n19 == 2) v @endif</td>
                <td>@if($data[0]->n19 == 3) v @endif</td>
                <td>@if($data[0]->n19 == 4) v @endif</td>
            </tr>
            <tr class=" small">
                <td>2</td>
                <td>Menjadi pribadi yang bisa dipercaya orang lain </td>
                <td> @if($data[0]->n20 == 1) v @endif</td>
                <td>@if($data[0]->n20 == 2) v @endif</td>
                <td>@if($data[0]->n20 == 3) v @endif</td>
                <td>@if($data[0]->n20 == 4) v @endif</td>
            </tr>
            <tr class=" small">
                <td>3</td>
                <td>Bertanggung jawab & memelihara barang-barang yayasan yang dipinjamkan</td>
                <td> @if($data[0]->n21 == 1) v @endif</td>
                <td>@if($data[0]->n21 == 2) v @endif</td>
                <td>@if($data[0]->n21 == 3) v @endif</td>
                <td>@if($data[0]->n21 == 4) v @endif</td>
            </tr>
            <tr class="table small text-center"  style="background-color:darkseagreen">
                <td>B.</td>
                <td>Menjadi teladan</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr class=" small">
                <td>1</td>
                <td>Menjadi contoh & teladan yang baik bagi orang lain </td>
                <td> @if($data[0]->n22 == 1) v @endif</td>
                <td>@if($data[0]->n22 == 2) v @endif</td>
                <td>@if($data[0]->n22 == 3) v @endif</td>
                <td>@if($data[0]->n22 == 4) v @endif</td>
            </tr>
            <tr class=" small">
                <td>2</td>
                <td>Membangun sebuah komunikasi yang baik, sehat, saling membangun, manasehati, menguatkan satu dengan yang lain</td>
                <td> @if($data[0]->n23 == 1) v @endif</td>
                <td>@if($data[0]->n23 == 2) v @endif</td>
                <td>@if($data[0]->n23 == 3) v @endif</td>
                <td>@if($data[0]->n23 == 4) v @endif</td>
            </tr>
            <tr class="table small text-center"  style="background-color:darkseagreen">
                <td>C.</td>
                <td>Kerendahan hati</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

            </tr>
            <tr class=" small">
                <td>1</td>
                <td>Tunduk pada Otoritas yang ada </td>
                <td> @if($data[0]->n24 == 1) v @endif</td>
                <td>@if($data[0]->n24 == 2) v @endif</td>
                <td>@if($data[0]->n24 == 3) v @endif</td>
                <td>@if($data[0]->n24 == 4) v @endif</td>

            </tr>
            <tr class=" small">
                <td>2</td>
                <td>Menerima kondisi pribadi dengan hati bersyukur</td>
                <td> @if($data[0]->n25 == 1) v @endif</td>
                <td>@if($data[0]->n25 == 2) v @endif</td>
                <td>@if($data[0]->n25 == 3) v @endif</td>
                <td>@if($data[0]->n25 == 4) v @endif</td>

            </tr>








            </tr>
        </table>
    </div>

    <center><input type="button" onclick="PrintTable();" value="Print" /></center>
    {{-- <button onclick="window.print()">Print this page</button> --}}
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->

</body>

</html>
