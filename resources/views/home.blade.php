@extends('layouts.app')

@section('title', 'Beranda - REMAS AL-FALAAH')

@section('content')
<!-- Hero Carousel Section -->
<section class="hero-carousel-section" style="position: relative; min-height: 500px; overflow: hidden;">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
        <!-- Carousel Indicators -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="3"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="4"></button>
        </div>

        <!-- Carousel Items -->
        <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active">
                <div class="hero-slide" style="background: linear-gradient(rgba(45, 90, 61, 0.7), rgba(45, 90, 61, 0.7)), url('{{ asset('images/1.JPG') }}') center/cover no-repeat; min-height: 500px; display: flex; align-items: center;">
                    <div class="container">
                        <div class="row align-items-center" style="min-height: 500px;">
                            <div class="col-lg-8">
                                <h1 class="hero-title animate__animated animate__fadeInUp" style="color: white; text-shadow: 2px 2px 4px rgba(0,0,0,0.7); animation-delay: 0.2s;">REMAS AL-FALAAH</h1>
                                <p class="hero-subtitle animate__animated animate__fadeInUp" style="color: rgba(255,255,255,0.9); text-shadow: 1px 1px 2px rgba(0,0,0,0.7); animation-delay: 0.4s;">
                                    Membangun Generasi Muslim yang Berkualitas dan Berakhlak Mulia
                                </p>
                                <a href="{{ route('kegiatan.index') }}" class="btn btn-primary-custom btn-lg animate__animated animate__fadeInUp" style="background: rgba(45, 90, 61, 0.9); border: none; box-shadow: 0 4px 15px rgba(0,0,0,0.3); animation-delay: 0.6s;">
                                    <i class="fas fa-calendar-alt me-2"></i>Lihat Kegiatan
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
                                <h1 class="hero-title animate__animated animate__fadeInLeft" style="color: white; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">BERSAMA MEMBANGUN</h1>
                                <p class="hero-subtitle animate__animated animate__fadeInLeft" style="color: rgba(255,255,255,0.9); text-shadow: 1px 1px 2px rgba(0,0,0,0.7); animation-delay: 0.2s;">
                                    Organisasi Pemuda Islam Yang Berdedikasi Untuk Masyarakat
                                </p>
                                <a href="#program" class="btn btn-primary-custom btn-lg animate__animated animate__fadeInLeft" style="background: rgba(45, 90, 61, 0.9); border: none; box-shadow: 0 4px 15px rgba(0,0,0,0.3); animation-delay: 0.4s;">
                                    <i class="fas fa-heart me-2"></i>Lihat Program
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item">
                <div class="hero-slide" style="background: linear-gradient(rgba(45, 90, 61, 0.7), rgba(45, 90, 61, 0.7)), url('{{ asset('images/3.JPG') }}') center/cover no-repeat; min-height: 500px; display: flex; align-items: center;">
                    <div class="container">
                        <div class="row align-items-center" style="min-height: 500px;">
                            <div class="col-lg-8">
                                <h1 class="hero-title animate__animated animate__fadeInRight" style="color: white; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">BERGABUNGLAH</h1>
                                <p class="hero-subtitle animate__animated animate__fadeInRight" style="color: rgba(255,255,255,0.9); text-shadow: 1px 1px 2px rgba(0,0,0,0.7); animation-delay: 0.2s;">
                                    Jadilah Bagian Dari Komunitas Pemuda Muslim Al-Falaah
                                </p>
                                <a href="#tentang" class="btn btn-primary-custom btn-lg animate__animated animate__fadeInRight" style="background: rgba(45, 90, 61, 0.9); border: none; box-shadow: 0 4px 15px rgba(0,0,0,0.3); animation-delay: 0.4s;">
                                    <i class="fas fa-users me-2"></i>Tentang Kami
                                </a>
                            </div>
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
                                <h1 class="hero-title animate__animated animate__fadeInRight" style="color: white; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">BERGABUNGLAH</h1>
                                <p class="hero-subtitle animate__animated animate__fadeInRight" style="color: rgba(255,255,255,0.9); text-shadow: 1px 1px 2px rgba(0,0,0,0.7); animation-delay: 0.2s;">
                                    Jadilah Bagian Dari Komunitas Pemuda Muslim Al-Falaah
                                </p>
                                <a href="#tentang" class="btn btn-primary-custom btn-lg animate__animated animate__fadeInRight" style="background: rgba(45, 90, 61, 0.9); border: none; box-shadow: 0 4px 15px rgba(0,0,0,0.3); animation-delay: 0.4s;">
                                    <i class="fas fa-users me-2"></i>Tentang Kami
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 5 -->
            <div class="carousel-item">
                <div class="hero-slide" style="background: linear-gradient(rgba(45, 90, 61, 0.7), rgba(45, 90, 61, 0.7)), url('{{ asset('images/5.JPG') }}') center/cover no-repeat; min-height: 500px; display: flex; align-items: center;">
                    <div class="container">
                        <div class="row align-items-center" style="min-height: 500px;">
                            <div class="col-lg-8">
                                <h1 class="hero-title animate__animated animate__fadeInRight" style="color: white; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">BERGABUNGLAH</h1>
                                <p class="hero-subtitle animate__animated animate__fadeInRight" style="color: rgba(255,255,255,0.9); text-shadow: 1px 1px 2px rgba(0,0,0,0.7); animation-delay: 0.2s;">
                                    Jadilah Bagian Dari Komunitas Pemuda Muslim Al-Falaah
                                </p>
                                <a href="#tentang" class="btn btn-primary-custom btn-lg animate__animated animate__fadeInRight" style="background: rgba(45, 90, 61, 0.9); border: none; box-shadow: 0 4px 15px rgba(0,0,0,0.3); animation-delay: 0.4s;">
                                    <i class="fas fa-users me-2"></i>Tentang Kami
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Carousel Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <div style="background: rgba(45, 90, 61, 0.8); padding: 15px; border-radius: 50%; box-shadow: 0 4px 15px rgba(0,0,0,0.3);">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </div>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <div style="background: rgba(45, 90, 61, 0.8); padding: 15px; border-radius: 50%; box-shadow: 0 4px 15px rgba(0,0,0,0.3);">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </div>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>

