@extends('layouts.app')

@section('title', 'Login Admin - REMAS AL-FALAAH')

@section('content')
<div class="min-vh-100 d-flex align-items-center" style="background: linear-gradient(135deg, #2d5a3d 0%, #1e3d29 100%);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow-lg border-0" style="border-radius: 15px; overflow: hidden;">
                    <!-- Header -->
                    <div class="card-header text-center py-4" style="background: linear-gradient(135deg, #2d5a3d 0%, #1e3d29 100%); border: none;">
                        <div class="mb-3">
                            <img src="{{ asset('images/logo remas.png') }}" alt="REMAS AL-FALAAH" class="img-fluid" style="max-height: 80px;">
                        </div>
                        <h4 class="text-white mb-0">
                            <i class="fas fa-user-shield me-2"></i>Login Admin
                        </h4>
                        <p class="text-white-50 mb-0 small">REMAS AL-FALAAH</p>
                    </div>

                    <!-- Body -->
                    <div class="card-body p-4">
                        <!-- Flash Messages -->
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        
                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fas fa-exclamation-circle me-2"></i>
                                @if($errors->has('email'))
                                    {{ $errors->first('email') }}
                                @else
                                    Terjadi kesalahan, silakan coba lagi.
                                @endif
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            
                            <div class="mb-3">
                                <label for="email" class="form-label">
                                    <i class="fas fa-envelope me-1"></i>Email Admin
                                </label>
                                <input type="email" 
                                       class="form-control @error('email') is-invalid @enderror" 
                                       id="email" 
                                       name="email" 
                                       value="{{ old('email') }}"
                                       placeholder="faishalarrasyid21@gmail.com"
                                       required 
                                       autofocus>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="password" class="form-label">
                                    <i class="fas fa-lock me-1"></i>Password
                                </label>
                                <div class="input-group">
                                    <input type="password" 
                                           class="form-control @error('password') is-invalid @enderror" 
                                           id="password" 
                                           name="password"
                                           placeholder="Masukkan password"
                                           required>
                                    <button class="btn btn-outline-secondary" type="button" onclick="togglePassword()">
                                        <i class="fas fa-eye" id="toggleIcon"></i>
                                    </button>
                                </div>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary-custom btn-lg">
                                    <i class="fas fa-sign-in-alt me-2"></i>Login Admin
                                </button>
                            </div>
                        </form>

                        <!-- Demo Info -->
                        <div class="mt-4 p-3 bg-light rounded">
                            <h6 class="text-muted mb-2">
                                <i class="fas fa-info-circle me-1"></i>Demo Login
                            </h6>
                            <small class="text-muted d-block">Email: <strong>faishalarrasyid21@gmail.com</strong></small>
                            <small class="text-muted d-block">Password: <strong>faishal2024</strong></small>
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="card-footer text-center py-3" style="background-color: #f8f9fa; border: none;">
                        <a href="{{ route('kegiatan.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Kembali ke Beranda
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function togglePassword() {
    const passwordInput = document.getElementById('password');
    const toggleIcon = document.getElementById('toggleIcon');
    
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleIcon.classList.remove('fa-eye');
        toggleIcon.classList.add('fa-eye-slash');
    } else {
        passwordInput.type = 'password';
        toggleIcon.classList.remove('fa-eye-slash');
        toggleIcon.classList.add('fa-eye');
    }
}
</script>
@endsection