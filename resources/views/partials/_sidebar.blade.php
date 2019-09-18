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
                <a href="#" id="step1"><i class="fa fa-shopping-cart"></i> <span class="nav-label">Master Data Pegawai</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class=" sidebar master-akun">
                        <a href="{{ url('admin/tambah_data_pegawai') }}"><i class="" aria-hidden="true"></i><span class="nav-label">Tambah Data Pegawai</span></a>
                    </li>
                </ul>
            </li>

            <li class=" active   treeview">
                    <a href="http://localhost/recruitment/public/admin/dashboard"><i class="fa fa-chart-line"></i> <span class="nav-label">Dashboard</span></a>
            </li>
            <li class=" ''   treeview">
                    <a href="http://localhost/recruitment/public/admin/klien"><i class="fa fa-handshake"></i> <span class="nav-label">Master Data Site</span></a>
            </li>

            <li class=" ''   treeview">
                    <a href="http://localhost/recruitment/public/admin/lowongan"><i class="fa fa-newspaper"></i> <span class="nav-label">Lowongan Pekerjaan</span></a></li>
            <li class=" ''  treeview">
                <a href="#"><i class="fa fa-user-cog"></i> <span class="nav-label">Master Data Pegawai</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class=" '' "><a href="http://localhost/recruitment/public/hrd/sdm/smi">Data Pegawai Aktif</a></li>
                    <li class=" '' "><a href="#">Data Pegawai Resign</a></li>
                    <li class=" '' "><a href="http://localhost/recruitment/public/hrd/sdm/mutasi">Mutasi Pegawai</a></li>
                </ul>
            </li>

            <li class=" ''   treeview">
                <a href="http://localhost/recruitment/public/hrd/presensi"><i class="fa fa-chart-area"></i> <span class="nav-label">Presensi</span></a>
            </li>
            <li class=" ''   treeview">
                <a href="http://localhost/recruitment/public/hrd/absensi"><i class="fa fa-chart-bar"></i> <span class="nav-label">Absensi</span></a>
            </li>
            <li class=" ''   treeview">
                <a href="http://localhost/recruitment/public/hrd/payroll"><i class="fa fa-donate"></i> <span class="nav-label">Generate Payroll</span></a>
            </li>


            <li class=" ''   treeview">
                <a href="http://localhost/recruitment/public/admin/manajemenuser"><i class="fa fa-users"></i> <span class="nav-label">Manajemen User</span></a>
            </li>
                <li class=" ''  treeview">
                    <a href="#"><i class="fa fa fa-cog"></i> <span class="nav-label">Setup System</span><span class="fa arrow"></span></a>
                    <ul class=" ''  nav nav-second-level collapse">
                        <li>
                            <a href="#" id="damian">Payroll<span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li class=" ''   treeview">
                                    <a href="http://localhost/recruitment/public/hrd/setup/komponengaji">Komponen Gaji</a>
                                </li>
                                <li class=" ''   treeview">
                                    <a href="http://localhost/recruitment/public/hrd/setup/umk">UMK</a>
                                </li>
                                <li class=" ''   treeview">
                                    <a href="http://localhost/recruitment/public/hrd/setup/tunjanganjabatan">Tunjangan Jabatan</a>
                                </li>
                                <li class=" ''   treeview">
                                    <a href="http://localhost/recruitment/public/hrd/setup/tunjangantransport">Tunjangan Transport</a>
                                </li>
                                <li class=" ''   treeview">
                                    <a href="http://localhost/recruitment/public/hrd/setup/tunjanganmakan">Tunjangan Makan</a>
                                </li>
                                <li class=" ''   treeview">
                                    <a href="http://localhost/recruitment/public/hrd/setup/periodecutoffgaji">Periode Cut Off Gaji</a>
                                </li>
                                <li class=" ''   treeview">
                                    <a href="http://localhost/recruitment/public/hrd/setup/tunjanganprestasi">Tunjangan Prestasi</a>
                                </li>
                                <li class=" ''   treeview">
                                    <a href="http://localhost/recruitment/public/hrd/setup/penandatanganangaji">Penandatanganan Gaji</a>
                                </li>
                                <li class=" ''   treeview">
                                    <a href="http://localhost/recruitment/public/hrd/setup/gpjabatansite">Gaji Pokok Per Jabatan (Site)</a>
                                </li>
                                <li class=" ''   treeview">
                                    <a href="http://localhost/recruitment/public/hrd/setup/jkslain">JKS Lain</a>
                                </li>
                                <li class=" ''   treeview">
                                    <a href="http://localhost/recruitment/public/hrd/setup/bpjs">BPJS</a>
                                </li>
                                <li class=" ''   treeview">
                                    <a href="http://localhost/recruitment/public/hrd/setup/tunjangankjk">Tunjangan KJK</a>
                                </li>
                                <li class=" ''   treeview">
                                    <a href="http://localhost/recruitment/public/hrd/setup/tunjanganotn">Tunjangan OTN</a>
                                </li>
                                <li class=" ''   treeview">
                                    <a href="http://localhost/recruitment/public/hrd/setup/tunjanganotr">Tunjangan OTR</a>
                                </li>
                                <li class=" ''   treeview">
                                    <a href="http://localhost/recruitment/public/hrd/setup/tunjanganshiftmalam">Tunjangan SHIFT MALAM</a>
                                </li>
                                <li class=" ''   treeview">
                                    <a href="http://localhost/recruitment/public/hrd/setup/kjkperjabatansite">Tunj KJK Per jabatan (site)</a>
                                </li>
                                <li class=" ''   treeview">
                                    <a href="http://localhost/recruitment/public/hrd/setup/otnperjabatansite">Tunj OTN Perjabatan (Site)</a>
                                </li>
                                <li class=" ''   treeview">
                                    <a href="http://localhost/recruitment/public/hrd/setup/masakerjatahunansite">Tunj Masa Kerja Tahunan (site)</a>
                                </li>
                                <li class=" ''   treeview">
                                    <a href="http://localhost/recruitment/public/hrd/setup/kelompoktanggalpenggajian">Kelompok Tanggal Penggajian</a>
                                </li>
                                <li class=" ''   treeview">
                                    <a href="http://localhost/recruitment/public/hrd/setup/creatorpaymentrequisition">Creator Payment Requisition</a>
                                </li>
                                <li class=" ''   treeview">
                                    <a href="http://localhost/recruitment/public/hrd/setup/ttpaymentrequisition">TT Payment Requisition</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" id="attendance">Attendance<span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li class=" ''   treeview">
                                    <a href="http://localhost/recruitment/public/hrd/setup/harilibur">Hari libur</a>
                                </li>
                                <li class=" ''   treeview">
                                    <a href="http://localhost/recruitment/public/hrd/setup/kalenderlibur">Kalender Libur</a>
                                </li>
                                <li class=" ''   treeview">
                                    <a href="http://localhost/recruitment/public/hrd/setup/harilembur">Hari lembur</a>
                                </li>
                                <li class=" ''   treeview">
                                    <a href="http://localhost/recruitment/public/hrd/setup/waktulembur">Waktu Lembur</a>
                                </li>
                                <li class=" ''   treeview">
                                    <a href="http://localhost/recruitment/public/hrd/setup/sanksi">Sanksi</a>
                                </li>
                                <li class=" ''   treeview">
                                    <a href="http://localhost/recruitment/public/hrd/setup/alasanabsen">Alasan Absen</a>
                                </li>
                                <li class=" ''   treeview">
                                    <a href="http://localhost/recruitment/public/hrd/setup/schclass">Schedule Class</a>
                                </li>
                                <li class=" ''   treeview">
                                    <a href="http://localhost/recruitment/public/hrd/setup/schpola">Schedule Pola</a>
                                </li>
                                <li class=" ''   treeview">
                                    <a href="http://localhost/recruitment/public/hrd/setup/jadwalgroup">Jadwal Group</a>
                                </li>
                                <li class=" ''   treeview">
                                    <a href="http://localhost/recruitment/public/hrd/setup/jadwalpersonal">Jadwal Personal</a>
                                </li>
                                <li class=" ''   treeview">
                                    <a href="http://localhost/recruitment/public/hrd/setup/periode">Periode (default)</a>
                                </li>
                                <li class=" ''   treeview">
                                    <a href="http://localhost/recruitment/public/hrd/setup/sisacuti">Sisa Cuti (periode sebelumnya)</a>
                                </li>

                            </ul>
                        </li>
                        <li>
                            <a href="#" id="pekerjaan">Pekerjaan<span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li class=" ''   treeview">
                                    <a href="http://localhost/recruitment/public/hrd/setup/departemen">Departemen</a>
                                </li>
                                <li class=" ''   treeview">
                                    <a href="http://localhost/recruitment/public/hrd/setup/group">Group</a>
                                </li>
                                <li class=" ''   treeview">
                                    <a href="http://localhost/recruitment/public/hrd/setup/shift">Shift</a>
                                </li>
                                <li class=" ''   treeview">
                                    <a href="http://localhost/recruitment/public/hrd/setup/staff">Staff</a>
                                </li>
                                <li class=" ''   treeview">
                                    <a href="http://localhost/recruitment/public/hrd/setup/golongan">Golongan</a>
                                </li>
                                <li class=" ''   treeview">
                                    <a href="http://localhost/recruitment/public/hrd/setup/jabatan">Jabatan</a>
                                </li>
                                <li class=" ''   treeview">
                                    <a href="http://localhost/recruitment/public/hrd/setup/leveljabatan">Level Jabatan</a>
                                </li>
                                <li class=" ''   treeview">
                                    <a href="http://localhost/recruitment/public/hrd/setup/statuskaryawan">Status Karyawan</a>
                                </li>
                                <li class=" ''   treeview">
                                    <a href="http://localhost/recruitment/public/hrd/setup/alasanresign">Alasan Resign</a>
                                </li>
                                <li class=" ''   treeview">
                                    <a href="http://localhost/recruitment/public/hrd/setup/spesialisasipekerjaan">Spesialisasi Pekerjaan</a>
                                </li>
                                <li class=" ''   treeview">
                                    <a href="http://localhost/recruitment/public/hrd/setup/lokasipekerjaan">Lokasi Pekerjaan (md_client)</a>
                                </li>
                                <li class=" ''   treeview">
                                    <a href="http://localhost/recruitment/public/hrd/setup/jenispekerjaan">Jenis Pekerjaan</a>
                                </li>
                                <li class=" ''   treeview">
                                    <a href="http://localhost/recruitment/public/hrd/setup/pelatihan">Pelatihan</a>
                                </li>

                            </ul>
                        </li>

                    </ul>
                </li>
            
    </div>
</nav>
