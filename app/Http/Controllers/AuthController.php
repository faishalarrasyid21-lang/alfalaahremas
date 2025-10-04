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
            
            // Check if user intended to go somewhere before login
            $intended = $request->session()->pull('url.intended', route('kegiatan.index'));
            
            return redirect($intended)->with('success', 'Login berhasil! Selamat datang Admin.');
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
        // Check if admin already exists
        $admin = User::where('email', 'admin@remas.com')->first();
        
        if (!$admin) {
            User::create([
                'name' => 'Admin REMAS',
                'email' => 'admin@remas.com',
                'password' => Hash::make('admin123'),
                'email_verified_at' => now(),
            ]);
            
            return response()->json(['message' => 'Admin user created successfully!']);
        }
        
        return response()->json(['message' => 'Admin user already exists!']);
    }
}
