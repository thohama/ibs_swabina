@extends('public.template.index')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5 align="center">Pendaftaran Recruitment</h5>
        </div>
        <div class="ibox-content">
          <form method="POST" class="form-horizontal" action="#" enctype="multipart/form-data">
            @csrf
            <fieldset>
              @if(count($errors)>0)
              @foreach($errors->all() as $error)
              <div class="alert alert-danger">{{$error}}</div>
              @endforeach
              @elseif(session('alert'))
              <div class="alert alert-danger">
                {{ session('alert') }}
              </div>
              @endif
              <h6><strong>Data Pribadi</strong></h6>
              <div class="form-group">
                <label class="col-sm-2 control-label">Nama Lengkap (KTP)<span style="color: red">*</span></label>
                <div class="col-sm-12"><input type="text" class="form-control" name="nama" placeholder="Masukkan Nama"></div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Tempat Lahir<span style="color: red">*</span></label>
                <div class="col-sm-12"><input type="text" class="form-control" name="tempat_lahir" placeholder="Masukkan Tempat Lahir"></div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Tanggal Lahir<span style="color: red">*</span></label>
                <div class="col-sm-12"><input type="date" class="form-control" name="tgl_lahir" placeholder="Masukkan Tanggal Lahir (mm/dd/yyyy)"></div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Nomor KTP<span style="color: red">*</span></label>
                <div class="col-sm-12"><input type="number" class="form-control" name="no_ktp" placeholder="Masukkan Nomor KTP"></div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Usia<span style="color: red">*</span></label>
                <div class="col-sm-12"><input type="number" class="form-control" name="usia" placeholder="Masukkan Usia"></div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Jenis Kelamin<span style="color: red">*</span></label>
                <div class="col-sm-12">
                  <label class="checkbox-inline"> <input type="radio" value="Laki-Laki" id="jenis_kelamin" name="jenis_kelamin">Laki-Laki</label>
                  <label class="checkbox-inline"> <input type="radio" value="Perempuan" id="jenis_kelamin" name="jenis_kelamin">Perempuan</label>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Agama<span style="color: red">*</span></label>
                <div class="col-sm-12">
                  <label class="checkbox-inline"> <input type="radio" value="Islam" id="agama" name="agama">Islam</label>
                  <label class="checkbox-inline"> <input type="radio" value="Kristen Protestan" id="agama" name="agama">Protestan</label>
                  <label class="checkbox-inline"> <input type="radio" value="Kristen Katolik" id="agama" name="agama">Katolik</label>
                  <label class="checkbox-inline"> <input type="radio" value="Budha" id="agama" name="agama">Budha</label>
                  <label class="checkbox-inline"> <input type="radio" value="Hindu" id="agama" name="agama">Hindu</label>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Alamat Sesuai KTP<span style="color: red">*</span></label>
                <div class="col-sm-12"><input type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat"></div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">No. HP<span style="color: red">*</span></label>
                <div class="col-sm-12"><input type="number" class="form-control" name="no_hp" placeholder="Masukkan No. HP"></div>
              </div>
              <h6><strong>Pendidikan Formal</strong></h6>
              <table class="table table-bordered">
                <tr>
                  <td><label>Tingkat Pendidikan</label></td>
                  <td><label>Nama Sekolah</label></td>
                  <td><label>Kota</label></td>
                  <td><label>Jurusan</label></td>
                  <td><label>Lulus</label></td>
                  <td><label>Tahun Lulus</label></td>
                  <td><label>Kelas Terakhir</label></td>
                  <td><label>Aksi</label></td>
                </tr>
                <tr>
                  <td>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" name="tingkat_pendidikan[]" id="tingkat_pendidikan"/>
                    </div>
                  </td>
                  <td>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" name="nama_sekolah[]" id="nama_sekolah"/>
                    </div>
                  </td>
                  <td>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" name="kota_sekolah[]" id="kota_sekolah"/>
                    </div>
                  </td>
                  <td>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" name="jurusan[]" id="jurusan"/>
                    </div>
                  </td>
                  <td><div class="col-sm-12">
                    <input type="text" class="form-control" name="lulus[]" id="lulus"/>
                  </div>
                </td>
                <td>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="tahun_lulus_sekolah[]" id="tahun_lulus"/>
                  </div>
                </td>
                <td>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="kelas_terakhir[]" id="kelas_terakhir"/>
                  </div>
                </td>
                <td>
                  <div class="text-right">
                    <button class="btn btn-primary add-btn">Tambah</button>
                  </div>
                </td>
              </tr>
            </table>
            <h6><strong>Pendidikan Non-Formal/Kursus</strong></h6>
            <table class="table table-bordered">
              <tr>
                <td><label>Nama&Jenis Kursus</label></td>
                <td><label>Nama Lembaga Pendidikan</label></td>
                <td><label>Lama Pendidikan</label></td>
                <td><label>Tahun Lulus</label></td>
                <td><label>Kota</label></td>
                <td><label>Aksi</label></td>
              </tr>
              <tr>
                <td>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="nama_kursus[]" id="nama_kursus"/>
                  </div>
                </td>
                <td>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="nama_lembaga_pendidikan[]" id="nama_lembaga_pendidikan"/>
                  </div>
                </td>
                <td>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="lama_pendidikan[]" id="lama_pendidikan"/>
                  </div>
                </td>
                <td>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="tahun_lulus_kursus[]" id="tahun_lulus_kursus"/>
                  </div>
                </td>
                <td><div class="col-sm-12">
                  <input type="text" class="form-control" name="kota_kursus[]" id="kota_kursus"/>
                </div>
              </td>
              <td>
                <div class="text-right">
                  <button class="btn btn-primary add-btn">Tambah</button>
                </div>
              </td>
            </tr>
          </table>
          <h6><strong>Data Keluarga Pelamar (diisi bila sudah menikah)</strong></h6>
          <div class="form-group">
            <label class="col-sm-2 control-label">Status Perkawinan<span style="color: red">*</span></label>
            <div class="col-sm-12">
              <label class="checkbox-inline"> <input type="radio" value="Lajang" id="status_keluarga" name="status_keluarga">Lajang</label>
              <label class="checkbox-inline"> <input type="radio" value="Menikah" id="status_keluarga" name="status_keluarga">Menikah</label>
              <label class="checkbox-inline"> <input type="radio" value="Sudah Bercerai" id="status_keluarga" name="status_keluarga">Sudah Bercerai</label>
            </div>
          </div>
          <table class="table table-bordered">
            <tr>
              <td><label>Nama Anggota Keluarga</label></td>
              <td><label>Hubungan Keluarga</label></td>
              <td><label>Jenis Kelamin</label></td>
              <td><label>Tempat Lahir</label></td>
              <td><label>Tanggal Lahir</label></td>
              <td><label>Bekerja</label></td>
              <td><label>Aksi</label></td>
            </tr>
            <tr>
              <td>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="nama_anggota_keluarga[]" id="nama_anggota_keluarga"/>
                </div>
              </td>
              <td>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="hubungan_keluarga[]" id="hubungan_keluarga"/>
                </div>
              </td>
              <td>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="jenis_kelamin_keluarga[]" id="jenis_kelamin_keluarga"/>
                </div>
              </td>
              <td>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="tempat_lahir_keluarga[]" id="tempat_lahir_keluarga"/>
                </div>
              </td>
              <td><div class="col-sm-12">
                <input type="text" class="form-control" name="tanggal_lahir_keluarga[]" id="tanggal_lahir_keluarga"/>
              </div>
            </td>
            <td><div class="col-sm-12">
              <input type="text" class="form-control" name="bekerja[]" id="bekerja"/>
            </div>
          </td>
          <td>
            <div class="text-right">
              <button class="btn btn-primary add-btn">Tambah</button>
            </div>
          </td>
        </tr>
      </table>
      <h6><strong>Susunan Keluarga (Ayah, Ibu dan Saudara sekandung termasuk anda sendiri anak ke berapa)</strong></h6>
      <table class="table table-bordered">
        <tr>
          <td><label>Nama</label></td>
          <td><label>L/P</label></td>
          <td><label>Usia</label></td>
          <td><label>Pendidikan</label></td>
          <td><label>Pekerjaan</label></td>
          <td><label>Perusahaan</label></td>
          <td><label>Aksi</label></td>
        </tr>
        <tr>
          <td>
            <div class="col-sm-12">
              <input type="text" class="form-control" name="nama_keluarga[]" id="nama_keluarga"/>
            </div>
          </td>
          <td>
            <div class="col-sm-12">
              <input type="text" class="form-control" name="jenis_kelamin_keluarga[]" id="jenis_kelamin_keluarga"/>
            </div>
          </td>
          <td>
            <div class="col-sm-12">
              <input type="text" class="form-control" name="usia_keluarga[]" id="usia_keluarga"/>
            </div>
          </td>
          <td>
            <div class="col-sm-12">
              <input type="text" class="form-control" name="pendidikan_keluarga[]" id="pendidikan_keluarga"/>
            </div>
          </td>
          <td><div class="col-sm-12">
            <input type="text" class="form-control" name="pekerjaan_keluarga[]" id="pekerjaan_keluarga"/>
          </div>
        </td>
        <td><div class="col-sm-12">
          <input type="text" class="form-control" name="perusahaan_keluarga[]" id="perusahaan_keluarga"/>
        </div>
      </td>
      <td>
        <div class="text-right">
          <button class="btn btn-primary add-btn">Tambah</button>
        </div>
      </td>
    </tr>
  </table>
  <p>(bila sudah meninggal dunia, sebutkan pendidikan dan pekerjaan ketika masa hidupnya)</p>
  <div class="form-group">
    <label class="col-sm-2 control-label">Kemampuan berbahasa asing<span style="color: red">*</span></label>
    <div class="col-sm-12"><input type="text" class="form-control" name="bahasa_asing" placeholder="Masukkan Bahasa Asing"></div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Kemampuan berbahasa daerah<span style="color: red">*</span></label>
    <div class="col-sm-12"><input type="text" class="form-control" name="bahasa_daerah" placeholder="Masukkan Bahasa Daerah"></div>
  </div>
  <h6><strong>Pekerja dan Pengalaman</strong></h6>
  <table class="table table-bordered">
    <tr>
      <td><label>Nama dan Alamat Perusahaan</label></td>
      <td><label>Jabatan/Bagian</label></td>
      <td><label>Lama Bekerja</label></td>
      <td><label>Bulan dan Tahun Berapa</label></td>
      <td><label>Alasan Berhenti/Masih Bekerja</label></td>
      <td><label>Aksi</label></td>
    </tr>
    <tr>
      <td>
        <div class="col-sm-12">
          <input type="text" class="form-control" name="nama_alamat_perusahaan[]" id="nama_alamat_perusahaan"/>
        </div>
      </td>
      <td>
        <div class="col-sm-12">
          <input type="text" class="form-control" name="jabatan_bagian[]" id="jabatan_bagian"/>
        </div>
      </td>
      <td>
        <div class="col-sm-12">
          <input type="text" class="form-control" name="lama_bekerja[]" id="lama_bekerja"/>
        </div>
      </td>
      <td>
        <div class="col-sm-12">
          <input type="text" class="form-control" name="bulan_tahun[]" id="bulan_tahun"/>
        </div>
      </td>
      <td><div class="col-sm-12">
        <input type="text" class="form-control" name="alasan[]" id="alasan"/>
      </div>
    </td>
    <td>
      <div class="text-right">
        <button class="btn btn-primary add-btn">Tambah</button>
      </div>
    </td>
  </tr>
</table>
<div class="form-group">
  <label class="col-sm-12 control-label">Apakah alasan anda melamar di PT. Swabina Gatra?<span style="color: red">*</span></label>
  <div class="col-sm-12"><input type="text" class="form-control" name="alasan_lamar"></div>
</div>
<div class="form-group">
  <label class="col-sm-12 control-label">Bersedia/sanggupkah anda apabila di dalam bekerja nantinya terkena giliran (shift) sesuai dengan schedule kerja yang ditetapkan oleh Perusahaan?<span style="color: red">*</span></label>
  <div class="col-sm-12"><input type="text" class="form-control" name="kesanggupan"></div>
</div>
<div class="form-group">
  <label class="col-sm-12 control-label">Apabila tidak sanggup, apakah alasan anda?<span style="color: red">*</span></label>
  <div class="col-sm-12"><input type="text" class="form-control" name="alasan_tidak_sanggup"></div>
</div>
<div class="form-group">
  <label class="col-sm-12 control-label">Bersedia/sanggupkah anda apabila sesuai dengan kebutuhan Perusahaan atau karena alasan lain Perusahaan memutasi/memindah anda di Unit kerja lain?<span style="color: red">*</span></label>
  <div class="col-sm-12"><input type="text" class="form-control" name="kesanggupan_pindah"></div>
</div>
<div class="form-group">
  <label class="col-sm-12 control-label">Apabila tidak sanggup, apakah alasan anda?<span style="color: red">*</span></label>
  <div class="col-sm-12"><input type="text" class="form-control" name="alasan_tidak_sanggup_pindah"></div>
</div>
<h6><strong>Kegiatan Lainnya</strong></h6>
<div class="form-group">
  <label class="col-sm-2 control-label">Kegemaran/Hobby<span style="color: red">*</span></label>
  <div class="col-sm-12"><input type="text" class="form-control" name="hobby" placeholder="Masukkan Kegemaran/Hobby"></div>
</div>
<div class="form-group">
  <label class="col-sm-2 control-label">Prestasi yang pernah dicapai<span style="color: red">*</span></label>
  <div class="col-sm-12"><input type="text" class="form-control" name="prestasi" placeholder="Masukkan Prestasi"></div>
</div>
<h6><strong>Organisasi Politik, Sosial, Olahraga dan Kesenian</strong></h6>
<table class="table table-bordered">
  <tr>
    <td><label>Nama Organisasi</label></td>
    <td><label>Jenis Organisasi</label></td>
    <td><label>Tahun</label></td>
    <td><label>Jabatan</label></td>
    <td><label>Aksi</label></td>
  </tr>
  <tr>
    <td>
      <div class="col-sm-12">
        <input type="text" class="form-control" name="nama_organisasi[]" id="nama_organisasi"/>
      </div>
    </td>
    <td>
      <div class="col-sm-12">
        <input type="text" class="form-control" name="jenis_organisasi[]" id="jenis_organisasi"/>
      </div>
    </td>
    <td>
      <div class="col-sm-12">
        <input type="text" class="form-control" name="tahun_menjabat[]" id="tahun_menjabat"/>
      </div>
    </td>
    <td>
      <div class="col-sm-12">
        <input type="text" class="form-control" name="jabatan_organisasi[]" id="jabatan_organisasi"/>
      </div>
    </td>
    <td>
      <div class="text-right">
        <button class="btn btn-primary add-btn">Tambah</button>
      </div>
    </td>
  </tr>
</table>
<h6><strong>Keterangan Lain-lain</strong></h6>
<div class="form-group">
  <label class="col-sm-2 control-label">Berat Badan<span style="color: red">*</span></label>
  <div class="col-sm-12"><input type="text" class="form-control" name="berat_badan" placeholder="Masukkan Berat Badan (kg)"></div>
</div>
<div class="form-group">
  <label class="col-sm-2 control-label">Tinggi Badan<span style="color: red">*</span></label>
  <div class="col-sm-12"><input type="text" class="form-control" name="tinggi_badan" placeholder="Masukkan Tinggi Badan (cm)"></div>
</div>
<div class="form-group">
  <label class="col-sm-12 control-label">Apakah anda pernah menderita sakit berat sampai dirawat di Rumah Sakit atau menderita sakit yang lama sembuh?<span style="color: red">*</span></label>
  <div class="col-sm-12"><input type="text" class="form-control" name="keterangan_sakit"></div>
</div>
<div class="form-group">
  <label class="col-sm-2 control-label">Apabila pernah:</label>
</div>
<div class="form-group">
  <label class="col-sm-2 control-label">Tahun Berapa<span style="color: red">*</span></label>
  <div class="col-sm-12"><input type="text" class="form-control" name="tahun_sakit"></div>
</div>
<div class="form-group">
  <label class="col-sm-2 control-label">Berapa Lama<span style="color: red">*</span></label>
  <div class="col-sm-12"><input type="text" class="form-control" name="lama_sakit"></div>
</div>
<div class="form-group">
  <label class="col-sm-2 control-label">Sakit Apa<span style="color: red">*</span></label>
  <div class="col-sm-12"><input type="text" class="form-control" name="nama_sakit"></div>
</div>
<div class="form-group">
  <label class="col-sm-2 control-label">Dirawat Dimana<span style="color: red">*</span></label>
  <div class="col-sm-12"><input type="text" class="form-control" name="dirawat_dimana"></div>
</div>
<h6><strong>Apabila terjadi sesuatu terhadap diri anda, perusahaan dapat memperoleh informasi dan rekomendasi dari</strong></h6>
<table class="table table-bordered">
  <tr>
    <td><label>Nama</label></td>
    <td><label>Alamat Lengkap</label></td>
    <td><label>No. Handphone</label></td>
    <td><label>Hubungan dengan anda</label></td>
    <td><label>Aksi</label></td>
  </tr>
  <tr>
    <td>
      <div class="col-sm-12">
        <input type="text" class="form-control" name="nama_rekomendasi[]" id="nama_rekomendasi"/>
      </div>
    </td>
    <td>
      <div class="col-sm-12">
        <input type="text" class="form-control" name="alamat_rekomendasi[]" id="nama_rekomendasi"/>
      </div>
    </td>
    <td>
      <div class="col-sm-12">
        <input type="text" class="form-control" name="no_hp_rekomendasi[]" id="no_hp_rekomendasi"/>
      </div>
    </td>
    <td>
      <div class="col-sm-12">
        <input type="text" class="form-control" name="hubungan[]" id="hubungan"/>
      </div>
    </td>
    <td>
      <div class="text-right">
        <button class="btn btn-primary add-btn">Tambah</button>
      </div>
    </td>
  </tr>
</table>
<p>Dengan ini saya menyatakan bahwa data yang tertera di dalam formulir ini adalah benar. Apabila ternyata saya memberikan keterangan yang tidak benar/palsu, saya bersedia dituntut/menerima sanksi sesuai dengan peraturan perusahaan yang berlaku</p>
</fieldset>
<div class="hr-line-dashed"></div>
<div class="form-group">
  <div class="col-sm-4 col-sm-offset-2">
    <a href="/">
      <button type="button" class="btn btn-white">Cancel</button>
    </a>
    <button class="btn btn-primary" type="submit">Save changes</button>
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
<script type="text/javascript">
  $(document).ready(function() {

    $('[data-toggle="tooltip"]').tooltip();

    $('#addColumn1').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": false,
      "responsive": true,
      "autoWidth": false,
      "pageLength": 10,
      "retrieve" : true,
    });

  });


</script>
@endsection

