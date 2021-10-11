        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('user'); ?>">
                <div class="sidebar-brand-icon">
                    <img src="/img/logo heartnalyze.svg" style="width: 65px; border-radius: 15%;">
                </div>
                <div class="sidebar-brand-text mx-2"> Heartnalyze </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?= ($title === "Admin Dashboard") ? 'active' : ''; ?>">
                <a class="nav-link" href=" <?= base_url('admin'); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Data Pengguna -->
            <li class="nav-item <?= ($title === "Data Pengguna") ? 'active' : ''; ?>">
                <a class="nav-link" href="<?= base_url('admin/data-user'); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Data Pengguna</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Data Gejala -->
            <li class="nav-item <?= ($title === "Data Gejala") ? 'active' : ''; ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Data Gejala</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= base_url('admin/tambah-data-gejala'); ?>">Tambah Gejala Baru</a>
                        <a class="collapse-item" href="<?= base_url('admin/data-gejala'); ?>">Daftar Gejala</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Data Penyakit -->
            <li class="nav-item <?= ($title === "Data Pemeriksaan") ? 'active' : ''; ?>">
                <a class="nav-link" href=" <?= base_url('admin/history'); ?>">
                    <i class="fas fa-fw fa-stethoscope"></i>
                    <span>Data Pemeriksaan</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Logout -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('logout'); ?>">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->