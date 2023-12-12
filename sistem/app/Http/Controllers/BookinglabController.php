<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookinglab;
use Redirect;
use Session;
use DB;

class BookinglabController extends Controller
{
    public function index(Request $request)
    {
        if ($request){
            $data = bookinglab::where('tanggal', 'LIKE', '%' .$request->search. '%')->get();
        } else{
            $data = DB::select('select * from booking order by created_at DESC');
        }
        return view('bookinglab', compact('data', 'request'));
    }

    public function simpan(Request $request)
    {
        $request->validate( [
            'nama' => 'required',
            'hari' => 'required',
            'tanggal' => 'required',
            'mulai' => 'required',
            'selesai' => 'required',
        ]
        );
        
        $data = DB::select('select * from booking where tanggal = "'.$request->tanggal.'" and mulai = "'.$request->mulai.'"');
        if (empty($data)){
            $data = new bookinglab();
            $data->nama = $request->nama;
            $data->hari = $request->hari;
            $data->tanggal = $request->tanggal;
            $data->mulai = $request->mulai;
            $data->selesai = $request->selesai;
            $data->matakuliah = $request->matakuliah;
            $data->semester = $request->semester;
            $data->prodi = $request->prodi;
            $data->dosen_pengampu = $request->dosen_pengampu;
        $data->save();
        Session::flash('sukses', 'Data berhasil di simpan');
        return Redirect('/bookinglab');
        } else {
            Session::flash('gagal', 'Maaf labkom sudah dibooking');
            return Redirect('/bookinglab');
        }
    }
}
