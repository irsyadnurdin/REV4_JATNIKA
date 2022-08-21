<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">
                NAVIGASI MENU
            </li>

            <!-- BERANDA -->
            <li id="menu-beranda">
                <a href="<?php echo base_url('umum') ?>">
                    <i class="fa fa-dashboard"></i> <span>Beranda</span>
                </a>
            </li>

            <!-- DATA MASTER -->
            <li id="menu-laporan" class="treeview">
                <a href="#">
                    <i class="fa fa-table"></i> <span>Laporan</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url('umum/barang') ?>"><i class="fa fa-circle-o"></i> Data Barang</a></li>
                    <li><a href="<?php echo base_url('umum/pengecekan') ?>"><i class="fa fa-circle-o"></i> Data Pengecekan</a></li>
                    <li><a href="<?php echo base_url('umum/pengadaan') ?>"><i class="fa fa-circle-o"></i> Data Pengadaan</a></li>
                    <li><a href="<?php echo base_url('umum/pembelian') ?>"><i class="fa fa-circle-o"></i> Data Pembelian</a></li>
                </ul>
            </li>

            <!-- KELOLA PENGAJUAN -->
            <li id="menu-pengajuan">
                <a href="<?php echo base_url('umum/pengajuan') ?>">
                    <i class="fa fa-cogs"></i> <span>Konfirmasi Pengajuan</span>
                </a>
            </li>

        </ul>

        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">
                PENGATURAN
            </li>

            <li id="menu-profile" class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i> <span>Ubah Profile</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url('umum/profile') ?>"><i class="fa fa-circle-o"></i> Profile</a></li>
                    <li><a href="<?php echo base_url('umum/logout') ?>"><i class="fa fa-circle-o"></i> Logout</a></li>
                </ul>
            </li>

        </ul>
    </section>
</aside>