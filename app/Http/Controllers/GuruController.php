<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\guru;
use App\Models\User;
use App\Models\mapel;
use App\Models\kelas;
use App\Models\jurusan;
use DB;
use Illuminate\Support\Facades\Hash;

// use Intervention\Image\Facades\Image;
class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('guru.index',[
            'peng'=>guru::with('mapel','kelas')->latest()->get()
        ]);
    }


    public function create()
    {
        return view('guru.create');    }


    public function store(Request $request)
    {
    //  $this->validate($request,[
    //         'name'=>'required',
    //         'username'=>'required',
    //         'email'=>'required',
    //         'password' => ['required', 'string', 'min:4', 'confirmed'],
    //         'level'=>'required',
    //          'kelas'=>'required',
    //          'mapel'=>'required',
    //     ]);

        $user = User::create([
            'name' => $request['name'],
            // 'username' => $request['username'],
            'email' => $request['email'],
            'level' => $request['level'],
            'password' => Hash::make($request['password']),
        ]);

        $user->assignRole('bk')->get();

        guru::create([
            'nama'=> $request['name'],
            'id_kelas'=>$request['kelas'],
            'id_mapel'=>$request['mapel'],

        ]);

            $id_user = DB::table('users')->where('name', $request['name'])->value('id');
            $id_guru = DB::table('guru')->where('nama',$request['name'])->value('id_guru');
            $datasave = [
                'id_user'=>$id_user,
                'id_guru'=>$id_guru,
            ];

            DB::table('guru_has_user')->insert($datasave);

            return redirect()->route('guru.index')->with('success','Data Berhasil di Input');


            }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(request $request, $id)
    {
        $gurus = guru::find($id);
        // dd($gurus->id_mapel);
        $mapel = mapel::where('id',$gurus->id_mapel)->get();
        $kelas = kelas::where('id',$mapel[0]->id_kelas)->get();
        $user = User::where('name',$gurus->nama)->get();
        // $jurusan = kelas::where('id',$kelas[0]->id_jurusan)->get();
        // $data=$mapel;$kelas;
        $email=$user[0]->email;
        // dd($email);
        return view('guru.show',compact('gurus','kelas','email'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $peng =DB::table('guru')->where('id_guru',$id)->get();
        return view('admin/edit',['peng' => $peng]);


    }


    public function update(Request $request, $id )
    {
      DB::table('guru')->where('id_guru',$id)->get();
        // dd($request);

$request->validate([

        'status'=>'required',
        ]);

        $deo = $request->level;

          DB::table('guru')->where('id_guru',$id)->update(['status' => $request->status]);
        //  $deo = DB::table('guru')->where('id_guru',$id)->get();
        //  dd($deo);

        if ($deo  == 'manager') {
             DB::table('manager')->where('id_manager',$id)->update(['status' => $request->status]);


        }
         elseif ($deo == 'kasir'){
             $id_kasir = DB::table('guru_has_kasir')->where('id_guru', $id)->value('id_kasir');
            //   dd($id_kasir);
            DB::table('kasir')->where('id_kasir',$id_kasir)->update(['status' => $request->status]);

       }



       activity()->log('update status user');


        return redirect()->route('Guru.index')->with('success','Data Berhasil di update');

    }



    public function destroy($id)
    {
        // $data =DB::table('guru')
        // ->leftJoin('users','guru.id', '=','users.user_id')
        // ->where('users.id', $id);
        // $delete = guru::find($id);
        // $delete->delete();
        // return redirect('guru.index')->with('deleted','Kamar Theresia deleted successfully');
    }
    }
