<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\SiswaExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Siswa;
use App\User;
use App\Mapel;
use PDF;

class SiswaController extends Controller
{
    public function index(Request $request) 
    {
        if($request->has('cari')) {
            $data_siswa = Siswa::where('nama_depan','LIKE','%' .$request->cari. '%')->paginate(20);
        }else{
            $data_siswa = Siswa::All();
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
        return redirect('/siswa')->with('sukses', 'DATA BERHASIL DI TAMBAHKAN !');

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
        return redirect('/siswa')->with('update', 'DATA BERHASIL DI UPDATE !');
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

       //menyiapkan data untuk chart
       $categories = [];
       $data = [];

       foreach($matapelajaran as $mp)
       {
           if($siswa->mapel()->wherePivot('mapel_id',$mp->id)->first())
       
       {
           $categories[] = $mp->nama;
           $data[] = $siswa->mapel()->wherePivot('mapel_id',$mp->id)->first()->pivot->nilai;
       }
    }

       return view('siswa.profile', ['siswa' => $siswa, 'matapelajaran' => $matapelajaran,'categories' => $categories, 'data' =>$data]);
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

    public function deletenilai($idsiswa, $idmapel)
    {
      $siswa = Siswa::find($idsiswa);
      $siswa->mapel()->detach($idmapel);
      return redirect()->back()->with('error', 'DATA NILAI BERHASIL DI HAPUS !');
    }

    public function exportExcel() 
    {
        return Excel::download(new SiswaExport, 'Siswa.xlsx');
    }

    public function exportPdf()
    {
        $siswa = Siswa::all();
        $pdf = PDF::loadView('export.siswapdf', ['siswa' => $siswa]);
       
        return $pdf->download('Siswa.pdf');
    }

    // public function getdatasiswa()
    // {
    //     $siswa = Siswa::select('siswa.*');

    //     return \DataTables::eloquent($siswa)
    //     ->addColumn('nama_lengkap',function($s) {
    //         return $s->nama_depan.''.$s->nama_belakang;
    //     })
    //     ->addColumn('rata2_nilai',function($s) {
    //         return $s->rataRataNilai();            
    //     })
    //     ->addColumn('aksi',function($s){
    //         return '<a href="#" class="btn btn-warning">Edit</a>';
    //     })
    //     ->rawColumns(['nama_lengkap','rata2_nilai','aksi'])->
    //     toJson();  
    // }
}
