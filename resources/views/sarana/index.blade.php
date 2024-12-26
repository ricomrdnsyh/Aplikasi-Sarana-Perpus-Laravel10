@extends('layout.main')

@section('content')
    <div class="page-header">
        <div class="page-title">
            <h4>Data Sarana</h4>
            <h6>Manage your Sarana</h6>
        </div>
        <div class="page-btn">
            <a href="{{ route('admin.add.sarana') }}" class="btn btn-added"><img
                    src="{{ asset('templates/assets/img/icons/plus.svg') }}" alt="img" />Add Sarana</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-top">
                <form action="{{ route('admin.user') }}" method="GET">
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
                            <a href="{{ route('admin.sarana') }}?export=pdf" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="export pdf"><img
                                    src="{{ asset('templates/assets/img/icons/pdf.svg') }}" alt="img" /></a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table datanew">
                    <thead>
                        <tr>
                            <th>Kode Barang</th>
                            <th>Jenis Barang</th>
                            <th>Jumlah</th>
                            <th>Kondisi</th>
                            <th>Keterangan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                            <tr>
                                <td>{{ $d->kode_barang }}</td>
                                <td>{{ $d->jenis_barang }}</td>
                                <td>{{ $d->jumlah }}</td>
                                <td>
                                    @if ($d->kondisi == 'Baru')
                                        <span class="bg-lightyellow badges">Baru</span>
                                    @elseif ($d->kondisi == 'Baik')
                                        <span class="bg-lightgreen badges">Baik</span>
                                    @elseif ($d->kondisi == 'Rusak')
                                        <span class="bg-lightred badges">Rusak</span>
                                    @else
                                        <span class="bg-lightyellow badges">Tidak Diketahui</span>
                                    @endif
                                </td>
                                <td>{{ $d->keterangan }}</td>
                                <td class="d-flex align-items-center">
                                    <a class="me-3" href="{{ route('admin.edit.sarana', ['id' => $d->id]) }}">
                                        <img src="{{ asset('templates/assets/img/icons/edit.svg') }}" alt="img" />
                                    </a>
                                    <form id="deleteForm-{{ $d->id }}"
                                        action="{{ route('admin.delete.sarana', ['id' => $d->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="me-3 confirm-text border border-0 bg-transparent"
                                            onclick="confirmDelete({{ $d->id }})">
                                            <img src="{{ asset('templates/assets/img/icons/delete.svg') }}"
                                                alt="img" />
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
