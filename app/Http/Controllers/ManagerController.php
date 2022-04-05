<?php

namespace App\Http\Controllers;
use App\Models\Kategori;
use App\Models\Meja;
use App\Models\Menu;
use App\Models\Pesanan;
use App\Models\User;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('manager.index',[
            'data_pesan' => Pesanan::all()->count(),
            'data_meja' => Meja::all()->count(),
            'data_menu' => Menu::all()->count(),
            'data_kategori'=>Kategori::all()->count()
        ]);
    }

    public function laporantrans()
    {
        $data=pesanan::paginate(7);
        return view ('manager.laporan', compact('data'));
    }
    public function laporandapat(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        $data = pesanan::whereBetween('created_at',array($from, $to))->paginate(10);
        // dd($data);
        return view('manager.laporandapat', compact('data'));
    }
    public function cari(Request $request){
        $from = $request->from;
        $to = $request->to;
        $data = pesanan::whereBetween('created_at',array($from, $to))->paginate(10);

        return view('manager.laporan', compact('data'));

    }
    public function search(Request $request)
    {
        $keyword = $request->search;
        $data = pesanan::where('nama_pegawai', 'like', "%" . $keyword . "%")->paginate(5);
        return view('manager.laporan', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function caris(Request $request)
    {
        $keyword =$request->search;
         $data =pesanan::where('created_at','like','%'.$keyword.'%')->get();
        // dd($keyword);
        return view('manager.laporand', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    // public function total(Request $data ){

    //     $tanggal = date('Y-m-d');
    //     $data = pesanan::whereDate('created_at',$tanggal)->get();
    //     // dd($data);
    //     return view('manager.laporandapat', compact('data'));

    // }
    public function bln(Request $data ){
        $tanggal = date('Y-m-d');
        $bulan = date('m',strtotime($tanggal));
        $data = pesanan::whereMonth('created_at',$bulan,)->get();


        $data = pesanan::where('total_beli', '>', 0)->get()->sum('total_beli');
        $months = pesanan::select(
            DB::raw('sum(total_beli) as `sum`'),
        )
            ->whereMonth('created_at', $bulan)


            ->get();
            // dd($months);

        return view('manager.laporandapat', compact('data','months'));

    }
    public function create()
    {

    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
