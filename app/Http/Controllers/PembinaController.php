<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Pembina;
use App\models\User;
use DB;
use Illuminate\Support\Facades\Hash;
class PembinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembina = pembina::all();
        return view ('pembina/index',compact('pembina'));
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
        if ($request->level == 'paspa') {
        // if ($request['level'] == 'paspa') {
            $jk='laki-laki';
        }
        elseif ($request->level == 'paspi') {
            $jk='perempuan';
        }
        // dd($jk);
        $user = User::create([
            'name' => $request['name'],
            // 'username' => $request['username'],
            'email' => $request['email'],
            'level' => $request['level'],
            'password' => Hash::make($request['password']),
        ]);

        $user->assignRole('bk')->get();

        pembina::create([
            'nama'=> $request['name'],
            'jk'=>$jk,

        ]);
        return redirect()->route('Pembina.index')->with('success','Data Berhasil di Input');
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
