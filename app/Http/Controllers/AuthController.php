<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check()) {
            //Redirect ke halaman dashboard
            return redirect()->route('dashboard');
        }
        //Redirect ke halaman login
        return view('auth.login');
    }

    public function showregis()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) {

            Auth::login($user);
            //session untuk last login
            session(['last_login' => now()]);

            return redirect()->route('dashboard')->with('success', 'Login berhasil!');
        } else {
            return back()->withErrors(['email' => 'Email atau password salah'])->withInput();
        }
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => [
                'required',
                'confirmed',
                'regex:/^(?=.*[A-Z])(?=.*[0-9]).+$/',
            ],
        ], [
            'username.required'  => 'Username wajib diisi.',
            'password.required'  => 'Password wajib diisi.',
            'password.confirmed' => 'Konfirmasi password tidak sesuai.',
            'password.regex'     => 'Password harus mengandung huruf kapital dan angka.',
        ]);

        // Simpan ke database
        User::create([
            'name' => $request->username,
            'email'    => $request->email,
            'password' => Hash::make($request->password), // Wajib hash password!
                                                          // tambah field lain jika diperlukan
        ]);

        return redirect()->route('login.index')->with('success', 'Registrasi berhasil! Silakan Login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();      // Hapus semua session
        $request->session()->regenerateToken(); // Cegah CSRF

        // Redirect ke halaman login
        return redirect()->route('login.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
