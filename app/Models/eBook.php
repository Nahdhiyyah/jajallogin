<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class eBook extends Model
{
    use HasFactory;
    protected $table = 'e_books';
    protected $primaryKey = 'id';
    protected $fillable = [
        'judul_buku', 'image', 'penulis', 'resensi', 'penerbit','thn_terbit','kategori', 'buku'
    ];
    
}
