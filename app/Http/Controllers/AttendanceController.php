<?php

namespace App\Http\Controllers;
set_time_limit(1000);

use App\schnikdetail;
use Carbon\Carbon;
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

    public function getGenerateJadwal(){
        $date = strtotime(date("Y-m-d", strtotime(date("Y-m-d"))) . "-1 month");
        $date = date("Y-m-d",$date);

        $site = DB::table('st_site')
            ->where('deleted_at','=',(NULL))
            ->get();
        $pola = DB::table('schpola_hdr')
            ->get();
        $jadwal = DB::table('schnikdetail')
            ->join('schclass','schclass.kode','=','schnikdetail.polaid')
            ->join('md_karyawan','md_karyawan.id','=','schnikdetail.users_id')
            ->select('schnikdetail.*','schclass.deskripsi','md_karyawan.nama','md_karyawan.nik')
            ->orderby('schnikdetail.users_id')
            ->orderbydesc('schnikdetail.sdate')
            ->get();
        $kar = DB::table('md_karyawan')
            ->join('st_site','st_site.id','=','md_karyawan.site_id')
            ->select('md_karyawan.*','st_site.nama as site')
            ->orderBy('st_site.nama')
            ->orderBy('md_karyawan.nama')
            ->get();
        return view('presensi.generate_jadwal', compact('jadwal','kar','pola','site'));
    }

    public function persiteGenerateJadwal(Request $request){
        $schpola_dtl = DB::table('schpola_dtl')
            ->join('schpola_hdr', 'schpola_dtl.polaid', 'schpola_hdr.kode')
            ->select('schpola_dtl.schclass_id')
            ->where('schpola_dtl.polaid','=', $request->pola)
            ->orderBy('schpola_dtl.hari_ke')
            ->get();
        $kar = DB::table('md_karyawan')
            ->where('site_id','=',$request->site)
            ->get();

        foreach ($kar as $k){
            $start_date = $request->sdate;
            $end_date = $request->edate;
            $i = 0;
            while ($start_date<=($end_date)) {
                if((schnikdetail::all()->where('users_id','=',$request->id)->where('sdate','=',$start_date)->first())==null){
                    $time = DB::table('schclass')->where('kode', $schpola_dtl[$i]->schclass_id)->get();

                    $jadwal = new schnikdetail;
                    $jadwal->users_id = $k->id;
                    $jadwal->sdate = $start_date;
                    $jadwal->edate = $start_date;
                    $jadwal->polaid = $schpola_dtl[$i]->schclass_id;
                    $jadwal->stime = $time[0]->stime;
                    $jadwal->etime = $time[0]->etime;
                    $jadwal->entry_user = Auth::user()->id;
                    $jadwal->entry_date = Carbon::now()->toDateTimeString();
                    $jadwal->save();
                    $i++;
                    $start_date = date('Y-m-d', strtotime('+1 days', strtotime( $start_date )));
                    if ($i == 7) {
                        $i = 0;
                    }
                }
            }
        }

        return redirect()->back()->with('success','Generate Jadwal Personal Berhasil!');
    }

    public function personalGenerateJadwal(Request $request){
        $start_date = $request->sdate;
        $end_date = $request->edate;
        $schpola_dtl = DB::table('schpola_dtl')
            ->join('schpola_hdr', 'schpola_dtl.polaid', 'schpola_hdr.kode')
            ->select('schpola_dtl.schclass_id')
            ->where('schpola_dtl.polaid','=', $request->pola)
            ->orderBy('schpola_dtl.hari_ke')
            ->get();
        $i = 0;

        while ($start_date<=($end_date)) {
            if((schnikdetail::all()->where('users_id','=',$request->id)->where('sdate','=',$start_date)->first())==null){
                $time = DB::table('schclass')->where('kode', $schpola_dtl[$i]->schclass_id)->get();

                $jadwal = new schnikdetail;
                $jadwal->users_id = $request->id;
                $jadwal->sdate = $start_date;
                $jadwal->edate = $start_date;
                $jadwal->polaid = $schpola_dtl[$i]->schclass_id;
                $jadwal->stime = $time[0]->stime;
                $jadwal->etime = $time[0]->etime;
                $jadwal->entry_user = Auth::user()->id;
                $jadwal->entry_date = Carbon::now()->toDateTimeString();
                $jadwal->save();
                $i++;
                $start_date = date('Y-m-d', strtotime('+1 days', strtotime( $start_date )));
                if ($i == 7) {
                    $i = 0;
                }
            }
        }
        return redirect()->back()->with('success','Generate Jadwal Personal Berhasil!');
    }

    public function nonpolaGenerateJadwal(Request $request){
        if((schnikdetail::all()->where('users_id','=',$request->id)->where('sdate','=',$request->date)->first())==null){
            $jadwal = new schnikdetail;
            $jadwal->users_id = $request->id;
            $jadwal->sdate = $request->date;
            $jadwal->edate = $request->date;
            $jadwal->polaid = $request->pola;
            $jadwal->stime = $request->stime;
            $jadwal->etime = $request->etime;
            $jadwal->entry_user = Auth::user()->id;
            $jadwal->entry_date = Carbon::now()->toDateTimeString();
            $jadwal->save();
        }
        return redirect()->back()->with('success','Generate Jadwal Non Pola Berhasil!');
    }

    public function editGenerateJadwal(Request $request){
        DB::table('schnikdetail')
            ->where('id','=',$request->id)
            ->update([
                'sdate' => $request->sdate,
                'stime' => $request->stime,
                'edate' => $request->edate,
                'etime' => $request->etime,
                'updated_at' => date("Y-m-d H:i:s"),
                'updated_by' => Auth::user()->id
            ]);
        return redirect()->back()->with('success','Update Jadwal Pegawai Berhasil!');
    }
}
