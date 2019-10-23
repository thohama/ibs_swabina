@extends('main')

@section('title', 'dashboard')

@section('extra_styles')

<style>th.dt-center, td.dt-center { text-align: center; }</style>
<style>
  .dotted {border-style: dotted;}
  .dashed {border-style: dashed;}
  .solid {border-style: solid;}
  .double {border-style: double;}
  .groove {border-style: groove;}
  .ridge {border-style: ridge;}
  .inset {border-style: inset;}
  .outset {border-style: outset;}
  .none {border-style: none;}
  .hidden {border-style: hidden;}
  .mix {border-style: dotted dashed solid double;}
</style>
@endsection

@section('content')

<div class="wrapper wrapper-content animated fadeInRight">
  <div class="alert alert-danger pesan" style="display:none;">
    <ul></ul>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>Form Tambah Data Pelamar</h5>
          <div class="ibox-tools">
            <a class="collapse-link">
              <i class="fa fa-chevron-up"></i>
            </a>
          </div>
        </div>
        <div class="ibox-content">


          <form id="form-pekerja" data-parsley-validate="" method="POST" action="{{url('admin/store_data_pegawai')}}" enctype="multipart/form-data">
            @csrf
            @if(count($errors)>0)
            @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
            @endforeach
            @elseif(session('alert'))
            <div class="alert alert-danger">
              {{ session('alert') }}
            </div>
            @endif
            <div class="form-group row">
              <label for="nik" class="col-sm-2 col-form-label">Nama</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="nama" id="nik" placeholder="Masukan Nama Lengkap" required="">
                <span style="color:#ed5565;display:none" class="help-block m-b-none reset" id="nama-error">
                  <small>Nama harus diisi...!</small>
                </span>
              </div>
            </div>
            <div class="form-group row">
              <label for="nik" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="email" id="nik" placeholder="Masukan Email" required="">
                <span style="color:#ed5565;display:none" class="help-block m-b-none reset" id="nama-error">
                  <small>Email harus diisi...!</small>
                </span>
              </div>
            </div>
            <div class="form-group row">
              <label for="expired" class="col-sm-2 col-form-label">Tempat Tanggal  Lahir</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" name="tempat_lahir" id="expired" placeholder="Masukkan Tempat Lahir" required="">
                <span style="color:#ed5565;display:none" class="help-block m-b-none reset" id="tempat-lahir-error">
                  <small>Tempat Lahir harus diisi...!</small>
                </span>
              </div>
              <div class="col-sm-3">
                <input type="date" class="form-control" name="tgl_lahir" id="expired" placeholder="Masukkan Tanggal Lahir" required="">
                <span style="color:#ed5565;display:none" class="help-block m-b-none reset" id="tgl-lahir-error">
                  <small>Tanggal Lahir harus diisi...!</small>
                </span>
              </div>
            </div>
            <div class="form-group row">
              <label for="nik" class="col-sm-2 col-form-label">Nomor KTP</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" name="nik" id="nik" placeholder="Masukan Nomor KTP" required="">
                <span style="color:#ed5565;display:none" class="help-block m-b-none reset" id="nik-error">
                  <small>Nik harus diisi...!</small>
                </span>
              </div>
            </div>
            <div class="form-group row">
              <label for="kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
              <div class="col-sm-10">
                <div class="radio-inline radio radio-primary"> <input type="radio" class="radio-primary" name="jenis_kelamin" id="jk" value="Laki-Laki" required=""><label for="jk" style="cursor: pointer;">Laki-Laki</label></div>
                <div class="radio-inline radio radio-primary"> <input type="radio" class="radio-primary" name="jenis_kelamin" id="jk2" value="Perempuan"  required=""><label for="jk2" style="cursor: pointer;">Perempuan</label></div>
                <span style="color:#ed5565;display: none " class="help-block m-b-none reset" id="kelamin-error">
                  <small>Jenis Kelamin harus diisi...!</small>
                </span>
              </div>
            </div>
            <div class="form-group row">
              <label for="kelamin" class="col-sm-2 col-form-label">Agama</label>
              <div class="col-sm-10">
                <div class="radio-inline radio radio-primary"> <input type="radio" class="radio-primary" name="agama" id="agama" value="Islam" required=""><label style="cursor: pointer;">Islam</label></div>
                <div class="radio-inline radio radio-primary"> <input type="radio" class="radio-primary" name="agama" id="agama" value="Kristen Protestan"  required=""><label style="cursor: pointer;">Protestan</label></div>
                <div class="radio-inline radio radio-primary"> <input type="radio" class="radio-primary" name="agama" id="agama" value="Kristen Katolik" required=""><label style="cursor: pointer;">Katolik</label></div>
                <div class="radio-inline radio radio-primary"> <input type="radio" class="radio-primary" name="agama" id="agama" value="Budha"  required=""><label style="cursor: pointer;">Budha</label></div>
                <div class="radio-inline radio radio-primary"> <input type="radio" class="radio-primary" name="agama" id="agama" value="Hindu" required=""><label style="cursor: pointer;">Hindu</label></div>
                <span style="color:#ed5565;display: none " class="help-block m-b-none reset" id="kelamin-error">
                  <small>Agama harus diisi...!</small>
                </span>
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-2 col-form-label">Alamat Sesuai KTP</label>
              <label  class="col-sm-1 col-form-label">Dsn / Jl</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" name="dusun" id="dusun" placeholder="Masukkan Dusun / Jln" required="">
                <span style="color:#ed5565;display:none" class="help-block m-b-none reset" id="dusun-error">
                  <small>Dusun harus diisi...!</small>
                </span>
              </div>
              <label class="col-sm-1 col-form-label">RT /RW</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" name="rt" id="rt" placeholder="Masukkan RT / RW" required="">
                <span style="color:#ed5565;display:none" class="help-block m-b-none reset" id="rt-error">
                  <small>RT / RW harus diisi...!</small>
                </span>
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-2 col-form-label"></label>
              <label  class="col-sm-1 col-form-label">Desa / Kel</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" name="desa" id="desa" placeholder="Masukkan Desa" required="">
                <span style="color:#ed5565;display:none" class="help-block m-b-none reset" id="desa-error">
                  <small>Desa harus diisi...!</small>
                </span>
              </div>
              <label class="col-sm-1 col-form-label">Kab / Kota</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" name="kota" id="kota" placeholder="Masukkan Kab / Kota" required="">
                <span style="color:#ed5565;display:none" class="help-block m-b-none reset" id="kota-error">
                  <small>Kab / Kota harus diisi...!</small>
                </span>
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-2 col-form-label"></label>
              <label  class="col-sm-1 col-form-label">Kecamatan</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" name="kec" id="kec" placeholder="Masukkan Kecamatan" required="">
                <span style="color:#ed5565;display:none" class="help-block m-b-none reset" id="kec-error">
                  <small>Kecamatan harus diisi...!</small>
                </span>
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-2 col-form-label">No HP</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="Masukan Nomor HP" required="">
                <span style="color:#ed5565;display:none" class="help-block m-b-none reset" id="ho-hp-error">
                  <small>Nomor HP harus diisi...!</small>
                </span>
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-2 col-form-label">Pendidikan Formal</label>
              <div class="col-sm-10">
                <table class="table tabel_pendidikan table-bordered table-striped" >
                  <thead >
                    <th style="text-align: center;" class="warna">Tingkat Pendidikan</th>
                    <th style="text-align: center;" class="warna">Nama Sekolah</th>
                    <th style="text-align: center;" class="warna">Kota</th>
                    <th style="text-align: center;" class="warna">Jurusan</th>
                    <th style="text-align: center;" class="warna">Lulus</th>
                    <th style="text-align: center;" class="warna">Tahun Lulus</th>
                    <th style="text-align: center;" class="warna">Kelas Terakhir</th>
                    <th style="text-align: center;" class="warna">Aksi</th>
                  </thead>
                  <tbody class="clone_pendidikan">
                    <tr>
                      <td align="center">
                        <select class="form-control chosen-select-width5 tingakt_pendidikan" name="tingkat_pendidikan[]" value="Tingkat Pendidikan">
                          <option value="" selected disabled>Tingkat Pendidikan</option>
                          <option value="">SD</option>
                          <option value="">SMP</option>
                        </select>
                      </td>
                      <td align="center">
                        <input type="text" name="nama_sekolah[]" value=""  class="form-control nama_sekolah" placeholder="Masukan Nama Sekolah">
                      </td>
                      <td align="center">
                        <select class="form-control chosen-select-width5" name="kota_pendidikan[]">
                          <option value="" selected disabled>Kota</option>
                          <option value="">Gresik</option>
                          <option value="">Surabaya</option>
                        </select>
                      </td>
                      <td align="center">
                        <input type="text" name="jurusan_pendidikan[]" class="form-control jurusan_pendidikan" placeholder="Masukan Jurusan">
                      </td>
                      <td align="center">
                        <input type="checkbox" value="lulus" name="lulus">
                      </td>
                      <td align="center">
                        <select class="form-control chosen-select-width5" name="tahun_lulus_pendidikan[]">
                          <option value="" selected disabled>Tahun Lulus</option>
                          <option value="">2010</option>
                          <option value="">2012</option>
                        </select>
                      </td>
                      <td align="center">
                        <input type="text" name="kelas_terakhir_pendidikan[]" value=""  class="form-control kelas_terakhir_pendidikan" placeholder="Masukan kelas terkahir pendidikan">
                      </td>
                      <td align="center" class="clone_append" width="">
                        <button class="btn btn-default btn-sm append" onclick="append_pendidikan(this)"><a class="fa fa-plus"></a></button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-2 col-form-label">Pendidikan Non-Formal / Kursus</label>
              <div class="col-sm-10">
                <table class="table tabel_pendidikan table-bordered table-striped" >
                  <thead >
                    <th style="text-align: center;" class="warna">Nama & Jenis Kursus</th>
                    <th style="text-align: center;" class="warna">Nama Lembaga Pendidikan</th>
                    <th style="text-align: center;" class="warna">Lama Pendidikan</th>
                    <th style="text-align: center;" class="warna">Tahun Lulus</th>
                    <th style="text-align: center;" class="warna">Kota</th>
                    <th style="text-align: center;" class="warna">Aksi</th>
                  </thead>
                  <tbody class="clone_kursus">
                    <tr>
                      <td align="center">
                        <input type="text" name="nama_kursus[]" value=""  class="form-control nama_kursus" placeholder="Masukan Nama Kursus">
                      </td>
                      <td align="center">
                        <input type="text" name="nama_lembaga_kursus[]" value=""  class="form-control nama_lembaga_kursus" placeholder="Masukan Nama lembaga kursus">
                      </td>
                      <td align="center">
                        <input type="text" name="lama_pendidikan_kursus[]" value=""  class="form-control lama_pendidikan_kursus" placeholder="Masukan lama pendidikan kursus">
                      </td>
                      <td align="center">
                        <select class="form-control chosen-select-width5" name="tahun_lulus_kursus[]">
                          <option value="" selected disabled>Tahun Lulus</option>
                          <option value="">2010</option>
                          <option value="">2012</option>
                        </select>
                      </td>
                      <td align="center">
                        <select class="form-control chosen-select-width5" name="kota_kursus[]">
                          <option value="" selected disabled>Kota</option>
                          <option value="">Gresik</option>
                          <option value="">Surabaya</option>
                        </select>
                      </td>
                      <td align="center" class="clone_append" width="">
                        <button class="btn btn-default btn-sm append" onclick="append_kursus(this)"><a class="fa fa-plus"></a></button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-2 col-form-label">Data Keluarga(Jika Sudah Menikah)</label>
              <div class="col-sm-10">
                <table class="table tabel_pendidikan table-bordered table-striped" >
                  <thead >
                    <th style="text-align: center;" class="warna">Nama Anggota Keluarga</th>
                    <th style="text-align: center;" class="warna">Hubungan Keluarga</th>
                    <th style="text-align: center;" class="warna">Jenis Kelamin</th>
                    <th style="text-align: center;" class="warna">Tempat Lahir</th>
                    <th style="text-align: center;" class="warna">Tanggal Lahir</th>
                    <th style="text-align: center;" class="warna">Bekerja</th>
                    <th style="text-align: center;" class="warna">Aksi</th>
                  </thead>
                  <tbody class="clone_keluarga">
                    <tr>
                      <td align="center">
                        <input type="text" name="nama_keluarga[]" value=""  class="form-control nama_keluarga" placeholder="Masukan Nama Keluarga">
                      </td>
                      <td align="center">
                        <select class="form-control chosen-select-width5" name="hubungan_kelaurga[]">
                          <option value="" selected disabled>Hubungan Keluarga</option>
                          <option value="suami">Suami</option>
                          <option value="istri">Istri</option>
                          <option value="Anak ke-1">Anak Ke-1</option>
                        </select>
                      </td>
                      <td align="center">
                        <select class="form-control chosen-select-width5" name="jenis_kelamin_keluarga[]">
                          <option value="" selected disabled>Jenis Kelamin</option>
                          <option value="L">Laki - Laki</option>
                          <option value="P">Perempuan</option>
                        </select>
                      </td>
                      <td align="center">
                        <input type="text" name="tempat_lahir_keluarga[]" class="form-control tempat_lahir_keluarga" placeholder="Masukan tempat lahir">
                      </td>
                      <td align="center">
                        <input type="text" name="tgl_lahir_keluarga" class="form-control tgl_lahir_keluarga" placeholder="YYYY-MM-DD" readonly>
                      </td>
                      <td align="center">
                        <input type="checkbox" value="bekerja" name="bekerja_keluarga">
                      </td>
                      <td align="center" class="clone_append" width="">
                        <button class="btn btn-default btn-sm append" onclick="append_keluarga(this)"><a class="fa fa-plus"></a></button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-2 col-form-label">SUSUNAN KELUARGA</label>
              <div class="col-sm-10">
                <table class="table tabel_pendidikan table-bordered table-striped" >
                  <thead >
                    <th style="text-align: center;" class="warna">-</th>
                    <th style="text-align: center;" class="warna">NAMA</th>
                    <th style="text-align: center;" class="warna">Jenis Kelamin</th>
                    <th style="text-align: center;" class="warna">Usia</th>
                    <th style="text-align: center;" class="warna">Pendidikan</th>
                    <th style="text-align: center;" class="warna">Pekerjaan</th>
                    <th style="text-align: center;" class="warna">Perusahaan</th>
                    <th style="text-align: center;" class="warna">Aksi</th>
                  </thead>
                  <tbody class="clone_susunan_keluarga">
                    <tr>
                      <td align="center">
                        <label>Ayah</label>
                      </td>
                      <td align="center">
                        <input type="text" name="nama_susunan_keluarga[]" class="form-control nama_susunan_keluarga" placeholder="Masukan nama">
                      </td>
                      <td align="center">
                        <select class="form-control chosen-select-width5" name="jenis_kelamin_susunan_keluarga[]">
                          <option value="" selected disabled>Jenis Kelamin</option>
                          <option value="L">Laki - Laki</option>
                          <option value="P">Perempuan</option>
                        </select>
                      </td>
                      <td align="center">
                        <input type="text" name="usia_susunan_keluarga[]" class="form-control usia_susunan_keluarga" placeholder="Masukan usia">
                      </td>
                      <td align="center">
                        <input type="text" name="pendidikan_susunan_keluarga[]" class="form-control pendidikan_susunan_keluarga" placeholder="Masukan pendidikan terakhir">
                      </td>
                      <td align="center">
                        <input type="text" name="pekerjaan_susunan_keluarga[]" class="form-control pekerjaan_susunan_keluarga" placeholder="Masukan pekerjaan terakhir">
                      </td>
                      <td align="center">
                        <input type="text" name="perusahaan_susunan_keluarga[]" class="form-control perusahaan_susunan_keluarga" placeholder="Masukan perusahaan terakhir">
                      </td>
                      <td align="center" class="clone_append" width="">
                        <button class="btn btn-default btn-sm append" onclick="append_susunan_keluarga(this)"><a class="fa fa-plus"></a></button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-2 col-form-label">Riwayat Pekerjaan</label>
              <label class="col-sm-2">Nama Perusahaan</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" name="nama_perusahaan_riwayat[]" id="nama_perusahaan_riwayat[]" placeholder="Masukkan nama perusahaan" required="">
              </div>
              <label class="col-sm-2">Alamat Perusahaan</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" name="alamat_perusahaan_riwayat[]" id="alamat_perusahaan_riwayat[]" placeholder="Masukkan alamat perusahaan" required="">
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-2 col-form-label"></label>
              <label class="col-sm-2">Jabatan</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" name="jabatan_perusahaan_riwayat[]" id="jabatan_perusahaan_riwayat[]" placeholder="Masukkan jabatan" required="">
              </div>
              <label class="col-sm-2">Alasan Berhenti / Masih Bekerja</label>
              <div class="col-sm-3">
                <input type="text" rows="1" class="form-control" name="alasan_berhenti_perusahaan_riwayat[]" id="alasan_berhenti_perusahaan_riwayat[]" placeholder="Masukkan alasan anda berhenti" required="">
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-2 col-form-label"></label>
              <label class="col-sm-1">Masuk</label>
              <div class="col-sm-2">
                <select class="form-control chosen-select-width5" name="bulan_masuk_pekerjaan_riwayat[]">
                  <option value="" selected disabled>Bulan</option>
                  <option value="1">Januari</option>
                  <option value="2">Febuari</option>
                </select>
              </div>
              <div class="col-sm-2">
                <select class="form-control chosen-select-width5" name="tahun_masuk_pekerjaan_riwayat[]">
                  <option value="" selected disabled>Tahun</option>
                  <option value="2000">2000</option>
                  <option value="2001">2001</option>
                </select>
              </div>
              <label class="col-sm-1">Keluar</label>
              <div class="col-sm-2">
                <select class="form-control chosen-select-width5" name="bulan_masuk_pekerjaan_riwayat[]">
                  <option value="" selected disabled>Bulan</option>
                  <option value="1">Januari</option>
                  <option value="2">Febuari</option>
                </select>
              </div>
              <div class="col-sm-2">
                <select class="form-control chosen-select-width5" name="tahun_masuk_pekerjaan_riwayat[]">
                  <option value="" selected disabled>Tahun</option>
                  <option value="2000">2000</option>
                  <option value="2001">2001</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Alasan Melamar di PT Swabina Gatra ?</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="alasan_melamar" id="alasan_melamar" placeholder="Masukan alasan melamar di PT Swabina Gatra" required="">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Apakah Sanggup bekerja shift ?</label>
              <div class="col-sm-10">
                <div class="radio-inline radio radio-primary"> <input type="radio" class="radio-primary" name="radio_bersedia_sift" id="radio_bersedia_sift" value="IYA" required=""><label style="cursor: pointer;">IYA</label></div>
                <div class="radio-inline radio radio-primary"> <input type="radio" class="radio-primary" name="radio_bersedia_sift" id="radio_bersedia_sift" value="TIDAK"  required=""><label style="cursor: pointer;">TIDAK</label></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Apabila tidak sanggup sift, apa alasan anda ?</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="alasan_sift" id="alasan_sift" placeholder="Alasan tidak sanggup kerja sift" required="">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Apakah anda bersedia jika perusahaan memutasi / memindah anda di unit kerja lain? </label>
              <div class="col-sm-10">
                <div class="radio-inline radio radio-primary"> <input type="radio" class="radio-primary" name="radio_bersedia_mutasi" id="radio_bersedia_mutasi" value="IYA" required=""><label style="cursor: pointer;">Bersedia / Sanggup</label></div>
                <div class="radio-inline radio radio-primary"> <input type="radio" class="radio-primary" name="radio_bersedia_mutasi" id="radio_bersedia_mutasi" value="TIDAK"  required=""><label style="cursor: pointer;">Tidak Bersedia / Tidak Sanggup</label></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Apabilah tidak sanggup mutasi, apakah alasan anda? </label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="alasan_mutasi" id="alasan_mutasi" placeholder="masukan Alasan tidak sanggup dipindah / dimutasi" required="">
              </div>
            </div>


            <div class="hr-line-dashed"></div>
            <div class="form-group row">
              <div class="col-sm-4 col-sm-offset-9">
                <a href="{{url('manajemen-pekerja/data-pekerja')}}" class="btn btn-danger btn-flat" type="button">Kembali</a>
                <button class="ladda-button ladda-button-demo btn btn-primary btn-flat simpan" type="submit" >
                  Simpan
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection



