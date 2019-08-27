<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;

class SiswaController extends Controller
{
    public function index() 
    {
        $data_siswa = \App\Siswa::all();
        return view('siswa.index',['data_siswa'=> $data_siswa]);
    }

    public function create(Request $request)
    {
        Siswa::create($request->all());
        return redirect('/siswa')->with('sukses', 'Data Berhasil Di Input');

    }

    public function edit($id) 
    {
      $siswa = Siswa::find($id);
      dd($siswa);
    }
}
