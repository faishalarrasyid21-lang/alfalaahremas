<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - REMAS AL-FALAAH</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        :root {
            --primary-green: #2d5a3d;
            --secondary-green: #4a7c59;
            --light-green: #6fa073;
            --accent-green: #8db38d;
        }

        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .sidebar {
            background: linear-gradient(135deg, var(--primary-green), var(--secondary-green));
            min-height: 100vh;
            color: white;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .sidebar.collapsed {
            width: 80px;
        }

        .sidebar .nav-link {
            color: rgba(255,255,255,0.8);
            padding: 1rem 1.5rem;
            border-radius: 0;
            margin-bottom: 0.25rem;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background: rgba(255,255,255,0.2);
            color: white;
            border-left-color: white;
            transform: translateX(5px);
        }

        .main-content {
            margin-left: 250px;
            padding: 2rem;
            transition: all 0.3s ease;
        }

        .main-content.expanded {
            margin-left: 80px;
        }

        .stats-card {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            border: none;
            transition: all 0.3s ease;
            height: 100%;
        }

        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        .stats-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
            margin-bottom: 1rem;
        }

        .table-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .admin-header {
            background: white;
            padding: 1rem 2rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-left: 250px;
            transition: all 0.3s ease;
            position: fixed;
            top: 0;
            right: 0;
            z-index: 999;
            left: 250px;
        }

        .admin-header.expanded {
            left: 80px;
        }

        .content-wrapper {
            margin-top: 80px;
        }

        .sidebar-toggle {
            position: absolute;
            top: 1rem;
            right: -15px;
            background: white;
            border: none;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-green);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .chart-container {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }
            .sidebar.show {
                transform: translateX(0);
            }
            .main-content, .admin-header {
                margin-left: 0;
            }
        }
    </style>
    @stack('styles')
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <button class="sidebar-toggle" id="sidebarToggle">
            <i class="fas fa-chevron-left"></i>
        </button>
        
        <div class="p-4 text-center border-bottom border-white border-opacity-25">
            <img src="{{ asset('images/logo remas.png') }}" alt="REMAS AL-FALAAH" class="rounded-circle mb-2" style="width: 50px; height: 50px;">
            <h5 class="mb-0 sidebar-text">Admin Panel</h5>
            <small class="opacity-75 sidebar-text">REMAS AL-FALAAH</small>
        </div>
        
        <nav class="nav flex-column p-3">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-tachometer-alt me-2"></i>
                <span class="sidebar-text">Dashboard</span>
            </a>
            <a href="{{ route('admin.kegiatan') }}" class="nav-link {{ request()->routeIs('admin.kegiatan*') ? 'active' : '' }}">
                <i class="fas fa-calendar-alt me-2"></i>
                <span class="sidebar-text">Kelola Kegiatan</span>
            </a>
            <a href="{{ route('admin.settings') }}" class="nav-link {{ request()->routeIs('admin.settings') ? 'active' : '' }}">
                <i class="fas fa-cog me-2"></i>
                <span class="sidebar-text">Pengaturan</span>
            </a>
            
            <div class="border-top border-white border-opacity-25 my-3"></div>
            
            <a href="{{ route('home') }}" class="nav-link">
                <i class="fas fa-home me-2"></i>
                <span class="sidebar-text">Kembali ke Website</span>
            </a>
            <a href="{{ route('logout') }}" class="nav-link"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt me-2"></i>
                <span class="sidebar-text">Logout</span>
            </a>
        </nav>
    </div>

    <!-- Admin Header -->
    <div class="admin-header" id="adminHeader">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="mb-0" style="color: var(--primary-green);">@yield('page-title', 'Dashboard')</h1>
            <div class="dropdown">
                <button class="btn btn-outline-success dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    <i class="fas fa-user-circle me-2"></i>{{ Auth::user()->name ?? 'Admin' }}
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>Profil</a></li>
                    <li><a class="dropdown-item" href="{{ route('admin.settings') }}"><i class="fas fa-cog me-2"></i>Pengaturan</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt me-2"></i>Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content" id="mainContent">
        <div class="content-wrapper">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </div>

    <!-- Logout Form -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <script>
        // Sidebar toggle functionality
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');
            const adminHeader = document.getElementById('adminHeader');
            const toggleIcon = this.querySelector('i');
            
            sidebar.classList.toggle('collapsed');
            mainContent.classList.toggle('expanded');
            adminHeader.classList.toggle('expanded');
            
            if (sidebar.classList.contains('collapsed')) {
                toggleIcon.classList.remove('fa-chevron-left');
                toggleIcon.classList.add('fa-chevron-right');
                document.querySelectorAll('.sidebar-text').forEach(el => el.style.display = 'none');
            } else {
                toggleIcon.classList.remove('fa-chevron-right');
                toggleIcon.classList.add('fa-chevron-left');
                document.querySelectorAll('.sidebar-text').forEach(el => el.style.display = 'inline');
            }
        });

        // Mobile sidebar toggle
        function toggleMobileSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('show');
        }

        // Auto-dismiss alerts
        setTimeout(() => {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                if (alert.classList.contains('show')) {
                    alert.classList.remove('show');
                }
            });
        }, 5000);
    </script>

    @stack('scripts')
</body>
</html>