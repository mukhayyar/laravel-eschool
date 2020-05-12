<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Siswa;
use App\Mapel;
use Illuminate\Support\Str;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use App\Exports\SiswaExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('cari')){
            $data_siswa = Siswa::where('nama_depan','LIKE','%'.$request->cari.'%')->paginate(20);
        }else{
            $data_siswa = Siswa::all();
        }
        return view('siswa.index',['data_siswa' => $data_siswa ]);
    }

    public function create(Request $request)
    {
        $this->validate($request,[
            'nama_depan' => 'required|min:5',
            'nama_belakang' => 'required|min:5',
            'email' => 'required|email|unique:users',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'avatar' => 'required'
        ]);
        
        //insert ke tabel user
        $user = new User;
        $user->role = 'siswa';
        $user->name = $request->nama_depan;
        $user->email = $request->email;
        $user->password = bcrypt('rahasia');
        $user->remember_token = Str::random(60);
        $user->save();

        //insert ke tabel siswa
        $request->request->add(['user_id' => $user->id ]);
        $siswa = Siswa::create($request->all());
        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }
        return redirect('/siswa')->with('sukses','Data berhasil dimasukkan') ;
    }

    public function edit(Siswa $siswa)
    {
        return view('siswa/edit',['siswa' => $siswa]);
    }

    public function update(Request $request,Siswa $siswa)
    {
        $this->validate($request,[
            'nama_depan' => 'required|min:5',
            'nama_belakang' => 'required|min:5',
            'avatar' => 'mimes:png,jpg'
        ]);
        $siswa->update($request->all());
        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }
        return redirect('\siswa')->with('sukses','Data berhasil diupdate');
    }

    public function delete(Siswa $siswa)
    {
        $siswa->delete($siswa);
        return redirect('/siswa')->with('sukses','Data berhasil dihapus');
    }

    public function profile(Siswa $siswa)
    {
        $matapelajaran = Mapel::all();

        //menyiapkan data pada chart
        $categories = [];
        $data = [];

        foreach($matapelajaran as $mp){
            if($siswa->mapel()->wherePivot('mapel_id',$mp->id)->first()){

                $categories[] = $mp->nama;
                $data[] = $siswa->mapel()->wherePivot('mapel_id',$mp->id)->first()->pivot->nilai;
            }
        }


        return view('siswa/profile',['siswa'=>$siswa,'matapelajaran'=>$matapelajaran,'categories'=>$categories,'data'=>$data]);
    }

    public function addnilai(Request $request,Siswa $siswa)
    {
        if($siswa->mapel()->where('mapel_id',$request->mapel)->exists()){
            return redirect('siswa/'.$siswa->id.'/profile')->with('error','Data sudah ada');
        }
        $siswa->mapel()->attach($request->mapel,['nilai' => $request->nilai]);
        return redirect('siswa/'.$siswa->id.'/profile')->with('sukses','Data Berhasil Dimasukkan'); 
    }

    public function deletenilai($idsiswa, $idmapel)
    {
        $siswa = Siswa::find($idsiswa);
        $siswa->mapel()->detach($idmapel);
        return redirect()->back()->with('sukses','Nilai Berhasil Dihapus');
    }

    public function exportExcel()
    {
        return Excel::download(new SiswaExport, 'siswa.xlsx');
    }

    public function exportPdf()
    {
        $siswa = Siswa::all();
        $pdf = PDF::loadView('export.siswapdf',['siswa'=>$siswa]);
        return $pdf->download('siswa.pdf');
    }
}
