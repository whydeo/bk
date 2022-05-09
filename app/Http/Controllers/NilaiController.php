<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\NilaiImport;
use App\Imports\SiswaImport;
// use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Models\nilaisikap;
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\User;
use App\Models\nilaiawal;
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
        $data= karakter::with('guru','siswa')->latest()->get();
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
                    'nama_siswa' =>$sheet->getCell( 'B' . $row )->getValue(),
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
            
            $inputan = nilaiawal::create([
                'nama'=>$datas1['totalnama'],
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
            ]);
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
        }
        public function nilai($inputan){
      


            // $nilai=nilaiawal::insert();
            //  DB::table('nilaiawals')->insert($inputan);
        }

        public function input($karakter){

            $email= auth()->user()->name;
            $lok= auth()->user()->level;
            if ($lok == 'guru') {
                $lokasi='Sekolah';
            }
            elseif($lok == 'pembina'){
                $lokasi='Asrama';
            }
            $guru=User::where('name',$email)->value('id');
            for ($i=0; $i < count($karakter['Berkualitas']) ; $i++) {
                 DB::table('poin4bs')->insert([
                 'id_penilai'=>$guru,
                 'kategori'=>$lokasi,
                'id_siswa' => $karakter['id_siswa'][$i],
                'Berkualitas' => $karakter['Berkualitas'][$i],
                'Berbudi' => $karakter['Berbudi'][$i],
                'Berdaya' => $karakter['Berdaya'][$i],
                'Berhasil' => $karakter['Berhasil'][$i],
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]);
            // $rata = Karakter::select(
            //     DB::raw('AVG(Berkualitas) as Berdaya,Berbudi,Berhasil'),('id_poin')
            //     // DB::raw('SUM(Berbudi) as Berhasil'),
            //   )
            //   ->groupBy('id_siswa')
            //   ->get();

            //   dd($rata);

            // $ambil = Karakter::all();

            // foreach ($ambil as $key => $value) {

            //     ];
            // }
            // for ($i=0; $i < $karakter['Berbudi']; $i++) {
            // $tes ['Berkualitas'] = $karakter['Berkualitas'][$i];
            // $tes ['Berbudi'] = $karakter['Berbudi'][$i];
            // $tes ['Berdaya'] = $karakter['Berdaya'][$i];
            // $tes ['Berhasil'] = $karakter['Berhasil'][$i];
            // }
            // $rata=[];
            // foreach ($karakter as $key => $value) {
            //     $rata['rata'][$key] =array_sum($value);
            //     // $datas1['totalnama'][$key] =$value['nama_siswa'];
            // }
            //  dd($karakter);
        }
       return redirect()->route('Nilai.create');
        // $this->input($rata);
        }

    // public function rata(){

    // }
    public function create()
    {
        // $rata = Karakter::select(DB::raw('AVG(Berkualitas) as Berdaya,Berbudi,Berhasil'),('id_poin'), DB::raw('SUM(Berbudi) as Berhasil')
        //   )
        //   ->groupBy('id_siswa')
        //   ->get();
        //   dd($rata);
        $data= karakter::with('guru','siswa')->latest()->get();
          return view('nilai.create',compact('data'));
    }


    // public function nilai(Request $request)
    // {

    //     return view('nilai/nilai');
    // }
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
