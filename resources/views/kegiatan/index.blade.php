@extends('layouts.app')

@section('title', 'Semua Kegiatan - REMAS AL-FALAAH')

@section('content')
<!-- Hero Carousel Section -->
<section class="hero-carousel-section" style="position: relative; min-height: 500px; overflow: hidden;">
    <div id="kegiatanCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
        <!-- Carousel Indicators -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#kegiatanCarousel" data-bs-slide-to="0" class="active" aria-current="true"></button>
            <button type="button" data-bs-target="#kegiatanCarousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#kegiatanCarousel" data-bs-slide-to="2"></button>
            <button type="button" data-bs-target="#kegiatanCarousel" data-bs-slide-to="3"></button>
            <button type="button" data-bs-target="#kegiatanCarousel" data-bs-slide-to="4"></button>
        </div>

        <!-- Carousel Items -->
        <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active">
                <div class="hero-slide" style="background: linear-gradient(rgba(45, 90, 61, 0.7), rgba(45, 90, 61, 0.7)), url('{{ asset('images/1.JPG') }}') center/cover no-repeat; min-height: 500px; display: flex; align-items: center;">
                    <div class="container">
                        <div class="row align-items-center" style="min-height: 500px;">
                            <div class="col-lg-8">
                                <h1 class="hero-title animate__animated animate__fadeInUp" style="color: white; text-shadow: 2px 2px 4px rgba(0,0,0,0.7); animation-delay: 0.2s;">KEGIATAN REMAS</h1>
                                <p class="hero-subtitle animate__animated animate__fadeInUp" style="color: rgba(255,255,255,0.9); text-shadow: 1px 1px 2px rgba(0,0,0,0.7); animation-delay: 0.4s;">
                                    Ikuti Berbagai Kegiatan Positif dan Bermanfaat Untuk Ummah
                                </p>
                                <a href="#kegiatan-list" class="btn btn-primary-custom btn-lg animate__animated animate__fadeInUp" style="background: rgba(45, 90, 61, 0.9); border: none; box-shadow: 0 4px 15px rgba(0,0,0,0.3); animation-delay: 0.6s;">
                                    <i class="fas fa-scroll me-2"></i>Lihat Semua Kegiatan
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item">
                <div class="hero-slide" style="background: linear-gradient(rgba(45, 90, 61, 0.7), rgba(45, 90, 61, 0.7)), url('{{ asset('images/2.JPG') }}') center/cover no-repeat; min-height: 500px; display: flex; align-items: center;">
                    <div class="container">
                        <div class="row align-items-center" style="min-height: 500px;">
                            <div class="col-lg-8">
                                <h1 class="hero-title animate__animated animate__fadeInLeft" style="color: white; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">KAJIAN ISLAM</h1>
                                <p class="hero-subtitle animate__animated animate__fadeInLeft" style="color: rgba(255,255,255,0.9); text-shadow: 1px 1px 2px rgba(0,0,0,0.7); animation-delay: 0.2s;">
                                    Mendalami Ilmu Agama Islam Bersama Para Ustadz Terpercaya
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item">
                <div class="hero-slide" style="background: linear-gradient(rgba(45, 90, 61, 0.7), rgba(45, 90, 61, 0.7)), url('{{ asset('images/aksi sosial.JPG') }}') center/cover no-repeat; min-height: 500px; display: flex; align-items: center;">
                    <div class="container">
                        <div class="row align-items-center" style="min-height: 500px;">
                            <div class="col-lg-8">
                                <h1 class="hero-title animate__animated animate__fadeInRight" style="color: white; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">AKSI SOSIAL</h1>
                                <p class="hero-subtitle animate__animated animate__fadeInRight" style="color: rgba(255,255,255,0.9); text-shadow: 1px 1px 2px rgba(0,0,0,0.7); animation-delay: 0.2s;">
                                    Berbagi Kebaikan dan Membantu Sesama yang Membutuhkan
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 4 -->
            <div class="carousel-item">
                <div class="hero-slide" style="background: linear-gradient(rgba(45, 90, 61, 0.7), rgba(45, 90, 61, 0.7)), url('{{ asset('images/4.JPG') }}') center/cover no-repeat; min-height: 500px; display: flex; align-items: center;">
                    <div class="container">
                        <div class="row align-items-center" style="min-height: 500px;">
                            <div class="col-lg-8">
                                <h1 class="hero-title animate__animated animate__fadeInUp" style="color: white; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">OLAHRAGA SEHAT</h1>
                                <p class="hero-subtitle animate__animated animate__fadeInUp" style="color: rgba(255,255,255,0.9); text-shadow: 1px 1px 2px rgba(0,0,0,0.7); animation-delay: 0.2s;">
                                    Menjaga Kesehatan Jasmani dengan Kegiatan Olahraga Bersama
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 5 -->
            <div class="carousel-item">
                <div class="hero-slide" style="background: linear-gradient(rgba(45, 90, 61, 0.7), rgba(45, 90, 61, 0.7)), url('{{ asset('images/silaturahmu.JPG') }}') center/cover no-repeat; min-height: 500px; display: flex; align-items: center;">
                    <div class="container">
                        <div class="row align-items-center" style="min-height: 500px;">
                            <div class="col-lg-8">
                                <h1 class="hero-title animate__animated animate__fadeInLeft" style="color: white; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">SILATURAHMI</h1>
                                <p class="hero-subtitle animate__animated animate__fadeInLeft" style="color: rgba(255,255,255,0.9); text-shadow: 1px 1px 2px rgba(0,0,0,0.7); animation-delay: 0.2s;">
                                    Mempererat Tali Persaudaraan Antar Sesama Muslim
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Carousel Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#kegiatanCarousel" data-bs-slide="prev">
            <div style="background: rgba(45, 90, 61, 0.8); padding: 15px; border-radius: 50%; box-shadow: 0 4px 15px rgba(0,0,0,0.3);">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </div>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#kegiatanCarousel" data-bs-slide="next">
            <div style="background: rgba(45, 90, 61, 0.8); padding: 15px; border-radius: 50%; box-shadow: 0 4px 15px rgba(0,0,0,0.3);">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </div>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>

