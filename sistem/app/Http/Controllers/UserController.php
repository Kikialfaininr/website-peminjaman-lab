<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LaporanPenggunaController extends Controller
{
    public function index()
    {
        $data = User::all();
        return view('user', compact('data'));
    }

    protected function simpan(array $data)
    {
        $data = new User([
            'name' => $data['name'],
            'username' => $data['username'],
            'nim' => $data['nim'],
            'level' => 'pengguna',
            'password' => Hash::make($data['password']),
        ]);
        $data->save();
        Session::flash('sukses', 'Data berhasil di simpan');
        return Redirect('/user');
    }
}