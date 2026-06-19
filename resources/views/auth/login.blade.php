<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - DENSO Admin</title>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('bootstrap-5.3.8-dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: url('{{ asset('images/denso_office.png') }}') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            position: relative;
            overflow: hidden;
        }
        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.55); /* Dark overlay for form contrast */
            z-index: 1;
        }
        .login-container {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 430px;
            padding: 15px;
        }
        .card {
            border: none;
            border-radius: 16px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.4);
            overflow: hidden;
        }
        .card-header {
            background: linear-gradient(135deg, #e3000f 0%, #b3000b 100%);
            border-bottom: none;
            padding: 35px 20px;
            text-align: center;
        }
        .card-header h3 {
            font-weight: 700;
            letter-spacing: 1.5px;
            margin: 0;
            font-size: 2rem;
        }
        .form-control {
            border-radius: 8px;
            padding: 10px 14px;
            border: 1px solid #ced4da;
            transition: all 0.2s ease-in-out;
        }
        .form-control:focus {
            border-color: #e3000f;
            box-shadow: 0 0 0 0.25rem rgba(227, 0, 15, 0.25);
        }
        .btn-primary {
            background-color: #e3000f;
            border-color: #e3000f;
            font-weight: 600;
            padding: 11px;
            border-radius: 8px;
            transition: all 0.3s ease;
            font-size: 1.05rem;
        }
        .btn-primary:hover {
            background-color: #c2000c;
            border-color: #c2000c;
            transform: translateY(-1px);
        }
        .btn-primary:active {
            transform: translateY(0);
        }
        .btn-primary:focus {
            background-color: #c2000c;
            border-color: #c2000c;
            box-shadow: 0 0 0 0.25rem rgba(227, 0, 15, 0.4);
        }
        .back-link {
            color: #6c757d;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            transition: color 0.2s;
        }
        .back-link:hover {
            color: #e3000f;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="card">
            {{-- Header --}}
            <div class="card-header text-white">
                <h3 class="h3">DENSO</h3>
                <p class="mb-0 text-white-50 small">Administrator Login</p>
            </div>
            
            <div class="card-body p-4">
                {{-- Pesan sukses (misal setelah logout) --}}
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show py-2" role="alert">
                        <small>{{ session('success') }}</small>
                        <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                {{-- Pesan error (misal dari middleware) --}}
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show py-2" role="alert">
                        <small>{{ session('error') }}</small>
                        <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                {{-- Error validasi login --}}
                @if($errors->has('login'))
                    <div class="alert alert-danger py-2" role="alert">
                        <small>{{ $errors->first('login') }}</small>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    {{-- Email --}}
                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold text-dark">Email</label>
                        <input 
                            type="email" 
                            class="form-control @error('email') is-invalid @enderror" 
                            id="email" 
                            name="email" 
                            value="{{ old('email') }}" 
                            placeholder="admin@denso.co.id"
                            required 
                            autofocus
                        >
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div class="mb-4">
                        <label for="password" class="form-label fw-semibold text-dark">Password</label>
                        <input 
                            type="password" 
                            class="form-control @error('password') is-invalid @enderror" 
                            id="password" 
                            name="password" 
                            placeholder="Masukkan password"
                            required
                        >
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Tombol Login --}}
                    <button type="submit" class="btn btn-primary w-100">
                        Masuk
                    </button>
                </form>
            </div>
            
            <div class="card-footer bg-transparent text-center py-3 border-0">
                <a href="{{ route('home') }}" class="back-link">
                    &larr; Kembali ke halaman utama
                </a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="{{ asset('bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
