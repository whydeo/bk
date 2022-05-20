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
            $bln= Carbon::now()->isoFormat(' MMMM Y');
            if ($user == 'guru') {
                            $tes =$inputan['kelas'];
                            $t =$inputan['jurusan'];
                            $data = DB::table('bandings')
                             ->where('kelas',$tes)
                            ->where('jurusan',$t)
                            ->value('id');
                            $jmlsiswa=count($inputan['nama']);
                            $kat = banding::find($data);
                            // dd($data);
                            $jml = $kat->banding + 1;
                            $jmls = $kat->jml_siswa + $jmlsiswa;

                            $kat->update(['banding' => $jml,'jml_siswa'=>$jmls]);
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
                            }

                            elseif ($user == 'paspa'||'paspi' ) {
                                for ($i=0; $i < count($inputan['nama']) ; $i++){
                                    DB::table('nilaiasramas')->insert([
                                        'nama'=>$inputan['nama'][$i],
                                        'jk'=>$inputan['jk'][$i   ],
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
                                        'penilai'=>$user,

                                    ]);
                                }
                            }

                        }

                        // public function nilai($inputan){
                        //     // dd($inputan);


                        //     $nilai=nilaiawal::insert($inputan);
                        //     //  DB::table('nilaiawals')->insert($inputan);
                        // }

    // public function rata(){

    // }
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
        // dd($month);
        for ($i=0; $i < count($request['nama']); $i++) {
            DB::table('nilairatas')->insert([
                'nama'=>$request['nama'][$i],
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
