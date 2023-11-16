<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <img src="<?php echo base_url('assets/images/logo.png')?>" alt="SMK-TI GNC" width="50" height="50">
        </div>
        <div class="sidebar-brand-text mx-3">SMK-TI GNC</div>
    </a>


    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Dashboard -->
    <li class="nav-item <?php echo $this->uri->segment(2) == 'Admin' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?php echo site_url('Admin'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Kelola Dashboard -->
    <li class="nav-item <?php echo $this->uri->segment(2) == 'Kelola_Dashboard' ? 'active' : ''; ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true"
            aria-controls="collapseFour">
            <i class="fas fa-fw fa-cog"></i>
            <span>Kelola Dashboard</span>
        </a>
        <div id="collapseFour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?php echo site_url('K_Konten/slideshow'); ?>">Slider</a>
                <a class="collapse-item" href="<?php echo site_url('K_Konten/info'); ?>">Info</a>
                <a class="collapse-item" href="<?php echo site_url('K_Konten/vmt'); ?>">Visi, Misi & Tujuan</a>
                <a class="collapse-item" href="<?php echo site_url('K_Konten/kepsek'); ?>">Kepala Sekolah</a>
                <a class="collapse-item" href="<?php echo site_url('K_Konten/berita'); ?>">Berita</a>
                <a class="collapse-item" href="<?php echo site_url('K_Konten/acara'); ?>">Acara</a>
                <a class="collapse-item" href="<?php echo site_url('K_Konten/video'); ?>">Video Sekolah</a>
                <a class="collapse-item" href="<?php echo site_url('K_Konten/jurusan'); ?>">Jurusan</a>
                <a class="collapse-item" href="<?php echo site_url('K_Konten/manajemen'); ?>">Manajemen Sekolah</a>
                <a class="collapse-item" href="<?php echo site_url('K_Konten/ppdb'); ?>">PPDB</a>
            </div>
        </div>
    </li>

    <!-- Kelola Data Master -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseComponents"
            aria-expanded="false" aria-controls="collapseComponents">
            <i class="fas fa-fw fa-cog"></i>
            <span>Data Master</span>
        </a>
        <div id="collapseComponents" class="collapse" aria-labelledby="headingComponents"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Sub-menu Data Master</h6>
                <a class="collapse-item" href="<?php echo site_url('Tahun_akademik/index'); ?>">Tahun Akademik</a>
                <a class="collapse-item" href="<?php echo site_url('Semester/index'); ?>">Semester</a>
                <a class="collapse-item" href="<?php echo site_url('Tingkatan/index'); ?>">Tingkatan Kelas</a>
                <a class="collapse-item" href="<?php echo site_url('Jurusan/index'); ?>">Data Jurusan</a>
                <a class="collapse-item" href="<?php echo site_url('Kelas/index'); ?>">Data Kelas</a>
                <a class="collapse-item" href="<?php echo site_url('Mapel/index'); ?>">Data Mata Pelajaran</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSiswa" aria-expanded="true"
            aria-controls="collapseSiswa">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Data Peserta Didik</span>
        </a>
        <div id="collapseSiswa" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Sub-menu Peserta Didik</h6>
                <a class="collapse-item" href="<?php echo site_url('DataSiswa/index'); ?>">Data Siswa</a>
                <a class="collapse-item" href="<?php echo site_url('KelolaKelas/index'); ?>">Kelola Kelas</a>
            </div>
        </div>
    </li>

    <!-- Kelola Data Nilai -->
    <li class="nav-item <?php echo $this->uri->segment(2) == 'Nilai' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?php echo site_url('Nilai/index'); ?>">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Data Nilai</span>
        </a>
    </li>
    <!-- Data Guru -->
    <li class="nav-item <?php echo $this->uri->segment(2) == 'Data_Guru' ? 'active' : ''; ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwocollapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Data Guru</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?php echo base_url('Wali/index'); ?>">Wali Kelas</a>
                <a class="collapse-item" href="<?php echo base_url('admin/pengajar'); ?>">Pengajar</a>
                <a class="collapse-item" href="<?php echo base_url('Penugasan'); ?>">Penugasan Guru</a>
            </div>
        </div>
    </li>

    <li class="nav-item <?php echo $this->uri->segment(2) == 'Materi' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?php echo site_url('Materi/index_admin'); ?>">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Data Materi</span>
        </a>
    </li>


    <!-- PPDB -->
    <li class="nav-item <?php echo $this->uri->segment(2) == 'PPDB' ? 'active' : ''; ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true"
            aria-controls="collapseThree">
            <i class="fas fa-fw fa-wrench"></i>
            <span>PPDB</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?php echo site_url('PPDB/popup'); ?>">Pop Up</a>
                <a class="collapse-item" href="<?php echo site_url('PPDB/kuota'); ?>">Kuota</a>
                <a class="collapse-item" href="<?php echo site_url('PPDB/pendaftar'); ?>">Semua Pendaftar</a>
                <a class="collapse-item" href="<?php echo site_url('PPDB/diterima'); ?>">Diterima</a>
                <a class="collapse-item" href="<?php echo site_url('PPDB/tidakditerima'); ?>">Tidak Diterima</a>
                <a class="collapse-item" href="<?php echo site_url('PPDB/tampil_email'); ?>">Email PPDB</a>
            </div>
        </div>
    </li>

    <!-- Forum Diskusi -->
    <li class="nav-item <?php echo $this->uri->segment(2) == 'Forum_Diskusi' ? 'active' : ''; ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true"
            aria-controls="collapseFive">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Kelola Forum Diskusi</span>
        </a>
        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?php echo site_url('Diskusi/Kelola_diskusi'); ?>">Kelola Topik</a>
                <a class="collapse-item" href="<?php echo site_url('Diskusi/Kelola_komentar'); ?>">Kelola Komentar</a>
                <!-- <a class="collapse-item" href="<?php echo site_url('Diskusi/index'); ?>">Forum Diskusi</a> -->
            </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>