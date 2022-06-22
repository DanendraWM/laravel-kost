<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;


class authController extends Controller
{
    public function login()
    {
        return view('masuk.login', ['title' => 'login']);
    }
    public function authlogin(request $request)
    {
        $validasi = $request->validate([
            'email' => ['required', 'email:dns'],
            'password' => ['required']
        ]);
        if (Auth::attempt($validasi)) {
            $request->session()->regenerate();
            if (auth()->user()->level == 'user') {
                Alert::info('login berhasil', 'selamat berbelanja');
                return redirect()->intended('/');
            } else {
                return redirect()->intended('/admin');
            }
        } else {
            Alert::warning('login gagal', 'hayo pake akun orang ya');
            return back()->with('gagal', 'login anda gagal!');
        }
    }
    public function logout(request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        Alert::success('logout berhasil', 'terima kasih');
        return redirect('/login');
    }
    public function register()
    {
        return view('masuk.register', ['title' => 'Register']);
    }
    public function authregister(request $request)
    {
        $request->validate([
            'name' => ['required', 'min:3', 'max:25'],
            'email' => ['required', 'unique:users', 'email:dns'],
            'password' => ['required', 'min:8'],
            // 'level' => ['required'],
        ]);
        // $validasi['password'] = bcrypt($validasi['password']);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->level = 'user';
        $user->save();
        // $validasi['level'] = 'user';
        // user::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => $request->password,
        //     'level' => 'user',
        // ]);
        toast('berhasil membuat akun', 'success');
        return redirect('/login')->with('pesan', 'berhasil membuat akun');
    }
}
