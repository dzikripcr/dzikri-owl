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
        return view('admin.login');
    }

    public function showregis()
    {
        return view('admin.register');
    }

    public function login(Request $request)
    {
        // $username = $request->input('username');
        // $password = $request->input('password');

        // // Validasi: jika username dan password adalah 'nim'
        // // if ($username === '2457301037' && $password === '2457301037') {
        // //     return redirect('/dashboard')->with('success', 'Selamat Datang Admin!');
        // // }
        // // return back()->withErrors(['login_error' => 'Username atau password salah!']);
        // return redirect('/dashboard')->with('success', 'Selamat Datang Admin!');
        $request->validate([
            'name'    => 'required',
            'password' => 'required',
        ]);

        $user = User::where('name', $request->name)->first();

        if (! $user) {
            return redirect()->route('login')->withErrors(['name' => 'Username tidak ditemukan']);
        }

        if (! Hash::check($request->password, $user->password)) {
            return redirect()->route('login')->withErrors(['password' => 'Password salah']);
        }

        Auth::login($user);
        return redirect()->route('dashboard-admin.index');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required|regex:/^[a-zA-Z\s]+$/',
            'alamat' => 'required|max:300',
            'tanggal_lahir' => 'required|date',
            'username' => 'required',
            'password' => [
                'required',
                'confirmed',
                'regex:/^(?=.*[A-Z])(?=.*[0-9]).+$/'
            ]
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'nama.regex' => 'Nama tidak boleh mengandung angka.',
            'alamat.required' => 'Alamat wajib diisi.',
            'alamat.max' => 'Alamat maksimal 300 karakter.',
            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi.',
            'tanggal_lahir.date' => 'Format tanggal lahir tidak valid.',
            'username.required' => 'Username wajib diisi.',
            'password.required' => 'Password wajib diisi.',
            'password.confirmed' => 'Konfirmasi password tidak sesuai.',
            'password.regex' => 'Password harus mengandung huruf kapital dan angka.',
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan Login');
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
