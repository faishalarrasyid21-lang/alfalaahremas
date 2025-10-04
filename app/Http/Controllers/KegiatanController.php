<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function index()
    {
        $kegiatans = Kegiatan::where('is_active', true)
                            ->orderBy('tanggal', 'desc')
                            ->paginate(12);
        
        return view('kegiatan.index', compact('kegiatans'));
    }

    public function show(Kegiatan $kegiatan)
    {
        return view('kegiatan.show', compact('kegiatan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal' => 'required|date',
            'waktu' => 'required',
            'lokasi' => 'required|string|max:255',
            'google_drive_link' => 'nullable|url'
        ], [
            'judul.required' => 'Judul kegiatan wajib diisi.',
            'deskripsi.required' => 'Deskripsi kegiatan wajib diisi.',
            'tanggal.required' => 'Tanggal kegiatan wajib diisi.',
            'tanggal.date' => 'Format tanggal tidak valid.',
            'waktu.required' => 'Waktu kegiatan wajib diisi.',
            'lokasi.required' => 'Lokasi kegiatan wajib diisi.',
            'google_drive_link.url' => 'Format link Google Drive tidak valid.'
        ]);

        Kegiatan::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
            'lokasi' => $request->lokasi,
            'google_drive_link' => $request->google_drive_link,
            'is_active' => true
        ]);

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil ditambahkan!');
    }

    public function edit(Kegiatan $kegiatan)
    {
        return response()->json($kegiatan);
    }

    public function update(Request $request, Kegiatan $kegiatan)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal' => 'required|date',
            'waktu' => 'required',
            'lokasi' => 'required|string|max:255',
            'google_drive_link' => 'nullable|url'
        ], [
            'judul.required' => 'Judul kegiatan wajib diisi.',
            'deskripsi.required' => 'Deskripsi kegiatan wajib diisi.',
            'tanggal.required' => 'Tanggal kegiatan wajib diisi.',
            'tanggal.date' => 'Format tanggal tidak valid.',
            'waktu.required' => 'Waktu kegiatan wajib diisi.',
            'lokasi.required' => 'Lokasi kegiatan wajib diisi.',
            'google_drive_link.url' => 'Format link Google Drive tidak valid.'
        ]);

        $kegiatan->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
            'lokasi' => $request->lokasi,
            'google_drive_link' => $request->google_drive_link,
        ]);

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil diperbarui!');
    }

    public function destroy(Kegiatan $kegiatan)
    {
        $kegiatan->delete();
        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil dihapus!');
    }
}
