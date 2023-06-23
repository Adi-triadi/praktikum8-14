<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    //memanggil from
    function index()
    {
        return view('pages.auth.register ');
    }

    //memproses register pengguna 
    function register(Request $request)
    {
        //validasi data
        $validateduser = $request->validate([
            'name' => 'required',
            'contact' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);
        
        //proses registrasi pengguna 
        $userData = new user;
        $userData->name = $request->name;
        $userData->contact = $request->contact;
        $userData->email = $request->email;
        $userData->password = bcrypt($request->password);
        $userData->save();

        //redirect/alih halaman 
        return redirect()->to('/login')->with('succes', 'register berhasil');
    }
}