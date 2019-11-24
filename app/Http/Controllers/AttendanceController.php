<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{
    public function getPresensi()
    {
        $presensi = DB::table('absensi_online')
            ->join('md_karyawan','md_karyawan.id', '=', 'absensi_online.karyawan_id')
//            ->where('user.iskaryawan','=',1)
            ->select('absensi_online.*', 'md_karyawan.nama')
            ->orderByDesc('absensi_online.scan_date')
            ->get();
        $i = 0;
        foreach ($presensi as $p){
            $tgl[$i] = date('Y-m-d',strtotime($p->scan_date));
            $jam[$i] = date('H:i:s',strtotime($p->scan_date));
            $i++;
        }
        return view('presensi.index', compact('presensi','tgl','jam'));
    }

    public function getGeneratePresensi(Request $request){
        $presensi = DB::table('tbl_presensi')
            ->select('*')
            ->orderbydesc('tgl_jadwal')
            ->get();
        $kar = DB::table('md_karyawan')
            ->join('st_site','st_site.id','=','md_karyawan.site_id')
            ->select('md_karyawan.*','st_site.nama as site')
            ->orderBy('st_site.nama')
            ->orderBy('md_karyawan.nama')
            ->get();
        return view('presensi.generate', compact('presensi','kar'));
    }

    public function personalGeneratePresensi(Request $request){
        return $request;
    }
}
