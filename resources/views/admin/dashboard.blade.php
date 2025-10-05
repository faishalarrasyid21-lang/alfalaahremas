@extends('layouts.admin')

@section('title', 'Dashboard Admin')
@section('page-title', 'Dashboard Admin')

@section('content')
<div class="row mb-4">
    <!-- Statistics Cards -->
    <div class="col-lg-3 col-md-6 mb-3">
        <div class="stats-card">
            <div class="stats-icon" style="background: linear-gradient(135deg, var(--primary-green), var(--secondary-green));">
                <i class="fas fa-calendar-alt"></i>
            </div>
            <h3 class="mb-0" style="color: var(--primary-green);">{{ $totalKegiatan }}</h3>
            <p class="text-muted mb-0">Total Kegiatan</p>
            <small class="text-success">
                <i class="fas fa-arrow-up me-1"></i>
                {{ $kegiatanAktif }} kegiatan bulan ini
            </small>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6 mb-3">
        <div class="stats-card">
            <div class="stats-icon" style="background: linear-gradient(135deg, #28a745, #20c997);">
                <i class="fas fa-users"></i>
            </div>
            <h3 class="mb-0" style="color: var(--primary-green);">{{ $totalAdmin }}</h3>
            <p class="text-muted mb-0">Admin Terdaftar</p>
            <small class="text-info">
                <i class="fas fa-user-shield me-1"></i>
                Akun aktif
            </small>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6 mb-3">
        <div class="stats-card">
            <div class="stats-icon" style="background: linear-gradient(135deg, #ffc107, #fd7e14);">
                <i class="fas fa-eye"></i>
            </div>
            <h3 class="mb-0" style="color: var(--primary-green);">1.2K</h3>
            <p class="text-muted mb-0">Pengunjung Website</p>
            <small class="text-warning">
                <i class="fas fa-chart-line me-1"></i>
                Bulan ini
            </small>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6 mb-3">
        <div class="stats-card">
            <div class="stats-icon" style="background: linear-gradient(135deg, #dc3545, #e83e8c);">
                <i class="fas fa-server"></i>
            </div>
            <h3 class="mb-0" style="color: var(--primary-green);">98.5%</h3>
            <p class="text-muted mb-0">Uptime Website</p>
            <small class="text-success">
                <i class="fas fa-check-circle me-1"></i>
                Online
            </small>
        </div>
    </div>
</div>

<div class="row">
    <!-- Chart Section -->
    <div class="col-lg-8 mb-4">
        <div class="chart-container">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0" style="color: var(--primary-green);">
                    <i class="fas fa-chart-bar me-2"></i>Statistik Kegiatan Bulanan
                </h5>
                <small class="text-muted">Tahun {{ date('Y') }}</small>
            </div>
            <canvas id="monthlyChart" height="100"></canvas>
        </div>
    </div>

    <!-- Recent Activities -->
    <div class="col-lg-4 mb-4">
        <div class="table-card">
            <div class="card-header bg-white border-0 p-4">
                <h5 class="mb-0" style="color: var(--primary-green);">
                    <i class="fas fa-clock me-2"></i>Aktivitas Terbaru
                </h5>
            </div>
            <div class="card-body p-0">
                @forelse($recentKegiatan as $kegiatan)
                <div class="d-flex align-items-center p-3 border-bottom">
                    <div class="avatar me-3" style="width: 40px; height: 40px; background: var(--light-green); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white;">
                        <i class="fas fa-calendar"></i>
                    </div>
                    <div class="flex-grow-1">
                        <h6 class="mb-0">{{ $kegiatan->nama }}</h6>
                        <small class="text-muted">{{ $kegiatan->tanggal->format('d M Y') }}</small>
                    </div>
                    <span class="badge bg-success">Aktif</span>
                </div>
                @empty
                <div class="p-4 text-center text-muted">
                    <i class="fas fa-calendar-times fa-2x mb-2"></i>
                    <p class="mb-0">Belum ada kegiatan</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

