        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('user');?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-cloud-meatball"></i>
                </div>
                <div class="sidebar-brand-text mx-3"> HeartBreak </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?= ($title === "User Dashboard") ? 'active' : '' ; ?>">
                <a class="nav-link" href=" <?= base_url('user');?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Data Pengguna -->
            <li class="nav-item <?= ($title === "Profile") ? 'active' : '' ; ?>">
                <a class="nav-link" href=" <?= base_url('user/profile');?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Profil</span>
                </a>
            </li>
            <!-- Divider -->
            
            <hr class="sidebar-divider">            
            <!-- Data Pengguna -->

            <li class="nav-item <?= ($title === "Cek Kesehatan") ? 'active' : '' ; ?>">
                <a class="nav-link" href=" <?= base_url('user/survey');?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Cek Kesehatan</span>
                </a>
            </li>
            
            <!-- Divider -->
            <hr class="sidebar-divider">
            
            <!-- Data Pengguna -->
            <li class="nav-item <?= ($title === "Riwayat Pemeriksaan") ? 'active' : '' ; ?>">
                <a class="nav-link" href=" <?= base_url('user/history');?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Riwayat Pemeriksaan</span>
                </a>
            </li>
            
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Logout -->
            <li class="nav-item">
            <a class="nav-link" href="<?= base_url('user');?>">
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