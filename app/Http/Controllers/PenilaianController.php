<?php

namespace App\Http\Controllers;

use App\Imports\JobseekerImport;
use Illuminate\Http\Request;
use PDF;
use DB;
use Illuminate\Database\QueryException;
use App\md_jobseeker;
use App\md_karyawan;
use App\md_user;
use App\st_Tingkatpendidikan;
use App\st_jobseeker_pendidikanformal;
use App\st_jobseeker_pendidikaninformal;
use App\st_jobseeker_pengalamankerja;
use App\st_jobseeker_pengalamanorganisasi;
use App\st_jobseeker_datakeluarga;
use App\st_jobseeker_susunankeluarga;
use App\User;
use App\st_Kabkota;
use App\st_periode_nilai;
use Excel;
// use App\md_client;
// use App\md_karyawan;

class PenilaianController extends Controller
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
    //Atasan
    public function data_karyawan(){
        $periode = st_periode_nilai::all();
        $data_karyawan = DB::select(DB::raw("SELECT * FROM user where iskaryawan = 1"));
        return view('penilaian_pegawai.penilaian_data_karyawan', compact('data_karyawan','periode'));
    }

    //Hubnaker
    public function periode_penilaian(){
        $periode = st_periode_nilai::all();
        return view('penilaian_pegawai.setup_periode_penilaian_pegawai', compact('periode'));
    }
}
