@extends('layouts.admin')

@section('title', 'Edit Kegiatan')
@section('page-title', 'Edit Kegiatan')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="table-card">
            <div class="card-header bg-white border-0 p-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0" style="color: var(--primary-green);">
                        <i class="fas fa-edit me-2"></i>Edit Kegiatan: {{ $kegiatan->nama }}
                    </h5>
                    <div>
                        <a href="{{ route('kegiatan.show', $kegiatan) }}" class="btn btn-outline-info me-2" target="_blank">
                            <i class="fas fa-eye me-2"></i>Lihat
                        </a>
                        <a href="{{ route('admin.kegiatan') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Kembali
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="card-body p-4">
                <form action="{{ route('admin.kegiatan.update', $kegiatan) }}" method="POST" id="kegiatanForm">
                    @csrf
                    @method('PUT')
                    
                    <!-- Informasi Kegiatan -->
                    <div class="alert alert-info mb-4">
                        <div class="row">
                            <div class="col-md-6">
                                <strong>Dibuat:</strong> {{ $kegiatan->created_at->format('d F Y H:i') }}
                            </div>
                            <div class="col-md-6">
                                <strong>Terakhir diubah:</strong> {{ $kegiatan->updated_at->format('d F Y H:i') }}
                            </div>
                        </div>
                    </div>
                    
                    <!-- Nama Kegiatan -->
                    <div class="mb-4">
                        <label for="nama" class="form-label fw-bold">
                            <i class="fas fa-calendar-alt me-2" style="color: var(--primary-green);"></i>
                            Nama Kegiatan
                        </label>
                        <input type="text" 
                               class="form-control @error('nama') is-invalid @enderror" 
                               id="nama" 
                               name="nama" 
                               value="{{ old('nama', $kegiatan->nama) }}"
                               placeholder="Masukkan nama kegiatan..."
                               required>
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">
                            <i class="fas fa-info-circle me-1"></i>
                            Gunakan nama yang jelas dan deskriptif
                        </small>
                    </div>

                    <!-- Tanggal -->
                    <div class="mb-4">
                        <label for="tanggal" class="form-label fw-bold">
                            <i class="fas fa-calendar me-2" style="color: var(--primary-green);"></i>
                            Tanggal Kegiatan
                        </label>
                        <input type="date" 
                               class="form-control @error('tanggal') is-invalid @enderror" 
                               id="tanggal" 
                               name="tanggal" 
                               value="{{ old('tanggal', $kegiatan->tanggal->format('Y-m-d')) }}"
                               required>
                        @error('tanggal')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">
                            <i class="fas fa-info-circle me-1"></i>
                            Tanggal saat ini: {{ $kegiatan->tanggal->format('d F Y') }}
                        </small>
                    </div>

                    <!-- Deskripsi -->
                    <div class="mb-4">
                        <label for="deskripsi" class="form-label fw-bold">
                            <i class="fas fa-align-left me-2" style="color: var(--primary-green);"></i>
                            Deskripsi Kegiatan
                        </label>
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
                                  id="deskripsi" 
                                  name="deskripsi" 
                                  rows="5"
                                  placeholder="Jelaskan detail kegiatan, tujuan, dan informasi penting lainnya..."
                                  required>{{ old('deskripsi', $kegiatan->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="d-flex justify-content-between">
                            <small class="form-text text-muted">
                                <i class="fas fa-info-circle me-1"></i>
                                Berikan deskripsi yang lengkap dan menarik
                            </small>
                            <small class="text-muted" id="charCount">{{ strlen($kegiatan->deskripsi) }} karakter</small>
                        </div>
                    </div>

                    <!-- Google Drive Link -->
                    <div class="mb-4">
                        <label for="google_drive_link" class="form-label fw-bold">
                            <i class="fab fa-google-drive me-2" style="color: var(--primary-green);"></i>
                            Link Google Drive
                            <span class="badge bg-secondary ms-2">Opsional</span>
                        </label>
                        <div class="input-group">
                            <input type="url" 
                                   class="form-control @error('google_drive_link') is-invalid @enderror" 
                                   id="google_drive_link" 
                                   name="google_drive_link" 
                                   value="{{ old('google_drive_link', $kegiatan->google_drive_link) }}"
                                   placeholder="https://drive.google.com/...">
                            @if($kegiatan->google_drive_link)
                                <a href="{{ $kegiatan->google_drive_link }}" target="_blank" class="btn btn-outline-primary">
                                    <i class="fas fa-external-link-alt"></i>
                                </a>
                            @endif
                        </div>
                        @error('google_drive_link')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">
                            <i class="fas fa-info-circle me-1"></i>
                            Link untuk dokumentasi atau materi kegiatan
                        </small>
                    </div>

                    <!-- Status Preview -->
                    <div class="mb-4">
                        <label class="form-label fw-bold">
                            <i class="fas fa-info-circle me-2" style="color: var(--primary-green);"></i>
                            Status Kegiatan
                        </label>
                        <div class="card border-2" style="border-color: var(--light-green);">
                            <div class="card-body">
                                @php
                                    $now = now();
                                    $status = '';
                                    $badgeClass = '';
                                    $statusIcon = '';
                                    
                                    if ($kegiatan->tanggal->isFuture()) {
                                        $status = 'Akan Datang';
                                        $badgeClass = 'bg-warning';
                                        $statusIcon = 'fas fa-clock';
                                    } elseif ($kegiatan->tanggal->isToday()) {
                                        $status = 'Berlangsung Hari Ini';
                                        $badgeClass = 'bg-success';
                                        $statusIcon = 'fas fa-play-circle';
                                    } else {
                                        $status = 'Selesai';
                                        $badgeClass = 'bg-secondary';
                                        $statusIcon = 'fas fa-check-circle';
                                    }
                                @endphp
                                
                                <div class="d-flex align-items-center">
                                    <i class="{{ $statusIcon }} fa-2x me-3" style="color: var(--primary-green);"></i>
                                    <div>
                                        <h6 class="mb-1">Status: <span class="badge {{ $badgeClass }}">{{ $status }}</span></h6>
                                        <small class="text-muted">
                                            @if($kegiatan->tanggal->isFuture())
                                                Kegiatan akan dilaksanakan dalam {{ $kegiatan->tanggal->diffForHumans() }}
                                            @elseif($kegiatan->tanggal->isToday())
                                                Kegiatan dilaksanakan hari ini!
                                            @else
                                                Kegiatan telah selesai {{ $kegiatan->tanggal->diffForHumans() }}
                                            @endif
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Preview Card -->
                    <div class="mb-4">
                        <label class="form-label fw-bold">
                            <i class="fas fa-eye me-2" style="color: var(--primary-green);"></i>
                            Preview Perubahan
                        </label>
                        <div class="card border-2 border-dashed" style="border-color: var(--light-green);">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3 text-center">
                                        <div style="width: 80px; height: 80px; background: linear-gradient(45deg, var(--light-green), var(--accent-green)); border-radius: 15px; display: flex; align-items: center; justify-content: center; margin: 0 auto; color: white;">
                                            <i class="fas fa-calendar-check fa-2x"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <h5 class="preview-nama" style="color: var(--primary-green);">{{ $kegiatan->nama }}</h5>
                                        <p class="preview-tanggal mb-2" style="color: var(--primary-green);">
                                            <i class="fas fa-calendar me-2"></i>{{ $kegiatan->tanggal->format('d F Y') }}
                                        </p>
                                        <p class="preview-deskripsi text-muted mb-2">{{ Str::limit($kegiatan->deskripsi, 100) }}</p>
                                        <div class="preview-drive" style="{{ $kegiatan->google_drive_link ? '' : 'display: none;' }}">
                                            <a href="{{ $kegiatan->google_drive_link }}" class="btn btn-sm btn-outline-primary" target="_blank">
                                                <i class="fab fa-google-drive me-2"></i>Google Drive
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <a href="{{ route('admin.kegiatan') }}" class="btn btn-outline-secondary me-2">
                                <i class="fas fa-times me-2"></i>Batal
                            </a>
                            <button type="button" class="btn btn-outline-danger" onclick="confirmDelete()">
                                <i class="fas fa-trash me-2"></i>Hapus
                            </button>
                        </div>
                        <div>
                            <button type="button" class="btn btn-outline-info me-2" onclick="previewKegiatan()">
                                <i class="fas fa-eye me-2"></i>Preview
                            </button>
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save me-2"></i>Simpan Perubahan
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Delete Form -->
                <form id="deleteForm" action="{{ route('admin.kegiatan.destroy', $kegiatan) }}" method="POST" class="d-none">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Preview Modal -->
<div class="modal fade" id="previewModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background: var(--primary-green); color: white;">
                <h5 class="modal-title">
                    <i class="fas fa-eye me-2"></i>Preview Kegiatan
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="kegiatan-preview">
                    <!-- Content will be populated by JavaScript -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-success" onclick="submitForm()">
                    <i class="fas fa-save me-2"></i>Simpan Perubahan
                </button>
            </div>
        </div>
    </div>
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
                <p class="mb-2">Apakah Anda yakin ingin menghapus kegiatan <strong>"{{ $kegiatan->nama }}"</strong>?</p>
                <div class="alert alert-warning">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <strong>Peringatan:</strong> Tindakan ini tidak dapat dibatalkan dan akan menghapus semua data terkait kegiatan ini.
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger" onclick="deleteKegiatan()">
                    <i class="fas fa-trash me-2"></i>Ya, Hapus
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Character counter for description
    const deskripsiTextarea = document.getElementById('deskripsi');
    const charCount = document.getElementById('charCount');
    
    deskripsiTextarea.addEventListener('input', function() {
        const count = this.value.length;
        charCount.textContent = `${count} karakter`;
        
        if (count > 500) {
            charCount.classList.add('text-warning');
        } else {
            charCount.classList.remove('text-warning');
        }
        
        updatePreview();
    });

    // Real-time preview update
    function updatePreview() {
        const nama = document.getElementById('nama').value;
        const tanggal = document.getElementById('tanggal').value;
        const deskripsi = document.getElementById('deskripsi').value;
        const driveLink = document.getElementById('google_drive_link').value;
        
        // Update preview nama
        document.querySelector('.preview-nama').textContent = nama;
        
        // Update preview tanggal
        if (tanggal) {
            const date = new Date(tanggal);
            const formattedDate = date.toLocaleDateString('id-ID', { 
                year: 'numeric', 
                month: 'long', 
                day: 'numeric' 
            });
            document.querySelector('.preview-tanggal').innerHTML = `<i class="fas fa-calendar me-2"></i>${formattedDate}`;
        }
        
        // Update preview deskripsi
        const shortDesc = deskripsi.length > 100 ? deskripsi.substring(0, 100) + '...' : deskripsi;
        document.querySelector('.preview-deskripsi').textContent = shortDesc;
        
        // Update preview drive link
        const drivePreview = document.querySelector('.preview-drive');
        if (driveLink) {
            drivePreview.style.display = 'block';
            drivePreview.querySelector('a').href = driveLink;
        } else {
            drivePreview.style.display = 'none';
        }
    }

    // Add event listeners for real-time preview
    document.getElementById('nama').addEventListener('input', updatePreview);
    document.getElementById('tanggal').addEventListener('change', updatePreview);
    document.getElementById('google_drive_link').addEventListener('input', updatePreview);

    // Preview modal function
    function previewKegiatan() {
        const nama = document.getElementById('nama').value;
        const tanggal = document.getElementById('tanggal').value;
        const deskripsi = document.getElementById('deskripsi').value;
        const driveLink = document.getElementById('google_drive_link').value;
        
        if (!nama || !tanggal || !deskripsi) {
            alert('Harap isi nama, tanggal, dan deskripsi kegiatan terlebih dahulu!');
            return;
        }
        
        const date = new Date(tanggal);
        const formattedDate = date.toLocaleDateString('id-ID', { 
            weekday: 'long', 
            year: 'numeric', 
            month: 'long', 
            day: 'numeric' 
        });
        
        // Determine status
        const now = new Date();
        let status = '', badgeClass = '';
        if (date > now) {
            status = 'Akan Datang';
            badgeClass = 'bg-warning';
        } else if (date.toDateString() === now.toDateString()) {
            status = 'Hari Ini';
            badgeClass = 'bg-success';
        } else {
            status = 'Selesai';
            badgeClass = 'bg-secondary';
        }
        
        const previewContent = `
            <div class="card border-0" style="box-shadow: 0 4px 15px rgba(45, 90, 61, 0.1);">
                <div class="card-header" style="background: linear-gradient(135deg, var(--primary-green), var(--secondary-green)); color: white;">
                    <h4 class="mb-0">${nama}</h4>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <strong><i class="fas fa-calendar me-2" style="color: var(--primary-green);"></i>Tanggal:</strong><br>
                            ${formattedDate}
                        </div>
                        <div class="col-md-6">
                            <strong><i class="fas fa-info-circle me-2" style="color: var(--primary-green);"></i>Status:</strong><br>
                            <span class="badge ${badgeClass}">${status}</span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <strong><i class="fas fa-align-left me-2" style="color: var(--primary-green);"></i>Deskripsi:</strong><br>
                        <p class="mt-2">${deskripsi}</p>
                    </div>
                    ${driveLink ? `
                        <div class="mb-3">
                            <strong><i class="fab fa-google-drive me-2" style="color: var(--primary-green);"></i>Dokumentasi:</strong><br>
                            <a href="${driveLink}" target="_blank" class="btn btn-outline-primary mt-2">
                                <i class="fab fa-google-drive me-2"></i>Buka Google Drive
                            </a>
                        </div>
                    ` : ''}
                </div>
            </div>
        `;
        
        document.querySelector('.kegiatan-preview').innerHTML = previewContent;
        
        const previewModal = new bootstrap.Modal(document.getElementById('previewModal'));
        previewModal.show();
    }

    // Submit form from modal
    function submitForm() {
        document.getElementById('kegiatanForm').submit();
    }

    // Delete confirmation
    function confirmDelete() {
        const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
        deleteModal.show();
    }

    function deleteKegiatan() {
        document.getElementById('deleteForm').submit();
    }

    // Form validation
    document.getElementById('kegiatanForm').addEventListener('submit', function(e) {
        const nama = document.getElementById('nama').value.trim();
        const tanggal = document.getElementById('tanggal').value;
        const deskripsi = document.getElementById('deskripsi').value.trim();
        
        if (!nama || !tanggal || !deskripsi) {
            e.preventDefault();
            alert('Harap lengkapi semua field yang wajib diisi!');
            return;
        }
        
        if (deskripsi.length < 10) {
            e.preventDefault();
            alert('Deskripsi minimal 10 karakter!');
            return;
        }
        
        // Show loading state
        const submitBtn = this.querySelector('button[type="submit"]');
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Menyimpan...';
        submitBtn.disabled = true;
    });
</script>
@endpush