<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa'; //buat supaya laravel gak ngangap table nya bukan siswas
    protected $fillable = ['nama_depan', 'nama_belakang', 'jenis_kelamin', 'agama', 'alamat', 'avatar', 'user_id'];

//klao gambar gak ada
    public function getAvatar(){
        if(!$this->avatar){
            return asset('images/default.png');
        }
        return asset('images/'.$this->avatar);
    }
}
