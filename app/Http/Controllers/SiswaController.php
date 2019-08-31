<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use App\User;

class SiswaController extends Controller
{
    public function index(Request $request) 
    {
        if($request->has('cari')) {
            $data_siswa = Siswa::where('nama_depan','LIKE','%' .$request->cari. '%')->get();
        }else{
            $data_siswa = Siswa::all();
        }
        return view('siswa.index',['data_siswa'=> $data_siswa]);
    }

    public function create(Request $request)
    {  

        $this->validate($request, [ 
            'nama_depan' => 'required|min:5',
            'email' => 'required|email|unique:users',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            
            ]);

        // inset ke table user

        $user = new User;
        $user->role = 'siswa';
        $user->name = $request->nama_depan;
        $user->email = $request->email;
        $user->password = bcrypt('husinpass');
        $user->remember_token = str_random(60);
        $user->save();

          // insert ke table siswa
        $request->request->add(['user_id' => $user->id]);
        $siswa = Siswa::create($request->all());
        return redirect('/siswa')->with('sukses', 'Data Berhasil Di Input !');

    }

    public function edit($id) 
    {
      $siswa = Siswa::find($id);
      return view('siswa/edit', ['siswa' => $siswa]);
    }
    public function update(Request $request,$id)
    {
        // dd($request->all());
        $siswa = Siswa::find($id);
        $siswa->update($request->all());
        if($request->hasFile('avatar')) 
        {
            $request->file('avatar')->move('images', $request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }
        return redirect('/siswa')->with('sukses', 'Data Berhasil Di Update !');
    }

    public function delete($id)
    {
        $siswa = Siswa::find($id);
        $siswa->delete($siswa);
        return redirect('/siswa')->with('sukses','DATA BERHASIL DI HAPUS !');
    }

    public function profile($id)
    {
       $siswa = Siswa::find($id);
       return view('siswa.profile', ['siswa' => $siswa]);
    }
}
