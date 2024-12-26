@extends('layout.main')

@section('content')
    <div class="page-header">
        <div class="page-title">
            <h4>Sarana Management</h4>
            <h6>Add Sarana</h6>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.store.sarana') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Kode Barang</label>
                            <input type="text" disabled="" value="{{ $kodeBarang }}" />
                            <input type="hidden" name="kode_barang" value="{{ $kodeBarang }}">
                            @error('kode_barang')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Jenis Barang</label>
                            <input type="text" name="jenis_barang" />
                            @error('jenis_barang')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input type="number" class="form-control mb-2" name="jumlah">
                        @error('jumlah')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-lg-12 mb-3">
                        <label for="kondisi" class="form-label">Kondisi</label>
                        <select class="form-select mb-2" name="kondisi" id="kondisi">
                            <option selected="" disabled="">Pilih Kondisi</option>
                            <option value="Baru">Baru</option>
                            <option value="Baik">Baik</option>
                            <option value="Rusak">Rusak</option>
                        </select>
                        @error('kondisi')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea class="form-control" name="keterangan"></textarea>
                            @error('keterangan')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-submit me-2">Tambah</button>
                        <a href="{{ route('admin.sarana') }}" class="btn btn-cancel">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
