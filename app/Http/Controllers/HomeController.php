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
use App\User;
use App\st_Kabkota;
use App\st_Kecamatan;
use Excel;
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

    public function data_karyawan(){
        $data_karyawan = DB::select(DB::raw("SELECT * FROM md_karyawan"));
        return view('data_karyawan', compact('data_karyawan'));
    }

    public function data_payroll(){
        $data_payroll = DB::table('tbl_gaji_hdr')
                            ->join('md_karyawan','tbl_gaji_hdr.md_karyawan_id','=','md_karyawan.id')
                            ->join('st_periode_gaji','tbl_gaji_hdr.st_prd_gaji_id','=','st_periode_gaji.id')
                            ->select('tbl_gaji_hdr.*',
                                     'md_karyawan.nama as nama_karyawan',
                                     'st_periode_gaji.*',
                                     'tbl_gaji_hdr.id as id_hdr',
                                     DB::raw('SUM(md_karyawan.gp + md_karyawan.tunj_transport + md_karyawan.tunj_makan) as total_gaji'))
                            ->groupby('tbl_gaji_hdr.id')
                            ->get();
        //dd($data_payroll);
        return view('data_payroll', compact('data_payroll'));
    }

    public function print_data_payroll($id){
        $tbl_gaji_hdr = DB::table('tbl_gaji_hdr')
                            ->join('tbl_gaji_dtl','tbl_gaji_hdr.id','=','tbl_gaji_dtl.tbl_gaji_hdr_id')
                            ->join('md_karyawan','tbl_gaji_hdr.md_karyawan_id','=','md_karyawan.id')
                            ->join('st_periode_gaji','tbl_gaji_hdr.st_prd_gaji_id','=','st_periode_gaji.id')
                            ->where('tbl_gaji_hdr.id','=', $id)
                            ->select('tbl_gaji_hdr.*',
                                     'md_karyawan.nama as nama_karyawan',
                                     'st_periode_gaji.*',
                                     DB::raw('SUM(nominal_komponen_gaji) as total_gaji'))
                            ->groupby('tbl_gaji_hdr.id')
                            ->get();
        $tbl_gaji_dtl = DB::table('tbl_gaji_dtl')
                            ->join('tbl_gaji_hdr','tbl_gaji_dtl.tbl_gaji_hdr_id','=','tbl_gaji_hdr.id')
                            ->join('st_komponen_gaji','tbl_gaji_dtl.kode_komponen_gaji_id','=','st_komponen_gaji.id')
                            ->where('tbl_gaji_dtl.tbl_gaji_hdr_id','=', $id)
                            ->select('tbl_gaji_dtl.*',
                                     'st_komponen_gaji.deskripsi as des_komponen_gaji')
                            ->get();

        //dd($tbl_gaji_hdr, $tbl_gaji_dtl);

        return view('print_data_payroll', compact('tbl_gaji_hdr','tbl_gaji_dtl'));
    }

    public function setup_komponen_gaji(){
        $setup_komponen_gaji = DB::select(DB::raw("SELECT * FROM st_komponen_gaji"));
        return view('setup_komponen_gaji', compact('setup_komponen_gaji'));
    }

    public function simpan_komponen_gaji(Request $request){
        $simpan_komponen_gaji = DB::table('st_komponen_gaji')
                                ->insert([
                                    'name' => $request->name,
                                    'deskripsi' => $request->deskripsi,
                                    ]);
        return redirect()->back();
    }

    public function edit_komponen_gaji(Request $request){
        $edit_komponen_gaji = DB::table('st_komponen_gaji')
                                ->where('id','=',$request->id)
                                ->update([
                                    'name' => $request->name,
                                    'deskripsi' => $request->deskripsi,
                                    ]);
        return redirect()->back();
    }

    public function delete_komponen_gaji(Request $request){
        //dd($request);
        $delete_komponen_gaji = DB::select(DB::raw("DELETE FROM st_komponen_gaji where id = '$request->id'"));
        return redirect()->back();
    }

    public function setup_periode_gaji(){
        $setup_periode_gaji = DB::select(DB::raw("SELECT * FROM st_periode_gaji"));
        return view('setup_periode_gaji', compact('setup_periode_gaji'));
    }

    public function simpan_periode_gaji(Request $request){
        $simpan_periode_gaji = DB::table('st_periode_gaji')
                                ->insert([
                                    'tgl_gaji' => $request->tgl_gaji,
                                    'sd_prd_kerja' => $request->sd_prd_kerja,
                                    'ed_prd_kerja' => $request->ed_prd_kerja,
                                    'selisih_bln_kerja' => $request->selisih_bln_kerja,
                                    ]);
        return redirect()->back();
    }

    public function generate_payroll(){
        $setup_periode_gaji = DB::select(DB::raw("SELECT * FROM st_periode_gaji"));
        return view('generate_payroll', compact('setup_periode_gaji'));
    }

    public function simpan_generate_payroll(Request $request){
      //dd($request);
      DB::beginTransaction();
      try {
          
          $md_karyawan = DB::table('md_karyawan')->select('md_karyawan.*')->get();
          $arr_karyawan = array();
          foreach ($md_karyawan as $r) {
                $arr_karyawan[] = (array) $r;
            }
            $i=0;
          foreach ($arr_karyawan as $key) {
              $karyawan_id = $arr_karyawan[$i]['id'];
              $tbl_gaji_hdr = DB::table('tbl_gaji_hdr')
                                ->insert([
                                    'kode_gaji' => $arr_karyawan[$i]['nik'].".".substr($request->tgl_gaji, 5, -3).".".substr($request->tgl_gaji, 0, -6),
                                    'md_karyawan_id' => $arr_karyawan[$i]['id'],
                                    'st_prd_gaji_id' => $request->id,
                                    'nik' => $arr_karyawan[$i]['nik'],
                                ]);

              $id_gaji_hdr = DB::table('tbl_gaji_hdr')->orderby('tbl_gaji_hdr.id','desc')->first();
              //dd($id_gaji_hdr);
              $tbl_gaji_dtl = DB::table('tbl_gaji_dtl')
                                ->insert([
                                    'tbl_gaji_hdr_id' => $id_gaji_hdr->id,
                                    'kode_komponen_gaji_id' => 1,
                                    'nominal_komponen_gaji' => $arr_karyawan[$i]['gp'],
                                ]);
              $tbl_gaji_dtl = DB::table('tbl_gaji_dtl')
                                ->insert([
                                    'tbl_gaji_hdr_id' => $id_gaji_hdr->id,
                                    'kode_komponen_gaji_id' => 2,
                                    'nominal_komponen_gaji' => $arr_karyawan[$i]['tunj_transport'],
                                ]);
              $tbl_gaji_dtl = DB::table('tbl_gaji_dtl')
                                ->insert([
                                    'tbl_gaji_hdr_id' => $id_gaji_hdr->id,
                                    'kode_komponen_gaji_id' => 3,
                                    'nominal_komponen_gaji' => $arr_karyawan[$i]['tunj_makan'],
                                ]);
              $tbl_gaji_dtl = DB::table('tbl_gaji_dtl')
                                ->insert([
                                    'tbl_gaji_hdr_id' => $id_gaji_hdr->id,
                                    'kode_komponen_gaji_id' => 4,
                                    'nominal_komponen_gaji' => 0,
                                ]);

              $i++;
          }

          DB::commit();
          return redirect()->back();
      } catch (\Exception $e) {
          DB::rollback();
          //dd($e);
          return redirect()->back();
      }

    }

    public function index_pegawai()
    {
        $jobseeker = md_jobseeker::all();
        return view('admin.index_data_pegawai', compact('jobseeker'));
    }

    public function tambah_pegawai()
    {
        $kabkota = st_Kabkota::all();
        $kecamatan = st_Kecamatan::all();
        $tingkat_pendidikan = st_Tingkatpendidikan::all();
        return view('admin.form_tambah_data_pegawai',compact('kabkota','kecamatan','tingkat_pendidikan'));
    }

    public function store_pegawai(Request $request)
    {
        // dd($request->all());
        $user = new User;
        $user->email = $request->input('email');
        $user->name = $request->input('nama');
        $user->password = \Hash::make('111111');
        $user->save();

        $jobseeker = new md_jobseeker;
        $jobseeker->users_id = $user->id;
        $jobseeker->email = $request->input('email');
        $jobseeker->nama_lengkap = $request->input('nama');
        $jobseeker->tempat_lahir = $request->input('tempat_lahir');
        $jobseeker->tanggal_lahir = $request->input('tgl_lahir');
        $jobseeker->NIK = $request->input('nik');
        $jobseeker->jenis_kelamin = $request->input('jenis_kelamin');
        $jobseeker->agama = $request->input('agama');
        $jobseeker->alamat_ktp = $request->input('dusun').' RT '.$request->input('rt').' /RW '.$request->input('rw').', '.$request->input('desa').', '.$request->input('kec').', '.$request->input('kota');
        $jobseeker->nohp = $request->input('no_hp');
        $jobseeker->alasan_melamar = $request->input('alasan_melamar');
        $jobseeker->radio_bersedia_sift = $request->input('radio_bersedia_sift');
        $jobseeker->alasan_sift = $request->input('alasan_sift');
        $jobseeker->radio_bersedia_mutasi = $request->input('radio_bersedia_mutasi');
        $jobseeker->alasan_mutasi = $request->input('alasan_mutasi');
        $jobseeker->save();

        if($request->tingkat_pendidikan != null){
            foreach($request->tingkat_pendidikan as $key => $value){
                $pendidikan_formal = new st_jobseeker_pendidikanformal();
                $pendidikan_formal->user_id = $user->id;
                $pendidikan_formal->tingkat_pendidikan = $request->tingkat_pendidikan[$key];
                $pendidikan_formal->nama_sekolah = $request->nama_sekolah[$key];
                $pendidikan_formal->id_kabkota = $request->kota_pendidikan[$key];
                $pendidikan_formal->jurusan = $request->jurusan_pendidikan[$key];
                $pendidikan_formal->keterangan = $request->lulus[$key];
                $pendidikan_formal->tahun_lulus = $request->tahun_lulus_pendidikan[$key];
                $pendidikan_formal->kelas_terakhir = $request->kelas_terakhir_pendidikan[$key];
                $pendidikan_formal->save();
            }
        }
        
        if($request->nama_kursus != null){
                foreach($request->nama_kursus as $key => $value){
                $pendidikan_informal = new st_jobseeker_pendidikaninformal();
                $pendidikan_informal->user_id = $user->id;
                $pendidikan_informal->nama_kursus = $request->nama_kursus[$key];
                $pendidikan_informal->nama_lembaga = $request->nama_lembaga_kursus[$key];
                $pendidikan_informal->id_kabkota = $request->kota_kursus[$key];
                $pendidikan_informal->tahun_lulus = $request->tahun_lulus_kursus[$key];
                $pendidikan_informal->lama_pendidikan = $request->lama_pendidikan_kursus[$key];
                $pendidikan_informal->save();
            }
        }
        if($request->nama_perusahaan_riwayat != null){
            foreach($request->nama_perusahaan_riwayat as $key => $value){
                $kerja = new st_jobseeker_pengalamankerja();
                $kerja->user_id = $user->id;
                $kerja->nama_perusahaan = $request->nama_perusahaan_riwayat[$key];
                $kerja->alamat_perusahaan = $request->alamat_perusahaan_riwayat[$key];
                $kerja->jabatan = $request->jabatan_perusahaan_riwayat[$key];
                $kerja->alasan_pindah = $request->alasan_berhenti_perusahaan_riwayat[$key];
                $kerja->bulan_masuk = $request->bulan_masuk_pekerjaan_riwayat[$key];
                $kerja->bulan_keluar = $request->bulan_keluar_pekerjaan_riwayat[$key];
                $kerja->tahun_masuk = $request->tahun_masuk_pekerjaan_riwayat[$key];
                $kerja->tahun_keluar = $request->tahun_keluar_pekerjaan_riwayat[$key];
                $kerja->save();
            }
        }

        if($request->nama_organisasi != null){
            foreach($request->nama_organisasi as $key => $value){
                $organisasi = new st_jobseeker_pengalamanorganisasi();
                $organisasi->user_id = $user->id;
                $organisasi->organisasi = $request->nama_organisasi[$key];
                $organisasi->jenis_organisasi = $request->jenis_organisasi[$key];
                $organisasi->jabatan = $request->jabatan_organisasi[$key];
                $organisasi->tahun = $request->tahun_organisasi[$key];
                $organisasi->save();
            }
        }

        return redirect()->back()->with('status', 'Berhasil!');
    }

    public function import_excel(Request $request) {
        try {            
            Excel::import(new JobseekerImport(), request()->file('file'));
        } catch (\Exception $e) {
            if ($e->getCode() == 0) {
                return redirect()->route('pegawai.index')
                ->with(['error' => 'Data gagal diimport! Pastikan kode registrasi sudah terdaftar']);
            } else {
                return redirect()->route('pegawai.index')
                ->with(['error' => 'Data gagal diimport']);
            }
        }

        return redirect()->route('pegawai.index')->with(['success' => 'Data berhasil diimport']);
    }

    public function detail_pelamar($id){
        $jobseeker = md_jobseeker::findorFail($id);

        return view('admin.show_data_pegawai', compact('jobseeker'));
    }
}
