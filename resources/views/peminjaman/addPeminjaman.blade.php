@extends('layout.main')

@section('content')
    <div class="page-header">
        <div class="page-title">
            <h4>Peminjaman Management</h4>
            <h6>Add Peminjaman</h6>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.store.peminjaman') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-12 mb-3">
                        <label for="id_barang" class="form-label">Kondisi</label>
                        <select class="form-select mb-2" name="id_barang" id="id_barang">
                            @foreach ($barang as $item)
                                <option value="{{ $item->id }}">{{ $item->jenis_barang }} (Jumlah : {{ $item->jumlah }})
                                </option>
                            @endforeach
                        </select>
                        @error('id_barang')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="jumlah_pinjam" class="form-label">Jumlah</label>
                        <input type="number" class="form-control mb-2" name="jumlah_pinjam">
                        @error('jumlah_pinjam')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
                            <input type="date" class="form-control mb-2" name="tanggal_pinjam" />
                            @error('tanggal_pinjam')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tanggal_kembali" class="form-label">Tanggal Kembali</label>
                            <input type="date" class="form-control mb-2" name="tanggal_kembali" />
                            @error('tanggal_kembali')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-submit me-2">Tambah</button>
                        <a href="{{ route('admin.peminjaman') }}" class="btn btn-cancel">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
