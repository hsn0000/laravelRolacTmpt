<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use App\User;
use App\Mapel;

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
            'nama_depan' => 'required|min:4',
            'nama_belakang' => 'required',
            'email' => 'required|email|unique:users',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'avatar' => 'mimes:jpg,png,jpeg'
            
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
        if($request->hasFile('avatar')) 
        {
            $request->file('avatar')->move('images', $request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }
        return redirect('/siswa')->with('sukses', 'DATA BERHASIL DI INPUT !');

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
        return redirect('/siswa')->with('update', 'Data Berhasil Di Update !');
    }

    public function delete($id)
    {
        $siswa = Siswa::find($id);
        $siswa->delete($siswa);
        return redirect('/siswa')->with('danger','DATA BERHASIL DI HAPUS !');
    }

    public function profile($id)
    {
       $siswa = Siswa::find($id);
       $matapelajaran = Mapel::all();
       return view('siswa.profile', ['siswa' => $siswa, 'matapelajaran' => $matapelajaran]);
    }

    public function addnilai(Request $request,$idsiswa)
    {
      $siswa = Siswa::find($idsiswa);
      if($siswa->mapel()->where('mapel_id',$request->mapel)->exists())
      {
          return redirect('siswa/'.$idsiswa.'/profile')->with('error', 'DATA MATA PELAJARAN SUDAH ADA !');
      }
      $siswa->mapel()->attach($request->mapel,['nilai' => $request->nilai]);

      return redirect('siswa/'.$idsiswa. '/profile')->with('sukses', 'DATA NILAI BERHASIL DI MASUKAN !');
    }
}
