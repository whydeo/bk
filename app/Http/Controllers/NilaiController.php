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
        return view('nilai/index');
    }

    // public function import(Request $request)
    //     {
    //         // dd($request);

    //         Excel::import(new NilaiImport, $request->file);
    //      return redirect()->back();
    //     }
        public function import(Request $request){
            $this->validate($request, [
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

            // dd($datas1['totalnama']);

// $nama=['Abner Abyater Sanam'];
            // foreach ($datas1 as $key => $value) {
                $id_siswa=DB::table('siswas')->where('nama_siswa',$datas1['totalnama'])->get()->toArray();



            // }
            $nilai= DB::table('poin4bs')->insert([
                "Berkualitas"=>$datas1,
                "Berbudi"=>$datas2,
                "Berdaya"=>$datas3,
                "Berhasil"=>$datas4,
                'id_siswa'=>$id_siswa,
            ]);


                return redirect()->route('Siswa.index');
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
