<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\guru;
use App\Models\User;
use App\Models\mapel;
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
        //   dd($peng);
    return view('guru.index',[
        'peng'=> guru::all()]

);
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
            'username' => $request['username'],
            'email' => $request['email'],
            'level' => $request['level'],
            'password' => Hash::make($request['password']),
        ]);

        $user->assignRole('bk')->get();

        guru::create([
            'nama'=> $request['username'],
            'kelas'=>$request['kelas'],
            'mapel'=>$request['mapel'],

        ]);

            $id_user = DB::table('users')->where('username', $request['username'])->value('id');
            $id_guru = DB::table('guru')->where('nama',$request['username'])->value('id_guru');
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
        //
    }
    }
