<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Register | Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonts & Icons -->
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #667eea, #764ba2);
            min-height: 100vh;
        }

        .auth-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .auth-card {
            width: 100%;
            max-width: 450px;
            background: rgba(255,255,255,0.95);
            border-radius: 18px;
            padding: 40px 35px;
            box-shadow: 0 25px 50px rgba(0,0,0,0.25);
        }

        .brand-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 26px;
            margin: 0 auto 20px;
        }

        .auth-title {
            font-weight: 600;
            color: #2d2d2d;
        }

        .auth-subtitle {
            font-size: 14px;
            color: #777;
        }

        .form-control {
            border-radius: 12px;
            height: 48px;
            font-size: 14px;
        }

        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.15rem rgba(102,126,234,.25);
        }

        .btn-auth {
            height: 48px;
            border-radius: 12px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border: none;
            font-weight: 500;
            letter-spacing: .5px;
        }

        .btn-auth:hover {
            opacity: 0.95;
        }

        .login-link {
            font-size: 13px;
        }
    </style>
</head>

<body>

<div class="auth-wrapper">
    <div class="auth-card">

        <div class="text-center mb-4">
            <div class="brand-icon">
                <i class="fas fa-user-plus"></i>
            </div>
            <h4 class="auth-title">Create Account</h4>
            <p class="auth-subtitle">Silakan daftar untuk membuat akun</p>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group mb-3">
                <input type="text"
                       name="name"
                       class="form-control"
                       placeholder="Nama Lengkap"
                       value="{{ old('name') }}"
                       required>
            </div>

            <div class="form-group mb-3">
                <input type="email"
                       name="email"
                       class="form-control"
                       placeholder="Email Address"
                       value="{{ old('email') }}"
                       required>
            </div>

            <div class="form-group mb-3">
                <input type="password"
                       name="password"
                       class="form-control"
                       placeholder="Password"
                       required>
            </div>

            <div class="form-group mb-4">
                <input type="password"
                       name="password_confirmation"
                       class="form-control"
                       placeholder="Konfirmasi Password"
                       required>
            </div>

            <button type="submit" class="btn btn-auth btn-block text-white">
                Register
            </button>

            <div class="text-center mt-4">
                <a href="{{ route('login') }}" class="login-link">
                    Sudah punya akun? <strong>Login</strong>
                </a>
            </div>
        </form>

    </div>
</div>

<!-- JS -->
<script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>