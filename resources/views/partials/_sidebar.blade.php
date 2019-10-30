<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header text-center">
                <div class="dropdown profile-element"> <span>
                    <img alt="image" class="img-circle" src="{{ asset('assets/img/profile_small.jpg') }}" />
                </span>
                <span class="clear"> <span class="block m-t-xs">
                    <strong class="font-bold" style="color: white;">{{ Auth::user()->name }}</strong>
                </span>
            </span>
        </div>
        <div class="logo-element" style="background:#f3f3f4;">
            <img src="{{ asset('assets/img/dboard/logo/sublogo.png') }}" width="30px">
        </div>
    </li>

    <li class="@if(url('dashboard') == request()->url()) active  @endif treeview">
        <a href="{{url('dashboard')}}"><i class="fa fa-tachometer"></i>
            <span class="nav-label">Dashboards</span>
        </a>
    </li>
    <li class="@if(url('requestpekerjaan') == request()->url()) active  @endif treeview">
        <a href="{{url('requestpekerjaan')}}"><i class="fa fa-exchange"></i>
            <span class="nav-label">Request Pegawai</span>
        </a>
    </li>
    <li class="@if(url('datakaryawan') == request()->url()) active  @endif treeview">
        <a href="{{url('datakaryawan')}}"><i class="fa fa-users"></i>
            <span class="nav-label">Data Karyawan</span>
        </a>
    </li>


        <!-- <li class="treeview sidebar data-master">
        <a href="#" id="step1"><i class="fa fa-shopping-cart"></i> <span class="nav-label">Template</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse">
            <li class=" sidebar master-akun">
                <a href="{{ url('cetakpdf') }}"><i class="" aria-hidden="true"></i><span class="nav-label">DomPDF</span></a>
            </li>
        </ul>
        <ul class="nav nav-second-level collapse">
            <li class=" sidebar master-akun">
                <a href="{{ url('basicform') }}"><i class="active" aria-hidden="true"></i><span class="nav-label">basicform</span></a>
            </li>
        </ul>
    </li> -->
{{--    <li class="@if(url('data_payroll') == request()->url() or url('generate_payroll') == request()->url()) active  @endif treeview">--}}
{{--        <a href="#"><i class="fa fa-usd"></i> <span class="nav-label">Payroll</span><span class="fa arrow"></span></a>--}}
{{--        <ul class="nav nav-second-level collapse">--}}
{{--            <li class="@if(url('data_payroll') == request()->url()) active @else '' @endif">--}}
{{--                <a href="{{url('data_payroll')}}">Data Payroll</a>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--        <ul class="nav nav-second-level collapse">--}}
{{--            <li class="@if(url('generate_payroll') == request()->url()) active @else '' @endif">--}}
{{--                <a href="{{ url('generate_payroll') }}">Generate Payroll</a>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--    </li>--}}
    <li class="@if(url('payroll') == request()->url()
        or url('/payroll/slipgaji/{id}') == request()->url()) active @else '' @endif  treeview">
        <a href="{{ url('payroll')}}"><i class="fa fa-usd"></i> <span class="nav-label">Generate Payroll</span></a>
    </li>

    <li class="@if(url('penglembur') == request()->url()
    or url('penglembur/daftar') == request()->url()) active @else '' @endif treeview">
        <a href="#"><i class="fa fa-coffee"></i> <span class="nav-label">Lembur</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse">
            <li class="@if(url('penglembur') == request()->url()) active @else '' @endif"><a href="{{ url('penglembur') }}">Form Pengajuan</a></li>
            <li class="@if(url('penglembur/daftar') == request()->url()) active @else '' @endif"><a href="{{ url('penglembur/daftar') }}">Daftar Pengajuan</a></li>
        </ul>
    </li>

    <li class="@if(url('/presensi') == request()->url()
    or url('/presensi/generate') == request()->url()) active @else '' @endif treeview">
        <a href="#"><i class="fa fa-book"></i> <span class="nav-label">Presensi</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse">
            <li class="@if(url('/presensi') == request()->url()) active @else '' @endif"><a href="{{ url('/presensi') }}">Daftar Presensi</a></li>
            <li class="@if(url('/presensi/generate') == request()->url()) active @else '' @endif"><a href="{{ url('/presensi/generate') }}">Generate Presensi</a></li>
        </ul>
    </li>

    <li class="@if(url('admin/tambah_data_pegawai') == request()->url()
        or url('admin/data_pegawai')
        or url('admin/data_pegawai_lulus') == request()->url()) active  @endif treeview">
        <a href="#"><i class="fa fa-th"></i> <span class="nav-label">Kepegawaian</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse">
            <li class="@if(url('admin/tambah_data_pegawai') == request()->url()) active @else '' @endif">
                <a href="{{ url('admin/tambah_data_pegawai') }}">Input Data Pelamar</a>
            </li>
            <li class="@if(url('admin/data_pegawai') == request()->url()) active @else '' @endif">
                <a href="{{ url('admin/data_pegawai') }}">Kelola Pelamar</a>
            </li>
            <li class="@if(url('admin/data_pegawai_lulus') == request()->url()) active @else '' @endif">
                <a href="{{url('admin/data_pegawai_lulus')}}">Daftar Pelamar Lulus Seleksi</a>
            </li>
        </ul>
    </li>
    <li class="treeview sidebar data-master">
        <a href="#"><i class="fa fa-gavel"></i> <span class="nav-label">Manajemen Hak Akses</span><span class="fa arrow"></span></a>
        @can('users-list')
        <ul class="nav nav-second-level collapse">
            <li class=" sidebar master-akun">
                <a href="{{ url('users') }}"><i class="" aria-hidden="true"></i><span class="nav-label">Manajemen User</span></a>
            </li>
        </ul>
        @endcan
        @can('role-list')
        <ul class="nav nav-second-level collapse">
            <li class=" sidebar master-akun">
                <a href="{{ url('roles') }}"><i class="active" aria-hidden="true"></i><span class="nav-label">Manajemen Role</span></a>
            </li>
        </ul>
        @endcan
    </li>
    <li class="@if(url('setup_komponen_gaji') == request()->url() or url('setup_periode_gaji') == request()->url()) active  @endif treeview sidebar data-master">
        <a href="#"><i class="fa fa-cogs"></i> <span class="nav-label">Setup System</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse">
            <li class="@if(url('setup_komponen_gaji') == request()->url()) active @else '' @endif">
                <a href="{{ url('setup_komponen_gaji') }}"><i class="" aria-hidden="true"></i><span class="nav-label">Setup Komponen Gaji</span></a>
            </li>
        </ul>
        <ul class="nav nav-second-level collapse">
            <li class="@if(url('setup_periode_gaji') == request()->url()) active @else '' @endif">
                <a href="{{ url('setup_periode_gaji') }}"><i class="" aria-hidden="true"></i><span class="nav-label">Setup Periode Gaji</span></a>
            </li>
        </ul>
    </li>
        </ul>
</div>
</nav>
