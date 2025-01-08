<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Sarana;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index(Request $request)
    {
        $peminjaman = new Peminjaman;

        if ($request->get('search')) {
            $peminjaman = $peminjaman->where('jenis_barang', 'LIKE', '%' . $request->get('search') . '%')
                ->orWhere('jumlah_pinjam', 'LIKE', '%' . $request->get('search') . '%');
        }

        $peminjaman = $peminjaman->with('barang')->get();

        return view('peminjaman.index', compact('peminjaman', 'request'));
    }

    public function addPeminjaman()
    {
        $barang = Sarana::all();

        return view('peminjaman.addPeminjaman', compact('barang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_barang' => 'required|exists:saranas,id',
            'jumlah_pinjam' => 'required|integer|min:1',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date',
        ]);

        $barang = Sarana::findOrFail($request->id_barang);

        if ($barang->jumlah < $request->jumlah_pinjam) {
            return redirect()->back()->with('error', 'Jumlah stok barang habis.');
        }

        // Kurangi stok barang
        $barang->jumlah -= $request->jumlah_pinjam;
        $barang->save();

        // Tambahkan data peminjaman
        Peminjaman::create($request->all());

        return redirect()->route('admin.peminjaman')->with('success', 'Peminjaman berhasil ditambahkan.');
    }

    public function deletePeminjaman($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        // Hapus data peminjaman
        $peminjaman->delete();

        return redirect()->route('admin.peminjaman')->with('success', 'Peminjaman berhasil dihapus dan stok barang telah dikembalikan!');
    }
}
