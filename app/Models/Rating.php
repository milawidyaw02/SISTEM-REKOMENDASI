<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $table = 'tb_rating';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'tenda_id',
        'rating'
    ];
    protected $hidden = ['created_at, updated_at'];

    public function tenda(){
        return $this->belongsTo(Tenda::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}