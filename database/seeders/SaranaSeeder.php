<?php

namespace Database\Seeders;

use App\Models\Sarana;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SaranaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sarana::create([
            'kode_barang' => 'INV/PERPUS-UNUJA/0001',
            'jenis_barang' => 'Rak Buku Kayu',
            'jumlah' => 25,
            'Kondisi' => 'Baik',
            'Keterangan' => 'Rusak 2',
        ]);
    }
}
