@extends('main')

@section('title', 'dashboard')

@section('extra_styles')

<style>th.dt-center, td.dt-center { text-align: center; }</style>

@endsection

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-lg-10">
    <h2> Data Karyawan </h2>
    <ol class="breadcrumb">
      <li>
        <a>Home</a>
      </li>
      <li>
        <a>Data Karyawan</a>
      </li>
      <li class="active">
        <strong> Data Karyawan </strong>
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
        <div class="ibox-title">
          <h5> Data Karyawan
           <!-- {{Session::get('comp_year')}} -->
         </h5>

       </div>
       <div class="ibox-content">
        <div class="row">
          <div class="col-xs-12">

            <div class="box" id="seragam_box">
              <div class="col-md-10 col-sm-10 col-xs-10" style="padding-bottom: 10px;">
                <div class="form-group">

                  <div class="col-lg-2">

                  </div>
                </div>
              </div>
              <div class="box-body">
               <!--  <button class="btn btn-info btn-md btn-flat pull-right" type="button">Generate Payroll</button> -->
               <table id="addColumn1" class="table table-bordered table-striped tabel_opname1">
                <thead>
                 <tr>
                  <th style="text-align : center;"> No </th>
                  <th style="text-align : center;"> NIK </th>
                  <th style="text-align : center;"> Nama </th>
                  <th style="text-align : center;"> Email </th>
                  <th style="text-align : center;"> No. KTP </th>
                  <th style="text-align : center;"> Alamat </th>
                  <th style="text-align : center;"> Tempat/Tanggal Lahir </th>
                  <th style="text-align : center;"> Jenis Kelamin </th>
                  <th style="text-align : center;"> Aksi </th>
                </tr>
              </thead>
              <tbody>
                @php
                $i=1;
                @endphp
                @foreach($data_karyawan as $u)

                <tr>
                  <td class="text-center">{{$i}}</td>
                  <td><center>{{$u->id}}</td>
                    <td><center>{{$u->nama}}</center></td>
                    <td><center>{{$u->email}}</center></td>
                    <td><center>{{$u->no_ktp}}</center></td>
                    <td><center>{{$u->alamat}}</center></td>
                    <td><center>{{$u->tempat_lahir}}, {{$u->tanggal_lahir}}</center></td>
                    <td><center>{{$u->jenis_kelamin}}</center></td>
                    <td><center>
                      <a data-toggle="modal" data-target="#input-nilai" data-id="{{$u->id}}"><button class="btn btn-warning" type="button">Input Nilai</button></a>
                      <a href="#" target="_blank"><button class="btn btn-primary" type="button">Detail Nilai</button></a>
                    </center></td>
                    @php
                    $i++;
                    @endphp
                    @endforeach
                  </tr>
                </tbody>
              </table>
            </div>

            <div class="box-footer">
              <h5></h5>
            </div><!-- /.box-footer -->
          </div><!-- /.box -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div>
  </div>
</div>
</div>
@include('penilaian_pegawai.penilaian_data_karyawan_extend_input_nilai')
</div>



<div class="row" style="padding-bottom: 50px;"></div>


@endsection



@section('extra_scripts')
<script type="text/javascript">
  $(document).ready(function() {
    $('#input-nilai').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal

            var id = button.data('id');
            console.log(id);

            var modal = $(this);
            modal.find('.modal-body #id').val(id);
          });

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

