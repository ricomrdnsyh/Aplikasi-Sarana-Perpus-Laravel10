<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sarana extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_barang',
        'jenis_barang',
        'jumlah',
        'kondisi',
        'keterangan',
    ];

    public static function generateKodeBarang(){

        $lastItem = self::orderBy('id', 'desc')->first();
        $number = $lastItem ? (int)substr($lastItem->kode_barang, -4) + 1 : 1;
        return 'INV/PERPUS-UNUJA/' . str_pad($number, 4, '0', STR_PAD_LEFT);
    }
}
