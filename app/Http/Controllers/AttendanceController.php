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
            ->join('user','user.id', '=', 'absensi_online.karyawan_id')
            ->where('user.iskaryawan','=',1)
            ->select('absensi_online.*', 'user.nama')
            ->orderBy('absensi_online.scan_date')
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
            ->orderby('tgl_jadwal')
            ->get();
//        return $presensi;
        return view('presensi.generate', compact('presensi'));
    }
}
