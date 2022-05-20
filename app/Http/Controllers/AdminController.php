<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nilairata;
use App\Models\nilaiawal;
use App\Models\ratarata;
use DB;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user = auth()->user()->name;
        $data= nilairata::get();
        // dd($data);
        return view('admin.daftarksus',compact ('data'));

    }


    public function carijurusan(Request $request)
    {
        $keyword = $request->search;

        $data = nilairata::where('jurusan', 'like', "%" . $keyword . "%")->paginate(5);
        // dd($data);
        return view('admin.daftarksus',compact ('data'));

    }

    public function caribulan(Request $request)
    {
        $keyword = $request->search;

        $data = nilairata::where('bulan', 'like', "%" . $keyword . "%")->paginate(5);
        // dd($data);
        return view('admin.daftarksus',compact ('data'));

    }
    public function carijk(Request $request)
    {
        $keyword = $request->search;

        $data = nilairata::where('jk', 'like', "%" . $keyword . "%")->paginate(5);
        // dd($data);
        return view('admin.daftarksus',compact ('data'));

    }
    public function carikelas(Request $request)
    {
        $kelas =$request->kelas;
        $jurusan =$request->jurusan;
        if ($kelas==1) {
            $kel ='X';
        }
        elseif ($kelas==2) {
            $kel ='XI';
        }
        elseif ($kelas==3) {
            $kel ='XII';
        }
        else{

        }

        if ($jurusan==  1) {
            $jur ='Rekayasa Perangkat Lunak';
        }
        elseif ($jurusan==2) {
            $jur ='Multimedia';
        }
        elseif ($jurusan==3) {
            $jur ='Bisnis Konstruksi Dan Properti';
        }
        elseif ($jurusan==4) {
            $jur ='Teknik Kendaraan Ringan dan Otomotif';
        }
        elseif ($jurusan==5) {
            $jur ='Tata Boga';
        }
        else{
        }

        // $siswas = DB::table('siswas')->where([['kelas', $kel],['jurusan', $jur]])->get();
        $data = DB::table('nilairatas')
                ->where('kelas',$kel)
                ->where('jurusan',$jur)
                ->get();

        // $siswa = siswa::paginate(30);
        return view('admin.daftarksus',compact('data'));
    }

    public function nilairatas(){
        $kel='XII';
        $jur='MULTIMEDIA';
        // $data= nilaiawal::where('kelas',$tes);
        $data = DB::table('nilaiawals')
                ->where('kelas',$kel)
                // ->where('jurusan',$jur)
                ->get();

                // dd($data);
                class Nilai {
                    public $kumpulan;
                }
                for ($i=1; $i <= 25 ; $i++){
                    $jml= DB::table('bandings')
                    ->where('kelas',$kel)
                    ->where('jurusan', $jur)
                    ->value('jml_siswa');
                    // dd($jml);
                    $kumpulan.''.$i = [];
                    for ($j=0; $j < $jml; $j++) {
                        for ($h=0; $h < count($data) ; $h++) {
                            $nilaike = 'n'.''.$i;
                            if ($data[$h]->nama == $data[$j]->nama) {
                                $rata2 = 0;
                                $jmlnilaii = 0;

                                $rata2 = $rata2 + $data[$h]->$nilaike;
                                $jmlnilaii++;

                                $rataakhir = $rata2 / $jmlnilaii;

                            }
                        }
                        array_push($kumpulan, $rataakhir);
                        // dd($nilai);
                    }

                // 'n1'=>$inputan['n1'][$i],
                // 'n2'=>$inputan['n2'][$i],
                // 'n3'=>$inputan['n3'][$i],
                // 'n4'=>$inputan['n4'][$i],
                // 'n5'=>$inputan['n5'][$i],
                // 'n6'=>$inputan['n6'][$i],
                // 'n7'=>$inputan['n7'][$i],
                // 'n8'=>$inputan['n8'][$i],
                // 'n9'=>$inputan['n9'][$i],
                // 'n10'=>$inputan['n10'][$i],
                // 'n11'=>$inputan['n11'][$i],
                // 'n12'=>$inputan['n12'][$i],
                // 'n13'=>$inputan['n13'][$i],
                // 'n14'=>$inputan['n14'][$i],
                // 'n15'=>$inputan['n15'][$i],
                // 'n16'=>$inputan['n16'][$i],
                // 'n17'=>$inputan['n17'][$i],
                // 'n18'=>$inputan['n18'][$i],
                // 'n19'=>$inputan['n19'][$i],
                // 'n20'=>$inputan['n20'][$i],
                // 'n21'=>$inputan['n21'][$i],
                // 'n22'=>$inputan['n22'][$i],
                // 'n23'=>$inputan['n23'][$i],
                // 'n24'=>$inputan['n24'][$i],
                // 'n25'=>$inputan['n25'][$i],
                // 'penilai'=>$users,
                // 'bulan'=>$bln,


            // ]);


        // $data= nilaiawal::get();
        // dd($data);


        // $datas1=[];
        // foreach ($data as $key => $value) {
        //     $tes=$value->kelas;
        //     $t=$value->jurusan;
        //     $data = DB::table('bandings')
        //     ->where('kelas',$tes)
        //     ->where('jurusan',$t)
        //     ->value('banding');
        //     $ta= banding::get();

            // dd(($value->n1+$value->n2+$value->n3+$value->n4+$value->n5+$value->n6+$value->n7+$value->n8+$value->n9+$value->n10+$value->n11+$value->n12+$value->n13+$value->n14+$value->n15+$value->n16+$value->n17+$value->n18+$value->n19+$value->n20+$value->n21+$value->n23+$value->n24+$value->n25) / 25);
            //  $datas1['Berkualitas'][$key] =;
            // if ($value->kelas == 'X' && $value->jurusan == 'REKAYASA PERANGKAT LUNAK') {

            //     $datas1['rata'][$key] =(($value->n1+$value->n2+$value->n3+$value->n4+$value->n5+$value->n6+$value->n7+$value->n8+$value->n9+$value->n10+$value->n11+$value->n12+$value->n13+$value->n14+$value->n15+$value->n16+$value->n17+$value->n18+$value->n19+$value->n20+$value->n21+$value->n23+$value->n24+$value->n25) / 25 /$data);
            //     // $datas1['nama'][$key]=count($value->n1);
            //     $datas1['nama'][$key]=$value['nama'];
            //     $datas1['kelas'][$key]=$value['kelas'];
            //     $datas1['jurusan'][$key]=$value['jurusan'];
            //     $datas1['jk'][$key]=$value['jk'];
            //     $datas1['bulan'][$key]=$value['bulan'];
            // }
            // elseif ($value->kelas == 'X' && $value->jurusan == 'MULTIMEDIA' ) {

            //     $datas1['rata'][$key] =(($value->n1+$value->n2+$value->n3+$value->n4+$value->n5+$value->n6+$value->n7+$value->n8+$value->n9+$value->n10+$value->n11+$value->n12+$value->n13+$value->n14+$value->n15+$value->n16+$value->n17+$value->n18+$value->n19+$value->n20+$value->n21+$value->n23+$value->n24+$value->n25) / 25 /$data);
            //     $datas1['nama'][$key]=$value['nama'];
            //     $datas1['kelas'][$key]=$value['kelas'];
            //     $datas1['jurusan'][$key]=$value['jurusan'];
            //     $datas1['jk'][$key]=$value['jk'];
            //      $datas1['bulan'][$key]=$value['bulan'];
            // }
            // elseif ($value->kelas == 'X' && $value->jurusan == 'BISNIS KONSTRUKSI DAN PROPERTI' ) {

            //     $datas1['rata'][$key] =(($value->n1+$value->n2+$value->n3+$value->n4+$value->n5+$value->n6+$value->n7+$value->n8+$value->n9+$value->n10+$value->n11+$value->n12+$value->n13+$value->n14+$value->n15+$value->n16+$value->n17+$value->n18+$value->n19+$value->n20+$value->n21+$value->n23+$value->n24+$value->n25) / 25 /$data);
            //     $datas1['nama'][$key]=$value['nama'];
            //     $datas1['kelas'][$key]=$value['kelas'];
            //     $datas1['jurusan'][$key]=$value['jurusan'];
            //     $datas1['jk'][$key]=$value['jk'];
            //      $datas1['bulan'][$key]=$value['bulan'];
            // }
            // elseif ($value->kelas == 'X' && $value->jurusan == 'TATABOGA' ){
            //     $datas1['rata'][$key] =(($value->n1+$value->n2+$value->n3+$value->n4+$value->n5+$value->n6+$value->n7+$value->n8+$value->n9+$value->n10+$value->n11+$value->n12+$value->n13+$value->n14+$value->n15+$value->n16+$value->n17+$value->n18+$value->n19+$value->n20+$value->n21+$value->n23+$value->n24+$value->n25) / 25 /$data);
            //     $datas1['nama'][$key]=$value['nama'];
            //     $datas1['kelas'][$key]=$value['kelas'];
            //     $datas1['jurusan'][$key]=$value['jurusan'];
            //     $datas1['jk'][$key]=$value['jk'];
            //      $datas1['bulan'][$key]=$value['bulan'];
            // }
            // elseif ($value->kelas == 'X' && $value->jurusan == 'TEKNIK KENDARAAN RINGAN OTOMOTIF' ) {

            //     $datas1['rata'][$key] =(($value->n1+$value->n2+$value->n3+$value->n4+$value->n5+$value->n6+$value->n7+$value->n8+$value->n9+$value->n10+$value->n11+$value->n12+$value->n13+$value->n14+$value->n15+$value->n16+$value->n17+$value->n18+$value->n19+$value->n20+$value->n21+$value->n23+$value->n24+$value->n25) / 25 /$data);
            //     $datas1['nama'][$key]=$value['nama'];
            //     $datas1['kelas'][$key]=$value['kelas'];
            //     $datas1['jurusan'][$key]=$value['jurusan'];
            //     $datas1['jk'][$key]=$value['jk'];
            //      $datas1['bulan'][$key]=$value['bulan'];
            // }
            // if ($value->kelas == 'XI' && $value->jurusan == 'REKAYASA PERANGKAT LUNAK' ) {

            //     $datas1['rata'][$key] =(($value->n1+$value->n2+$value->n3+$value->n4+$value->n5+$value->n6+$value->n7+$value->n8+$value->n9+$value->n10+$value->n11+$value->n12+$value->n13+$value->n14+$value->n15+$value->n16+$value->n17+$value->n18+$value->n19+$value->n20+$value->n21+$value->n23+$value->n24+$value->n25) / 25 /$data);
            //     $datas1['nama'][$key]=$value['nama'];
            //     $datas1['kelas'][$key]=$value['kelas'];
            //     $datas1['jurusan'][$key]=$value['jurusan'];
            //     $datas1['jk'][$key]=$value['jk'];
            //      $datas1['bulan'][$key]=$value['bulan'];
            // }
            // elseif ($value->kelas == 'XI' && $value->jurusan == 'MULTIMEDIA' ) {

            //     $datas1['rata'][$key] =(($value->n1+$value->n2+$value->n3+$value->n4+$value->n5+$value->n6+$value->n7+$value->n8+$value->n9+$value->n10+$value->n11+$value->n12+$value->n13+$value->n14+$value->n15+$value->n16+$value->n17+$value->n18+$value->n19+$value->n20+$value->n21+$value->n23+$value->n24+$value->n25) / 25 /$data);
            //     $datas1['nama'][$key]=$value['nama'];
            //     $datas1['kelas'][$key]=$value['kelas'];
            //     $datas1['jurusan'][$key]=$value['jurusan'];
            //     $datas1['jk'][$key]=$value['jk'];
            //      $datas1['bulan'][$key]=$value['bulan'];
            // }
            // elseif ($value->kelas == 'XI' && $value->jurusan == 'BISNIS KONSTRUKSI DAN PROPERTI' ) {

            //     $datas1['rata'][$key] =(($value->n1+$value->n2+$value->n3+$value->n4+$value->n5+$value->n6+$value->n7+$value->n8+$value->n9+$value->n10+$value->n11+$value->n12+$value->n13+$value->n14+$value->n15+$value->n16+$value->n17+$value->n18+$value->n19+$value->n20+$value->n21+$value->n23+$value->n24+$value->n25) / 25 /$data);
            //     $datas1['nama'][$key]=$value['nama'];
            //     $datas1['kelas'][$key]=$value['kelas'];
            //     $datas1['jurusan'][$key]=$value['jurusan'];
            //     $datas1['jk'][$key]=$value['jk'];
            //      $datas1['bulan'][$key]=$value['bulan'];
            // }
            // elseif ($value->kelas == 'XI' && $value->jurusan == 'TATABOGA' ) {

            //     $datas1['rata'][$key] =(($value->n1+$value->n2+$value->n3+$value->n4+$value->n5+$value->n6+$value->n7+$value->n8+$value->n9+$value->n10+$value->n11+$value->n12+$value->n13+$value->n14+$value->n15+$value->n16+$value->n17+$value->n18+$value->n19+$value->n20+$value->n21+$value->n23+$value->n24+$value->n25) / 25 /$data);
            //     $datas1['nama'][$key]=$value['nama'];
            //     $datas1['kelas'][$key]=$value['kelas'];
            //     $datas1['jurusan'][$key]=$value['jurusan'];
            //     $datas1['jk'][$key]=$value['jk'];
            //      $datas1['bulan'][$key]=$value['bulan'];
            // }
            // elseif ($value->kelas == 'XI' && $value->jurusan == 'TEKNIK KENDARAAN RINGAN OTOMOTIF' ) {

            //     $datas1['rata'][$key] =(($value->n1+$value->n2+$value->n3+$value->n4+$value->n5+$value->n6+$value->n7+$value->n8+$value->n9+$value->n10+$value->n11+$value->n12+$value->n13+$value->n14+$value->n15+$value->n16+$value->n17+$value->n18+$value->n19+$value->n20+$value->n21+$value->n23+$value->n24+$value->n25) / 25 /$data);
            //     $datas1['nama'][$key]=$value['nama'];
            //     $datas1['kelas'][$key]=$value['kelas'];
            //     $datas1['jurusan'][$key]=$value['jurusan'];
            //     $datas1['jk'][$key]=$value['jk'];
            //      $datas1['bulan'][$key]=$value['bulan'];
            // }
            // if ($value->kelas == 'XII' && $value->jurusan == 'REKAYASA PERANGKAT LUNAK' ) {

            //     $datas1['rata'][$key] =(($value->n1+$value->n2+$value->n3+$value->n4+$value->n5+$value->n6+$value->n7+$value->n8+$value->n9+$value->n10+$value->n11+$value->n12+$value->n13+$value->n14+$value->n15+$value->n16+$value->n17+$value->n18+$value->n19+$value->n20+$value->n21+$value->n23+$value->n24+$value->n25) / 25 /$data);
            //     // $datas1['namat'][$key]=$value->n1;
            //     $datas1['nama'][$key]=$value['nama'];
            //     $datas1['kelas'][$key]=$value['kelas'];
            //     $datas1['jurusan'][$key]=$value['jurusan'];
            //     $datas1['jk'][$key]=$value['jk'];
            //      $datas1['bulan'][$key]=$value['bulan'];
            // }
            // elseif ($value->kelas == 'XII' && $value->jurusan == 'MULTIMEDIA' && $value->nama !== $value->nama) {

            //     // $datas1['rata'][$key] =(($value->n1+$value->n2+$value->n3+$value->n4+$value->n5+$value->n6+$value->n7+$value->n8+$value->n9+$value->n10+$value->n11+$value->n12+$value->n13+$value->n14+$value->n15+$value->n16+$value->n17+$value->n18+$value->n19+$value->n20+$value->n21+$value->n23+$value->n24+$value->n25) / 25 /$data);
            //     $datas1['namas'][$key]=$value->n1;
            //     $datas1['nama'][$key]=$value['nama'];
            //     $datas1['kelas'][$key]=$value['kelas'];
            //     $datas1['jurusan'][$key]=$value['jurusan'];
            //     $datas1['jk'][$key]=$value['jk'];
            //     $datas1['bulan'][$key]=$value['bulan'];
            // }
            // elseif ($value->kelas == 'XII' && $value->jurusan == 'BISNIS KONSTRUKSI DAN PROPERTI' ) {

            //     $datas1['rata'][$key] =(($value->n1+$value->n2+$value->n3+$value->n4+$value->n5+$value->n6+$value->n7+$value->n8+$value->n9+$value->n10+$value->n11+$value->n12+$value->n13+$value->n14+$value->n15+$value->n16+$value->n17+$value->n18+$value->n19+$value->n20+$value->n21+$value->n23+$value->n24+$value->n25) / 25 /$data);
            //     $datas1['nama'][$key]=$value['nama'];
            //     $datas1['kelas'][$key]=$value['kelas'];
            //     $datas1['jurusan'][$key]=$value['jurusan'];
            //     $datas1['jk'][$key]=$value['jk'];
            //      $datas1['bulan'][$key]=$value['bulan'];
            // }
            // elseif ($value->kelas == 'XII' && $value->jurusan == 'TATABOGA' ) {

            //     $datas1['rata'][$key] =(($value->n1+$value->n2+$value->n3+$value->n4+$value->n5+$value->n6+$value->n7+$value->n8+$value->n9+$value->n10+$value->n11+$value->n12+$value->n13+$value->n14+$value->n15+$value->n16+$value->n17+$value->n18+$value->n19+$value->n20+$value->n21+$value->n23+$value->n24+$value->n25) / 25 /$data);
            //     $datas1['nama'][$key]=$value['nama'];
            //     $datas1['kelas'][$key]=$value['kelas'];
            //     $datas1['jurusan'][$key]=$value['jurusan'];
            //     $datas1['jk'][$key]=$value['jk'];
            //     $datas1['bulan'][$key]=$value['bulan'];
            // }
            // elseif ($value->kelas == 'XII' && $value->jurusan == 'TEKNIK KENDARAAN RINGAN OTOMOTIF' ) {

            //     $datas1['rata'][$key] =(($value->n1+$value->n2+$value->n3+$value->n4+$value->n5+$value->n6+$value->n7+$value->n8+$value->n9+$value->n10+$value->n11+$value->n12+$value->n13+$value->n14+$value->n15+$value->n16+$value->n17+$value->n18+$value->n19+$value->n20+$value->n21+$value->n23+$value->n24+$value->n25) / 25 /$data);
            //     $datas1['nama'][$key]=$value['nama'];
            //     $datas1['kelas'][$key]=$value['kelas'];
            //     $datas1['jurusan'][$key]=$value['jurusan'];
            //     $datas1['jk'][$key]=$value['jk'];
            //      $datas1['bulan'][$key]=$value['bulan'];
            // }





        // }
                // dd($datas1);


        // for ($i=0; $i < count($data['nama']) ; $i++){
        //     DB::table('nilaiasramas')->insert([
        //         'nama'=>$data['nama'][$i],
        //         'jk'=>$data['jk'][$i   ],
        //         'kelas'=>$data['kelas'][$i],
        //         'jurusan'=>$data['jurusan'][$i],
        //         'n1'=>$data['n1'][$i],
        //         'n2'=>$data['n2'][$i],
        //         'n3'=>$data['n3'][$i],
        //         'n4'=>$data['n4'][$i],
        //         'n5'=>$data['n5'][$i],
        //         'n6'=>$data['n6'][$i],
        //         'n7'=>$data['n7'][$i],
        //         'n8'=>$data['n8'][$i],
        //         'n9'=>$data['n9'][$i],
        //         'n10'=>$data['n10'][$i],
        //         'n11'=>$data['n11'][$i],
        //         'n12'=>$data['n12'][$i],
        //         'n13'=>$data['n13'][$i],
        //         'n14'=>$data['n14'][$i],
        //         'n15'=>$data['n15'][$i],
        //         'n16'=>$data['n16'][$i],
        //         'n17'=>$data['n17'][$i],
        //         'n18'=>$data['n18'][$i],
        //         'n19'=>$data['n19'][$i],
        //         'n20'=>$data['n20'][$i],
        //         'n21'=>$data['n21'][$i],
        //         'n22'=>$data['n22'][$i],
        //         'n23'=>$data['n23'][$i],
        //         'n24'=>$data['n24'][$i],
        //         'n25'=>$data['n25'][$i],


        //     ]);
        // }
        // for ($i=0; $i < count($datas1['nama']) ; $i++) {
        //     DB::table('rataratas')->insert([
        //         // dd($datas1['nama']);
        //         // 'id_penilai'=>$guru,
        //         // 'kategori'=>$lokasi,
        //         'nama' => $datas1['nama'][$i],
        //         'kelas' => $datas1['kelas'][$i],
        //         'jk' => $datas1['jk'][$i],
        //         'jurusan' => $datas1['jurusan'][$i],
        //         'ratarata' => $datas1['rata'][$i],
        //         'bulan' => $datas1['bulan'][$i],
        //         // 'Berhasil' => $datas1['Berhasil'][$i],
        //         'created_at' => date("Y-m-d H:i:s"),
        //         'updated_at' => date("Y-m-d H:i:s")
        //     ]);

        //     $datam = ratarata::get();
            // dd($datam);
        }
        dd($kumpulan1);
        return view('admin.nilairata',compact ('datam'));
    }



    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
