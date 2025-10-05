<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegiatan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display admin dashboard
     */
    public function index()
    {
        // Get statistics
        $totalKegiatan = Kegiatan::count();
        $kegiatanAktif = Kegiatan::where('created_at', '>=', now()->subMonth())->count();
        $totalAdmin = User::count();
        
        // Get recent activities
        $recentKegiatan = Kegiatan::latest()->take(5)->get();
        
        // Get monthly statistics
        $monthlyStats = Kegiatan::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as count')
        )
        ->whereYear('created_at', date('Y'))
        ->groupBy('month')
        ->orderBy('month')
        ->get();

        // Prepare chart data
        $chartData = [];
        for ($i = 1; $i <= 12; $i++) {
            $chartData[$i] = $monthlyStats->firstWhere('month', $i)?->count ?? 0;
        }

        return view('admin.dashboard', compact(
            'totalKegiatan',
            'kegiatanAktif', 
            'totalAdmin',
            'recentKegiatan',
            'chartData'
        ));
    }

    /**
     * Admin kegiatan management
     */
    public function kegiatan()
    {
        $kegiatans = Kegiatan::latest()->paginate(10);
        return view('admin.kegiatan.index', compact('kegiatans'));
    }

    /**
     * Show create form
     */
    public function createKegiatan()
    {
        return view('admin.kegiatan.create');
    }

    /**
     * Store new kegiatan
     */
    public function storeKegiatan(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal' => 'required|date',
            'google_drive_link' => 'nullable|url'
        ]);

        Kegiatan::create($request->all());

        return redirect()->route('admin.kegiatan')->with('success', 'Kegiatan berhasil ditambahkan!');
    }

    /**
     * Show edit form
     */
    public function editKegiatan(Kegiatan $kegiatan)
    {
        return view('admin.kegiatan.edit', compact('kegiatan'));
    }

    /**
     * Update kegiatan
     */
    public function updateKegiatan(Request $request, Kegiatan $kegiatan)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal' => 'required|date',
            'google_drive_link' => 'nullable|url'
        ]);

        $kegiatan->update($request->all());

        return redirect()->route('admin.kegiatan')->with('success', 'Kegiatan berhasil diperbarui!');
    }

    /**
     * Delete kegiatan
     */
    public function destroyKegiatan(Kegiatan $kegiatan)
    {
        $kegiatan->delete();
        return redirect()->route('admin.kegiatan')->with('success', 'Kegiatan berhasil dihapus!');
    }

    /**
     * Admin settings
     */
    public function settings()
    {
        $admins = User::all();
        return view('admin.settings', compact('admins'));
    }

    /**
     * Website statistics for public view
     */
    public function publicStats()
    {
        $stats = [
            'total_kegiatan' => Kegiatan::count(),
            'kegiatan_bulan_ini' => Kegiatan::whereMonth('created_at', now()->month)->count(),
            'tahun_berdiri' => '2020',
            'total_anggota' => '50+' // Static for now
        ];

        return response()->json($stats);
    }
}