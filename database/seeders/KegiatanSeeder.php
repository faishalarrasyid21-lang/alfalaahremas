<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kegiatan;
use Carbon\Carbon;

class KegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kegiatans = [
            [
                'judul' => 'Riyayan Remaja Masjid Al-Falaah',
                'deskripsi' => 'Menyambung silaturahmi dengan masyarakat dan saling maaf maafan.',
                'google_drive_link' => 'https://drive.google.com/drive/folders/1P2GZ33Zr9poJCikW4d-1nNFqqkn18_o0?usp=drive_link',
                'tanggal' => Carbon::now()->addDays(5),
                'waktu' => Carbon::createFromTime(19, 30),
                'lokasi' => 'Masjid Al-Falaah',
                'is_active' => true,
            ],
            [
                'judul' => 'Kajian Tahsin Al-Quran',
                'deskripsi' => 'Program kelas tahsin Al-Quran untuk meningkatkan kualitas bacaan Al-Quran sesuai kaidah tajwid. Kelas dibagi berdasarkan tingkat kemampuan.',
                'google_drive_link' => 'https://drive.google.com/drive/folders/1ABC123-kajian-tahsin',
                'tanggal' => Carbon::now()->addDays(10),
                'waktu' => Carbon::createFromTime(16, 0),
                'lokasi' => 'Ruang Kelas Masjid Al-Falaah',
                'is_active' => true,
            ],
            [
                'judul' => 'Bakti Sosial Ramadhan',
                'deskripsi' => 'Program bakti sosial tahunan REMAS AL-FALAAH dalam menyambut bulan Ramadhan. Kegiatan meliputi pembagian sembako kepada keluarga kurang mampu.',
                'google_drive_link' => 'https://drive.google.com/drive/folders/1DEF456-bakti-sosial',
                'tanggal' => Carbon::now()->addDays(20),
                'waktu' => Carbon::createFromTime(8, 0),
                'lokasi' => 'Sekitar Masjid Al-Falaah',
                'is_active' => true,
            ]
        ];

        foreach ($kegiatans as $kegiatan) {
            Kegiatan::create($kegiatan);
        }
    }
}
