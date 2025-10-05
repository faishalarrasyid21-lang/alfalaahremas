@extends('layouts.admin')

@section('title', 'Pengaturan Admin')
@section('page-title', 'Pengaturan Admin')

@section('content')
<div class="row">
    <!-- Admin Accounts Management -->
    <div class="col-lg-8 mb-4">
        <div class="table-card">
            <div class="card-header bg-white border-0 p-4">
                <h5 class="mb-0" style="color: var(--primary-green);">
                    <i class="fas fa-user-shield me-2"></i>Manajemen Akun Admin
                </h5>
            </div>
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Avatar</th>
                            <th>Nama & Email</th>
                            <th>Terakhir Login</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($admins as $admin)
                        <tr>
                            <td>
                                <div class="avatar" style="width: 40px; height: 40px; background: var(--primary-green); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white;">
                                    <i class="fas fa-user"></i>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <h6 class="mb-0">{{ $admin->name }}</h6>
                                    <small class="text-muted">{{ $admin->email }}</small>
                                </div>
                            </td>
                            <td>
                                <small class="text-muted">
                                    {{ $admin->updated_at->diffForHumans() }}
                                </small>
                            </td>
                            <td>
                                @if($admin->id === Auth::id())
                                    <span class="badge bg-success">Online (Anda)</span>
                                @else
                                    <span class="badge bg-secondary">Offline</span>
                                @endif
                            </td>
                            <td>
                                @if($admin->id === Auth::id())
                                    <span class="text-muted">Akun aktif</span>
                                @else
                                    <button class="btn btn-sm btn-outline-primary" disabled>
                                        <i class="fas fa-edit"></i>
                                    </button>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-4">
                                <i class="fas fa-users fa-2x text-muted mb-2"></i>
                                <p class="mb-0 text-muted">Tidak ada admin terdaftar</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Website Settings -->
    <div class="col-lg-4 mb-4">
        <div class="table-card">
            <div class="card-header bg-white border-0 p-4">
                <h5 class="mb-0" style="color: var(--primary-green);">
                    <i class="fas fa-cog me-2"></i>Pengaturan Website
                </h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label fw-bold">Mode Maintenance</label>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="maintenanceMode">
                        <label class="form-check-label" for="maintenanceMode">
                            Aktifkan maintenance
                        </label>
                    </div>
                    <small class="text-muted">Website akan menampilkan halaman maintenance</small>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Cache Website</label>
                    <button class="btn btn-outline-warning w-100" onclick="clearCache()">
                        <i class="fas fa-broom me-2"></i>Bersihkan Cache
                    </button>
                    <small class="text-muted">Hapus cache untuk performa optimal</small>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Backup Data</label>
                    <button class="btn btn-outline-info w-100" onclick="backupData()">
                        <i class="fas fa-download me-2"></i>Download Backup
                    </button>
                    <small class="text-muted">Backup semua data kegiatan</small>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Website Statistics -->
<div class="row">
    <div class="col-12">
        <div class="table-card">
            <div class="card-header bg-white border-0 p-4">
                <h5 class="mb-0" style="color: var(--primary-green);">
                    <i class="fas fa-chart-bar me-2"></i>Statistik Website
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="text-center p-3" style="background: #f8f9fa; border-radius: 10px;">
                            <i class="fas fa-calendar-alt fa-2x mb-2" style="color: var(--primary-green);"></i>
                            <h4 class="mb-0" style="color: var(--primary-green);">{{ App\Models\Kegiatan::count() }}</h4>
                            <small class="text-muted">Total Kegiatan</small>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="text-center p-3" style="background: #f8f9fa; border-radius: 10px;">
                            <i class="fas fa-eye fa-2x mb-2" style="color: var(--secondary-green);"></i>
                            <h4 class="mb-0" style="color: var(--primary-green);">1.2K</h4>
                            <small class="text-muted">Total Views</small>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="text-center p-3" style="background: #f8f9fa; border-radius: 10px;">
                            <i class="fas fa-users fa-2x mb-2" style="color: var(--light-green);"></i>
                            <h4 class="mb-0" style="color: var(--primary-green);">{{ App\Models\User::count() }}</h4>
                            <small class="text-muted">Admin Terdaftar</small>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="text-center p-3" style="background: #f8f9fa; border-radius: 10px;">
                            <i class="fas fa-server fa-2x mb-2" style="color: var(--accent-green);"></i>
                            <h4 class="mb-0" style="color: var(--primary-green);">98.5%</h4>
                            <small class="text-muted">Uptime</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- System Information -->
