<?php

namespace App\Http\Controllers;

use App\Models\Sarana;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Validator;

class SaranaController extends Controller
{

    public function index(Request $request){

        $data = new Sarana;

        if($request->get('search')){
            $data = $data->where('kode_barang', 'LIKE', '%'.$request->get('search').'%')
            ->orWhere('jenis_barang', 'LIKE', '%'.$request->get('search').'%')
            ->orWhere('kondisi', 'LIKE', '%'.$request->get('search').'%')
            ->orWhere('keterangan', 'LIKE', '%'.$request->get('search').'%');

        }

        $data = $data->get();

        if($request->get('export') == 'pdf'){
            $pdf = Pdf::loadView('pdf.sarana', ['data' => $data]);
            return $pdf->stream('Data Sarana.pdf');
        }

        return view('sarana.index', compact('data', 'request'));
    }

    public function addSarana(){

        $kodeBarang = Sarana::generateKodeBarang();
        return view('sarana.addSarana', compact('kodeBarang'));
    }

    public function store(Request $request){

        $request->validate([
            'jenis_barang'  => 'required',
            'jumlah'        => 'required',
            'kondisi'       => 'required',
            'keterangan'    => 'required',
        ]);

        $kodeBarang = Sarana::generateKodeBarang();

        $data = Sarana::create([
            'kode_barang'       => $kodeBarang,
            'jenis_barang'      =>$request->jenis_barang,
            'jumlah'            =>$request->jumlah,
            'kondisi'           =>$request->kondisi,
            'keterangan'        =>$request->keterangan,
        ]);

        return redirect()->route('admin.sarana')->with('success', 'Data Berhasil ditambahkan!');
    }

    public function editSarana(Request $request,$id){
        $data = Sarana::find($id);

        return view('sarana.editSarana', compact('data'));
    }

    public function updateSarana(Request $request,$id){

        $request->validate([
            'jenis_barang'  => 'required',
            'jumlah'        => 'required',
            'kondisi'       => 'required',
            'keterangan'    => 'required',
        ]);

        $find = Sarana::findOrFail($id);

        $find->update([
            'jenis_barang'      =>$request->jenis_barang,
            'jumlah'            =>$request->jumlah,
            'kondisi'           =>$request->kondisi,
            'keterangan'        =>$request->keterangan,
        ]);

        return redirect()->route('admin.sarana')->with('success', 'Data Berhasil diubah!');
    }

    public function deleteSarana(Request $request,$id){
        $data = Sarana::findOrFail($id);

        $data->delete();

        return redirect()->route('admin.sarana')->with('success', 'Data berhasil dihapus! ');
    }
}