@section('extra_scripts')
<script>
  function append_pendidikan(p){

    var par = p.parentNode.parentNode;
    var count_append = 0;


    var append = '<button class="btn btn-default btn-sm append" onclick="remove_append_kursus(this)"><a class="fa fa-minus"></a></button>';
    var append_plus = '<button class="btn btn-default btn-sm append" onclick="append_kursus(this)"><a class="fa fa-plus"></a></button>';

    $(par).find('.clone_append').html(append);
  // console.log(data);
  // tabel_barang.row.add(data);
  var html    ='<tr>'
  +'<td align="center">'
  +'<select class="form-control chosen-select-width5 tingakt_pendidikan" name="tingkat_pendidikan[]">'
  +'<option value="" selected disabled >Tingkat Pendidikan</option>'
  +'<option value="">SD</option>'
  +'<option value="">SMP</option>'
  +'</select>'
  +'</td>'
  +'<td align="center">'
  +'<input type="text" name="nama_sekolah[]" value=""  class="form-control nama_sekolah" placeholder="Masukan Nama Sekolah">'
  +'</td>'
  +'<td align="center">'
  +'<select class="form-control chosen-select-width5" name="kota_pendidikan[]">'
  +'<option value="" selected disabled>Kota</option>'
  +'<option value="">Gresik</option>'
  +'<option value="">Surabaya</option>'
  +'</select>'
  +'</td>'
  +'<td align="center">'
  +'<input type="text" name="jurusan_pendidikan[]" class="form-control jurusan_pendidikan" placeholder="Masukan Jurusan">'
  +'</td>'
  +'<td align="center">'
  +'<input type="checkbox" value="lulus" name="lulus">'
  +'</td>'
  +'<td align="center">'
  +'<select class="form-control chosen-select-width5" name="tahun_lulus_pendidikan[]">'
  +'<option value="" selected disabled>Tahun Lulus</option>'
  +'<option value="">2010</option>'
  +'<option value="">2012</option>'
  +'</select>'
  +'</td>'
  +'<td align="center">'
  +'<input type="text" name="kelas_terakhir_pendidikan[]" value=""  class="form-control kelas_terakhir_pendidikan" placeholder="Masukan kelas terkahir pendidikan">'
  +'</td>'
  +'<td align="center" class="clone_append" width="">'
  +'<button class="btn btn-default btn-sm append" onclick="append_pendidikan(this)"><a class="fa fa-plus"></a></button>'
  +'</td>'
  +'</tr>'

  $('.clone_pendidikan').append(html);
}

