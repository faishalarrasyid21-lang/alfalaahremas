@extends('layouts.admin')

@section('title', 'Tambah Kegiatan')
@section('page-title', 'Tambah Kegiatan Baru')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="table-card">
            <div class="card-header bg-white border-0 p-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0" style="color: var(--primary-green);">
                        <i class="fas fa-plus-circle me-2"></i>Form Tambah Kegiatan
                    </h5>
                    <a href="{{ route('admin.kegiatan') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Kembali
                    </a>
                </div>
            </div>
            
            <div class="card-body p-4">
                <form action="{{ route('admin.kegiatan.store') }}" method="POST" id="kegiatanForm">
                    @csrf
                    
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
                               value="{{ old('nama') }}"
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
                               value="{{ old('tanggal') }}"
                               min="{{ date('Y-m-d') }}"
                               required>
                        @error('tanggal')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">
                            <i class="fas fa-info-circle me-1"></i>
                            Pilih tanggal pelaksanaan kegiatan
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
                                  required>{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="d-flex justify-content-between">
                            <small class="form-text text-muted">
                                <i class="fas fa-info-circle me-1"></i>
                                Berikan deskripsi yang lengkap dan menarik
                            </small>
                            <small class="text-muted" id="charCount">0 karakter</small>
                        </div>
                    </div>

                    <!-- Google Drive Link -->
                    <div class="mb-4">
                        <label for="google_drive_link" class="form-label fw-bold">
                            <i class="fab fa-google-drive me-2" style="color: var(--primary-green);"></i>
                            Link Google Drive
                            <span class="badge bg-secondary ms-2">Opsional</span>
                        </label>
                        <input type="url" 
                               class="form-control @error('google_drive_link') is-invalid @enderror" 
                               id="google_drive_link" 
                               name="google_drive_link" 
                               value="{{ old('google_drive_link') }}"
                               placeholder="https://drive.google.com/...">
                        @error('google_drive_link')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">
                            <i class="fas fa-info-circle me-1"></i>
                            Link untuk dokumentasi atau materi kegiatan
                        </small>
                    </div>

                    <!-- Preview Card -->
                    <div class="mb-4">
                        <label class="form-label fw-bold">
                            <i class="fas fa-eye me-2" style="color: var(--primary-green);"></i>
                            Preview Kegiatan
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
                                        <h5 class="preview-nama text-muted">Nama kegiatan akan muncul di sini</h5>
                                        <p class="preview-tanggal text-muted mb-2">
                                            <i class="fas fa-calendar me-2"></i>Tanggal belum dipilih
                                        </p>
                                        <p class="preview-deskripsi text-muted mb-2">Deskripsi akan muncul di sini...</p>
                                        <div class="preview-drive" style="display: none;">
                                            <a href="#" class="btn btn-sm btn-outline-primary">
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
                        <a href="{{ route('admin.kegiatan') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-times me-2"></i>Batal
                        </a>
                        <div>
                            <button type="button" class="btn btn-outline-info me-2" onclick="previewKegiatan()">
                                <i class="fas fa-eye me-2"></i>Preview
                            </button>
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save me-2"></i>Simpan Kegiatan
                            </button>
                        </div>
                    </div>
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
                    <i class="fas fa-save me-2"></i>Simpan Kegiatan
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
        const nama = document.getElementById('nama').value || 'Nama kegiatan akan muncul di sini';
        const tanggal = document.getElementById('tanggal').value;
        const deskripsi = document.getElementById('deskripsi').value || 'Deskripsi akan muncul di sini...';
        const driveLink = document.getElementById('google_drive_link').value;
        
        // Update preview nama
        document.querySelector('.preview-nama').textContent = nama;
        document.querySelector('.preview-nama').style.color = nama !== 'Nama kegiatan akan muncul di sini' ? 'var(--primary-green)' : '';
        
        // Update preview tanggal
        if (tanggal) {
            const date = new Date(tanggal);
            const formattedDate = date.toLocaleDateString('id-ID', { 
                weekday: 'long', 
                year: 'numeric', 
                month: 'long', 
                day: 'numeric' 
            });
            document.querySelector('.preview-tanggal').innerHTML = `<i class="fas fa-calendar me-2"></i>${formattedDate}`;
            document.querySelector('.preview-tanggal').style.color = 'var(--primary-green)';
        } else {
            document.querySelector('.preview-tanggal').innerHTML = '<i class="fas fa-calendar me-2"></i>Tanggal belum dipilih';
            document.querySelector('.preview-tanggal').style.color = '';
        }
        
        // Update preview deskripsi
        const shortDesc = deskripsi.length > 100 ? deskripsi.substring(0, 100) + '...' : deskripsi;
        document.querySelector('.preview-deskripsi').textContent = shortDesc;
        document.querySelector('.preview-deskripsi').style.color = deskripsi !== 'Deskripsi akan muncul di sini...' ? '#666' : '';
        
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
                            <strong><i class="fas fa-clock me-2" style="color: var(--primary-green);"></i>Status:</strong><br>
                            <span class="badge bg-warning">Akan Datang</span>
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

    // Initialize preview on page load
    updatePreview();
</script>
@endpush