<!-- Recent Kegiatan Table -->
<div class="row">
    <div class="col-12">
        <div class="table-card">
            <div class="card-header bg-white border-0 p-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0" style="color: var(--primary-green);">
                        <i class="fas fa-list me-2"></i>Kegiatan Terbaru
                    </h5>
                    <a href="{{ route('admin.kegiatan') }}" class="btn btn-outline-success">
                        <i class="fas fa-eye me-1"></i>Lihat Semua
                    </a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Nama Kegiatan</th>
                            <th>Tanggal</th>
                            <th>Deskripsi</th>
                            <th>Google Drive</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentKegiatan as $kegiatan)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-calendar-check me-2 text-success"></i>
                                    {{ $kegiatan->nama }}
                                </div>
                            </td>
                            <td>{{ $kegiatan->tanggal->format('d M Y') }}</td>
                            <td>{{ Str::limit($kegiatan->deskripsi, 50) }}</td>
                            <td>
                                @if($kegiatan->google_drive_link)
                                    <a href="{{ $kegiatan->google_drive_link }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                        <i class="fab fa-google-drive"></i>
                                    </a>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.kegiatan.edit', $kegiatan) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{ route('kegiatan.show', $kegiatan) }}" class="btn btn-sm btn-outline-info" target="_blank">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-4">
                                <i class="fas fa-calendar-times fa-2x text-muted mb-2"></i>
                                <p class="mb-0 text-muted">Belum ada kegiatan yang dibuat</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="row mt-4">
    <div class="col-12">
        <div class="table-card">
            <div class="card-header bg-white border-0 p-4">
                <h5 class="mb-0" style="color: var(--primary-green);">
                    <i class="fas fa-bolt me-2"></i>Aksi Cepat
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <a href="{{ route('admin.kegiatan.create') }}" class="btn btn-success w-100 py-3 text-decoration-none">
                            <i class="fas fa-plus fa-2x mb-2"></i><br>
                            <strong>Tambah Kegiatan</strong>
                        </a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="{{ route('admin.kegiatan') }}" class="btn btn-outline-primary w-100 py-3 text-decoration-none">
                            <i class="fas fa-list fa-2x mb-2"></i><br>
                            <strong>Kelola Kegiatan</strong>
                        </a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="{{ route('home') }}" class="btn btn-outline-info w-100 py-3 text-decoration-none" target="_blank">
                            <i class="fas fa-globe fa-2x mb-2"></i><br>
                            <strong>Lihat Website</strong>
                        </a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="{{ route('admin.settings') }}" class="btn btn-outline-warning w-100 py-3 text-decoration-none">
                            <i class="fas fa-cog fa-2x mb-2"></i><br>
                            <strong>Pengaturan</strong>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Monthly Chart
    const ctx = document.getElementById('monthlyChart').getContext('2d');
    const chartData = @json($chartData);
    
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des'],
            datasets: [{
                label: 'Jumlah Kegiatan',
                data: Object.values(chartData),
                backgroundColor: 'rgba(45, 90, 61, 0.8)',
                borderColor: 'rgba(45, 90, 61, 1)',
                borderWidth: 1,
                borderRadius: 8,
                borderSkipped: false,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });

    // Real-time clock
    function updateClock() {
        const now = new Date();
        const timeString = now.toLocaleTimeString('id-ID');
        const dateString = now.toLocaleDateString('id-ID', { 
            weekday: 'long', 
            year: 'numeric', 
            month: 'long', 
            day: 'numeric' 
        });
        
        // Update if clock element exists
        const clockElement = document.getElementById('realTimeClock');
        if (clockElement) {
            clockElement.innerHTML = `<small class="text-muted">${dateString} - ${timeString}</small>`;
        }
    }

    // Update clock every second
    setInterval(updateClock, 1000);
    updateClock(); // Initial call
</script>
@endpush