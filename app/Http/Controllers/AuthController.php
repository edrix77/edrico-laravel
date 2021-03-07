<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        return view('auths.login');
    }

    public function postlogin(Request $request)
    {
        if(Auth::attempt($request->only('email','password'))){
            return redirect('/');
        }
        return redirect('/signin')->with('error', 'Username dan password tidak terdaftar, coba kembali');
    }

    public function registrasi(Request $request)
    {
        return view('auths.registrasi');
    }

    public function registrasiagen(Request $request)
    {
        return view('auths.registrasi-agen');
    }

    public function postregistrasi(Request $request)
    {
        $request->validate([
            
            'nama_user' => 'required|unique:users|max:30',
            'password' => 'required',
            'confirmpassword' => 'required|same:password',
            'email' => 'required|unique:users|max:50',
            'no_telepon' => 'required|regex:/(08)[0-9]{9}/'
        ]);

        

        $usernya = new User;
        $usernya->nama_user  = $request->nama_user;
        $usernya->password  = bcrypt($request->password);
        $usernya->email = $request->email;
        $usernya->no_telepon = $request->no_telepon;

        $usernya->save();

        return redirect('/signin')->with('status','Anda sudah registrasi, sekarang coba sign in, terima kasih');
    }
    
    public function postregistrasiagen(Request $request)
    {
        $request->validate([
            'broker_agen' => 'required|max:50',
            'nama_user' => 'required|unique:users|max:30',
            'password' => 'required',
            'confirmpassword' => 'required|same:password',
            'email' => 'required|unique:users|max:50',
            'no_telepon' => 'required|regex:/(08)[0-9]{9}/'
            ]);


        
            $usernyaagen = new User;
            $usernyaagen->broker_agen = $request->broker_agen;
            $usernyaagen->nama_user  = $request->nama_user;
            $usernyaagen->password  = bcrypt($request->password);
            $usernyaagen->email = $request->email;
            $usernyaagen->no_telepon = $request->no_telepon;
            $usernyaagen->user_tipe = 'Agen';
            
            $usernyaagen->save();
            
            return redirect('/signin')->with('status','Anda sudah registrasi sebagai Agen, sekarang coba sign in, terima kasih');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/signin');
    }
}
