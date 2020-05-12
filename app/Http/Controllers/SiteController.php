<?php

namespace App\Http\Controllers;

use App\User;
use App\Siswa;
use App\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function home()
    {
        $posts = Post::all();
        return view('sites.index',compact(['posts']));
    }

    public function about()
    {
        return view('sites.about');
    }

    public function daftar()
    {
        return view('sites.daftar');
    }
    
    public function postregister(Request $request)
    {
        $user = new User;
        $user->role = 'siswa';
        $user->name = $request->nama_depan;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->remember_token = Str::random(60);
        $user->save();

        $request->request->add(['user_id' => $user->id ]);
        $siswa = Siswa::create($request->all());

        return redirect('/')->with('sukses','Data berhasil dimasukkan');
    }

    public function singlepost($slug)
    {
        $post = Post::where('slug','=',$slug)->first();
        return view('sites.singlepost',compact(['post']));
    }
}
