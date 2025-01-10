@extends('layout.main')

@section('content')
    <div class="row">
        <div class="col-lg-3 col-sm-6 col-12 d-flex">
            <div class="dash-count">
                <div class="dash-counts">
                    <h4>{{ $saranaCount }}</h4>
                    <h5>Data Sarana</h5>
                </div>
                <div class="dash-imgs">
                    <i data-feather="archive"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-12 d-flex">
            <div class="dash-count das1">
                <div class="dash-counts">
                    <h4>{{ $peminjamanCount }}</h4>
                    <h5>Data Peminjaman</h5>
                </div>
                <div class="dash-imgs">
                    <i data-feather="file-minus"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-12 d-flex">
            <div class="dash-count das2">
                <div class="dash-counts">
                    <h4>{{ $userCount }}</h4>
                    <h5>Data User</h5>
                </div>
                <div class="dash-imgs">
                    <i data-feather="user-check"></i>
                </div>
            </div>
        </div>
    </div>
@endsection