function remove_append_pendidikan(p){
  var par = p.parentNode.parentNode;

  $(par).remove();
}

function append_kursus(p){

  var par = p.parentNode.parentNode;
  var count_append = 0;

  var append = '<button class="btn btn-default btn-sm append" onclick="remove_append_kursus(this)"><a class="fa fa-minus"></a></button>';
  var append_plus = '<button class="btn btn-default btn-sm append" onclick="append_kursus(this)"><a class="fa fa-plus"></a></button>';

  $(par).find('.clone_append').html(append);
  // console.log(data);
  // tabel_barang.row.add(data);
  var html    ='<tr>'
  +'<td align="center">'
  +'<input type="text" name="nama_kursus[]" value=""  class="form-control nama_kursus" placeholder="Masukan Nama Kursus">'
  +'</td>'
  +'<td align="center">'
  +'<input type="text" name="nama_lembaga_kursus[]" value=""  class="form-control nama_lembaga_kursus" placeholder="Masukan Nama lembaga kursus">'
  +'</td>'
  +'<td align="center">'
  +'<input type="text" name="lama_pendidikan_kursus[]" value=""  class="form-control lama_pendidikan_kursus" placeholder="Masukan lama pendidikan kursus">'
  +'</td>'
  +'<td align="center">'
  +'<select class="form-control chosen-select-width5" name="tahun_lulus_kursus[]">'
  +'<option value="" selected disabled>Tahun Lulus</option>'
  +'<option value="">2010</option>'
  +'<option value="">2012</option>'
  +'</select>'
  +'</td>'
  +'<td align="center">'
  +'<select class="form-control chosen-select-width5" name="kota_kursus[]">'
  +'<option value="" selected disabled>Kota</option>'
  +'<option value="">Gresik</option>'
  +'<option value="">Surabaya</option>'
  +'</select>'
  +'</td>'
  +'<td align="center" class="clone_append" width="">'
  +'<button class="btn btn-default btn-sm append" onclick="append_kursus(this)"><a class="fa fa-plus"></a></button>'
  +'</td>'
  +'</tr>'

  $('.clone_kursus').append(html);
}

