<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenda extends Model
{
    use HasFactory;
    protected $table = 'tb_tenda';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_tenda',
        'kapasitas',
        'ukuran',
        'harga',
        'kebutuhan',
        'deskripsi',
        'path_gambar'
    ];
    protected $hidden = ['update_at','created_at'];

    public function ratings(){
        return $this->hasMany(Rating::class);
    }
}