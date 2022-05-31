<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nilairata;
use App\Models\nilaiawal;
use App\Models\ratarata;
use App\Models\banding;
use DB;
use Carbon\Carbon;
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

        $data = nilairata::where('jurusan', 'like', "%" . $keyword . "%")->get();
        // dd($data);
        return view('admin.daftarksus',compact ('data'));

    }
    public function carijsn(Request $request)
    {
        $keyword = $request->search;
        // dd($keyword);
        $data = ratarata::where('jurusan', 'like', "%" . $keyword . "%")->get();
        // dd($data);
        return view('admin.nilairata',compact ('data'));

    }
    public function caribulan(Request $request)
    {
        $keyword = $request->search;
        // $keyword->format('y-m');
        $bul=Carbon::parse($request->search)->isoformat('MMM');
        // dd($bul);
        $data = nilairata::where('bulan', 'like', "%" . $bul . "%")->get();
        return view('admin.daftarksus',compact ('data'));

    }
    public function cariblan(Request $request)
    {
        $keyword = $request->search;
        // $keyword->format('y-m');
        $bul=Carbon::parse($request->search)->isoformat(' MMM ');
        // dd($bul);
        $data = ratarata::where('bulan', 'like', "%" . $bul . "%")->get();
        return view('admin.nilairata',compact ('data'));

    }
    public function carijk(Request $request)
    {
        $keyword = $request->search;

        $data = nilairata::where('jk', 'like', "%" . $keyword . "%")->get();
        // dd($data);
        return view('admin.daftarksus',compact ('data'));

    }
    public function carikelas(Request $request)
    {
        // dd($request);
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
            $jur ='Bisnis Konstruksi Dan Properti';
        }
        elseif ($jurusan==3) {
            $jur ='Multimedia';
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

    public function nilai(Request $request){
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
            $jur ='Bisnis Konstruksi Dan Properti';
        }
        elseif ($jurusan==3) {
            $jur ='Multimedia';
        }
        elseif ($jurusan==4) {
            $jur ='Teknik Kendaraan Ringan dan Otomotif';
        }
        elseif ($jurusan==5) {
            $jur ='Tata Boga';
        }
        else{
        }
        $kell=$kel;
        $jurr=$jur;
        // dd($kell,$jurr);
        // $data= nilaiawal::where('kelas',$tes);
        // $kat = banding::find($data);
        // $stat = $kat->status ='terisi';
        // $kat->update(['status' => $stat]);
        $bln= Carbon::now()->isoFormat(' MMM ');
        // dd($kell);
if ($bln == ' Jan ' || $bln == ' Feb ' || $bln == ' Mar '|| $bln == ' Apr ' || $bln == ' May ' || $bln == ' Jun ') {
    $data = DB::table('rataratas')
    ->where('kelas',$kell)
    ->where('jurusan',$jurr)
    ->get();
    // dd($data);
}elseif ($bln == ' Jul ' || $bln == ' Aug ' || $bln == ' Sep '|| $bln == ' Oct ' || $bln == ' Nov ' || $bln == ' Dec ') {
    $data = DB::table('semganjils')
    ->where('kelas',$kell)
    ->where('jurusan',$jurr)
    ->get();
}

// $data=$data;
// dd($data);
    return view('admin.nilairata',compact('data'));

    }
    public function add($kumpul,$namass,$kelas,$jurusan,$jmlsi,$kel,$jur)
    {
        $kel=$kel;
        $jur=$jur;
        $datap = DB::table('rataratas')
        ->where('kelas',$kel)
        ->where('jurusan',$jur)
        ->get();

        for ($b=0; $b < $jmlsi; $b++){

            if ($datap[$b]->kelas > $jmlsi || $datap[$b]->jurusan > $jmlsi) {
                // dd($jmlsi);
            // dd($datap[19]->kelas);
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
                'kategori'=>'sekolah',
                'bulan'=>'mei',

            ]);
        }



        }

        // return view('admin.nilairata',compact ('data'));
        // $this->add($kumpul,$namass,$kelas,$jurusan,$jmlsi,$kel,$jur);


    }
    public function nilairatas(){

    $data = DB::table('rataratas')

                ->get();
    return view('admin.nilairata',compact('data'));
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
