<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">
                NAVIGASI MENU
            </li>

            <!-- BERANDA -->
            <li id="menu-beranda">
                <a href="<?php echo base_url('pengadaan') ?>">
                    <i class="fa fa-dashboard"></i> <span>Beranda</span>
                </a>
            </li>

            <!-- DATA MASTER -->
            <li id="menu-master" class="treeview">
                <a href="#">
                    <i class="fa fa-table"></i> <span>Data Master</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url('pengadaan/barang') ?>"><i class="fa fa-circle-o"></i> Data Barang</a></li>
                    <li><a href="<?php echo base_url('pengadaan/pengecekan') ?>"><i class="fa fa-circle-o"></i> Data Pengecekan</a></li>
                </ul>
            </li>

            <!-- PENGADAAN -->
            <li id="menu-pengadaan" class="treeview">
                <a href="#">
                    <i class="fa fa-plus-square"></i> <span>Kelola Pengadaan</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url('pengadaan/pengajuan') ?>"><i class="fa fa-circle-o"></i> Pengajuan</a></li>
                    <li><a href="<?php echo base_url('pengadaan/pengadaan') ?>"><i class="fa fa-circle-o"></i> Lihat Data</a></li>
                </ul>
            </li>

            <!-- PEMBELIAN -->
            <li id="menu-pembelian" class="treeview">
                <a href="#">
                    <i class="fa fa-shopping-bag"></i> <span>Kelola Pembelian</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url('pengadaan/pembelian') ?>"><i class="fa fa-circle-o"></i> Lihat Data</a></li>
                    <li><a href="<?php echo base_url('pengadaan/pembelian_tambah') ?>"><i class="fa fa-circle-o"></i> Tambah Pembelian</a></li>
                </ul>
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
                    <li><a href="<?php echo base_url('pengadaan/profile') ?>"><i class="fa fa-circle-o"></i> Profile</a></li>
                    <li><a href="<?php echo base_url('pengadaan/logout') ?>"><i class="fa fa-circle-o"></i> Logout</a></li>
                </ul>
            </li>

        </ul>
    </section>
</aside>