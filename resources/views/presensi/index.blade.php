@extends('main')

@section('title', 'Payroll')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-12">
            <h2>Absensi</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('/dashboard')}}">Home</a>
                </li>
                <li class="active">
                    <strong>Daftar Absensi Pegawai</strong>
                </li>
            </ol>

        </div>
    </div>


    <div class="wrapper wrapper-content animated fadeInRight">


        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Daftar Absensi Pegawai</h5>

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
                        <div class="form-group" id="form-kelas">
{{--                            <label class="font-normal" for="id_kelas">Lokasi Penempatan</label>--}}
{{--                            <div class="input-group">--}}
{{--                                <span class="input-group-addon"><i class="fa fa-home"></i></span>--}}
{{--                                <select data-placeholder="Pilih Kelas" name="id_kelas" id="id_kelas" class="form-control chosen-select select-kelas">--}}
{{--                                    <option value=""></option>--}}
{{--                                    @foreach($client as $c)--}}
{{--                                    <option value="$c->id">{{$c->nama_client}}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                            <br>--}}
{{--                            <label class="font-normal" for="id_kelas">Periode</label>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-4">--}}
{{--                                    <select class="select2_demo_1 form-control">--}}
{{--                                        <option></option>--}}
{{--                                        <option value="1">Januari</option>--}}
{{--                                        <option value="2">Februari</option>--}}
{{--                                        <option value="3">Maret</option>--}}
{{--                                        <option value="4">April</option>--}}
{{--                                        <option value="5">Mei</option>--}}
{{--                                        <option value="5">Juni</option>--}}
{{--                                        <option value="5">Juli</option>--}}
{{--                                        <option value="5">Agustus</option>--}}
{{--                                        <option value="5">September</option>--}}
{{--                                        <option value="5">Oktober</option>--}}
{{--                                        <option value="5">November</option>--}}
{{--                                        <option value="5">Desember</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}

{{--                                <div class="col-md-4">--}}
{{--                                    <select class="select2_demo_3 form-control">--}}
{{--                                        <option></option>--}}
{{--                                        <option value="Bahamas">2017</option>--}}
{{--                                        <option value="Bahrain">2018</option>--}}
{{--                                        <option value="Bangladesh">2019</option>--}}
{{--                                        <option value="Barbados">2020</option>--}}
{{--                                        <option value="Belarus">2021</option>--}}
{{--                                        <option value="Belgium">2022</option>--}}
{{--                                        <option value="Belize">2023</option>--}}
{{--                                        <option value="Benin">2024</option>--}}
{{--                                    </select>--}}

{{--                                </div>--}}
{{--                                <br>--}}

{{--                        </div>--}}
                        <br>
                        <input type="text" class="form-control input-sm m-b-xs" id="filter"
                               placeholder="Pencarian">

                        <table class="footable table table-stripped">
                            <thead>
                            <tr>
								<th>Foto</th>
								<th>Nama</th>
                                <th>Hari / Tanggal</th>
{{--                                <th>Lokasi Kerja</th>--}}
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
							@foreach($presensi as $p)
                            <tr class="gradeX">
								<td><img src="https://api-smi.myabsensi.com/common/files/absensi-online/{{$p->foto}}" style="width: 50px; height: 50px"/></td>
								<td>{{$p->nama}}</td>
                                <td>{{$p->scan_date}}</td>
{{--                                <td class="center">{{$p->nama_client}}</td>--}}
                                <td>
                                  <a class="btn btn-primary btn" type="button" href="http://www.google.com/maps/place/{{$p->lat}},{{$p->lng}}"><i class="fa fa-location-arrow"></i><small> Cek Lokasi</small></a>
                                </td>
                            </tr>
							@endforeach
                            </tbody>
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
