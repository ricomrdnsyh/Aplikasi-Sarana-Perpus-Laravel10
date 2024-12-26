@extends('layout.main')

@section('content')
    <div class="page-header">
        <div class="page-title">
            <h4>Sarana Management</h4>
            <h6>Edit Sarana</h6>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.update.sarana', ['id' => $data->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Kode Barang</label>
                            <input type="text" disabled="" value="{{ $data->kode_barang }}" />
                            @error('kode_barang')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Jenis Barang</label>
                            <input type="text" name="jenis_barang" value="{{ $data->jenis_barang }}" />
                            @error('jenis_barang')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input type="number" class="form-control mb-2" name="jumlah" value="{{ $data->jumlah }}">
                        @error('jumlah')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-lg-12 mb-3">
                        <label for="kondisi" class="form-label">Kondisi</label>
                        <select class="form-select mb-2" name="kondisi" id="kondisi">
                            <option selected="" disabled="">Pilih Kondisi</option>
                            <option value="Baru" {{ $data->kondisi == 'Baru' ? 'selected' : '' }}>Baru</option>
                            <option value="Baik" {{ $data->kondisi == 'Baik' ? 'selected' : '' }}>Baik</option>
                            <option value="Rusak" {{ $data->kondisi == 'Rusak' ? 'selected' : '' }}>Rusak</option>
                        </select>
                        @error('kondisi')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea class="form-control" name="keterangan">{{ old('keterangan', $data->keterangan) }}</textarea>
                            @error('keterangan')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-submit me-2">Update</button>
                        <a href="{{ route('admin.sarana') }}" class="btn btn-cancel">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
