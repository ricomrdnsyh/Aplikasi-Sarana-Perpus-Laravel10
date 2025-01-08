<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Login - Sarana Perpus Unuja</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('templates/assets/img/favicon1.jpg') }}">

    <link rel="stylesheet" href="{{ asset('templates/assets/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('templates/assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('templates/assets/plugins/fontawesome/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('templates/assets/css/style.css') }}">
</head>

<body class="account-page">

    <div class="main-wrapper">
        <div class="account-content">
            <div class="login-wrapper">
                <div class="login-content">
                    <div class="login-userset">
                        <form action="{{ route('daftar-proses') }}" method="POST">
                            @csrf
                            <div class="login-logo">
                                <img src="{{ asset('templates/assets/img/logofix.png') }}" alt="img">
                            </div>
                            <div class="login-userheading">
                                <h3>Create An Account</h3>
                                <h4>Continue where you left off</h4>
                            </div>
                            <div class="form-login">
                                <label>Nama Lengkap</label>
                                <div class="form-addons">
                                    <input type="text" name="nama" value="{{ old('nama') }}"
                                        placeholder="Enter your name">
                                    @error('nama')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-login">
                                <label>Username</label>
                                <div class="form-addons">
                                    <input type="text" name="username" value="{{ old('username') }}"
                                        placeholder="Enter your username">
                                    @error('username')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-login">
                                <label>Password</label>
                                <div class="pass-group">
                                    <input type="password" name="password" class="pass-input"
                                        placeholder="Enter your password">
                                    <span class="fas toggle-password fa-eye-slash"></span>
                                    @error('password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-login">
                                <button type="submit" class="btn btn-login">Sign Up</button>
                            </div>
                        </form>
                        <div class="signinform text-center">
                            <h4>have an account? <a href="{{ route('login') }}" class="hover-a">Sign In</a></h4>
                        </div>
                    </div>
                </div>
                <div class="login-img">
                    <img src="{{ asset('templates/assets/img/login.jpg') }}" alt="img">
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('templates/assets/js/jquery-3.6.0.min.js') }}"></script>

    <script src="{{ asset('templates/assets/js/feather.min.js') }}"></script>

    <script src="{{ asset('templates/assets/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('templates/assets/js/script.js') }}"></script>

    <!-- Sweet Alerts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if ($message = Session::get('success'))
        <script>
            Swal.fire({
                title: "Success!",
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
                text: "Email atau password salah!",
            });
        </script>
    @endif

    <div class="sidebar-overlay"></div>
</body>

</html>
