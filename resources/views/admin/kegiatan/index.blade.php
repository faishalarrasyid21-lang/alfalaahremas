@extends('layouts.admin')

@section('title', 'Kelola Kegiatan')
@section('page-title', 'Kelola Kegiatan')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="mb-0" style="color: var(--primary-green);">Manajemen Kegiatan</h2>
        <p class="text-muted mb-0">Kelola semua kegiatan REMAS AL-FALAAH</p>
    </div>
    <a href="{{ route('admin.kegiatan.create') }}" class="btn btn-success">
        <i class="fas fa-plus me-2"></i>Tambah Kegiatan Baru
    </a>
</div>

<!-- Filter & Search -->
<div class="row mb-4">
    <div class="col-md-8">
        <div class="input-group">
            <span class="input-group-text"><i class="fas fa-search"></i></span>
            <input type="text" class="form-control" placeholder="Cari kegiatan..." id="searchKegiatan">
        </div>
    </div>
    <div class="col-md-4">
        <select class="form-select" id="filterStatus">
            <option value="">Semua Status</option>
            <option value="upcoming">Akan Datang</option>
            <option value="ongoing">Sedang Berlangsung</option>
            <option value="completed">Selesai</option>
        </select>
    </div>
</div>

<!-- Kegiatan Table -->
<div class="table-card">
    <div class="card-header bg-white border-0 p-4">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="mb-0" style="color: var(--primary-green);">
                <i class="fas fa-calendar-alt me-2"></i>Daftar Kegiatan
            </h5>
            <span class="badge bg-primary">{{ $kegiatans->total() }} Total Kegiatan</span>
        </div>
    </div>
    
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th width="5%">#</th>
                    <th width="25%">Nama Kegiatan</th>
                    <th width="15%">Tanggal</th>
                    <th width="30%">Deskripsi</th>
                    <th width="10%">Status</th>
                    <th width="10%">Google Drive</th>
                    <th width="15%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($kegiatans as $index => $kegiatan)
                <tr>
                    <td>{{ $kegiatans->firstItem() + $index }}</td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="avatar me-3" style="width: 40px; height: 40px; background: var(--light-green); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white;">
                                <i class="fas fa-calendar-check"></i>
                            </div>
                            <div>
                                <h6 class="mb-0">{{ $kegiatan->nama }}</h6>
                                <small class="text-muted">Dibuat: {{ $kegiatan->created_at->format('d M Y') }}</small>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="fw-bold">{{ $kegiatan->tanggal->format('d M Y') }}</span><br>
                        <small class="text-muted">{{ $kegiatan->tanggal->format('l') }}</small>
                    </td>
                    <td>
                        <p class="mb-0">{{ Str::limit($kegiatan->deskripsi, 80) }}</p>
                        @if(strlen($kegiatan->deskripsi) > 80)
                            <a href="#" class="text-primary small" data-bs-toggle="modal" data-bs-target="#descModal{{ $kegiatan->id }}">
                                Lihat selengkapnya...
                            </a>
                        @endif
                    </td>
                    <td>
                        @php
                            $now = now();
                            $status = '';
                            $badgeClass = '';
                            
                            if ($kegiatan->tanggal->isFuture()) {
                                $status = 'Akan Datang';
                                $badgeClass = 'bg-warning';
                            } elseif ($kegiatan->tanggal->isToday()) {
                                $status = 'Hari Ini';
                                $badgeClass = 'bg-success';
                            } else {
                                $status = 'Selesai';
                                $badgeClass = 'bg-secondary';
                            }
                        @endphp
                        <span class="badge {{ $badgeClass }}">{{ $status }}</span>
                    </td>
                    <td class="text-center">
                        @if($kegiatan->google_drive_link)
                            <a href="{{ $kegiatan->google_drive_link }}" target="_blank" class="btn btn-sm btn-outline-primary" title="Buka Google Drive">
                                <i class="fab fa-google-drive"></i>
                            </a>
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="{{ route('kegiatan.show', $kegiatan) }}" class="btn btn-sm btn-outline-info" title="Lihat Detail" target="_blank">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.kegiatan.edit', $kegiatan) }}" class="btn btn-sm btn-outline-primary" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button class="btn btn-sm btn-outline-danger" title="Hapus" 
                                    onclick="confirmDelete('{{ $kegiatan->id }}', '{{ $kegiatan->nama }}')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>

                <!-- Description Modal -->
                @if(strlen($kegiatan->deskripsi) > 80)
                <div class="modal fade" id="descModal{{ $kegiatan->id }}" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">{{ $kegiatan->nama }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <p>{{ $kegiatan->deskripsi }}</p>
                                <hr>
                                <small class="text-muted">
                                    <strong>Tanggal:</strong> {{ $kegiatan->tanggal->format('d F Y') }}<br>
                                    <strong>Dibuat:</strong> {{ $kegiatan->created_at->format('d F Y H:i') }}
                                </small>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <a href="{{ route('admin.kegiatan.edit', $kegiatan) }}" class="btn btn-primary">Edit Kegiatan</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @empty
                <tr>
                    <td colspan="7" class="text-center py-5">
                        <i class="fas fa-calendar-times fa-3x text-muted mb-3"></i>
                        <h5 class="text-muted">Belum ada kegiatan</h5>
                        <p class="text-muted">Mulai dengan menambahkan kegiatan baru</p>
                        <a href="{{ route('admin.kegiatan.create') }}" class="btn btn-success">
                            <i class="fas fa-plus me-2"></i>Tambah Kegiatan Pertama
                        </a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    @if($kegiatans->hasPages())
    <div class="card-footer bg-white border-0 p-4">
        {{ $kegiatans->links() }}
    </div>
    @endif
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">
                    <i class="fas fa-exclamation-triangle me-2"></i>Konfirmasi Hapus
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p class="mb-0">Apakah Anda yakin ingin menghapus kegiatan <strong id="kegiatanName"></strong>?</p>
                <small class="text-muted">Tindakan ini tidak dapat dibatalkan.</small>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form id="deleteForm" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash me-2"></i>Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Search functionality
    document.getElementById('searchKegiatan').addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        const rows = document.querySelectorAll('tbody tr');
        
        rows.forEach(row => {
            const kegiatanName = row.cells[1]?.textContent.toLowerCase() || '';
            const description = row.cells[3]?.textContent.toLowerCase() || '';
            
            if (kegiatanName.includes(searchTerm) || description.includes(searchTerm)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });

    // Filter functionality
    document.getElementById('filterStatus').addEventListener('change', function() {
        const filterValue = this.value;
        const rows = document.querySelectorAll('tbody tr');
        
        rows.forEach(row => {
            const statusBadge = row.querySelector('.badge');
            if (!statusBadge) return;
            
            const status = statusBadge.textContent.toLowerCase();
            let showRow = true;
            
            if (filterValue === 'upcoming' && !status.includes('akan datang')) {
                showRow = false;
            } else if (filterValue === 'ongoing' && !status.includes('hari ini')) {
                showRow = false;
            } else if (filterValue === 'completed' && !status.includes('selesai')) {
                showRow = false;
            }
            
            row.style.display = showRow ? '' : 'none';
        });
    });

    // Delete confirmation
    function confirmDelete(id, name) {
        document.getElementById('kegiatanName').textContent = name;
        document.getElementById('deleteForm').action = `{{ route('admin.kegiatan.destroy', '') }}/${id}`;
        
        const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
        deleteModal.show();
    }

    // Auto-refresh status badges every minute
    setInterval(function() {
        location.reload();
    }, 60000);
</script>
@endpush