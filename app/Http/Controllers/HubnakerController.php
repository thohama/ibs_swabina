<?php

namespace App\Http\Controllers;

use App\Imports\JobseekerImport;
use Illuminate\Http\Request;
use PDF;
use DB;
use Illuminate\Database\QueryException;
use App\md_jobseeker;
use App\st_Tingkatpendidikan;
use App\st_jobseeker_pendidikanformal;
use App\st_jobseeker_pendidikaninformal;
use App\st_jobseeker_pengalamankerja;
use App\st_jobseeker_pengalamanorganisasi;
use App\st_jobseeker_datakeluarga;
use App\st_jobseeker_susunankeluarga;
use App\User;
use App\st_Kabkota;
use App\st_Kecamatan;
use Excel;
// use App\md_client;
// use App\md_karyawan;

class HubnakerController extends Controller
{
    public function index_pelamar_lulus()
    {
        $jobseeker = md_jobseeker::where('status_diterima','=','2')->get();
        return view('hubnaker.index_pelamar_lulus_seleksi', compact('jobseeker'));
    }

    public function pkwt_pelamar_lulus()
    {
    	$pdf = PDF::loadView('hubnaker.pkwt');
                return $pdf->stream();
        // return view('hubnaker.pkwt');
    }
}