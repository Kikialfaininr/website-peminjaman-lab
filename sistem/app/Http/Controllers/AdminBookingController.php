<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminBooking;
use Redirect;
use Session;
use DB;

class AdminBookingController extends Controller
{
    public function index(Request $request)
    {
        if ($request){
            $data = adminbooking::where('tanggal', 'LIKE', '%' .$request->search. '%')->get();
        } else{
            $data = DB::select('select * from booking order by created_at DESC');
        }
        return view('adminbooking', compact('data', 'request'));
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
            $data = new adminbooking();
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
        return Redirect('/adminbooking');
        } else {
            Session::flash('gagal', 'Maaf labkom sudah dibooking');
            return Redirect('/adminbooking');
        }
    }

    public function edit(Request $request, $id)
    {
        $data = adminbooking::where('idbooking', $id)->first();
        return view('adminbooking-edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = adminbooking::where('idbooking', $id)->first();
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
        Session::flash('sukses', 'Data berhasil diubah');
        return Redirect('/adminbooking');
    }

    public function hapus(Request $request, $id)
    {
        $data = adminbooking::where('idbooking', $id)->first();
        $data->delete();
        Session::flash('sukses', 'Data berhasil dihapus');
        return Redirect('/adminbooking');
    }

    public function confirm(Request $request, $id)
    {
        $data = adminbooking::where('idbooking', $id)->first();
            $data->status = $request->status;
        $data->save();
        Session::flash('sukses', 'Booking berhasil dikonfirmasi');
        return Redirect('/adminbooking');
    }
}
