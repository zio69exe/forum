<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str; 

class SiswaController extends Controller
{
    public function index(Request $request){
        if($request->has('cari')){
            $data_siswa = \App\Models\Siswa::where('nama_depan','LIKE','%'.$request->cari.'%')->get();
        }else{
            $data_siswa = \App\Models\Siswa::all(); //menghubungkan
        }
        return view('siswa.index',['data_siswa' => $data_siswa]);    
        
    }

    public function create(Request $request){
        // $request->validate([
        //     'nama_depan' => 'required|string|max:255',
        //     'nama_belakang' => 'required|string|max:255',
        //     'jenis_kelamin' => 'required|string',
        //     'agama' => 'required|string',
        //     'alamat' => 'required|string',
        // ]);
        $user = new \App\Models\User;
        $user->role = 'siswa';
        $user->name = $request ->nama_depan;
        $user->email = $request->email;
        $user->password = bcrypt('admin123');
        $user->remember_token = Str::random(60);
        $user->save();

        
        $request->request->add(['user_id' => $user->id]);
        $siswa = \App\Models\Siswa::create($request->all());
        $siswa->user_id = $user->id;
        $siswa->save();
        return redirect('/siswa')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id){
        $siswa = \App\Models\Siswa::find($id);
        return view('siswa.edit',['siswa' => $siswa]);
    }

    public function update(Request $request, $id){
        $siswa = \App\Models\Siswa::find($id);
    
        // Update data kecuali avatar
        $siswa->update($request->except('avatar'));
    
        if ($request->hasFile('avatar')) {
            // Buat nama file unik
            $fileName = time() . '_' . $request->file('avatar')->getClientOriginalName();
            
            // Pindahkan file ke folder tujuan
            $request->file('avatar')->move(public_path('images'), $fileName);
            
            // Simpan nama file yang benar ke database
            $siswa->avatar = $fileName;
            $siswa->save();
        }
    
        return redirect('/siswa')->with('success', 'Data Berhasil Diubah');
    }
    
    

    public function delete($id){
        $siswa = \App\Models\Siswa::find($id);
        $siswa->delete($siswa);
        return redirect('/siswa')->with('success', 'Data Berhasil Dihapus');
    }

    public function profile($id){
        $siswa = \App\Models\Siswa::find($id);
        return view('siswa.profile',['siswa' => $siswa]);
    }
}
