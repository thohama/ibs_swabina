<?php

namespace App\Http\Controllers;

use App\Imports\JobseekerImport;
use Illuminate\Http\Request;
use PDF;
use DB;
use Illuminate\Database\QueryException;
use App\md_jobseeker;
use App\md_karyawan;
use App\md_karyawan_penilaian;
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

    public function create_penilaian($id){
        $periode = st_periode_nilai::all();
        $data_karyawan = md_user::findOrFail($id);
        return view('penilaian_pegawai.create_penilaian_pegawai', compact('data_karyawan','periode'));
    }

    public function store_penilaian(Request $request, $id){
        // dd($request->all());
        $nilai = new md_karyawan_penilaian();
        $nilai->id_karyawan = $id;
        $nilai->id_periode = $request->periode;
        $nilai->nilai_disiplin = $request->nilai_disiplin;
        $nilai->nilai_tanggung_jawab = $request->nilai_tanggung_jawab;
        $nilai->nilai_kejujuran = $request->nilai_kejujuran;
        $nilai->nilai_loyalitas = $request->nilai_loyalitas;
        $nilai->nilai_inisiatif_kreativitas = $request->nilai_inisiatif_kreativitas;
        $nilai->nilai_kecakapan_keterampilan = $request->nilai_kecakapan_keterampilan;
        $nilai->nilai_hubungan_kerjasama = $request->nilai_hubungan_kerjasama;
        $nilai->nilai_pengamanan_lingkungan = $request->nilai_pengamanan_lingkungan;
        $nilai->nilai_kepemimpinan = $request->nilai_kepemimpinan;
        $nilai->spesifikasi_pendidikan = $request->spesifikasi_pendidikan;
        $nilai->nilai_spesifikasi_pendidikan = $request->nilai_spesifikasi_pendidikan;
        $nilai->spesifikasi_pengalaman = $request->spesifikasi_pengalaman;
        $nilai->nilai_spesifikasi_pengalaman = $request->nilai_spesifikasi_pengalaman;
        $nilai->spesifikasi_pelatihan = $request->spesifikasi_pelatihan;
        $nilai->nilai_spesifikasi_pelatihan = $request->nilai_spesifikasi_pelatihan;
        $nilai->spesifikasi_keterampilan = $request->spesifikasi_keterampilan;
        $nilai->nilai_spesifikasi_keterampilan = $request->nilai_spesifikasi_keterampilan;
        $nilai->kesimpulan_saran = $request->kesimpulan_saran;
        $nilai->catatan_personalia = $request->catatan_personalia;
        $nilai->save();
        return redirect()->route('penilaian_datakaryawan');
    }

    //Hubnaker
    public function periode_penilaian(){
        $periode = st_periode_nilai::all();
        return view('penilaian_pegawai.setup_periode_penilaian_pegawai', compact('periode'));
    }
}
