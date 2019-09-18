<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
// use App\md_client;
// use App\md_karyawan;

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
        return view('dashboard');
    }

    public function cetakPdf()
    {
        //$md_client = md_client::all();
        //$md_karyawan = md_karyawan::all();
        $pdf = PDF::loadview('cetakpdf')
        ->setPaper('A4', 'potrait');
        //->set_option('isHtml5ParserEnabled', TRUE);
        // ->render();
        return $pdf->stream();
    }

    public function basicform()
    {
        return view('basicform');
    }

    public function tambah_pegawai()
    {
        return view('admin.form_tambah_data_pegawai');
    }


}