<!-- Kegiatan Section -->
<section id="kegiatan-list" class="py-5">
    <div class="container">
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
                <strong>Oops!</strong> Ada beberapa masalah dengan form Anda:
                <ul class="mb-0 mt-2">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Admin Info for non-authenticated users -->
        @guest
        <div class="alert alert-info" role="alert">
            <div class="d-flex align-items-center">
                <i class="fas fa-info-circle me-3" style="font-size: 1.5rem;"></i>
                <div class="flex-grow-1">
                    <h6 class="alert-heading mb-1">Informasi untuk Admin</h6>
                    <p class="mb-2">Untuk mengelola kegiatan (tambah, edit, hapus), silakan login sebagai admin.</p>
                    <a href="{{ route('login') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-sign-in-alt me-2"></i>Login Admin
                    </a>
                </div>
            </div>
        </div>
        @endguest

        <!-- Admin Welcome for authenticated users -->
        @auth
        <div class="alert alert-success" role="alert">
            <div class="d-flex align-items-center">
                <i class="fas fa-user-shield me-3" style="font-size: 1.5rem;"></i>
                <div>
                    <h6 class="alert-heading mb-1">Selamat datang, {{ Auth::user()->name }}!</h6>
                    <p class="mb-0">Anda dapat mengelola semua kegiatan REMAS dengan fitur tambah, edit, dan hapus.</p>
                </div>
            </div>
        </div>
        @endauth
        
        <div class="row">
            @forelse($kegiatans as $kegiatan)
            <div class="col-lg-4 col-md-6">
                <div class="kegiatan-card">
                    <div class="kegiatan-image">
                        @if($kegiatan->gambar)
                            <img src="{{ asset('storage/' . $kegiatan->gambar) }}" alt="{{ $kegiatan->judul }}" class="img-fluid">
                        @else
                            <i class="fas fa-calendar-check"></i>
                        @endif
                    </div>
                    <div class="kegiatan-content">
                        <h5 class="kegiatan-title">{{ $kegiatan->judul }}</h5>
                        <p class="kegiatan-desc">{{ Str::limit($kegiatan->deskripsi, 120) }}</p>
                        <div class="mb-3">
                            <small class="text-muted d-block">
                                <i class="fas fa-calendar me-1"></i>
                                {{ $kegiatan->tanggal->format('d M Y') }}
                            </small>
                            <small class="text-muted d-block">
                                <i class="fas fa-clock me-1"></i>
                                {{ $kegiatan->waktu->format('H:i') }} WIB
                            </small>
                            <small class="text-muted d-block">
                                <i class="fas fa-map-marker-alt me-1"></i>
                                {{ $kegiatan->lokasi }}
                            </small>
                        </div>
                        <div class="d-grid gap-2">
                            <a href="{{ route('kegiatan.show', $kegiatan) }}" class="btn btn-outline-secondary btn-sm">
                                <i class="fas fa-info-circle me-2"></i>Lihat Detail
                            </a>
                            <a href="{{ $kegiatan->google_drive_link ?? '#' }}" 
                               target="_blank" 
                               class="btn btn-primary-custom w-100"
                               @if(!$kegiatan->google_drive_link) onclick="alert('Link Google Drive belum tersedia'); return false;" @endif>
                                <i class="fab fa-google-drive me-2"></i>Lihat Foto Kegiatan
                            </a>
                            
                            <!-- Admin Actions - Only show for authenticated users -->
                            @auth
                            <div class="d-flex gap-1 mt-2">
                                <button class="btn btn-outline-warning btn-sm flex-fill" onclick="editKegiatan({{ $kegiatan->id }})">
                                    <i class="fas fa-edit me-1"></i>Edit
                                </button>
                                <button class="btn btn-outline-danger btn-sm flex-fill" onclick="deleteKegiatan({{ $kegiatan->id }}, '{{ addslashes($kegiatan->judul) }}')">
                                    <i class="fas fa-trash me-1"></i>Hapus
                                </button>
                            </div>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="text-center py-5">
                    <i class="fas fa-calendar-times" style="font-size: 5rem; color: #ccc;"></i>
                    <h3 class="mt-4 text-muted">Belum Ada Kegiatan</h3>
                    <p class="text-muted">Kegiatan baru akan segera hadir. Pantau terus halaman ini!</p>
                    <a href="{{ route('home') }}" class="btn btn-primary-custom">
                        <i class="fas fa-home me-2"></i>Kembali ke Beranda
                    </a>
                </div>
            </div>
            @endforelse
            
            <!-- Card Tambah Kegiatan - Only show for authenticated users -->
            @auth
            <div class="col-lg-4 col-md-6">
                <div class="kegiatan-card add-kegiatan-card" style="border: 2px dashed #2d5a3d; cursor: pointer;" onclick="openAddKegiatanModal()">
                    <div class="kegiatan-image" style="background: linear-gradient(45deg, rgba(45, 90, 61, 0.1), rgba(45, 90, 61, 0.2)); border: none;">
                        <i class="fas fa-plus-circle" style="color: #2d5a3d; font-size: 4rem;"></i>
                    </div>
                    <div class="kegiatan-content text-center">
                        <h5 class="kegiatan-title" style="color: #2d5a3d;">Tambah Kegiatan Baru</h5>
                        <p class="kegiatan-desc text-muted">Klik untuk menambahkan kegiatan baru REMAS AL-FALAAH</p>
                        <div class="mb-3">
                            <small class="text-muted d-block">
                                <i class="fas fa-info-circle me-1"></i>
                                Admin Only
                            </small>
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-outline-success w-100">
                                <i class="fas fa-plus me-2"></i>Tambah Kegiatan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @endauth
        </div>

        @if($kegiatans->hasPages())
        <div class="d-flex justify-content-center mt-5">
            {{ $kegiatans->links() }}
        </div>
        @endif
    </div>
