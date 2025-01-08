<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function login_proses(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $data= [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if(Auth::attempt($data)){
            return redirect()->route('admin.dashboard');
        }else {
            return redirect()->route('login')->with('failed', 'Email atau pasword salah!');
        }
    }

    public function daftar(){
        return view('auth.daftar');
    }

    public function daftar_proses(Request $request){
        $validator = Validator::make($request->all(),[
            'nama'     => 'required',
            'username' => 'required|unique:users,username',
            'password' => 'required|min:3',

        ]);

        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['nama']     = $request->nama;
        $data['username'] = $request->username;
        $data['password'] = Hash::make($request->password);

        User::create($data);

        return redirect()->route('login')->with('success', 'Anda berhasil daftar!');
    }

    public function logout(){
        Auth::logout();

        return redirect()->route('login');
    }
}
