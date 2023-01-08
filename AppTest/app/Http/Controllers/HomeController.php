<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = DB::table('data')->get();
        return view('home',['data' => $data]);
    }

    public function tambah()
    {
        return view('tambah');
    }

    public function insert(Request $request)
    {
        DB::table('data')->insert([
            'kodeKebun' => $request->kodeKebun,
            'namaKebun' => $request->namaKebun,
            'luasKebun' => $request->luasKebun
        ]);

        return redirect('/home')->with(['success' => 'Data berhasil ditambah!']);
    }

    public function edit($id)
    { 
        $data = DB::table('data')->where('id',$id)->get(); 
        
        return view('edit',['data' => $data]);
    }

    public function update(Request $request)
    {
        DB::table('data')->where('id',$request->id)->update([
            'kodeKebun' => $request->kodeKebun,
            'namaKebun' => $request->namaKebun,
            'luasKebun' => $request->luasKebun
        ]);

        return redirect('/home')->with(['success' => 'Data berhasil diedit!']);
    }
    
    public function delete($id)
    {
        DB::table('data')->where('id',$id)->delete();
    
        return redirect('/home')->with(['success' => 'Data berhasil dihapus!']);
    }
}
