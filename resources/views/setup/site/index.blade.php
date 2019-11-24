@extends('main')

@section('title', 'dashboard')

@section('extra_styles')

<style>th.dt-center, td.dt-center { text-align: center; }</style>

@endsection

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2> Setup Site </h2>
        <ol class="breadcrumb">
            <li>
                <a>Home</a>
            </li>
            <li>
              <a>Setup</a>
            </li>
            <li class="active">
                <strong> Setup Site </strong>
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
                  <div class="text-right">
                      <button class="btn btn-info btn-md btn-flat text-right" type="button" data-toggle="modal" data-target="#insert">Tambah Data Site</button>
                  </div>
                </div>
                <div class="ibox-content">
                    @if(session('success'))
                        @component('public.notifikasi.app_alert_success')
                            @slot('alert_message')
                                {{ session('success') }}
                            @endslot
                        @endcomponent

                    @elseif(session('failed'))
                        @component('public.notifikasi.app_alert_failed')
                            @slot('alert_message')
                                {{ session('failed') }}
                            @endslot
                        @endcomponent
                    @endif
                    <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="col-md-10 col-sm-10 col-xs-10" style="padding-bottom: 10px;">
                  <div class="form-group">

                    <div class="col-lg-2">

                    </div>
                  </div>
                </div>
                <div class="box-body">

                  <table id="addColumn1" class="table table-bordered table-striped tabel_opname1">
                      <thead>
                           <tr>
                              <th style="text-align : center;width: 5%">No</th>
                              <th>Nama</th>
                              <th>Deskripsi</th>
                              <th style="text-align : center;width: 10%">Aksi</th>
                          </tr>
                          </thead>
                      <tbody>
                              @php
                                $i=1;
                              @endphp
                              @foreach($site as $u)

                              <tr>
                                  <td>{{$i}}</td>
                                  <td>{{$u->nama}}</td>
                                  <td>{{$u->deskripsi}}</td>
                                  <td style="text-align : center;">
                                    <button class="btn btn-default btn-circle"
                                            data-id="{{$u->id}}"
                                            data-nama="{{$u->nama}}"
                                            data-deskripsi="{{$u->deskripsi}}"
                                          data-toggle="modal" data-target="#edit"><i class="fa fa-pencil-square-o"></i>
                                    </button>
                                    <button class="btn btn-default btn-circle"
                                            data-id="{{$u->id}}"
                                            data-nama="{{$u->nama}}"
                                            data-deskripsi="{{$u->deskripsi}}"
                                          data-toggle="modal" data-target="#delete"><i class="fa fa-trash"></i>
                                    </button>
                                  </td>

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
</div>



<div class="row" style="padding-bottom: 50px;"></div>
{{-- Delete --}}
<div class="modal inmodal fade" id="delete" tabindex="-1" role="dialog"  aria-hidden="true">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                  <h4 class="modal-title">Delete Confirmation</h4>
              </div>
              <form method="POST" action="{{ url('/setup_site/delete') }}" class="form-horizontal" enctype="multipart/form-data">
                  <div class="modal-body">
                    @csrf
{{--                    <h4 class="text-center">Apakah Anda yakin untuk menghapus data?</h4>--}}
                    <input type="hidden" name="id" id="id" value="" />
                      <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">Nama Site</label>
                          <div class="col-sm-10"><input type="text" class="form-control" name="nama" id="nama" readonly></div>
                      </div>
                      <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">Deskripsi</label>
                          <div class="col-sm-10"><input type="text" class="form-control" name="deskripsi" id="deskripsi" readonly></div>
                      </div>
                 </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-white" data-dismiss="modal">Cancel</button>
                      <button type="submit" class="btn btn-primary">Delete</button>
                  </div>
              </form>
          </div>
      </div>
</div>
{{-- Update --}}
<div class="modal inmodal fade" id="edit" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Edit Data Site</h4>
            </div>
            <form method="POST" action="{{ url('/setup_site/update') }}" class="form-horizontal" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                    <input type="hidden" name="id" id="id" value="" />
                    <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">Nama Site</label>
                        <div class="col-sm-10"><input type="text" class="form-control" name="nama" id="nama"></div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">Deskripsi</label>
                        <div class="col-sm-10"><input type="text" class="form-control" name="deskripsi" id="deskripsi"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- Insert --}}
<div class="modal inmodal fade" id="insert" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Tambah Data Site</h4>
            </div>
            <form method="POST" action="{{ url('/setup_site/tambah') }}" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                    <input type="hidden" name="id" id="id" value="" />
                    <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">Nama Site</label>
                        <div class="col-sm-10"><input type="text" class="form-control" name="nama" id="nama"></div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">Deskripsi</label>
                        <div class="col-sm-10"><input type="text" class="form-control" name="deskripsi" id="deskripsi"></div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
            </form>
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

  $('.date').datepicker({
          autoclose: true,
          todayHighlight: true,
          format: 'yyyy-mm-dd'
      });

});

$('#edit').on('show.bs.modal', function (event) {
                        var button = $(event.relatedTarget); // Button that triggered the modal

                        var id = button.data('id');
                        var nama = button.data('nama');
                        var deskripsi = button.data('deskripsi');

                        var modal = $(this);
                        modal.find('.modal-body #id').val(id);
                        modal.find('.modal-body #nama').val(nama);
                        modal.find('.modal-body #deskripsi').val(deskripsi);
                    })
$('#delete').on('show.bs.modal', function (event) {
                        var button = $(event.relatedTarget); // Button that triggered the modal

                        var id = button.data('id');
                        var nama = button.data('nama');
                        var deskripsi = button.data('deskripsi');

                        var modal = $(this);
                        modal.find('.modal-body #id').val(id);
                        modal.find('.modal-body #nama').val(nama);
                        modal.find('.modal-body #deskripsi').val(deskripsi);
                    })

</script>
@endsection

