<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function auth_login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $user = User::where('email', $email)->first();

        if ($user != null) {
            if ($user->mat_khau == $password) {
                Auth::login($user);
                $request->session()->put('id', $user->id);
                $request->session()->put('email', $user->email);
                $request->session()->put('Role', $user->vai_tro);
                $request->session()->put('ten', $user->ten);
                return redirect()->route('dashboard');
            } else return redirect()->back()->withErrors(['message' => 'Mật khẩu không đúng']);
        } else return redirect()->back()->withErrors(['message' => 'Tài khoản không tồn tại']);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flush(); // Xóa tất cả session
        return redirect()->route('login');
    }
    public function list()
    {
        $users = User::all();
        return view('user.list', compact('users'));
    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('user.form', compact('user'));
    }
    public function update($id, Request $request)
    {
        $user = User::find($id);
        $user->ten = $request->input('ten');
        $user->email = $request->input('email');
        $user->vai_tro = $request->input('vaitro');
        $user->mat_khau = $request->input('matkhau');
        $user->save();
        return redirect()->back()->with('message', 'Thành công');
    }
    public function create()
    {
        return view('user.form');
    }
    public function store(Request $request)
    {
        $user = User::create([
            'ten' => $request->input('ten'),
            'email' => $request->input('email'),
            'mat_khau' => $request->input('matkhau'),
            'vai_tro' => $request->input('vaitro')
        ]);
        return redirect()->back()->with('message', 'Thành công');
    }
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('message', 'Xóa thành công');
    }
}