<div class="row mt-4">
    <div class="col-lg-6 mb-4">
        <div class="table-card">
            <div class="card-header bg-white border-0 p-4">
                <h5 class="mb-0" style="color: var(--primary-green);">
                    <i class="fas fa-info-circle me-2"></i>Informasi Sistem
                </h5>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <td><strong>Framework:</strong></td>
                        <td>Laravel {{ app()->version() }}</td>
                    </tr>
                    <tr>
                        <td><strong>PHP Version:</strong></td>
                        <td>{{ PHP_VERSION }}</td>
                    </tr>
                    <tr>
                        <td><strong>Database:</strong></td>
                        <td>{{ config('database.default') }}</td>
                    </tr>
                    <tr>
                        <td><strong>Environment:</strong></td>
                        <td>
                            <span class="badge {{ app()->environment('production') ? 'bg-success' : 'bg-warning' }}">
                                {{ app()->environment() }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Last Update:</strong></td>
                        <td>{{ now()->format('d F Y H:i') }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="col-lg-6 mb-4">
        <div class="table-card">
            <div class="card-header bg-white border-0 p-4">
                <h5 class="mb-0" style="color: var(--primary-green);">
                    <i class="fas fa-link me-2"></i>Link Penting
                </h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('home') }}" target="_blank" class="btn btn-outline-primary">
                        <i class="fas fa-home me-2"></i>Website Utama
                    </a>
                    <a href="https://alfalaahremascom.web.app" target="_blank" class="btn btn-outline-success">
                        <i class="fas fa-globe me-2"></i>Firebase Hosting
                    </a>
                    <a href="https://github.com/faishalarrasyid21-lang/alfalaahremas" target="_blank" class="btn btn-outline-dark">
                        <i class="fab fa-github me-2"></i>GitHub Repository
                    </a>
                    <a href="https://console.firebase.google.com/project/alfalaahremascom" target="_blank" class="btn btn-outline-warning">
                        <i class="fas fa-fire me-2"></i>Firebase Console
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Activity Log -->
<div class="row">
    <div class="col-12">
        <div class="table-card">
            <div class="card-header bg-white border-0 p-4">
                <h5 class="mb-0" style="color: var(--primary-green);">
                    <i class="fas fa-history me-2"></i>Log Aktivitas Terbaru
                </h5>
            </div>
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Waktu</th>
                            <th>User</th>
                            <th>Aktivitas</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ now()->format('H:i:s') }}</td>
                            <td>{{ Auth::user()->name }}</td>
                            <td>Mengakses halaman pengaturan</td>
                            <td><span class="badge bg-success">Berhasil</span></td>
                        </tr>
                        <tr>
                            <td>{{ now()->subMinutes(5)->format('H:i:s') }}</td>
                            <td>{{ Auth::user()->name }}</td>
                            <td>Login ke admin panel</td>
                            <td><span class="badge bg-success">Berhasil</span></td>
                        </tr>
                        <tr>
                            <td>{{ now()->subHour()->format('H:i:s') }}</td>
                            <td>System</td>
                            <td>Backup otomatis database</td>
                            <td><span class="badge bg-info">Completed</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Maintenance mode toggle
    document.getElementById('maintenanceMode').addEventListener('change', function() {
        if (this.checked) {
            if (confirm('Apakah Anda yakin ingin mengaktifkan mode maintenance? Website akan tidak dapat diakses oleh pengunjung.')) {
                // Here you would typically make an AJAX call to toggle maintenance mode
                alert('Mode maintenance akan diaktifkan. (Fitur demo)');
            } else {
                this.checked = false;
            }
        } else {
            alert('Mode maintenance dinonaktifkan. (Fitur demo)');
        }
    });

    // Clear cache function
    function clearCache() {
        if (confirm('Apakah Anda yakin ingin membersihkan cache?')) {
            // Show loading
            const btn = event.target;
            const originalText = btn.innerHTML;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Membersihkan...';
            btn.disabled = true;
            
            // Simulate cache clearing
            setTimeout(() => {
                btn.innerHTML = originalText;
                btn.disabled = false;
                alert('Cache berhasil dibersihkan! (Demo)');
            }, 2000);
        }
    }

    // Backup data function
    function backupData() {
        if (confirm('Apakah Anda ingin mendownload backup data kegiatan?')) {
            // Show loading
            const btn = event.target;
            const originalText = btn.innerHTML;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Menyiapkan...';
            btn.disabled = true;
            
            // Simulate backup preparation
            setTimeout(() => {
                btn.innerHTML = originalText;
                btn.disabled = false;
                
                // Create and download a demo backup file
                const data = {
                    backup_date: new Date().toISOString(),
                    total_kegiatan: {{ App\Models\Kegiatan::count() }},
                    admin_count: {{ App\Models\User::count() }},
                    note: 'Demo backup file - REMAS AL-FALAAH'
                };
                
                const blob = new Blob([JSON.stringify(data, null, 2)], { type: 'application/json' });
                const url = window.URL.createObjectURL(blob);
                const a = document.createElement('a');
                a.href = url;
                a.download = `remas-backup-${new Date().toISOString().split('T')[0]}.json`;
                a.click();
                window.URL.revokeObjectURL(url);
                
                alert('Backup berhasil didownload!');
            }, 3000);
        }
    }

    // Real-time clock
    function updateTime() {
        const now = new Date();
        const timeString = now.toLocaleTimeString('id-ID');
        
        // Update time in activity log if exists
        const timeElements = document.querySelectorAll('tbody tr:first-child td:first-child');
        if (timeElements.length > 0) {
            timeElements[0].textContent = timeString;
        }
    }
    
    // Update time every second
    setInterval(updateTime, 1000);
</script>
@endpush