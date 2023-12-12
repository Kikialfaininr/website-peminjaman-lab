<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminUser;
use Redirect;
use Session;
use Hash;
use DB;

class AdminUserController extends Controller
{
    public function index(Request $request)
    {
    if ($request->has('search')) {
        $data = adminuser::where('username', 'LIKE', '%' . $request->search . '%')
            ->where('level', 'pengguna')
            ->get();
    } else {
        $data = DB::table('users')
            ->where('level', 'pengguna')
            ->orderByDesc('created_at')
            ->get();
    }

    return view('adminuser', compact('data', 'request'));
    }


    public function simpan(Request $request)
    {
        $data = new adminuser([
            'name' => $request['name'],
            'username' => $request['username'],
            'nim' => $request['nim'],
            'level' => $request['level'],
            'password' => Hash::make($request['password']),
        ]);
        $data->save();
        Session::flash('sukses', 'Data berhasil di simpan');
        return Redirect('/adminuser');
    }

    public function edit(Request $request, $id)
    {
        $data = adminuser::where('id', $id)->first();
        return view('adminuser-edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = adminuser::where('id', $id)->first();
            $data->name = $request->name;
            $data->username = $request->username;
            $data->nim = $request->nim;
            $data->level = $request->level;
            $data->password = Hash::make($request->password);
        $data->save();
        Session::flash('sukses', 'Data berhasil diubah');
        return Redirect('/adminuser');
    }

    public function hapus(Request $request, $id)
    {
        $data = adminuser::where('id', $id)->first();
        $data->delete();
        Session::flash('sukses', 'Data berhasil dihapus');
        return Redirect('/adminuser');
    }
}