</section>

<!-- Modal Tambah Kegiatan -->
<div class="modal fade" id="addKegiatanModal" tabindex="-1" aria-labelledby="addKegiatanModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background: linear-gradient(135deg, #2d5a3d 0%, #1e3d29 100%); color: white;">
                <h5 class="modal-title" id="addKegiatanModalLabel">
                    <i class="fas fa-plus-circle me-2"></i>Tambah Kegiatan Baru
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addKegiatanForm" action="{{ route('kegiatan.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="judul" class="form-label">
                                    <i class="fas fa-heading me-1"></i>Judul Kegiatan <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" id="judul" name="judul" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="lokasi" class="form-label">
                                    <i class="fas fa-map-marker-alt me-1"></i>Lokasi <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" id="lokasi" name="lokasi" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">
                            <i class="fas fa-align-left me-1"></i>Deskripsi <span class="text-danger">*</span>
                        </label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required></textarea>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tanggal" class="form-label">
                                    <i class="fas fa-calendar me-1"></i>Tanggal <span class="text-danger">*</span>
                                </label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="waktu" class="form-label">
                                    <i class="fas fa-clock me-1"></i>Waktu <span class="text-danger">*</span>
                                </label>
                                <input type="time" class="form-control" id="waktu" name="waktu" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="google_drive_link" class="form-label">
                            <i class="fab fa-google-drive me-1"></i>Link Google Drive
                        </label>
                        <input type="url" class="form-control" id="google_drive_link" name="google_drive_link" 
                               placeholder="https://drive.google.com/drive/folders/...">
                        <div class="form-text">Opsional - Link ke folder Google Drive berisi foto kegiatan</div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-2"></i>Batal
                </button>
                <button type="button" class="btn btn-success" onclick="submitKegiatan()">
                    <i class="fas fa-save me-2"></i>Simpan Kegiatan
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Kegiatan -->
<div class="modal fade" id="editKegiatanModal" tabindex="-1" aria-labelledby="editKegiatanModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background: linear-gradient(135deg, #f39c12 0%, #e67e22 100%); color: white;">
                <h5 class="modal-title" id="editKegiatanModalLabel">
                    <i class="fas fa-edit me-2"></i>Edit Kegiatan
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editKegiatanForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="edit_judul" class="form-label">
                                    <i class="fas fa-heading me-1"></i>Judul Kegiatan <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" id="edit_judul" name="judul" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="edit_lokasi" class="form-label">
                                    <i class="fas fa-map-marker-alt me-1"></i>Lokasi <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" id="edit_lokasi" name="lokasi" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="edit_deskripsi" class="form-label">
                            <i class="fas fa-align-left me-1"></i>Deskripsi <span class="text-danger">*</span>
                        </label>
                        <textarea class="form-control" id="edit_deskripsi" name="deskripsi" rows="4" required></textarea>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="edit_tanggal" class="form-label">
                                    <i class="fas fa-calendar me-1"></i>Tanggal <span class="text-danger">*</span>
                                </label>
                                <input type="date" class="form-control" id="edit_tanggal" name="tanggal" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="edit_waktu" class="form-label">
                                    <i class="fas fa-clock me-1"></i>Waktu <span class="text-danger">*</span>
                                </label>
                                <input type="time" class="form-control" id="edit_waktu" name="waktu" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="edit_google_drive_link" class="form-label">
                            <i class="fab fa-google-drive me-1"></i>Link Google Drive
                        </label>
                        <input type="url" class="form-control" id="edit_google_drive_link" name="google_drive_link" 
                               placeholder="https://drive.google.com/drive/folders/...">
                        <div class="form-text">Opsional - Link ke folder Google Drive berisi foto kegiatan</div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-2"></i>Batal
                </button>
                <button type="button" class="btn btn-warning" onclick="submitEditKegiatan()">
                    <i class="fas fa-save me-2"></i>Perbarui Kegiatan
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Hapus -->
<div class="modal fade" id="deleteKegiatanModal" tabindex="-1" aria-labelledby="deleteKegiatanModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%); color: white;">
                <h5 class="modal-title" id="deleteKegiatanModalLabel">
                    <i class="fas fa-exclamation-triangle me-2"></i>Konfirmasi Hapus
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <i class="fas fa-trash-alt text-danger" style="font-size: 3rem;"></i>
                    <h5 class="mt-3">Apakah Anda yakin?</h5>
                    <p class="text-muted">Kegiatan "<span id="deleteKegiatanTitle"></span>" akan dihapus secara permanen dan tidak dapat dikembalikan.</p>
                </div>
                <form id="deleteKegiatanForm" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-2"></i>Batal
                </button>
                <button type="button" class="btn btn-danger" onclick="submitDeleteKegiatan()">
                    <i class="fas fa-trash me-2"></i>Ya, Hapus
                </button>
            </div>
        </div>
    </div>
</div>

<script>
function openAddKegiatanModal() {
    var addKegiatanModal = new bootstrap.Modal(document.getElementById('addKegiatanModal'));
    addKegiatanModal.show();
}

function submitKegiatan() {
    const form = document.getElementById('addKegiatanForm');
    
    // Reset previous validation styles
    const requiredFields = ['judul', 'deskripsi', 'tanggal', 'waktu', 'lokasi'];
    requiredFields.forEach(field => {
        const input = document.getElementById(field);
        input.classList.remove('is-invalid');
    });
    
    // Validasi client-side
    let isValid = true;
    let firstInvalidField = null;
    
    requiredFields.forEach(field => {
        const input = document.getElementById(field);
        if (!input.value.trim()) {
            input.classList.add('is-invalid');
            isValid = false;
            if (!firstInvalidField) {
                firstInvalidField = input;
            }
        }
    });
    
    if (!isValid) {
        if (firstInvalidField) {
            firstInvalidField.focus();
        }
        alert('Mohon lengkapi semua field yang wajib diisi!');
        return;
    }
    
    // Submit form
    form.submit();
}

function editKegiatan(id) {
    // Fetch data kegiatan
    fetch(`/kegiatan/${id}/edit`)
        .then(response => response.json())
        .then(data => {
            // Populate form
            document.getElementById('edit_judul').value = data.judul;
            document.getElementById('edit_deskripsi').value = data.deskripsi;
            document.getElementById('edit_tanggal').value = data.tanggal;
            document.getElementById('edit_waktu').value = data.waktu;
            document.getElementById('edit_lokasi').value = data.lokasi;
            document.getElementById('edit_google_drive_link').value = data.google_drive_link || '';
            
            // Set form action
            document.getElementById('editKegiatanForm').action = `/kegiatan/${id}`;
            
            // Show modal
            var editKegiatanModal = new bootstrap.Modal(document.getElementById('editKegiatanModal'));
            editKegiatanModal.show();
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Gagal memuat data kegiatan!');
        });
}

function submitEditKegiatan() {
    const form = document.getElementById('editKegiatanForm');
    
    // Reset previous validation styles
    const requiredFields = ['edit_judul', 'edit_deskripsi', 'edit_tanggal', 'edit_waktu', 'edit_lokasi'];
    requiredFields.forEach(field => {
        const input = document.getElementById(field);
        input.classList.remove('is-invalid');
    });
    
    // Validasi client-side
    let isValid = true;
    let firstInvalidField = null;
    
    requiredFields.forEach(field => {
        const input = document.getElementById(field);
        if (!input.value.trim()) {
            input.classList.add('is-invalid');
            isValid = false;
            if (!firstInvalidField) {
                firstInvalidField = input;
            }
        }
    });
    
    if (!isValid) {
        if (firstInvalidField) {
            firstInvalidField.focus();
        }
        alert('Mohon lengkapi semua field yang wajib diisi!');
        return;
    }
    
    // Submit form
    form.submit();
}

function deleteKegiatan(id, title) {
    // Set kegiatan title dan form action
    document.getElementById('deleteKegiatanTitle').textContent = title;
    document.getElementById('deleteKegiatanForm').action = `/kegiatan/${id}`;
    
    // Show modal
    var deleteKegiatanModal = new bootstrap.Modal(document.getElementById('deleteKegiatanModal'));
    deleteKegiatanModal.show();
}

function submitDeleteKegiatan() {
    // Submit form
    document.getElementById('deleteKegiatanForm').submit();
}

// Setup form when document is ready
document.addEventListener('DOMContentLoaded', function() {
    // No date restrictions - allow all dates (past, present, future)
    console.log('Form ready - All dates allowed for kegiatan');
});
</script>
@endsection