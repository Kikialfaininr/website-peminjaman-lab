<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaporanBooking;
use PDF;

class LaporanBookingController extends Controller
{
    public function index(Request $request)
    {
        if ($request){
            $data = laporanbooking::where('tanggal', 'LIKE', '%' .$request->search. '%')->get();
        } else{
            $data = laporanbooking::all();
        }
        return view('laporanbooking', compact('data', 'request'));
    }

    public function download()
    {
        $data = laporanbooking::limit(20)->get();
        $pdf = PDF::loadview('laporanbooking-pdf', compact('data'));
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream('laporanbooking.pdf');
    }
}