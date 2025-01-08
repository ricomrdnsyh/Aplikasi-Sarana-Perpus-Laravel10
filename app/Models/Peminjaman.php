<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjamans';
    protected $fillable = [
        'id_barang',
        'tanggal_pinjam',
        'tanggal_kembali',
    ];

    public function barang()
    {
        return $this->belongsTo(Sarana::class, 'id_barang');
    }
}
