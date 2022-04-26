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
        return view('nilai.index',[
            'data'=>karakter::with('guru','siswa')->latest()->get()
        ]);
        // $data = karakter::join('siswas', 'poin4bs.id_siswa', '=', 'siswas.id_siswa')
        //         ->leftjoin('gurus','poin4bs.id_guru','=','gurus.id_guru')
        //       ->where('id_siswas')
        //       ->select('poin4bs.*');
        //     //   ->all();
        //     dd($data);
        //       return view('nilai.index',compact('data'));

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

                // DB::table('poin4bs')->insert([
                //     'id_karakter' => 1,
                //     'Berkualitas' => 4,
                //     'Berbudi' => 3,
                //     'Berdaya' => 2,
                //     'Berhasil' => 4,
                // ]);



            foreach ( $row_range as $i=> $row ) {

                $data1[] = [
                    'nama_siswa' =>$sheet->getCell( 'B' . $row )->getValue(),
                    'menjaga' => $sheet->getCell( 'E' . $row )->getValue(),
                    'jurusan' => $sheet->getCell( 'F'. $row )->getValue(),
                    'kelamiASn' => $sheet->getCell( 'G' . $row )->getValue(),
                    'jurusaSAAWEn' => $sheet->getCell( 'H'. $row )->getValue(),
                    'ju' => $sheet->getCell( 'I'. $row )->getValue(),
                    'jAu' => $sheet->getCell( 'J'. $row )->getValue(),
                ];
                // $data2[] = [
                //     'nama_siswa' =>$sheet->getCell( 'B' . $row )->getValue(),
                //     'menjaga' => $sheet->getCell( 'E' . $row )->getValue(),
                //     'jurusan' => $sheet->getCell( 'F'. $row )->getValue(),
                //     'kelamiASn' => $sheet->getCell( 'G' . $row )->getValue(),
                //     'jurusaSAAWEn' => $sheet->getCell( 'I'. $row )->getValue(),
                //     'ju' => $sheet->getCell( 'J'. $row )->getValue(),
                // ];
                $data2[] = [
                    'nama_siswa' =>$sheet->getCell( 'K' . $row )->getValue(),
                    'menjaga' => $sheet->getCell( 'L' . $row )->getValue(),
                    'jurusan' => $sheet->getCell( 'M'. $row )->getValue(),
                    'kelamiASn' => $sheet->getCell( 'N' . $row )->getValue(),
                    'jurusaSAAWEn' => $sheet->getCell( 'O'. $row )->getValue(),
                    'ju' => $sheet->getCell( 'P'. $row )->getValue(),
                ];
                $data3[] = [
                    'nama_siswa' =>$sheet->getCell( 'Q' . $row )->getValue(),
                    'menjaga' => $sheet->getCell( 'R' . $row )->getValue(),
                    'jurusan' => $sheet->getCell( 'S'. $row )->getValue(),
                    'kelamiASn' => $sheet->getCell( 'T' . $row )->getValue(),
                    'jurusaSAAWEn' => $sheet->getCell( 'U'. $row )->getValue(),
                    'ju' => $sheet->getCell( 'V'. $row )->getValue(),
                ];
                $data4[] = [
                    'nama_siswa' =>$sheet->getCell( 'W' . $row )->getValue(),
                    'menjaga' => $sheet->getCell( 'X' . $row )->getValue(),
                    'jurusan' => $sheet->getCell( 'Y'. $row )->getValue(),
                    'kelamiASn' => $sheet->getCell( 'Z' . $row )->getValue(),
                    'jurusaSAAWEn' => $sheet->getCell( 'AA'. $row )->getValue(),
                    'ju' => $sheet->getCell( 'AB'. $row )->getValue(),
                    'ju' => $sheet->getCell( 'AC'. $row )->getValue(),
                ];
            }


            $datas1=[];
            foreach ($data1 as $key => $value) {
                 $datas1['Berkualitas'][$key] =array_sum($value)/5;
                $datas1['totalnama'][$key] =$value['nama_siswa'];
            }
            $datas2=[];
            foreach ($data2 as $key => $value) {
                $d2 = $datas2['Berbudi'][$key] =array_sum($value)/6;
                // $tpg = ;
            }
            $datas3=[];
            foreach ($data3 as $key => $value) {
                $datas3['Berdaya'][$key] =array_sum($value)/6;
            }
            $datas4=[];
            foreach ($data4 as $key => $value) {
                $datas4['Berhasil'][$key] =array_sum($value)/7;
            }
            //  dd($datas4);
            $datam=$datas1['totalnama'];
            // $result = DB::table('siswas')->where('nama_siswa',$datas1['totalnama'])->get();

            $id_nama = [];
            foreach ($datam as $key => $data) {
               $id_namas['nama'][$key]= array_push($id_nama, DB::table('siswas')->where('nama_siswa',$data)->value('id_siswa'));
            }

            // dd($id_namas['nama']);


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

                $this->input($karakter);
        }

        public function input($karakter){

            $email= auth()->user()->name;
            $guru=Guru::where('nama',$email)->value('id_guru');
            // dd($guru);
            for ($i=0; $i < count($karakter['Berkualitas']) ; $i++) {

                // $tgl = date("Y-m-d H:i:s");
                // $date=date_create($tgl);
                // $hari = date_format($date,"d");

                // dd($hari);

                 DB::table('poin4bs')->insert([
                 'id_guru'=>$guru,
                'id_siswa' => $karakter['id_siswa'][$i],
                'Berkualitas' => $karakter['Berkualitas'][$i],
                'Berbudi' => $karakter['Berbudi'][$i],
                'Berdaya' => $karakter['Berdaya'][$i],
                'Berhasil' => $karakter['Berhasil'][$i],
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]);

            // dd($tes);
        }
       return redirect()->back();
        }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
