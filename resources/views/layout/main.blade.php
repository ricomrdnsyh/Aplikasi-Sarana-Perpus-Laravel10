<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
    <meta name="description" content="POS - Bootstrap Admin Template" />
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern,  html5, responsive" />
    <meta name="author" content="Dreamguys - Bootstrap Admin Template" />
    <meta name="robots" content="noindex, nofollow" />
    <title>Sarana Perpus Unuja</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('templates/assets/img/favicon1.jpg') }}" />

    <link rel="stylesheet" href="{{ asset('templates/assets/css/bootstrap.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('templates/assets/css/animate.css') }}" />

    <link rel="stylesheet" href="{{ asset('templates/assets/css/dataTables.bootstrap4.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('templates/assets/plugins/fontawesome/css/fontawesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('templates/assets/plugins/fontawesome/css/all.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('templates/assets/css/style.css') }}" />
</head>

<body>
    <div class="main-wrapper">
        <div class="header">
            <div class="header-left active">
                <a href="{{ route('admin.dashboard') }}" class="logo">
                    <img src="{{ asset('templates/assets/img/logofix.png') }}" alt=""' />
                </a>
                <a href="index.html" class="logo-small">
                    <img src="{{ asset('templates/assets/img/unuja.jpg') }}" alt="" />
                </a>
                <a id="toggle_btn" href="javascript:void(0);"> </a>
            </div>

            <a id="mobile_btn" class="mobile_btn" href="#sidebar">
                <span class="bar-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </a>

            <ul class="nav user-menu">
                <li class="nav-item dropdown has-arrow main-drop">
                    <a href="#" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
                        <span class="user-img"><img src="{{ asset('templates/assets/img/unuja.jpg') }}"
                                alt="" />
                            <span class="status online"></span></span>
                    </a>
                    <div class="dropdown-menu menu-drop-user">
                        <div class="profilename">
                            <hr class="m-0" />
                            <a class="dropdown-item" href="{{ route('logout') }}">
                                <i class="me-2" data-feather="log-out"></i>Logout
                            </a>
                        </div>
                    </div>
                </li>
            </ul>

            <div class="dropdown mobile-user-menu">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                </div>
            </div>
        </div>

        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu">
                            <a href="{{ route('admin.dashboard') }}"><i data-feather="box"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <hr>
                        <li class="menu">
                            <a href="{{ route('admin.sarana') }}"><i data-feather="package"></i>
                                <span>Data Sarana</span>
                            </a>
                        </li>
                        <li class="menu">
                            <a href="{{ route('admin.user') }}"><i data-feather="users"></i>
                                <span>Data User</span>
                            </a>
                        </li>
                        <hr>
                        <li class="menu">
                            <a href="{{ route('logout') }}"><i data-feather="log-out"></i>
                                <span>Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="page-wrapper">
            <div class="content">
                <!-- Content -->
                @yield('content')
                <!-- /Content -->
            </div>
        </div>
    </div>

    <script src="{{ asset('templates/assets/js/jquery-3.6.0.min.js') }}"></script>

    <script src="{{ asset('templates/assets/js/feather.min.js') }}"></script>

    <script src="{{ asset('templates/assets/js/jquery.slimscroll.min.js') }}"></script>

    <script src="{{ asset('templates/assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('templates/assets/js/dataTables.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('templates/assets/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('templates/assets/plugins/apexchart/apexcharts.min.js') }}"></script>
    <script src="{{ asset('templates/assets/plugins/apexchart/chart-data.js') }}"></script>

    <script src="{{ asset('templates/assets/js/script.js') }}"></script>

    <!-- Sweet Alerts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if ($message = Session::get('success'))
        <script>
            Swal.fire({
                title: "Good job!",
                text: "{{ $message }}",
                icon: "success"
            });
        </script>
    @endif
    @if ($message = Session::get('failed'))
        <script>
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "{{ $message }}",
            });
        </script>
    @endif

    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('deleteForm-' + id).submit();
                }
            })
        }
    </script>
    <!-- End Sweet Alerts -->

</body>

</html>
