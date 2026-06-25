<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Simpel-K - Registrasi Akun Warga</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow">
                <div class="card-header bg-success text-white text-center">
                    <h5 class="mb-0 py-1">Pendaftaran Akun Mandiri Warga</h5>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('register.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label small">Nama Lengkap Sesuai KTP</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small">Alamat Email Aktif</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                            @error('email') <div class="invalid-feedback small">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label small">Kata Sandi Baru (Minimal 6 Karakter)</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                            @error('password') <div class="invalid-feedback small">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label small">Ulangi Kata Sandi Baru</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-success w-100 mb-2">Daftar Akun</button>
                        <p class="text-center small mb-0">Sudah terdaftar sebelumnya? <a href="{{ route('login') }}">Masuk disini</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
