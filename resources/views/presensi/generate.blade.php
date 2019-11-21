@extends('main')

@section('title', 'Payroll')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-12">
            <h2>Presensi</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('/dashboard')}}">Home</a>
                </li>
                <li class="active">
                    <strong>Generate Presensi Pegawai</strong>
                </li>
            </ol>
        </div>
    </div>


    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Generate Presensi Pegawai</h5>

                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
{{--                        {{url('presensi/generate')}}--}}
                        <form method="POST" id="postForm" action="#" class="form-horizontal" enctype="multipart/form-data" onsubmit="return postForm()">
                            @csrf
                            <div class="form-group" id="form-kelas">
{{--                                <label class="font-normal" for="id_kelas">Lokasi Penempatan</label>--}}
{{--                                <div class="input-group">--}}
{{--                                    <span class="input-group-addon"><i class="fa fa-home"></i></span>--}}
{{--                                    <select data-placeholder="Pilih Kelas" name="group" id="id_kelas" class="form-control chosen-select select-kelas">--}}
{{--                                    @foreach($client as $c)--}}
{{--                                            <option value="{{$c->nama_client}}">{{$c->nama_client}}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                </div>--}}
                                <br>
                                <label class="font-normal" for="id_kelas">Periode</label>
                                <div class="row">
                                    <div class="col-md-4">
                                        <select class="select2_demo_1 form-control" name="bulan">
                                            <option value="01">Januari</option>
                                            <option value="02">Februari</option>
                                            <option value="03">Maret</option>
                                            <option value="04">April</option>
                                            <option value="05">Mei</option>
                                            <option value="06">Juni</option>
                                            <option value="07">Juli</option>
                                            <option value="08">Agustus</option>
                                            <option value="09">September</option>
                                            <option value="10">Oktober</option>
                                            <option value="11">November</option>
                                            <option value="12">Desember</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <select class="select2_demo_3 form-control" name="tahun">
                                            <option value="2017">2017</option>
                                            <option value="2018">2018</option>
                                            <option value="2019">2019</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <button class="btn btn-block btn-primary" type="submit">GENERATE PRESENSI</button>
                                    </div>
                                    <br>
                                </div>
                            </div>
                        </form>
                        <br>
                        <input type="text" class="form-control input-sm m-b-xs" id="filter"
                               placeholder="Pencarian">

                        <div class="table-responsive">
                            <table class="table table-stripped" data-page-size="8" data-filter=#filter>
                                <thead>
                                <tr>
                                    <th style="text-align: center">NIK</th>
                                    <th style="text-align: center">Tgl Jdwl Masuk</th>
                                    <th style="text-align: center">Jam Jdwl Masuk</th>
                                    <th style="text-align: center">Tgl Masuk</th>
                                    <th style="text-align: center">Jam Masuk</th>
                                    <th style="text-align: center">Tgl Jdwl Pulang</th>
                                    <th style="text-align: center">Jam Jdwl Pulang</th>
                                    <th style="text-align: center">Tgl Pulang</th>
                                    <th style="text-align: center">Jam Pulang</th>
                                    <th style="text-align: center">Mnt Terlambat</th>
                                    <th style="text-align: center">Mnt Plg Cepat</th>
                                    <th style="text-align: center">Mnt Lembur</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($presensi as $p)
                                    <tr class="gradeX">
                                        <td style="text-align: center">{{$p->nik}}</td>
                                        <td style="text-align: center">{{$p->tgl_jadwal}}</td>
                                        <td style="text-align: center">{{$p->jam_jadwal}}</td>
                                        @if($p->id_match_masuk != 0)
                                            <td style="text-align: center">{{$p->tgl_masuk}}</td>
                                            <td style="text-align: center">{{$p->jam_masuk}}</td>
                                        @else
                                            <td style="text-align: center">-</td>
                                            <td style="text-align: center">-</td>
                                        @endif
                                        <td style="text-align: center">{{$p->tgl_jadwal_pulang}}</td>
                                        <td style="text-align: center">{{$p->jam_jadwal_pulang}}</td>
                                        @if($p->id_match_pulang != 0)
                                            <td style="text-align: center">{{$p->tgl_pulang}}</td>
                                            <td style="text-align: center">{{$p->jam_pulang}}</td>
                                        @else
                                            <td style="text-align: center">-</td>
                                            <td style="text-align: center">-</td>
                                        @endif
                                        <td style="text-align: center">{{$p->mnt_terlambat}}</td>
                                        <td style="text-align: center">{{$p->mnt_plgcpt}}</td>
                                        <td style="text-align: center">{{$p->mnt_lembur}}</td>
                                        {{--                                    <td class="center">PT. Selaras Mitra Integra</td>--}}
                                        {{--                                    <td>--}}
                                        {{--                                      <a class="btn btn-default btn" type="button" href="http://www.google.com/maps/place/{{$p->lat}},{{$p->lng}}"><i class="fa fa-envelope"></i><small> Buka Alamat</small></a>--}}
                                        {{--                                    </td>--}}
                                    </tr>
                                @endforeach
                                </tbody>

{{--                                <td colspan="5">--}}
{{--                                </td>--}}
                                <ul class="pagination pull-right"></ul>
                                </tfoot>
                            </table>
                            Halaman : {{ $presensi->currentPage() }} <br/>
                            Jumlah Data : {{ $presensi->total() }} <br/>
                            Data Per Halaman : {{ $presensi->perPage() }} <br/>
                            {{ $presensi->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- FooTable -->
<script src="{{asset('inspinia/js/plugins/footable/footable.all.min.js')}}"></script>
<!-- Page-Level Scripts -->
<script>
    $(document).ready(function() {
        $('.footable').footable();
        $('.footable2').footable();
    });
    $(".select2_demo_1").select2({
        placeholder: "Pilih bulan",
        allowClear: true
    });
    $(".select2_demo_2").select2();
    $(".select2_demo_3").select2({
        placeholder: "Pilih tahun",
        allowClear: true
    });
</script>
@endsection