function remove_append_kursus(p){
  var par = p.parentNode.parentNode;

  $(par).remove();
}

function append_keluarga(p){

  var par = p.parentNode.parentNode;
  var count_append = 0;

  var append = '<button class="btn btn-default btn-sm append" onclick="remove_append_keluarga(this)"><a class="fa fa-minus"></a></button>';
  var append_plus = '<button class="btn btn-default btn-sm append" onclick="append_keluarga(this)"><a class="fa fa-plus"></a></button>';

  $(par).find('.clone_append').html(append);
  // console.log(data);
  // tabel_barang.row.add(data);
  var html    ='<tr>'
  +'<td align="center">'
  +'<input type="text" name="nama_keluarga[]" value=""  class="form-control nama_keluarga" placeholder="Masukan Nama Keluarga">'
  +'</td>'
  +'<td align="center">'
  +'<select class="form-control chosen-select-width5" name="hubungan_kelaurga[]">'
  +'<option value="" selected disabled>Hubungan Keluarga</option>'
  +'<option value="suami">Suami</option>'
  +'<option value="istri">Istri</option>'
  +'<option value="Anak ke-1">Anak Ke-1</option>'
  +'</select>'
  +'</td>'
  +'<td align="center">'
  +'<select class="form-control chosen-select-width5" name="jenis_kelamin_keluarga[]">'
  +'<option value="" selected disabled>Jenis Kelamin</option>'
  +'<option value="L">Laki - Laki</option>'
  +'<option value="P">Perempuan</option>'
  +'</select>'
  +'</td>'
  +'<td align="center">'
  +'<input type="text" name="tempat_lahir_keluarga[]" class="form-control tempat_lahir_keluarga" placeholder="Masukan tempat lahir">'
  +'</td>'
  +'<td align="center">'
  +'<input type="text" name="tgl_lahir_keluarga" class="form-control tgl_lahir_keluarga" placeholder="YYYY-MM-DD" readonly>'
  +'</td>'
  +'<td align="center">'
  +'<input type="checkbox" value="bekerja" name="bekerja_keluarga">'
  +'</td>'
  +'<td align="center" class="clone_append" width="">'
  +'<button class="btn btn-default btn-sm append" onclick="append_keluarga(this)"><a class="fa fa-plus"></a></button>'
  +'</td>'
  +'</tr>'

  $('.clone_keluarga').append(html);
}

function remove_append_keluarga(p){
  var par = p.parentNode.parentNode;

  $(par).remove();
}
</script>
<script type="text/javascript">
  $(function () {
    $('#form-pekerja').parsley().on('field:validated', function() {
      var ok = $('.parsley-error').length === 0;
      $('.bs-callout-info').toggleClass('hidden', !ok);
      $('.bs-callout-warning').toggleClass('hidden', ok);
    })
    .on('form:submit', function() {
    return false; // Don't submit form for this demo
  });
  });
</script>
@endsection

