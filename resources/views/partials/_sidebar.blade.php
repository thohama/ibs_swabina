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

            <li class="">
                <a href="{{url('dashboard')}}"><i class="fa fa-th-large"></i>
                    <span class="nav-label">Dashboards</span>
                </a>
            </li>


            <li class="treeview sidebar data-master">
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
            </li>
            <li class="treeview sidebar data-master">
                <a href="#" id="step1"><i class="fa fa-shopping-cart"></i> <span class="nav-label">Manajemen Hak Akses</span><span class="fa arrow"></span></a>
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

            <li class="treeview sidebar data-master">
                <a href="#" id="step1"><i class="fa fa-shopping-cart"></i> <span class="nav-label">Master Data Pegawai</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class=" sidebar master-akun">
                        <a href="{{ url('admin/tambah_data_pegawai') }}"><i class="" aria-hidden="true"></i><span class="nav-label">Tambah Data Pegawai</span></a>
                    </li>
                </ul>
            </li>

    </div>
</nav>
