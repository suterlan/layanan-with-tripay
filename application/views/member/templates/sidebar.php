<!-- Sidebar -->
<ul class="navbar-nav bg-gray-100 sidebar sidebar-light accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('member'); ?>">
        <div class="sidebar-brand-icon">
            <img src="<?= base_url('assets/dist/images/logo_icon_in_admin.png') ?>">
        </div>
        <div class="sidebar-brand-text mx-3">Az-Media<sup>&trade;</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <div class="sidebar-heading">
        Member
    </div>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('member'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Layanan
    </div>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('layanan'); ?>">
            <i class="fas fa-fw fa-play"></i>
            <span>Layanan </span></a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('layanan/layananVideo'); ?>">
            <i class="fas fa-fw fa-video"></i>
            <span>Video Promotion</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('layanan/layananWebsite'); ?>">
            <i class="fas fa-fw fa-globe"></i>
            <span>Pembuatan Website</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('layanan/layananSosial'); ?>">
            <i class="fas fa-fw fa-share-alt-square"></i>
            <span>Sosial Media Manajemen</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('transaksi/riwayat_transaksi'); ?>">
            <i class="fas fa-book"></i>
            <span>Riwayat Transaksi</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('member/myProfile'); ?>">
            <i class="fas fa-house-user"></i>
            <span>My Profile</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->