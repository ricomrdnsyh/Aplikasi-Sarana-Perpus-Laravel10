@extends('layout.main')

@section('content')
    <div class="page-header">
        <div class="page-title">
            <h4>Data Peminjaman</h4>
            <h6>Manage your Peminjaman</h6>
        </div>
        <div class="page-btn">
            <a href="#" class="btn btn-added"><img src="{{ asset('templates/assets/img/icons/plus.svg') }}"
                    alt="img" />Add Peminjaman</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-top">
                <form action="#" method="GET">
                    <div class="search-set">
                        <div class="search-input">
                            <a class="btn btn-searchset" name="search" value="{{ $request->get('search') }}"><img
                                    src="{{ asset('templates/assets/img/icons/search-white.svg') }}" alt="img" /></a>
                        </div>
                    </div>
                </form>
                <div class="wordset">
                    <ul>
                        <li>
                            <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="export pdf"><img
                                    src="{{ asset('templates/assets/img/icons/pdf.svg') }}" alt="img" /></a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table datanew">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Sarana</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($peminjaman as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->barang->jenis_barang }}</td>
                                <td>{{ $item->tanggal_pinjam }}</td>
                                <td>{{ $item->tanggal_kembali ?? '-' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
