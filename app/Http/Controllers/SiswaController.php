<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\SiswaImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Models\Siswa;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswas = [];
        return view('siswa/index',compact('siswas'));
    }
    public function cari(Request $request)
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
        $siswas = DB::table('siswas')
                ->where('kelas',$kel)
                ->where('jurusan',$jur)
                ->get();

        // dd($siswas);
        // $siswa = siswa::paginate(30);
        return view('siswa/index',compact('siswas'));
    }
    public function import(Request $request){
        // dd($request);
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);
        $file = $request->file('file');
        $spreadsheet = IOFactory::load($file->getRealPath());
        $sheet        = $spreadsheet->getActiveSheet();
        $row_limit    = $sheet->getHighestDataRow();
        $column_limit = $sheet->getHighestDataColumn();
        $row_range    = range( 1, $row_limit );
        $column_range = range( 'F', $column_limit );
        foreach ( $row_range as $row ) {
            $data[] = [
                'nama_siswa' =>$sheet->getCell( 'B' . $row )->getValue(),
                'nis' => $sheet->getCell( 'C' . $row )->getValue(),
                'kelas' => $sheet->getCell( 'D' . $row )->getValue(),
                'jurusan' => $sheet->getCell( 'E' . $row )->getValue(),
                'kelamin' => $sheet->getCell( 'F' . $row )->getValue(),
            ];
        }
            // dd($data);
            DB::table('siswas')->insert($data);
            return redirect()->route('Siswa.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    public function boot()
    {
        Paginator::useBootstrap();
    }
}
