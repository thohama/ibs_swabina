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
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan Nama Lengkap" required="">
                <span style="color:#ed5565;display:none" class="help-block m-b-none reset" id="nama-error">
                  <small>Nama harus diisi...!</small>
                </span>
              </div>
            </div>
            <div class="form-group row">
              <label for="nik" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="email" id="email" placeholder="Masukan Email" required="">
                <span style="color:#ed5565;display:none" class="help-block m-b-none reset" id="email-error">
                  <small>Email harus diisi...!</small>
                </span>
              </div>
            </div>
            <div class="form-group row">
              <label for="expired" class="col-sm-2 col-form-label">Tempat Tanggal  Lahir</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Masukkan Tempat Lahir" required="">
                <span style="color:#ed5565;display:none" class="help-block m-b-none reset" id="tempat-lahir-error">
                  <small>Tempat Lahir harus diisi...!</small>
                </span>
              </div>
              <div class="col-sm-3">
                <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" placeholder="Masukkan Tanggal Lahir" required="">
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
                <div class="radio-inline radio radio-primary"> <input type="radio" class="radio-primary" name="jenis_kelamin" id="jk" value="Perempuan"  required=""><label for="jk2" style="cursor: pointer;">Perempuan</label></div>
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
                <span style="color:#ed5565;display: none " class="help-block m-b-none reset" id="agama-error">
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
              <label class="col-sm-1 col-form-label">RT</label>
              <div class="col-sm-1">
                <input type="number" class="form-control" name="rt" id="rt" placeholder="RT" required="">
                <span style="color:#ed5565;display:none" class="help-block m-b-none reset" id="rt-error">
                  <small>RT harus diisi...!</small>
                </span>
              </div>
              <label class="col-sm-1 col-form-label">RW</label>
              <div class="col-sm-1">
                <input type="number" class="form-control" name="rw" id="rw" placeholder="RW" required="">
                <span style="color:#ed5565;display:none" class="help-block m-b-none reset" id="rw-error">
                  <small>RW harus diisi...!</small>
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
                <select class="form-control chosen-select-width5" name="kota" id="kota" required="">
                  <option value="" selected disabled>Kota</option>
                  @foreach($kabkota as $value)
                  <option value="{{$value->id}}">{{$value->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-2 col-form-label"></label>
              <label  class="col-sm-1 col-form-label">Kecamatan</label>
              <div class="col-sm-3">
                <select class="form-control chosen-select-width5" name="kec" id="kec" required="">
                  <option value="" selected disabled>Kecamatan</option>
                  @foreach($kecamatan as $value)
                  <option value="{{$value->id}}">{{$value->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-2 col-form-label">No HP</label>
              <div class="col-sm-3">
                <input type="number" class="form-control" name="no_hp" id="no_hp" placeholder="Masukan Nomor HP" required="">
                <span style="color:#ed5565;display:none" class="help-block m-b-none reset" id="no-hp-error">
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
                          @foreach($tingkat_pendidikan as $value)
                          <option value="{{$value->id}}">{{$value->strata}}</option>
                          @endforeach
                        </select>
                      </td>
                      <td align="center">
                        <input type="text" name="nama_sekolah[]" value=""  class="form-control nama_sekolah" placeholder="Masukan Nama Sekolah">
                      </td>
                      <td align="center">
                        <select class="form-control chosen-select-width5" name="kota_pendidikan[]">
                          <option value="" selected disabled>Kota</option>
                          @foreach($kabkota as $value)
                          <option value="{{$value->id}}">{{$value->name}}</option>
                          @endforeach
                        </select>
                      </td>
                      <td align="center">
                        <input type="text" name="jurusan_pendidikan[]" class="form-control jurusan_pendidikan" placeholder="Masukan Jurusan">
                      </td>
                      <td align="center">
                        <input type="checkbox" value="lulus" name="lulus[]">
                      </td>
                      <td align="center">
                        <select class="form-control chosen-select-width5" name="tahun_lulus_pendidikan[]">
                          <option value="" selected disabled>Tahun Lulus</option>
                          @php
                          $currently_selected = date('Y'); 
                          $earliest_year = 1970; 
                          $latest_year = date('Y'); 
                          foreach(range( $latest_year, $earliest_year ) as $i )
                          print '<option value="'.$i.'"'.($i === $currently_selected ? ' selected="selected"' : '').'>'.$i.'</option>';
                          @endphp
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
                          @php
                          $currently_selected = date('Y'); 
                          $earliest_year = 1970; 
                          $latest_year = date('Y'); 
                          foreach(range( $latest_year, $earliest_year ) as $i )
                          print '<option value="'.$i.'"'.($i === $currently_selected ? ' selected="selected"' : '').'>'.$i.'</option>';
                          @endphp
                        </select>
                      </td>
                      <td align="center">
                        <select class="form-control chosen-select-width5" name="kota_kursus[]">
                          <option value="" selected disabled>Kota</option>
                          @foreach($kabkota as $value)
                          <option value="{{$value->id}}">{{$value->name}}</option>
                          @endforeach
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
                        <select class="form-control chosen-select-width5" name="hubungan_keluarga[]">
                          <option value="" selected disabled>Hubungan Keluarga</option>
                          <option value="suami">Suami</option>
                          <option value="istri">Istri</option>
                          @php
                          $i = 1;
                          while ($i<=9){
                          print '<option value="Anak ke-'.$i.'">Anak Ke-'.$i.'</option>';
                          $i++;
                        }
                        @endphp
                      </select>
                    </td>
                    <td align="center">
                      <select class="form-control chosen-select-width5" name="jenis_kelamin_keluarga[]">
                        <option value="" selected disabled>Jenis Kelamin</option>
                        <option value="Laki-laki">Laki - Laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
                    </td>
                    <td align="center">
                      <input type="text" name="tempat_lahir_keluarga[]" class="form-control tempat_lahir_keluarga" placeholder="Masukan tempat lahir">
                    </td>
                    <td align="center">
                      <input type="date" name="tgl_lahir_keluarga[]" class="form-control tgl_lahir_keluarga" placeholder="YYYY-MM-DD">
                    </td>
                    <td align="center">
                      <input type="checkbox" value="bekerja" name="bekerja_keluarga[]">
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
                  <th style="text-align: center;" class="warna">Keanggotaan</th>
                  <th style="text-align: center;" class="warna">Nama</th>
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
                      <select class="form-control chosen-select-width5" name="anggota_keluarga[]">
                        <option value="" selected disabled>Keanggotaan</option>
                        <option value="Ayah">Ayah</option>
                        <option value="Ibu">Ibu</option>
                        @php
                        $i = 1;
                        while ($i<=9){
                        print '<option value="Anak ke-'.$i.'">Anak Ke-'.$i.'</option>';
                        $i++;
                      }
                      @endphp
                    </select>
                  </td>
                  <td align="center">
                    <input type="text" name="nama_susunan_keluarga[]" class="form-control nama_susunan_keluarga" placeholder="Masukan nama">
                  </td>
                  <td align="center">
                    <select class="form-control chosen-select-width5" name="jenis_kelamin_susunan_keluarga[]">
                      <option value="" selected disabled>Jenis Kelamin</option>
                      <option value="Laki-laki">Laki - Laki</option>
                      <option value="Perempuan">Perempuan</option>
                    </select>
                  </td>
                  <td align="center">
                    <input type="number" name="usia_susunan_keluarga[]" class="form-control usia_susunan_keluarga" placeholder="Masukan usia">
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
          <label  class="col-sm-2 col-form-label">Pekerjaan dan Pengalaman</label>
          <div class="col-sm-10">
            <table class="table tabel_pendidikan table-bordered table-striped" >
              <tbody class="clone_pengalaman_kerja">
                <tr>
                  <td><label class="col-sm-2">Nama Perusahaan</label></td>
                  <td>
                    <input type="text" class="form-control" name="nama_perusahaan_riwayat[]" id="nama_perusahaan_riwayat[]" placeholder="Masukkan nama perusahaan">
                  </td>
                  <td><label class="col-sm-2">Alamat Perusahaan</label></td>
                  <td>
                    <input type="text" class="form-control" name="alamat_perusahaan_riwayat[]" id="alamat_perusahaan_riwayat[]" placeholder="Masukkan alamat perusahaan">
                  </td>
                  <td align="center" rowspan="3" class="clone_append" width="">
                    <button class="btn btn-default btn-sm append" onclick="append_pengalaman_kerja(this)"><a class="fa fa-plus"></a></button>
                  </td>
                </tr>
                <tr>
                  <td><label class="col-sm-2">Jabatan</label></td>
                  <td>
                    <input type="text" class="form-control" name="jabatan_perusahaan_riwayat[]" id="jabatan_perusahaan_riwayat[]" placeholder="Masukkan jabatan">
                  </td>
                  <td><label class="col-sm-2">Alasan Berhenti/Masih Bekerja</label></td>
                  <td>
                    <input type="text" rows="1" class="form-control" name="alasan_berhenti_perusahaan_riwayat[]" id="alasan_berhenti_perusahaan_riwayat[]" placeholder="Masukkan alasan anda berhenti">
                  </td>
                </tr>
                <tr>
                  <td><label class="col-sm-2">Masuk</label></td>
                  <td>
                    <div class="col-sm-6">
                      <select class="form-control chosen-select-width5" name="bulan_masuk_pekerjaan_riwayat[]">
                        <option value="" selected disabled>Bulan</option>
                        @php
                        for ($i = 1; $i <= 12; $i++) {
                        $timestamp = mktime(0, 0, 0, $i);
                        $label = date("F", $timestamp);
                        print '<option value="' . $label . '">' . $label . '</option>"n"';
                      }
                      @endphp
                    </select>
                  </div>
                  <div class="col-sm-6">
                    <select class="form-control chosen-select-width5" name="tahun_masuk_pekerjaan_riwayat[]">
                      <option value="" selected disabled>Tahun</option>
                      @php
                      $currently_selected = date('Y'); 
                      $earliest_year = 1970; 
                      $latest_year = date('Y'); 
                      foreach(range( $latest_year, $earliest_year ) as $i )
                      print '<option value="'.$i.'"'.($i === $currently_selected ? ' selected="selected"' : '').'>'.$i.'</option>';
                      @endphp
                    </select>
                  </div>
                </td>
                <td><label class="col-sm-2">Keluar</label></td>
                <td>
                  <div class="col-sm-6">
                    <select class="form-control chosen-select-width5" name="bulan_keluar_pekerjaan_riwayat[]">
                      <option value="" selected disabled>Bulan</option>
                      @php
                      for ($i = 1; $i <= 12; $i++) {
                      $timestamp = mktime(0, 0, 0, $i);
                      $label = date("F", $timestamp);
                      print '<option value="' . $label . '">' . $label . '</option>"n"';
                    }
                    @endphp
                  </select>
                </div>
                <div class="col-sm-6">
                  <select class="form-control chosen-select-width5" name="tahun_keluar_pekerjaan_riwayat[]">
                    <option value="" selected disabled>Tahun</option>
                    @php
                    $currently_selected = date('Y'); 
                    $earliest_year = 1970; 
                    $latest_year = date('Y'); 
                    foreach(range( $latest_year, $earliest_year ) as $i )
                    print '<option value="'.$i.'"'.($i === $currently_selected ? ' selected="selected"' : '').'>'.$i.'</option>';
                    @endphp
                  </select>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="form-group row">
      <label  class="col-sm-2 col-form-label">Pengalaman Organisasi</label>
      <div class="col-sm-10">
        <table class="table tabel_pendidikan table-bordered table-striped" >
          <thead >
            <th style="text-align: center;" class="warna">Nama Organisasi</th>
            <th style="text-align: center;" class="warna">Jenis Organisasi</th>
            <th style="text-align: center;" class="warna">Tahun</th>
            <th style="text-align: center;" class="warna">Jabatan</th>
            <th style="text-align: center;" class="warna">Aksi</th>
          </thead>
          <tbody class="clone_organisasi">
            <tr>
              <td align="center">
                <input type="text" name="nama_organisasi[]" value=""  class="form-control nama_organisasi" placeholder="Masukan Nama Organisasi">
              </td>
              <td align="center">
                <select class="form-control chosen-select-width5" name="jenis_organisasi[]">
                  <option value="" selected disabled>Jenis Organisasi</option>
                  <option value="Politik">Politik</option>
                  <option value="Sosial">Sosial</option>
                  <option value="Olahraga">Olahraga</option>
                  <option value="Kesenian">Kesenian</option>
                </select>
              </td>
              <td align="center">
                <select class="form-control chosen-select-width5" name="tahun_organisasi[]">
                  <option value="" selected disabled>Tahun</option>
                  @php
                  $currently_selected = date('Y'); 
                  $earliest_year = 1970; 
                  $latest_year = date('Y'); 
                  foreach(range( $latest_year, $earliest_year ) as $i )
                  print '<option value="'.$i.'"'.($i === $currently_selected ? ' selected="selected"' : '').'>'.$i.'</option>';
                  @endphp
                </select>
              </td>
              <td align="center">
                <input type="text" name="jabatan_organisasi[]" class="form-control jabatan_organisasi" placeholder="Masukan Jabatan">
              </td>
              <td align="center" class="clone_append" width="">
                <button class="btn btn-default btn-sm append" onclick="append_organisasi(this)"><a class="fa fa-plus"></a></button>
              </td>
            </tr>
          </tbody>
        </table>
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
  +'@foreach($tingkat_pendidikan as $value)'
  +'<option value="{{$value->id}}">{{$value->strata}}</option>'
  +'@endforeach'
  +'</select>'
  +'</td>'
  +'<td align="center">'
  +'<input type="text" name="nama_sekolah[]" value=""  class="form-control nama_sekolah" placeholder="Masukan Nama Sekolah">'
  +'</td>'
  +'<td align="center">'
  +'<select class="form-control chosen-select-width5" name="kota_pendidikan[]">'
  +'<option value="" selected disabled>Kota</option>'
  +'@foreach ($kabkota as $value)'
  +'<option value="{{$value->id}}">{{$value->name}}</option>'
  +'@endforeach'
  +'</select>'
  +'</td>'
  +'<td align="center">'
  +'<input type="text" name="jurusan_pendidikan[]" class="form-control jurusan_pendidikan" placeholder="Masukan Jurusan">'
  +'</td>'
  +'<td align="center">'
  +'<input type="checkbox" value="lulus" name="lulus[]">'
  +'</td>'
  +'<td align="center">'
  +'<select class="form-control chosen-select-width5" name="tahun_lulus_pendidikan[]">'
  +'<option value="" selected disabled>Tahun Lulus</option>'
  +'<?php 
  $currently_selected = date('Y'); 
  $earliest_year = 1970;
  $latest_year = date('Y');
  foreach(range( $latest_year, $earliest_year ) as $i )
  print '<option value="'.$i.'"'.($i === $currently_selected ? ' selected="selected"' : '').'>'.$i.'</option>';
  ?>'+
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
  const select2 = $('.chosen-select-width5');
  select2.select2();
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
  +'<?php 
  $currently_selected = date('Y'); 
  $earliest_year = 1970;
  $latest_year = date('Y');
  foreach(range( $latest_year, $earliest_year ) as $i )
  print '<option value="'.$i.'"'.($i === $currently_selected ? ' selected="selected"' : '').'>'.$i.'</option>';
  ?>'+
  +'</select>'
  +'</td>'
  +'<td align="center">'
  +'<select class="form-control chosen-select-width5" name="kota_kursus[]">'
  +'<option value="" selected disabled>Kota</option>'
  +'@foreach ($kabkota as $value)'
  +'<option value="{{$value->id}}">{{$value->name}}</option>'
  +'@endforeach'
  +'</select>'
  +'</td>'
  +'<td align="center" class="clone_append" width="">'
  +'<button class="btn btn-default btn-sm append" onclick="append_kursus(this)"><a class="fa fa-plus"></a></button>'
  +'</td>'
  +'</tr>'

  $('.clone_kursus').append(html);
  const select2 = $('.chosen-select-width5');
  select2.select2();
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
  +'<select class="form-control chosen-select-width5" name="hubungan_keluarga[]">'
  +'<option value="" selected disabled>Hubungan Keluarga</option>'
  +'<option value="suami">Suami</option>'
  +'<option value="istri">Istri</option>'
  +'<?php
  $i = 1;
  while ($i<=9){
    print '<option value="Anak ke-'.$i.'">Anak Ke-'.$i.'</option>';
    $i++;
  }
  ?>'
  +'<option value="Anak ke-1">Anak Ke-1</option>'
  +'</select>'
  +'</td>'
  +'<td align="center">'
  +'<select class="form-control chosen-select-width5" name="jenis_kelamin_keluarga[]">'
  +'<option value="" selected disabled>Jenis Kelamin</option>'
  +'<option value="Laki-Laki">Laki - Laki</option>'
  +'<option value="Perempuan">Perempuan</option>'
  +'</select>'
  +'</td>'
  +'<td align="center">'
  +'<input type="text" name="tempat_lahir_keluarga[]" class="form-control tempat_lahir_keluarga" placeholder="Masukan tempat lahir">'
  +'</td>'
  +'<td align="center">'
  +'<input type="date" name="tgl_lahir_keluarga[]" class="form-control tgl_lahir_keluarga" placeholder="YYYY-MM-DD">'
  +'</td>'
  +'<td align="center">'
  +'<input type="checkbox" value="bekerja" name="bekerja_keluarga[]">'
  +'</td>'
  +'<td align="center" class="clone_append" width="">'
  +'<button class="btn btn-default btn-sm append" onclick="append_keluarga(this)"><a class="fa fa-plus"></a></button>'
  +'</td>'
  +'</tr>'

  $('.clone_keluarga').append(html);
  const select2 = $('.chosen-select-width5');
  select2.select2();
}

function remove_append_keluarga(p){
  var par = p.parentNode.parentNode;

  $(par).remove();
}

function append_susunan_keluarga(p){

  var par = p.parentNode.parentNode;
  var count_append = 0;

  var append = '<button class="btn btn-default btn-sm append" onclick="remove_append_susunan_keluarga(this)"><a class="fa fa-minus"></a></button>';
  var append_plus = '<button class="btn btn-default btn-sm append" onclick="append_susunan_keluarga(this)"><a class="fa fa-plus"></a></button>';

  $(par).find('.clone_append').html(append);
  // console.log(data);
  // tabel_barang.row.add(data);
  var html    ='<tr>'
  +'<td align="center">'
  +'<select class="form-control chosen-select-width5" name="anggota_keluarga[]">'
  +'<option value="" selected disabled>Keanggotaan</option>'
  +'<option value="Ayah">Ayah</option>'
  +'<option value="Ibu">Ibu</option>'
  +'<?php
  $i = 1;
  while ($i<=9){
    print '<option value="Anak ke-'.$i.'">Anak Ke-'.$i.'</option>';
    $i++;
  }?>'
  +'</select>'
  +'</td>'
  +'<td align="center">'
  +'<input type="text" name="nama_susunan_keluarga[]" class="form-control nama_susunan_keluarga" placeholder="Masukan nama">'
  +'</td>'
  +'<td align="center">'
  +'<select class="form-control chosen-select-width5" name="jenis_kelamin_susunan_keluarga[]">'
  +'<option value="" selected disabled>Jenis Kelamin</option>'
  +'<option value="Laki-laki">Laki - Laki</option>'
  +'<option value="Perempuan">Perempuan</option>'
  +'</select>'
  +'</td>'
  +'<td align="center">'
  +'<input type="number" name="usia_susunan_keluarga[]" class="form-control usia_susunan_keluarga" placeholder="Masukan usia">'
  +'</td>'
  +'<td align="center">'
  +'<input type="text" name="pendidikan_susunan_keluarga[]" class="form-control pendidikan_susunan_keluarga" placeholder="Masukan pendidikan terakhir">'
  +'</td>'
  +'<td align="center">'
  +'<input type="text" name="pekerjaan_susunan_keluarga[]" class="form-control pekerjaan_susunan_keluarga" placeholder="Masukan pekerjaan terakhir">'
  +'</td>'
  +'<td align="center">'
  +'<input type="text" name="perusahaan_susunan_keluarga[]" class="form-control perusahaan_susunan_keluarga" placeholder="Masukan perusahaan terakhir">'
  +'</td>'
  +'<td align="center" class="clone_append" width="">'
  +'<button class="btn btn-default btn-sm append" onclick="append_susunan_keluarga(this)"><a class="fa fa-plus"></a></button>'
  +'</td>'
  +'</tr>'

  $('.clone_susunan_keluarga').append(html);
  const select2 = $('.chosen-select-width5');
  select2.select2();
}

function remove_append_susunan_keluarga(p){
  var par = p.parentNode.parentNode;

  $(par).remove();
}

function append_pengalaman_kerja(p){

  var par = p.parentNode.parentNode;
  var count_append = 0;

  var append = '<button class="btn btn-default btn-sm append" onclick="remove_append_pengalaman_kerja(this)"><a class="fa fa-minus"></a></button>';
  var append_plus = '<button class="btn btn-default btn-sm append" onclick="remove_append_pengalaman_kerja(this)"><a class="fa fa-plus"></a></button>';

  $(par).find('.clone_append').html(append);
  // console.log(data);
  // tabel_barang.row.add(data);
  var html    ='<tr>'
  +'<td><label class="col-sm-2">Nama Perusahaan</label></td>'
  +'<td>'
  +'<input type="text" class="form-control" name="nama_perusahaan_riwayat[]" id="nama_perusahaan_riwayat[]" placeholder="Masukkan nama perusahaan">'
  +'</td>'
  +'<td><label class="col-sm-2">Alamat Perusahaan</label></td>'
  +'<td>'
  +'<input type="text" class="form-control" name="alamat_perusahaan_riwayat[]" id="alamat_perusahaan_riwayat[]" placeholder="Masukkan alamat perusahaan">'
  +'</td>'
  +'<td align="center" rowspan="3" class="clone_append" width="">'
  +'<button class="btn btn-default btn-sm append" onclick="append_pengalaman_kerja(this)"><a class="fa fa-plus"></a></button>'
  +'</td>'
  +'</tr>'
  +'<tr>'
  +'<td><label class="col-sm-2">Jabatan</label></td>'
  +'<td>'
  +'<input type="text" class="form-control" name="jabatan_perusahaan_riwayat[]" id="jabatan_perusahaan_riwayat[]" placeholder="Masukkan jabatan">'
  +'</td>'
  +'<td><label class="col-sm-2">Alasan Berhenti/Masih Bekerja</label></td>'
  +'<td>'
  +'<input type="text" rows="1" class="form-control" name="alasan_berhenti_perusahaan_riwayat[]" id="alasan_berhenti_perusahaan_riwayat[]" placeholder="Masukkan alasan anda berhenti">'
  +'</td>'
  +'</tr>'
  +'<tr>'
  +'<td><label class="col-sm-2">Masuk</label></td>'
  +'<td>'
  +'<div class="col-sm-6">'
  +'<select class="form-control chosen-select-width5" name="bulan_masuk_pekerjaan_riwayat[]">'
  +'<option value="" selected disabled>Bulan</option>'
  +'<?php
  for ($i = 1; $i <= 12; $i++) {
    $timestamp = mktime(0, 0, 0, $i);
    $label = date("F", $timestamp);
    print '<option value="' . $label . '">' . $label . '</option>"n"';
  }
  ?>'
  +'</select>'
  +'</div>'
  +'<div class="col-sm-6">'
  +'<select class="form-control chosen-select-width5" name="tahun_masuk_pekerjaan_riwayat[]">'
  +'<option value="" selected disabled>Tahun</option>'
  +'<?php
  $currently_selected = date('Y'); 
  $earliest_year = 1970; 
  $latest_year = date('Y'); 
  foreach(range( $latest_year, $earliest_year ) as $i )
  print '<option value="'.$i.'"'.($i === $currently_selected ? ' selected="selected"' : '').'>'.$i.'</option>';
  ?>'
  +'</select>'
  +'</div>'
  +'</td>'
  +'<td><label class="col-sm-2">Keluar</label></td>'
  +'<td>'
  +'<div class="col-sm-6">'
  +'<select class="form-control chosen-select-width5" name="bulan_keluar_pekerjaan_riwayat[]">'
  +'<option value="" selected disabled>Bulan</option>'
  +'<?php
  for ($i = 1; $i <= 12; $i++) {
    $timestamp = mktime(0, 0, 0, $i);
    $label = date("F", $timestamp);
    print '<option value="' . $label . '">' . $label . '</option>"n"';
  }
  ?>'
  +'</select>'
  +'</div>'
  +'<div class="col-sm-6">'
  +'<select class="form-control chosen-select-width5" name="tahun_keluar_pekerjaan_riwayat[]">'
  +'<option value="" selected disabled>Tahun</option>'
  +'<?php
  $currently_selected = date('Y'); 
  $earliest_year = 1970; 
  $latest_year = date('Y'); 
  foreach(range( $latest_year, $earliest_year ) as $i )
  print '<option value="'.$i.'"'.($i === $currently_selected ? ' selected="selected"' : '').'>'.$i.'</option>';
  ?>'
  +'</select>'
  +'</div>'
  +'</td>'
  +'</tr>'

  $('.clone_pengalaman_kerja').append(html);
  const select2 = $('.chosen-select-width5');
  select2.select2();
}

function remove_append_pengalaman_kerja(p){
  var par = p.parentNode.parentNode;

  $(par).remove();
}

function append_organisasi(p){

  var par = p.parentNode.parentNode;
  var count_append = 0;

  var append = '<button class="btn btn-default btn-sm append" onclick="remove_append_organisasi(this)"><a class="fa fa-minus"></a></button>';
  var append_plus = '<button class="btn btn-default btn-sm append" onclick="remove_append_organisasi(this)"><a class="fa fa-plus"></a></button>';

  $(par).find('.clone_append').html(append);
  // console.log(data);
  // tabel_barang.row.add(data);
  var html    ='<tr>'
  +'<td align="center">'
  +'<input type="text" name="nama_organisasi[]" value=""  class="form-control nama_organisasi" placeholder="Masukan Nama Organisasi">'
  +'</td>'
  +'<td align="center">'
  +'<select class="form-control chosen-select-width5" name="jenis_organisasi[]">'
  +'<option value="" selected disabled>Jenis Organisasi</option>'
  +'<option value="Politik">Politik</option>'
  +'<option value="Sosial">Sosial</option>'
  +'<option value="Olahraga">Olahraga</option>'
  +'<option value="Kesenian">Kesenian</option>'
  +'</select>'
  +'</td>'
  +'<td align="center">'
  +'<select class="form-control chosen-select-width5" name="tahun_organisasi[]">'
  +'<option value="" selected disabled>Tahun</option>'
  +'<?php
  $currently_selected = date('Y'); 
  $earliest_year = 1970; 
  $latest_year = date('Y'); 
  foreach(range( $latest_year, $earliest_year ) as $i )
  print '<option value="'.$i.'"'.($i === $currently_selected ? ' selected="selected"' : '').'>'.$i.'</option>';
  ?>'
  +'</select>'
  +'</td>'
  +'<td align="center">'
  +'<input type="text" name="jabatan_organisasi[]" class="form-control jabatan_organisasi" placeholder="Masukan Jabatan">'
  +'</td>'
  +'<td align="center" class="clone_append" width="">'
  +'<button class="btn btn-default btn-sm append" onclick="append_organisasi(this)"><a class="fa fa-plus"></a></button>'
  +'</td>'
  +'</tr>'

  $('.clone_organisasi').append(html);
  const select2 = $('.chosen-select-width5');
  select2.select2();
}

function remove_append_organisasi(p){
  var par = p.parentNode.parentNode;

  $(par).remove();
}

</script>
<script type="text/javascript">
  $(document).ready(function () {
    const select2 = $('.chosen-select-width5');
    select2.select2();


    const provinsi = $('#kota');
    const kabkota = $('#kec');

    const urlKabkota = '{{ url("/getkecamatan") }}';

    provinsi.select2();
    kabkota.select2();

    dynamicSelect2(provinsi, urlKabkota, kabkota);
  });
</script>
@endsection

