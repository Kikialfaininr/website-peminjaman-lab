<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaporanPengguna;
use PDF;

class LaporanPenggunaController extends Controller
{
    public function index(Request $request)
    {
        if ($request){
            $data = laporanpengguna::where('username', 'LIKE', '%' .$request->search. '%')->get();
        } else{
            $data = laporanpengguna::all();
        }
        return view('laporanpengguna', compact('data', 'request'));
    }

    public function download()
    {
        $data = laporanpengguna::limit(20)->get();
        $pdf = PDF::loadview('laporanpengguna-pdf', compact('data'));
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream('laporanpengguna.pdf');
    }
}