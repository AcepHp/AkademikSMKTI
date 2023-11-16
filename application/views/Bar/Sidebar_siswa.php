<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <img src="<?php echo base_url()?>assets/images/logo.png" alt="SMK-TI GNC" width="50" height="50">
        </div>
        <div class="sidebar-brand-text mx-3">SMK-TI GNC</div>
    </a>


    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?php echo site_url('Siswa'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Nilai</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu Nilai</h6>
                <a class="collapse-item" href="<?php echo base_url('Nilai/siswa_tampil_nilai')?>">Transkip</a>
                <a class="collapse-item" href="<?php echo base_url('Nilai/siswa_tampil_nilai_semester')?>">Nilai progress</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('Materi/index_siswa')?>">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Materi</span></a>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    


    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('Diskusi/index')?>">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Forum Diskusi</span></a>
    </li>



    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>



</ul>
<!-- End of Sidebar -->