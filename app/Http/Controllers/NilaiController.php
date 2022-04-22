<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Maatwebsite\Excel\Facades\Excel;
// use App\Imports\NilaiImport;
use App\Imports\SiswaImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Models\nilaisikap;
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

                //  dd($row[$i+5][1]);
                $data[] = [
                    'nama_siswa' =>$sheet->getCell( 'B' . $row )->getValue(),
                    'menjalankan' => $sheet->getCell( 'E' . $row )->getValue(),
                    'menjaga' => $sheet->getCell( 'F' . $row )->getValue(),
                    'jurusan' => $sheet->getCell( 'G'. $row )->getValue(),
                    'kelamiASn' => $sheet->getCell( 'I' . $row )->getValue(),
                    'jurusaSAAWEn' => $sheet->getCell( 'J'. $row )->getValue(),
                ];
            }
            // $datas=[];
            // foreach ($data as $key => $value) {
            //     // dd($value[$key++]['menjalankan']);
            //     $datas=$value[$key++]['menjalankan'];
            // }
dd($data);
            $nilai=
                DB::table('siswas')->insert($data);
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
