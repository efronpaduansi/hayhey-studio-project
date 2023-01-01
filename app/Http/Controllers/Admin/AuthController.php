<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class AuthController extends Controller
{
    public function account_login()
    {
        $judul = 'Login';
        return view('admin.auth.login', compact('judul'));
    }

    public function do_login(Request $request)
    {
        $request->validate([
            'email'     => 'required|email',
            'password'  => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            return redirect()->intended('admin/dashboard');
        }
        return redirect()->back()->with('error', 'Oppss! Email atau Password salah.');
    }

    public function account_register()
    {
        $judul = 'Register';
        return view('admin.auth.register', compact('judul'));
    }

    public function do_register(Request $request)
    {
        $validatedData = $request->validate([
            'name'                  => 'required',
            'email'                 => 'required|email|unique:users',
            'password'              => 'required|min:3',
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect('account-login')->with('pesan', 'Berhasil mendaftar, silahkan login.');
    }

    public function account_logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('account-login');
    }
}
