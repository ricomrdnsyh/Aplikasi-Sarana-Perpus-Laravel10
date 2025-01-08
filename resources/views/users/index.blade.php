@extends('layout.main')

@section('content')
    <div class="page-header">
        <div class="page-title">
            <h4>Data User</h4>
            <h6>Manage your User</h6>
        </div>
        <div class="page-btn">
            <a href="{{ route('admin.add.user') }}" class="btn btn-added"><img
                    src="{{ asset('templates/assets/img/icons/plus.svg') }}" alt="img" />Add User</a>
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
            </div>

            <div class="table-responsive">
                <table class="table datanew">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $d->nama }}</td>
                                <td>{{ $d->username }}</td>
                                <td>{{ $d->password }}</td>
                                <td class="d-flex align-items-center">
                                    <a class="me-3" href="{{ route('admin.edit.user', ['id' => $d->id]) }}">
                                        <img src="{{ asset('templates/assets/img/icons/edit.svg') }}" alt="img" />
                                    </a>
                                    <form id="deleteForm-{{ $d->id }}"
                                        action="{{ route('admin.delete.user', ['id' => $d->id]) }}" method="POST">
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
