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
        'jumlah_pinjam',
        'tanggal_pinjam',
        'tanggal_kembali',
    ];

    public function barang()
    {
        return $this->belongsTo(Sarana::class, 'id_barang');
    }

    protected static function booted()
    {
        static::deleting(function ($peminjaman) {
            // Tambahkan stok barang kembali sesuai jumlah yang dipinjam
            $barang = $peminjaman->barang;
            if ($barang) {
                $barang->jumlah += $peminjaman->jumlah_pinjam;
                $barang->save();
            }
        });
    }
}