<!-- Kegiatan Terbaru Section -->
<section class="py-5">
    <div class="container">
        <h2 class="section-title">Kegiatan Terbaru</h2>
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
                        <p class="kegiatan-desc">{{ Str::limit($kegiatan->deskripsi, 100) }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">
                                <i class="fas fa-calendar me-1"></i>
                                {{ $kegiatan->tanggal->format('d M Y') }}
                            </small>
                            <a href="{{ route('kegiatan.show', $kegiatan) }}" class="btn btn-sm btn-outline-success">
                                Detail
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="text-center py-5">
                    <i class="fas fa-calendar-times" style="font-size: 4rem; color: #ccc;"></i>
                    <h4 class="mt-3 text-muted">Belum Ada Kegiatan</h4>
                    <p class="text-muted">Kegiatan baru akan segera hadir!</p>
                </div>
            </div>
            @endforelse
        </div>
        
        @if($kegiatans->count() > 0)
        <div class="text-center mt-4">
            <a href="{{ route('kegiatan.index') }}" class="btn btn-primary-custom">
                Lihat Semua Kegiatan <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
        @endif
    </div>
</section>

<!-- Program Section -->
<section id="program" class="py-5" style="background-color: white;">
    <div class="container">
        <h2 class="section-title text-center mb-5">Program Unggulan</h2>
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="text-center p-4" style="border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); height: 100%; background: white;">
                    <div class="mb-3">
                        <div style="width: 80px; height: 80px; background: linear-gradient(135deg, var(--primary-green), var(--secondary-green)); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto; box-shadow: 0 4px 15px rgba(45, 90, 61, 0.3);">
                            <i class="fas fa-book-quran" style="font-size: 2rem; color: white;"></i>
                        </div>
                    </div>
                    <h5 class="fw-bold mb-3" style="color: var(--primary-green);">Kajian</h5>
                    <p class="text-muted">Kajian keislaman setiap bulan Ramadhan untuk menambah wawasan agama</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="text-center p-4" style="border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); height: 100%; background: white;">
                    <div class="mb-3">
                        <div style="width: 80px; height: 80px; background: linear-gradient(135deg, var(--primary-green), var(--secondary-green)); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto; box-shadow: 0 4px 15px rgba(45, 90, 61, 0.3);">
                            <i class="fas fa-hands-helping" style="font-size: 2rem; color: white;"></i>
                        </div>
                    </div>
                    <h5 class="fw-bold mb-3" style="color: var(--primary-green);">Aksi Sosial</h5>
                    <p class="text-muted">Kegiatan bakti sosial untuk membantu masyarakat sekitar</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="text-center p-4" style="border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); height: 100%; background: white;">
                    <div class="mb-3">
                        <div style="width: 80px; height: 80px; background: linear-gradient(135deg, var(--primary-green), var(--secondary-green)); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto; box-shadow: 0 4px 15px rgba(45, 90, 61, 0.3);">
                            <i class="fas fa-futbol" style="font-size: 2rem; color: white;"></i>
                        </div>
                    </div>
                    <h5 class="fw-bold mb-3" style="color: var(--primary-green);">Olahraga</h5>
                    <p class="text-muted">Kegiatan olahraga untuk menjaga kesehatan jasmani</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Tentang Section -->
<section id="tentang" class="py-5" style="background: linear-gradient(45deg, #f8f9fa, #e9ecef);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h2 class="section-title text-start">Tentang Kami</h2>
                <p class="lead">REMAS AL-FALAAH adalah organisasi remaja masjid yang berdedikasi untuk mengembangkan potensi generasi muda muslim melalui berbagai kegiatan positif dan islami.</p>
            </div>
            <div class="col-lg-6">
                <div class="text-center">
                    <i class="fas fa-users" style="font-size: 8rem; color: var(--light-green);"></i>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection