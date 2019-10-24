@extends('main')

@section('title', 'dashboard')

@section('extra_styles')

<style>th.dt-center, td.dt-center { text-align: center; }</style>

@endsection

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-lg-10">
    <h2> Data Pelamar </h2>
    <ol class="breadcrumb">
      <li>
        <a>Home</a>
      </li>
      <li>
        <a>Pelamar</a>
      </li>
      <li class="active">
        <strong> Detail Pelamar </strong>
      </li>

    </ol>
  </div>
  <div class="col-lg-2">

  </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-12" >
      <div class="ibox float-e-margins">
                <!-- <div class="ibox-title">
                  <div class="text-right">
                      <button class="btn btn-info btn-md btn-flat text-right" type="button" data-toggle="modal" data-target="#insert">Tambah Komponen Gaji</button>
                  </div>
                </div> -->
                <div class="ibox-content p-xl">
                  <div class="row">


                    <div class="col-sm-12">
                      <div class="tabs-container">
                        <ul class="nav nav-tabs">
                          <li class="active"><a data-toggle="tab" href="#tab-1">Detail Pelamar</a></li>
                          <li class=""><a data-toggle="tab" href="#tab-2">Pengalaman Kerja</a></li>
                          <li class=""><a data-toggle="tab" href="#tab-3">Riwayat Pendidikan</a></li>
                        </ul>
                        <div class="tab-content">
                          <div id="tab-1" class="tab-pane active">
                            <div class="panel-body">
                              <h3><i class="fa fa-user-circle"></i> Detail Pelamar</h3>
                              <div class="hr-line-dashed"></div>
                              <div class="col-lg-12">
                                  <dt>Nama:</dt> <dd>{{$jobseeker->nama_lengkap}}</dd><br>
                                  <dt>Tempat/Tanggal Lahir:</dt> <dd>{{$jobseeker->tempat_lahir}}/{{$jobseeker->tanggal_lahir}}</dd><br>
                                  <dt>Jenis Kelamin:</dt> <dd>{{$jobseeker->jenis_kelamin}}</dd><br>
                                  <dt>Agama:</dt> <dd>{{$jobseeker->agama}}</dd><br>
                                  <dt>Alamat:</dt> <dd>{{$jobseeker->alamat_ktp}}</dd><br>
                                  <dt>No. HP:</dt> <dd>{{$jobseeker->nohp}}</dd><br>
                                  <dt>Alasan Melamar:</dt> <dd>{{$jobseeker->alasan_melamar}}</dd><br>
                                  <dt>Kesanggupan Sift/Alasan:</dt> <dd>{{$jobseeker->radio_bersedia_sift}} / {{$jobseeker->alasan_sift}}</dd><br>
                                  <dt>Kesanggupan Mutasi/Alasan:</dt> <dd>{{$jobseeker->radio_bersedia_mutasi}} / {{$jobseeker->alasan_mutasi}}</dd><br>
                              </div>
                            </div>
                          </div>
                          <div id="tab-2" class="tab-pane">
                            <div class="panel-body">
                              <h3><i class="fa fa-send"></i> Pengalaman Kerja</h3>
                              <div class="hr-line-dashed"></div>
                              <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th>No</th>
                                    <th>Nama Perusahaan</th>
                                    <th>Jabatan</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Berakhir</th>
                                  </tr>
                                </thead>
                                <?php $i=1; ?>
                                <tbody>
                                  <tr>
                                    <td>{{ $i++ }}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                          <div id="tab-3" class="tab-pane">
                            <div class="panel-body">
                              <h3><i class="fa fa-book"></i> Riwayat Pendidikan</h3>
                              <div class="hr-line-dashed"></div>
                              <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th>No</th>
                                    <th>Pendidikan</th>
                                    <th>Perguruan Tinggi</th>
                                    <th>Tahun Masuk</th>
                                    <th>Tahun Keluar</th>
                                  </tr>
                                </thead>
                                <?php $i=1; ?>
                                <tbody>
                                  <tr>
                                    <td>{{ $i++ }}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>



        <div class="row" style="padding-bottom: 50px;"></div>

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

            $('.date').datepicker({
              autoclose: true,
              todayHighlight: true,
              format: 'yyyy-mm-dd'
            });

          });

        </script>
        @endsection

