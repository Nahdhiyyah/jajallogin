<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjam extends Model
{
    // use HasFactory;
    protected $table = 'pinjam';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'user_id', 'buku_id', 'judul_buku', 'buku', 'waktu_pinjam'
    ];
    // public function users(){
    //     return $this->belongTo(Auth::user());
    // }
    // public function e_books(){
    //     return $this->belongTo(eBook::class);
    // }
};
