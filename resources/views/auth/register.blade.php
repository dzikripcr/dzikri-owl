<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Register - Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('assets-admin/img/favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets-admin/img/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets-admin/img/favicon/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('assets-admin/img/favicon/site.webmanifest')}}">
    <link rel="mask-icon" href="{{asset('assets-admin/img/favicon/safari-pinned-tab.svg')}}" color="#ffffff">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <!-- Sweet Alert -->
    <link type="text/css" href="{{asset('assets-admin/vendor/sweetalert2/dist/sweetalert2.min.css')}}" rel="stylesheet">

    <!-- Notyf -->
    <link type="text/css" href="{{asset('assets-admin/vendor/notyf/notyf.min.css')}}" rel="stylesheet">

    <!-- Volt CSS -->
    <link type="text/css" href="{{asset('assets-admin/css/volt.css')}}" rel="stylesheet">

    <!-- Custom Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .logo-container {
            text-align: center;
            margin-bottom: 2rem;
        }
        .logo {
            max-width: 150px;
            height: auto;
        }
    </style>
</head>

<body>
    <main>
        <!-- Section -->
        <section class="vh-lg-100 mt-5 mt-lg-0 bg-soft d-flex align-items-center">
            <div class="container">
                <div class="row justify-content-center form-bg-image" data-background-lg="{{asset('assets-admin/img/illustrations/signin.svg')}}">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-100 fmxw-500">
                            <div class="text-center text-md-center mb-4 mt-md-0">
                                <h1 class="mb-0 h3">Buat Akun Admin</h1>
                            </div>

                            <!-- Alert Error -->
                            @if($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    @foreach($errors->all() as $error)
                                        {{ $error }}<br>
                                    @endforeach
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            <form action="{{ route('auth.register') }}" class="mt-4" method="POST">
                                @csrf

                                <!-- Nama -->
                                <div class="form-group mb-4">
                                    <label for="nama">Username</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"></path></svg>
                                        </span>
                                        <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}" placeholder="Masukkan nama lengkap" required>
                                    </div>
                                </div>

                                <!-- Username -->
                                <div class="form-group mb-4">
                                    <label for="username">Email</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
                                        </span>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Masukkan username" required>
                                    </div>
                                </div>

                                <!-- Password -->
                                <div class="form-group mb-4">
                                    <label for="password">Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path></svg>
                                        </span>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
                                    </div>
                                </div>

                                <!-- Confirm Password -->
                                <div class="form-group mb-4">
                                    <label for="password_confirmation">Konfirmasi Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path></svg>
                                        </span>
                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Ulangi password" required>
                                    </div>
                                </div>

                                <div class="d-grid">
                                    <button type="submit" class="btn btn-gray-800">Daftar</button>
                                </div>
                            </form>

                            <div class="d-flex justify-content-center align-items-center mt-4">
                                <span class="fw-normal">
                                    Sudah punya akun?
                                    <a href="{{ route('login.index') }}" class="fw-bold">Login di sini</a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Core -->
    <script src="{{asset('assets-admin/vendor/@popperjs/core/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('assets-admin/vendor/bootstrap/dist/js/bootstrap.min.js')}}"></script>

    <!-- Sweet Alert -->
    <script src="{{asset('assets-admin/vendor/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>

    <!-- Notyf -->
    <script src="{{asset('assets-admin/vendor/notyf/notyf.min.js')}}"></script>

    <!-- Volt JS -->
    <script src="{{asset('assets-admin/js/volt.js')}}"></script>
</body>
</html>
