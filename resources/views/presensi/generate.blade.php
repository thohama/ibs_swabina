@extends('main')

@section('title', 'Presensi')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-12">
            <h2>Presensi</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('/dashboard')}}">Home</a>
                </li>
                <li>
                    <a>Presensi</a>
                </li>
                <li class="active">
                    <strong>Generate Presensi</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Daftar Presensi Pegawai</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="text-right">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#generate">Generate Personal</button>
                        </div>

                        <div class="modal inmodal fade" id="generate" tabindex="-1" role="dialog"  aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <h4 class="modal-title">Generate Personal</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{url('/presensi/generate/personal')}}" class="form-horizontal" enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-group">
                                                <label style="text-align: left" class="col-sm-2 control-label">Nama Pegawai</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control inputstl" id="Nama" name="id" required>
                                                        @foreach($kar as $k)
                                                            <option value="{{$k->id}}">{{$k->nama}} - {{ $k->site }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">Tanggal</label>
                                                <div class="col-sm-10"><input type="text" class="form-control input-sm" name="daterange" id="nama" required></div>
                                            </div>
{{--                                            <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">Tanggal</label>--}}
{{--                                                <div class="col-sm-10">--}}
{{--                                                    <input type="text" name="daterange" value="01/01/2018 - 01/15/2018" />--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Generate</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIK</th>
                                    <th>Tgl Jadwal Masuk</th>
                                    <th>Jam Jadwal Masuk</th>
                                    <th>Tgl Masuk</th>
                                    <th>Jam Masuk</th>
                                    <th>Tgl Jadwal Pulang</th>
                                    <th>Jam Jadwal Pulang</th>
                                    <th>Tgl Pulang</th>
                                    <th>Jam Pulang</th>
                                    <th>Menit Terlambat</th>
                                    <th>Menit Pulang Cepat</th>
                                    <th>Menit Lembur</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach($presensi as $p)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $p->nik }}</td>
                                        <td>{{ $p->tgl_jadwal }}</td>
                                        <td>{{ $p->jam_jadwal }}</td>
                                        <td>{{ $p->tgl_masuk }}</td>
                                        <td>{{ $p->jam_masuk }}</td>
                                        <td>{{ $p->tgl_jadwal_pulang }}</td>
                                        <td>{{ $p->jam_jadwal_pulang }}</td>
                                        <td>{{ $p->tgl_pulang }}</td>
                                        <td>{{ $p->jam_pulang }}</td>
                                        <td>{{ $p->mnt_terlambat }}</td>
                                        <td>{{ $p->mnt_plgcpt }}</td>
                                        <td>{{ $p->mnt_lembur }}</td>
                                    </tr>
                                    @php
                                        $i++;
                                    @endphp
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('extra_scripts')
    <!-- FooTable -->
    <script src="{{asset('inspinia/js/plugins/dataTables/datatables.min.js')}}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <!-- Page-Level Scripts -->
    <script>
        $(function() {
            $('input[name="daterange"]').daterangepicker({
                opens: 'left'
            }, function(start, end, label) {
                console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
            });
        });
        $(document).ready(function() {
            var table = $('#example').DataTable( {
                scrollX: true
            } );
            new $.fn.dataTable.FixedHeader( table );
        });
    </script>
@endsection
