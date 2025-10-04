<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'REMAS AL-FALAAH')</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/remas.svg') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <style>
        :root {
            --primary-green: #2d5a3d;
            --secondary-green: #4a7c59;
            --light-green: #8fbc8f;
            --accent-green: #90c695;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            padding-top: 0;
        }

        .navbar-custom {
            background: linear-gradient(135deg, var(--primary-green), var(--secondary-green));
            backdrop-filter: none;
            -webkit-backdrop-filter: none;
            padding: 0.5rem 0;
            box-shadow: 0 2px 20px rgba(45, 90, 61, 0.3);
            border-bottom: none;
            transition: all 0.3s ease;
            min-height: 60px;
        }

        .navbar-custom.scrolled {
            background: linear-gradient(135deg, var(--primary-green), var(--secondary-green));
            box-shadow: 0 2px 20px rgba(0,0,0,0.2);
            padding: 0.3rem 0;
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
            color: white !important;
        }

        .navbar-nav .nav-link {
            color: white !important;
            font-weight: 500;
            margin: 0 10px;
            transition: all 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: var(--light-green) !important;
            transform: translateY(-2px);
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: bold;
            color: white;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            margin-bottom: 2rem;
        }

        .hero-subtitle {
            font-size: 1.2rem;
            color: var(--light-green);
            margin-bottom: 2rem;
        }

        .kegiatan-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            overflow: hidden;
            margin-bottom: 2rem;
        }

        .kegiatan-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
        }

        .kegiatan-image {
            height: 200px;
            background: linear-gradient(45deg, var(--light-green), var(--accent-green));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 3rem;
        }

        .kegiatan-content {
            padding: 1.5rem;
        }

        .add-kegiatan-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(45, 90, 61, 0.2);
            border-color: var(--primary-green) !important;
        }

        .add-kegiatan-card .kegiatan-image {
            transition: all 0.3s ease;
        }

        .add-kegiatan-card:hover .kegiatan-image {
            background: linear-gradient(45deg, rgba(45, 90, 61, 0.2), rgba(45, 90, 61, 0.3)) !important;
        }

        .kegiatan-title {
            font-size: 1.25rem;
            font-weight: bold;
            color: var(--primary-green);
            margin-bottom: 0.5rem;
        }

        .kegiatan-desc {
            color: #666;
            font-size: 0.9rem;
            line-height: 1.6;
        }

        .footer-custom {
            background: var(--primary-green);
            color: white;
            padding: 3rem 0 1rem 0;
            margin-top: 4rem;
        }

        .footer-title {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 1rem;
            color: var(--light-green);
        }

        .footer-link {
            color: #ccc;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-link:hover {
            color: var(--light-green);
        }

        .btn-primary-custom {
            background: var(--secondary-green);
            border: none;
            padding: 0.75rem 2rem;
            border-radius: 25px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-primary-custom:hover {
            background: var(--primary-green);
            transform: translateY(-2px);
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: bold;
            text-align: center;
            color: var(--primary-green);
            margin-bottom: 3rem;
            position: relative;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: var(--secondary-green);
            border-radius: 2px;
        }

        /* Dropdown Styles */
        .dropdown-menu {
            border: none;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        .dropdown-item:hover {
            background: linear-gradient(135deg, var(--light-green), var(--accent-green));
            color: white;
        }

        .dropdown-item:focus {
            background: linear-gradient(135deg, var(--light-green), var(--accent-green));
            color: white;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-custom" style="z-index: 1030;">
        <div class="container-fluid">
            <!-- Logo Icon - Compact Size -->
            <a class="navbar-brand position-relative d-flex justify-content-center" href="{{ route('home') }}" style="margin: 0 auto 0 55px;">
                <img src="{{ asset('images/logo remas.png') }}" alt="REMAS AL-FALAAH Logo" 
                     class="logo-icon"
                     style="height: 50px; width: 50px; border-radius: 50%; box-shadow: 0 2px 8px rgba(45, 90, 61, 0.3); border: 2px solid rgba(45, 90, 61, 0.2);">
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('kegiatan.index') }}">Kegiatan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#program">Program</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tentang">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#kontak">Kontak</a>
                    </li>
                    
                    <!-- Authentication Links -->
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user-shield me-2"></i>{{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <span class="dropdown-item-text">
                                        <i class="fas fa-crown text-warning me-2"></i>
                                        <small>Admin REMAS</small>
                                    </span>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <i class="fas fa-sign-out-alt me-2"></i>Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                                <i class="fas fa-sign-in-alt me-2"></i>Login Admin
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer-custom">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5 class="footer-title">REMAS AL-FALAAH</h5>
                    <p>Remaja Masjid Al-Falaah adalah organisasi pemuda yang berkomitmen untuk mengembangkan potensi remaja muslim melalui berbagai kegiatan positif dan islami.</p>
                </div>
                <div class="col-md-4">
                    <h5 class="footer-title">Program</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="footer-link">Kajian</a></li>
                        <li><a href="#" class="footer-link">Aksi Sosial</a></li>
                        <li><a href="#" class="footer-link">Olahraga</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5 class="footer-title">Kontak</h5>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-map-marker-alt me-2"></i>5234+42R, Manisrenggo, Kec. Kota, Kabupaten Kediri, Jawa Timur 64129</li>
                        <li><i class="fas fa-phone me-2"></i>+62 895 399 750 030</li>
                        <li><i class="fas fa-envelope me-2"></i>alfalaah.remas@gmail.com</li>
                        <li>
                            <a href="https://www.facebook.com/profile.php?id=100084699282059" class="footer-link me-3"><i class="fab fa-facebook"></i></a>
                            <a href="https://www.instagram.com/remaspolaman?utm_source=ig_web_button_share_sheet&igsh=MXMyZTRoMThjc3Jhcw==" class="footer-link me-3"><i class="fab fa-instagram"></i></a>
                            <a href="https://www.tiktok.com/@4l_falaah?is_from_webapp=1&sender_device=pc" class="footer-link me-3"><i class="fab fa-tiktok"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <hr style="border-color: #555;">
            <div class="text-center">
                <p>&copy; {{ date('Y') }} REMAS AL-FALAAH. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>