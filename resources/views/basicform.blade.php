@extends('main')

@section('title', 'dashboard')

@section('extra_styles')

<style>th.dt-center, td.dt-center { text-align: center; }</style>


@endsection

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2> Stock Opname </h2>
                    <ol class="breadcrumb">
                        <li>
                            <a>Home</a>
                        </li>
                        <li>
                          <a>Manajemen Stock</a>
                        </li>
                        <li class="active">
                            <strong> Stock Opname </strong>
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
                    <h5> Stock Opname
                     <!-- {{Session::get('comp_year')}} -->
                     </h5>
                </div>
                <div class="ibox-content">
                        <div class="row">
            <div class="col-xs-12">
              
              <div class="box" id="seragam_box">
                <div class="col-md-10 col-sm-10 col-xs-10" style="padding-bottom: 10px;">
                  <div class="form-group">
                   <h3 class="col-lg-2">Pilih Item :</h3>
                    <div class="col-lg-4">
                       <select class="form-control chosen-select-width" name="barang" style="width:300px; cursor: pointer;" id="barang">
                            <option value="null" selected disabled>--Pilih Seragam--</option>
                            <option value="">Seragam</option>
                      </select>
                    </div>
                    <div class="col-lg-2">
                      <button class="btn btn-info btn-md btn-flat " type="button" id="opname">Lakukan Opname</button>
                    </div>
                  </div>
                </div>
                <div class="box-body">
                
                  <table id="addColumn1" class="table table-bordered table-striped tabel_opname1">
                      <thead>
                           <tr>
                              <th style="text-align : center;"> ID </th>
                              <th style="text-align : center;"> PEMILIK </th>
                              <th style="text-align : center;"> TANGGAL </th>
                              <th style="text-align : center;"> STATUS </th>
                              <th style="text-align : center;"> NOTA </th>
                              <th style="text-align : center;"> AKSI </th>
                          </tr>
                          </thead>
                      <tbody>
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

    });

      
</script>
@endsection

