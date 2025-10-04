<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $kegiatans = Kegiatan::where('is_active', true)
                            ->orderBy('tanggal', 'desc')
                            ->limit(6)
                            ->get();
        
        return view('home', compact('kegiatans'));
    }
}
