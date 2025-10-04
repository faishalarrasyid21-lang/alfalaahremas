@extends('layouts.app')

@section('title', $kegiatan->judul . ' - REMAS AL-FALAAH')

@section('content')
<!-- Page Header -->
<section class="hero-section" style="min-height: 40vh;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="hero-title">{{ $kegiatan->judul }}</h1>
                <p class="hero-subtitle">Detail Kegiatan REMAS AL-FALAAH</p>
            </div>
        </div>
    </div>
</section>

<!-- Detail Kegiatan -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        @if($kegiatan->gambar)
                        <img src="{{ asset('storage/' . $kegiatan->gambar) }}" alt="{{ $kegiatan->judul }}" class="img-fluid rounded mb-4">
                        @else
                        <div class="text-center mb-4">
                            <div class="kegiatan-image" style="height: 300px; border-radius: 10px;">
                                <i class="fas fa-calendar-check"></i>
                            </div>
                        </div>
                        @endif

                        <h2 class="mb-3" style="color: var(--primary-green);">{{ $kegiatan->judul }}</h2>
                        
                        <div class="mb-4">
                            <p class="lead">{{ $kegiatan->deskripsi }}</p>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="mb-3" style="color: var(--secondary-green);">
                                    <i class="fas fa-info-circle me-2"></i>Informasi Kegiatan
                                </h5>
                                <ul class="list-unstyled">
                                    <li class="mb-2">
                                        <i class="fas fa-calendar text-success me-2"></i>
                                        <strong>Tanggal:</strong> {{ $kegiatan->tanggal->format('d F Y') }}
                                    </li>
                                    <li class="mb-2">
                                        <i class="fas fa-clock text-success me-2"></i>
                                        <strong>Waktu:</strong> {{ $kegiatan->waktu->format('H:i') }} WIB
                                    </li>
                                    <li class="mb-2">
                                        <i class="fas fa-map-marker-alt text-success me-2"></i>
                                        <strong>Lokasi:</strong> {{ $kegiatan->lokasi }}
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h5 class="mb-3" style="color: var(--secondary-green);">
                                    <i class="fas fa-share-alt me-2"></i>Aksi Kegiatan
                                </h5>
                                <div class="d-grid gap-2 mb-3">
                                    @if($kegiatan->google_drive_link)
                                        <a href="{{ $kegiatan->google_drive_link }}" 
                                           target="_blank" 
                                           class="btn btn-primary" 
                                           style="background: #4285f4; border-color: #4285f4;">
                                            <i class="fab fa-google-drive me-2"></i>Lihat Foto Kegiatan
                                        </a>
                                    @endif
                                    <a href="#" class="btn btn-success">
                                        <i class="fab fa-whatsapp me-2"></i>Daftar via WhatsApp
                                    </a>
                                </div>
                                <h6 class="mb-3" style="color: var(--secondary-green);">
                                    <i class="fas fa-share-alt me-2"></i>Bagikan
                                </h6>
                                <div class="d-flex gap-2">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" 
                                       target="_blank" class="btn btn-outline-primary btn-sm">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($kegiatan->judul) }}" 
                                       target="_blank" class="btn btn-outline-info btn-sm">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="https://wa.me/?text={{ urlencode($kegiatan->judul . ' - ' . request()->fullUrl()) }}" 
                                       target="_blank" class="btn btn-outline-success btn-sm">
                                        <i class="fab fa-whatsapp"></i>
                                    </a>
                                    <a href="#" onclick="copyToClipboard('{{ request()->fullUrl() }}')" class="btn btn-outline-dark btn-sm">
                                        <i class="fas fa-link"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-transparent border-0">
                        <h5 class="mb-0" style="color: var(--primary-green);">
                            <i class="fas fa-calendar-alt me-2"></i>Kegiatan Lainnya
                        </h5>
                    </div>
                    <div class="card-body">
                        @php
                            $kegiatanLain = \App\Models\Kegiatan::where('id', '!=', $kegiatan->id)
                                                               ->where('is_active', true)
                                                               ->orderBy('tanggal', 'desc')
                                                               ->limit(3)
                                                               ->get();
                        @endphp

                        @forelse($kegiatanLain as $item)
                        <div class="border-bottom pb-3 mb-3">
                            <h6 class="mb-1">
                                <a href="{{ route('kegiatan.show', $item) }}" class="text-decoration-none" style="color: var(--primary-green);">
                                    {{ Str::limit($item->judul, 50) }}
                                </a>
                            </h6>
                            <small class="text-muted">
                                <i class="fas fa-calendar me-1"></i>{{ $item->tanggal->format('d M Y') }}
                            </small>
                        </div>
                        @empty
                        <p class="text-muted text-center">Belum ada kegiatan lain</p>
                        @endforelse

                        <div class="text-center mt-3">
                            <a href="{{ route('kegiatan.index') }}" class="btn btn-outline-success btn-sm">
                                Lihat Semua Kegiatan
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="card border-0 shadow-sm mt-4">
                    <div class="card-header bg-transparent border-0">
                        <h5 class="mb-0" style="color: var(--primary-green);">
                            <i class="fas fa-phone me-2"></i>Informasi Lebih Lanjut
                        </h5>
                    </div>
                    <div class="card-body">
                        <p class="mb-2"><strong>WhatsApp:</strong></p>
                        <p class="mb-3">+62 123 456 789</p>
                        
                        <p class="mb-2"><strong>Email:</strong></p>
                        <p class="mb-3">info@remas-alfalaah.org</p>
                        
                        <a href="#" class="btn btn-success btn-sm w-100">
                            <i class="fab fa-whatsapp me-2"></i>Hubungi Kami
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('kegiatan.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i>Kembali ke Daftar Kegiatan
            </a>
        </div>
    </div>
</section>

<script>
function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(function() {
        alert('Link berhasil disalin!');
    }, function(err) {
        console.error('Gagal menyalin link: ', err);
    });
}
</script>
@endsection