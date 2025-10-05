<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            // Redirect to admin dashboard after successful login
            return redirect()->route('admin.dashboard')->with('success', 'Login berhasil! Selamat datang Admin ' . Auth::user()->name . '.');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/kegiatan')->with('success', 'Logout berhasil.');
    }

    public function createAdmin()
    {
        // Create multiple admin accounts
        $adminAccounts = [
            [
                'name' => 'Admin REMAS',
                'email' => 'admin@remas.com',
                'password' => Hash::make('admin123'),
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Admin Localhost',
                'email' => 'admin@localhost.com',
                'password' => Hash::make('admin123'),
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Faishal Arrasyid',
                'email' => 'faishalarrasyid21@gmail.com',
                'password' => Hash::make('admin123'),
                'email_verified_at' => now(),
            ]
        ];

        $created = 0;
        foreach ($adminAccounts as $adminData) {
            $existingAdmin = User::where('email', $adminData['email'])->first();
            
            if (!$existingAdmin) {
                User::create($adminData);
                $created++;
            }
        }
        
        if ($created > 0) {
            return response()->json(['message' => "{$created} admin user(s) created successfully!"]);
        }
        
        return response()->json(['message' => 'All admin users already exist!']);
    }
}
