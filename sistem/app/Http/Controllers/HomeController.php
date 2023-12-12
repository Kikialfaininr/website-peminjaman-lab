<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jumlahpengguna = DB::select('SELECT COUNT(id) AS jumlahpengguna FROM users WHERE level = "pengguna"');
        $jumlahbooking = DB::select('SELECT count(idbooking) AS jumlahbooking FROM booking');
        return view('home', compact('jumlahpengguna', 'jumlahbooking'));
    }
}
