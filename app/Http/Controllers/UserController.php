<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //menampilkan data
    function index()
    {
        $userData = User::get();
        return view('pages.user.index', compact('userData'));
    }
    
    //menambahkan data
    function store(request $request)
    {
        //validasi data yang masuk
        $userData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'password' => 'required',
        ]);
        //simpan kedalam database
        User::create($userData);
        //mengalihkan ke halaman awal
        return redirect()->to('/user');
    }
    
    function create()
    {
        return view('pages.user.create');
    }
 
    //update data 
    function update($id, Request $request)
    {
        //validasi data 
        $validasiUser = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'password' => 'required',
        ]);
        //lakukan update data
        // $userData = User::find($id);
        // $userData ->update($validasiUser);
        User::find($id)->update($validasiUser);
        //redirect;
        return redirect()->to('/user');
    }

    function edit($id){
        $userData = User::find($id);
        return view('pages.user.edit', compact('userData'));
    }
    
    //hapus data 
    function delete($id)
    {
        User::find($id)->delete();
        return redirect()->to('/user');
    } 
}