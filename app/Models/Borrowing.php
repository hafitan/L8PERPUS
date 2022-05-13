<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrowing extends Model
{
    use HasFactory;
    protected $table = 'borrowings';
    protected $fillable = ['id', 'nama', 'judul', 'tgl_pinjam', 'tgl_kembali', 'petugas', 'nis', 'rombel', 'rayon', 'jk'];
}
