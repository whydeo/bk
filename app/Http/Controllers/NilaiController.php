<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
// use App\Imports\NilaiImport;
// use App\Imports\SiswaImport;
// use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Models\nilaisikap;
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\User;
use App\Models\nilaiawal;
use App\Models\nilairata;
use App\Models\banding;
use Carbon\Carbon;
// use Models;
use App\Models\karakter;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\DB;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = Karakter::with('guru','siswa')
        // ->select(DB::raw('AVG(Berkualitas) as Berdaya,Berbudi,Berhasil'),('id_poin'),
        // //  DB::raw('SUM(Berbudi) as Berhasil')
        // )
        // ->groupBy('id_siswa')
        // ->latest()
        // ->get();
        // $data= karakter::with('guru','siswa')->latest()->get();
        $user = auth()->user()->name;
        $data= nilairata::get();
        // dd($data);
        return view('nilai.index',compact ('data'));
        //     'data'=>karakter::with('guru','siswa')->latest()->get()
        // ]);

    }



    // public function import(Request $request)
    //     {
    //         // dd($request);

    //         Excel::import(new NilaiImport, $request->file);
    //      return redirect()->back();
    //     }
        public function import(Request $request){




            $request->validate([
                    'file' => 'required|mimes:csv,xls,xlsx'
                ]);
                $file = $request->file('file');
                $spreadsheet = IOFactory::load($file->getRealPath());
                $sheet        = $spreadsheet->getActiveSheet();
                $row_limit    = $sheet->getHighestDataRow();
                $column_limit = $sheet->getHighestDataColumn();
                $row_range    = range( 6, $row_limit );
                $column_range = range( 'AC', $column_limit );




            foreach ( $row_range as $i=> $row ) {

                $data1[] = [
                    'nama_siswa' =>$sheet->getCell( 'A' . $row )->getValue(),
                    'jk' =>$sheet->getCell( 'B' . $row )->getValue(),
                    'kelas' =>$sheet->getCell( 'C' . $row )->getValue(),
                    'jurusan' =>$sheet->getCell( 'D' . $row )->getValue(),
                    'n1' => $sheet->getCell( 'E' . $row )->getValue(),
                    'n2' => $sheet->getCell( 'F'. $row )->getValue(),
                    'n3' => $sheet->getCell( 'G' . $row )->getValue(),
                    'n4' => $sheet->getCell( 'H'. $row )->getValue(),
                    'n5' => $sheet->getCell( 'I'. $row )->getValue(),
                    'n6' => $sheet->getCell( 'J'. $row )->getValue(),
                ];
                // dd($data1[0]);
                $data2[] = [
                    'n7' =>$sheet->getCell( 'K' . $row )->getValue(),
                    'n8' => $sheet->getCell( 'L' . $row )->getValue(),
                    'n9' => $sheet->getCell( 'M'. $row )->getValue(),
                    'n10' => $sheet->getCell( 'N' . $row )->getValue(),
                    'n11' => $sheet->getCell( 'O'. $row )->getValue(),
                    'n12' => $sheet->getCell( 'P'. $row )->getValue(),
                ];
                $data3[] = [
                    'n13' =>$sheet->getCell( 'Q' . $row )->getValue(),
                    'n14' => $sheet->getCell( 'R' . $row )->getValue(),
                    'n15' => $sheet->getCell( 'S'. $row )->getValue(),
                    'n16' => $sheet->getCell( 'T' . $row )->getValue(),
                    'n17' => $sheet->getCell( 'U'. $row )->getValue(),
                    'n18' => $sheet->getCell( 'V'. $row )->getValue(),
                ];
                $data4[] = [
                    'n19' =>$sheet->getCell( 'W' . $row )->getValue(),
                    'n20' => $sheet->getCell( 'X' . $row )->getValue(),
                    'n21' => $sheet->getCell( 'Y'. $row )->getValue(),
                    'n22' => $sheet->getCell( 'Z' . $row )->getValue(),
                    'n23' => $sheet->getCell( 'AA'. $row )->getValue(),
                    'n24' => $sheet->getCell( 'AB'. $row )->getValue(),
                    'n25' => $sheet->getCell( 'AC'. $row )->getValue(),
                ];
            }
            $inputan=[


            ];

            // foreach ($row_range as $key => $value) {
            // $rata[]=[
            //     'nama_siswa' =>$sheet->getCell( 'B' . $value )->getValue(),
            //     'menjaga' => $sheet->getCell( 'E' . $value )->getValue(),
            //     'jurusan' => $sheet->getCell( 'F'. $value )->getValue(),
            //     'kelamiASn' => $sheet->getCell( 'G' . $value )->getValue(),
            //     'jurusaSAAWEn' => $sheet->getCell( 'H'. $value )->getValue(),
            //     'ju' => $sheet->getCell( 'I'. $value )->getValue(),
            //     'jAu' => $sheet->getCell( 'J'. $value )->getValue(),
            //     'na' =>$sheet->getCell( 'K' . $value )->getValue(),
            //     'njaga' => $sheet->getCell( 'L' . $value )->getValue(),
            //     'jusan' => $sheet->getCell( 'M'. $value )->getValue(),
            //     'kamiASn' => $sheet->getCell( 'N' . $value )->getValue(),
            //     'juruaSAAWEn' => $sheet->getCell( 'O'. $value )->getValue(),
            //     'judd' => $sheet->getCell( 'P'. $value )->getValue(),
            //     'ewhe' =>$sheet->getCell( 'Q' . $value )->getValue(),
            //     'mengwehjaga' => $sheet->getCell( 'R' . $value )->getValue(),
            //     'jurghsdusan' => $sheet->getCell( 'S'. $value )->getValue(),
            //     'keldbdamiASn' => $sheet->getCell( 'T' . $value )->getValue(),
            //     'juruddssaSAAWEn' => $sheet->getCell( 'U'. $value )->getValue(),
            //     'juhjsdwdj' => $sheet->getCell( 'V'. $value )->getValue(),
            //     'namasd_siswa' =>$sheet->getCell( 'W' . $value )->getValue(),
            //     'menjagdswda' => $sheet->getCell( 'X' . $value )->getValue(),
            //     'jurudssanh' => $sheet->getCell( 'Y'. $value )->getValue(),
            //     'kelamiASnh' => $sheet->getCell( 'Z' . $value )->getValue(),
            //     'jurusaSAAWEn' => $sheet->getCell( 'AA'. $value )->getValue(),
            //     'jwdu' => $sheet->getCell( 'AB'. $value )->getValue(),
            //     'jdu' => $sheet->getCell( 'AC'. $value )->getValue(),
            // ];

            // }

            // $ratas=[];
            // foreach ($rata as $key => $value) {
            //     $ratas['rata-rata'][$key] =array_sum($value)/25;
            //     $ratas['totalnama'][$key] =$value['nama_siswa'];
            // }
            // $datanama=$ratas['totalnama'];
            // $id_nama = [];
            // foreach ($datanama as $key => $data) {
            //    $id_namat['nama'][$key]= array_push($id_nama, DB::table('siswas')->where('nama_siswa',$data)->value('nama_siswa'));
            // }
            // //  dd($id_namat);
            // $email= auth()->user()->name;
            // $guru=Guru::where('nama',$email)->value('id_guru');
            // for ($i=0; $i < count($ratas['rata-rata']) ; $i++) {
            //      DB::table('poin4bs')->insert([
            //      'id_guru'=>$guru,
            //     'id_siswa' => $id_namat['nama'][$i],
            //     'Berkualitas' => $karakter['Berkualitas'][$i],

            //     'created_at' => date("Y-m-d H:i:s"),
            //     'updated_at' => date("Y-m-d H:i:s")
            // ]);

            $datas1=[];
            foreach ($data1 as $key => $value) {

                 $datas1['Berkualitas'][$key] =array_sum($value)/5;
                 $datas1['n1'][$key] =$value['n1'];
                 $datas1['n2'][$key] =$value['n2'];
                 $datas1['n3'][$key] =$value['n3'];
                 $datas1['n4'][$key] =$value['n4'];
                 $datas1['n5'][$key] =$value['n5'];
                 $datas1['n6'][$key] =$value['n6'];
                $datas1['totalnama'][$key] =$value['nama_siswa'];
                $datas1['kelas'][$key] =$value['kelas'];
                $datas1['jurusan'][$key] =$value['jurusan'];
                $datas1['jk'][$key] =$value['jk'];
            }
            $datas2=[];
            foreach ($data2 as $key => $value) {
                $d2 = $datas2['Berbudi'][$key] =array_sum($value)/6;
                $datas2['n7'][$key] =$value['n7'];
                $datas2['n8'][$key] =$value['n8'];
                $datas2['n9'][$key] =$value['n9'];
                $datas2['n10'][$key] =$value['n10'];
                $datas2['n11'][$key] =$value['n11'];
                $datas2['n12'][$key] =$value['n12'];
                // $tpg = ;
            }
            $datas3=[];
            foreach ($data3 as $key => $value) {
                $datas3['Berdaya'][$key] =array_sum($value)/6;
                $datas3['n13'][$key] =$value['n13'];
                $datas3['n14'][$key] =$value['n14'];
                $datas3['n15'][$key] =$value['n15'];
                $datas3['n16'][$key] =$value['n16'];
                $datas3['n17'][$key] =$value['n17'];
                $datas3['n18'][$key] =$value['n18'];
            }
            $datas4=[];
            foreach ($data4 as $key => $value) {
                $datas4['Berhasil'][$key] =array_sum($value)/7;
                $datas4['n19'][$key] =$value['n19'];
                $datas4['n20'][$key] =$value['n20'];
                $datas4['n21'][$key] =$value['n21'];
                $datas4['n22'][$key] =$value['n22'];
                $datas4['n23'][$key] =$value['n23'];
                $datas4['n24'][$key] =$value['n24'];
                $datas4['n25'][$key] =$value['n25'];
            }

            $inputan = [
                'nama'=>$datas1['totalnama'],
                'jk'=>$datas1['jk'],
                'kelas'=>$datas1['kelas'],
                'jurusan'=>$datas1['jurusan'],
                'n1'=>$datas1['n1'],
                'n2'=>$datas1['n2'],
                'n3'=>$datas1['n3'],
                'n4'=>$datas1['n4'],
                'n5'=>$datas1['n5'],
                'n6'=>$datas1['n6'],
                'n7'=>$datas2['n7'],
                'n8'=>$datas2['n8'],
                'n9'=>$datas2['n9'],
                'n10'=>$datas2['n10'],
                'n11'=>$datas2['n11'],
                'n12'=>$datas2['n12'],
                'n13'=>$datas3['n13'],
                'n14'=>$datas3['n14'],
                'n15'=>$datas3['n15'],
                'n16'=>$datas3['n16'],
                'n17'=>$datas3['n17'],
                'n18'=>$datas3['n18'],
                'n19'=>$datas4['n19'],
                'n20'=>$datas4['n20'],
                'n21'=>$datas4['n21'],
                'n22'=>$datas4['n22'],
                'n23'=>$datas4['n23'],
                'n24'=>$datas4['n24'],
                'n25'=>$datas4['n25'],
            ];
            // $inputan = new nilaiawal;

            // $inputan->save();
            // DB::table('nilaiawals')->insert($inputan);
            //  dd($inputan);
            $datam=$datas1['totalnama'];
            // $result = DB::table('siswas')->where('nama_siswa',$datas1['totalnama'])->get();

            $id_nama = [] ;
            foreach ($datam as $key => $data) {
               $id_namas['nama'][$key]= array_push($id_nama, DB::table('siswas')->where('nama_siswa',$data)->value('id'));
            }

            // dd($datas1,$datas2);


            // DB::table('poin4bs')->insert([
            //     'id_karakter' => $id_namas['nama'],
            //     'Berkualitas' => $datas1['Berkualitas'],
            //     'Berbudi' => $datas2['Berbudi'],
            //     'Berdaya' => $datas3['Berdaya'],
            //     'Berhasil' => $datas4['Berhasil'],
            // ]);

            $karakter= new karakter();
            $karakter->Berkualitas=$datas1['Berkualitas'];
            // $karakter->save();
// dd($karakter);

            $karakter->Berbudi=$datas2['Berbudi'];
            $karakter->Berdaya=$datas3['Berdaya'];
            $karakter->Berhasil=$datas4['Berhasil'];
            $karakter->id_siswa=$id_namas['nama'];
            $karakter->Berkualitas=$datas1['Berkualitas'];
            // $karakter->save();


            // DB::table('point4bs')->insert([
            // $karakter= new karakter(),
            // $karakter->Berkualitas=$datas1['Berkualitas'],
            // $karakter->Berbudi=$datas2['Berbudi'],
            // $karakter->Berdaya=$datas3['Berdaya'],
            // $karakter->Berhasil=$datas4['Berhasil'],
            // $karakter->id_siswa=$id_namas['nama'],
            // ]);

                // dd($inputan);
                $this->input($karakter,$inputan);
                $data = $inputan;
                // dd($data)   ;
                return view('nilai.create',compact('data'));




        }

        public function input($karakter,$inputan){
            // dd($inputan);

            $email= auth()->user()->name;
            $lok= auth()->user()->level;
            if ($lok == 'guru') {
                $lokasi='Sekolah';
            }
            elseif($lok == 'paspa'||'paspi'){
                $lokasi='Asrama';
            }
            $guru=User::where('name',$email)->value('id');
            for ($i=0; $i < count($karakter['Berkualitas']) ; $i++) {
                DB::table('poin4bs')->insert([
                    'id_penilai'=>$guru,
                    'kategori'=>$lokasi,
                    'id_siswa' => $karakter['id_siswa'][$i],
                    // 'jk' => $karakter['jk'][$i],
                    'Berkualitas' => $karakter['Berkualitas'][$i],
                    'Berbudi' => $karakter['Berbudi'][$i],
                    'Berdaya' => $karakter['Berdaya'][$i],
                    'Berhasil' => $karakter['Berhasil'][$i],
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")
                ]);
            }
            $users = Auth()->user()->name;
            $user= auth()->user()->level;
            $kell=$inputan['kelas'];
            $jurr=$inputan['jurusan'];
            // dd($kell,$jurr);
            $bln= Carbon::now()->isoFormat(' MMM ');
            // dd($bln);
            // if ($user == 'guru') {
                            $tes =$inputan['kelas'];
                            $t =$inputan['jurusan'];
                            $data = DB::table('bandings')
                             ->where('kelas',$tes)
                            ->where('jurusan',$t)
                            ->value('id');
                            $datas = DB::table('bandings')
                             ->where('id',$data)
                            // ->where('jurusan',$t)
                            ->value('jml_siswa');
                            $jmlsiswa=count($inputan['nama']);
                            $kat = banding::find($data);
                            // dd($kat->jml_siswa);
                            $jml = $kat->banding + 1;
                            if ($kat->jml_siswa <15 ) {
                                $jmls = $kat->jml_siswa + $jmlsiswa;
                                $kat->update(['jml_siswa' => $jmls]);
                            }
                            $kat->update(['banding' => $jml]);
                            for ($i=0; $i < count($inputan['nama']) ; $i++){
                                DB::table('nilaiawals')->insert([
                                    'nama'=>$inputan['nama'][$i],
                                    'id_banding'=>$data,
                                    'jk'=>$inputan['jk'][$i],
                                    'kelas'=>$inputan['kelas'][$i],
                                    'jurusan'=>$inputan['jurusan'][$i],
                                    'n1'=>$inputan['n1'][$i],
                                    'n2'=>$inputan['n2'][$i],
                                    'n3'=>$inputan['n3'][$i],
                                    'n4'=>$inputan['n4'][$i],
                                    'n5'=>$inputan['n5'][$i],
                                    'n6'=>$inputan['n6'][$i],
                                    'n7'=>$inputan['n7'][$i],
                                    'n8'=>$inputan['n8'][$i],
                                    'n9'=>$inputan['n9'][$i],
                                    'n10'=>$inputan['n10'][$i],
                                    'n11'=>$inputan['n11'][$i],
                                    'n12'=>$inputan['n12'][$i],
                                    'n13'=>$inputan['n13'][$i],
                                    'n14'=>$inputan['n14'][$i],
                                    'n15'=>$inputan['n15'][$i],
                                    'n16'=>$inputan['n16'][$i],
                                    'n17'=>$inputan['n17'][$i],
                                    'n18'=>$inputan['n18'][$i],
                                    'n19'=>$inputan['n19'][$i],
                                    'n20'=>$inputan['n20'][$i],
                                    'n21'=>$inputan['n21'][$i],
                                    'n22'=>$inputan['n22'][$i],
                                    'n23'=>$inputan['n23'][$i],
                                    'n24'=>$inputan['n24'][$i],
                                    'n25'=>$inputan['n25'][$i],
                                    'penilai'=>$users,
                                    'bulan'=>$bln,


                                ]);

                            }
                            // }

                            // elseif ($user == 'paspa'||'paspi' ) {
                            //     for ($i=0; $i < count($inputan['nama']) ; $i++){
                            //         DB::table('nilaiasramas')->insert([
                            //             'nama'=>$inputan['nama'][$i],
                            //             'jk'=>$inputan['jk'][$i   ],
                            //             'kelas'=>$inputan['kelas'][$i],
                            //             'jurusan'=>$inputan['jurusan'][$i],
                            //             'n1'=>$inputan['n1'][$i],
                            //             'n2'=>$inputan['n2'][$i],
                            //             'n3'=>$inputan['n3'][$i],
                            //             'n4'=>$inputan['n4'][$i],
                            //             'n5'=>$inputan['n5'][$i],
                            //             'n6'=>$inputan['n6'][$i],
                            //             'n7'=>$inputan['n7'][$i],
                            //             'n8'=>$inputan['n8'][$i],
                            //             'n9'=>$inputan['n9'][$i],
                            //             'n10'=>$inputan['n10'][$i],
                            //             'n11'=>$inputan['n11'][$i],
                            //             'n12'=>$inputan['n12'][$i],
                            //             'n13'=>$inputan['n13'][$i],
                            //             'n14'=>$inputan['n14'][$i],
                            //             'n15'=>$inputan['n15'][$i],
                            //             'n16'=>$inputan['n16'][$i],
                            //             'n17'=>$inputan['n17'][$i],
                            //             'n18'=>$inputan['n18'][$i],
                            //             'n19'=>$inputan['n19'][$i],
                            //             'n20'=>$inputan['n20'][$i],
                            //             'n21'=>$inputan['n21'][$i],
                            //             'n22'=>$inputan['n22'][$i],
                            //             'n23'=>$inputan['n23'][$i],
                            //             'n24'=>$inputan['n24'][$i],
                            //             'n25'=>$inputan['n25'][$i],
                            //             'penilai'=>$user,

                            //         ]);
                            //     }
                            // }

                            $data = DB::table('nilaiawals')
                            ->where('kelas',$kell)
                            ->where('jurusan',$jurr)
                            ->get();

                            $jmlsi= DB::table('bandings')
                            ->where('kelas',$kell)
                            ->where('jurusan', $jurr)
                            ->value('jml_siswa');
                            $namas=[];
                            $kelas=[];
                            $jurusan=[];
                            // $jk=[];
                            for ($w=0; $w < $jmlsi ; $w++) {
                                $nama=$data[$w]->nama;
                                $kelas['kelas']=$data[$w]->kelas;
                                $jurusan['jurusan']=$data[$w]->jurusan;
                                // $jk=$data[$w]->jk;
                                array_push($namas,$nama);
                            }
                            // dd($kelas);
                            //
                            $n1=[];
                            $n2=[];
                            $n3=[];
                            $n4=[];
                            $n5=[];
                            $n6=[];
                            $n7=[];
                            $n8=[];
                            $n9=[];
                            $n10=[];
                            $n11=[];
                            $n12=[];
                            $n13=[];
                            $n14=[];
                            $n15=[];
                            $n16=[];
                            $n17=[];
                            $n18=[];
                            $n19=[];
                            $n20=[];
                            $n21=[];
                            $n22=[];
                            $n23=[];
                            $n24=[];
                            $n25=[];
                            for ($i=1; $i <= 25 ; $i++){
                                $jml= DB::table('bandings')
                                ->where('kelas',$kell)
                                ->where('jurusan', $jurr)
                                ->value('jml_siswa');
                                // dd($jml);
                                $kumpulan = 'n'.$i;
                                for ($j=0; $j < $jml; $j++) {

                                    for ($h=0; $h < count($data) ; $h++) {
                                        $nilaike = 'n'.$i;
                                        if ($data[$h]->nama == $data[$j]->nama  && $data[$h] == ' Jan ' || $data[$h]->bulan == ' Feb ' || $data[$h]->bulan == ' Mar '|| $data[$h]->bulan == ' Apr ' || $data[$h]->bulan == ' May ' || $data[$h]->bulan == ' Jun ') {
                                            $rata2 = 0;
                                            $jmlnilaii = 0;

                                            $rata2 = $rata2 + $data[$h]->$nilaike;
                                            $jmlnilaii++;

                                            $rataakhir = $rata2 / $jmlnilaii;
                                            $bln='genap';

                                        }elseif($data[$h]->nama == $data[$j]->nama  && $data[$h] == ' Jul ' || $data[$h]->bulan == ' Aug ' || $data[$h]->bulan == ' Sep '|| $data[$h]->bulan == ' Oct ' || $data[$h]->bulan == ' Nov ' || $data[$h]->bulan == ' Dec ') {
                                            $rata2 = 0;
                                            $jmlnilaii = 0;

                                            $rata2 = $rata2 + $data[$h]->$nilaike;
                                            $jmlnilaii++;

                                            $rataakhir = $rata2 / $jmlnilaii;
                                            $bln='ganjil';

                                        }
                                    }
                                    if ($i == 1) {
                                        # code...
                                        array_push($n1, $rataakhir);
                                    }elseif ($i == 2) {
                                        # code...
                                        array_push($n2, $rataakhir);

                                    }elseif ($i == 3) {
                                        # code...
                                        array_push($n3, $rataakhir);

                                    }elseif ($i == 4) {
                                        # code...
                                        array_push($n4, $rataakhir);
                                    }elseif ($i == 5) {
                                        # code...
                                        array_push($n5, $rataakhir);
                                    }elseif ($i == 6) {
                                        # code...
                                        array_push($n6, $rataakhir);
                                    }elseif ($i == 7) {
                                        # code...
                                        array_push($n7, $rataakhir);
                                    }elseif ($i == 8) {
                                        # code...
                                        array_push($n8, $rataakhir);
                                    }elseif ($i == 9) {
                                        # code...
                                        array_push($n9, $rataakhir);
                                    }elseif ($i == 10) {
                                        # code...
                                        array_push($n10, $rataakhir);

                                    }elseif ($i == 11) {
                                        # code...
                                        array_push($n11, $rataakhir);
                                    }elseif ($i == 12) {
                                        # code...
                                        array_push($n12,   $rataakhir);
                                    }elseif ($i == 13) {
                                        # code...
                                        array_push($n13, $rataakhir);
                                    }elseif ($i == 13) {
                                        # code...
                                        array_push($n13, $rataakhir);
                                    }elseif ($i == 14) {
                                        # code...
                                        array_push($n14, $rataakhir);
                                    }elseif ($i == 15) {
                                        # code...
                                        array_push($n15, $rataakhir);
                                    }elseif ($i == 16) {
                                        # code...
                                        array_push($n16, $rataakhir);
                                    }elseif ($i == 17) {
                                        # code...
                                        array_push($n17, $rataakhir);
                                    }elseif ($i == 18) {
                                        # code...
                                        array_push($n18, $rataakhir);
                                    }elseif ($i == 19) {
                                        # code...
                                        array_push($n19, $rataakhir);
                                    }elseif ($i == 20) {
                                        # code...
                                        array_push($n20, $rataakhir);
                                    }elseif ($i == 21) {
                                        # code...
                                        array_push($n21, $rataakhir);
                                    }elseif ($i == 22) {
                                        # code...
                                        array_push($n22, $rataakhir);
                                    }elseif ($i == 23) {
                                        # code...
                                        array_push($n23, $rataakhir);
                                    }elseif ($i == 24) {
                                        # code...
                                        array_push($n24, $rataakhir);
                                    }elseif ($i == 25) {
                                        # code...
                                        array_push($n25, $rataakhir);
                                    }


                                    // dd($kumpulan);
                                    // dd($jml);
                                }
                            }
                            $kumpul=[];
                            // $bln=[];
                            $namass=[];
                            array_push($kumpul,$n1,$n2,$n3,$n4,$n5,$n6,$n7,$n8,$n9,$n10,$n11,$n12,$n13,$n14,$n15,$n16,$n17,$n18,$n19,$n20,$n21,$n22,$n23,$n24,$n25,$bln);
                            array_push($namass,$namas);
                                    // dd($kumpul);


                            // 'n1'=>$kumpul['n1'][$i],
                            // 'n2'=>$kumpul['n2'][$i],
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
                    // }
                    // $this->add($kumpul,$namass,$kelas,$jurusan,$jmlsi,$kel,$jur);
                    // $kel=$kell;
                    // $jur=$jurr;
                    // $datap = DB::table('rataratas')
                    // ->where('kelas',$kel)
                    // ->where('jurusan',$jur)
                    // ->get();
                    // dd($datap);

                //     $data = DB::table('bandings')
                //     ->where('kelas',$kel)
                //    ->where('jurusan',$jur)
                //    ->value('id');

                //    $datap = DB::table('bandings')
                //    ->where('kelas',$kel)
                //   ->where('jurusan',$jur)
                //   ->value('status');
                  $bln= Carbon::now()->isoFormat(' Y ');
                  $thn= Carbon::now()->isoFormat(' MMM ');

                //   dd($bln);
                    for ($b=0; $b < $jmlsi; $b++){
                        $sem=$kumpul[25];
                        // dd($sem);
                        if ($sem =='genap') {
                            DB::table('rataratas')->insert([
                                'nama'=>$namass[0][$b],
                                'kelas'=>$kelas['kelas'],
                                'jurusan'=>$jurusan['jurusan'],
                                'n1'=>$kumpul[0][$b],
                                'n2'=>$kumpul[1][$b],
                                'n4'=>$kumpul[2][$b],
                                'n3'=>$kumpul[3][$b],
                                'n5'=>$kumpul[4][$b],
                                'n6'=>$kumpul[5][$b],
                                'n7'=>$kumpul[6][$b],
                                'n8'=>$kumpul[7][$b],
                                'n9'=>$kumpul[8][$b],
                                'n10'=>$kumpul[9][$b],
                                'n11'=>$kumpul[10][$b],
                                'n12'=>$kumpul[11][$b],
                                'n13'=>$kumpul[12][$b],
                                'n14'=>$kumpul[13][$b],
                                'n15'=>$kumpul[14][$b],
                                'n16'=>$kumpul[15][$b],
                                'n17'=>$kumpul[16][$b],
                                'n18'=>$kumpul[17][$b],
                                'n19'=>$kumpul[18][$b],
                                'n20'=>$kumpul[19][$b],
                                'n21'=>$kumpul[20][$b],
                                'n22'=>$kumpul[21][$b],
                                'n23'=>$kumpul[22][$b],
                                'n24'=>$kumpul[23][$b],
                                'n25'=>$kumpul[24][$b],
                                'semester'=>$kumpul[25],
                                'bulan'=>$thn,
                                'tahun'=>$bln,

                            ]);
                        // dd($datap[19]->kelas);
                    }elseif($sem == 'ganjil'){
                        DB::table('semganjils')->insert([
                            'nama'=>$namass[0][$b],
                            'kelas'=>$kelas['kelas'],
                            'jurusan'=>$jurusan['jurusan'],
                            'n1'=>$kumpul[0][$b],
                            'n2'=>$kumpul[1][$b],
                            'n4'=>$kumpul[2][$b],
                            'n3'=>$kumpul[3][$b],
                            'n5'=>$kumpul[4][$b],
                            'n6'=>$kumpul[5][$b],
                            'n7'=>$kumpul[6][$b],
                            'n8'=>$kumpul[7][$b],
                            'n9'=>$kumpul[8][$b],
                            'n10'=>$kumpul[9][$b],
                            'n11'=>$kumpul[10][$b],
                            'n12'=>$kumpul[11][$b],
                            'n13'=>$kumpul[12][$b],
                            'n14'=>$kumpul[13][$b],
                            'n15'=>$kumpul[14][$b],
                            'n16'=>$kumpul[15][$b],
                            'n17'=>$kumpul[16][$b],
                            'n18'=>$kumpul[17][$b],
                            'n19'=>$kumpul[18][$b],
                            'n20'=>$kumpul[19][$b],
                            'n21'=>$kumpul[20][$b],
                            'n22'=>$kumpul[21][$b],
                            'n23'=>$kumpul[22][$b],
                            'n24'=>$kumpul[23][$b],
                            'n25'=>$kumpul[24][$b],
                            'semester'=>$kumpul[25],
                            'bulan'=>$thn,
                            'tahun'=>$bln,
                        ]);
                        }
                }





                        }


    public function create()
    {
        // $rata = Karakter::select(DB::raw('AVG(Berkualitas) as Berdaya,Berbudi,Berhasil'),('id_poin'), DB::raw('SUM(Berbudi) as Berhasil')
        //   )
        //   ->groupBy('id_siswa')
        //   ->get();
        //   dd($rata);
        $data= nilaiawal::latest()->get();
          return view('nilai.create',compact('data'));
    }


    public function nilairata(Request $request)
    {
        // $validate=([
        //     'nama'=>$request,
        //     'kelas'=>$request,
        //     'jurusan'=>$request,
        //     'keterangan'=>$request,
        //     'folowup'=>$request,
        // ]);
        // dd($request);
        $email= auth()->user()->name;
        $lok= auth()->user()->level;
        if ($lok == 'guru') {
            $lokasi='Sekolah';
        }
        elseif($lok == 'paspa'||'paspi'){
            $lokasi='Asrama';
        }
        $user = Auth()->user()->name;
        // dd($user);
        $month= Carbon::now()->isoFormat(' MMMM Y');
        // dd($request);
        for ($i=0; $i < count($request['nama']); $i++) {
            DB::table('nilairatas')->insert([
                'nama'=>$request['nama'][$i],
                'jk'=>$request['jk'][$i],
                'kelas'=>$request['kelas'][$i],
                'jurusan'=>$request['jurusan'][$i],
                'keterangan'=>$request['keterangan'][$i],
                'folowup'=>$request['folowup'][$i],
                // 'id_nilaiawal'=>$request['id_nilaiawal'][$i],
                'bulan'=>$month,
                'penilai'=>$user,
                'kategori'=>$lokasi,
            ]);
        }


        return redirect()->route('Nilai.index');
    }
    public function store(Request $request)
    {

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
