<!DOCTYPE html>
<html>
<head>
    <title>Test Form Kegiatan</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <h1>Test Form Kegiatan</h1>
    
    <form action="{{ route('kegiatan.store') }}" method="POST">
        @csrf
        <div>
            <label>Judul:</label>
            <input type="text" name="judul" value="Kegiatan Test Form" required>
        </div>
        <div>
            <label>Deskripsi:</label>
            <textarea name="deskripsi" required>Ini adalah kegiatan test yang ditambahkan melalui form test page</textarea>
        </div>
        <div>
            <label>Tanggal:</label>
            <input type="date" name="tanggal" value="{{ date('Y-m-d', strtotime('+5 days')) }}" required>
        </div>
        <div>
            <label>Waktu:</label>
            <input type="time" name="waktu" value="15:00" required>
        </div>
        <div>
            <label>Lokasi:</label>
            <input type="text" name="lokasi" value="Test Lokasi Form" required>
        </div>
        <div>
            <label>Google Drive Link:</label>
            <input type="url" name="google_drive_link" value="https://drive.google.com/test-form">
        </div>
        <div>
            <button type="submit">Submit Test</button>
        </div>
    </form>
    
    <a href="{{ route('kegiatan.index') }}">Kembali ke Halaman Kegiatan</a>
</body>
</html>