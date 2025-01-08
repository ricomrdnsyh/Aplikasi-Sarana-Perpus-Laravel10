<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;

use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index(Request $request)
    {
        $peminjaman = new Peminjaman;

        if ($request->get('search')) {
            $peminjaman = $peminjaman->where('jenis_barang', 'LIKE', '%' . $request->get('search') . '%');
        }

        $peminjaman = $peminjaman->with('barang')->get();

        return view('peminjaman.index', compact('peminjaman', 'request'));
    }
}
