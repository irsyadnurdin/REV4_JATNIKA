<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">
                NAVIGASI MENU
            </li>

            <!-- BERANDA -->
            <li id="menu-beranda">
                <a href="<?php echo base_url('pendataan') ?>">
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
                    <li><a href="<?php echo base_url('pendataan/barang') ?>"><i class="fa fa-circle-o"></i> Data Barang</a></li>
                    <li><a href="<?php echo base_url('pendataan/pengecekan') ?>"><i class="fa fa-circle-o"></i> Data Pengecekan</a></li>
                    <li><a href="<?php echo base_url('pendataan/pengadaan') ?>"><i class="fa fa-circle-o"></i> Data Pengadaan</a></li>
                    <li><a href="<?php echo base_url('pendataan/pembelian') ?>"><i class="fa fa-circle-o"></i> Data Pembelian</a></li>
                </ul>
            </li>

            <!-- PENGGUNA -->
            <li id="menu-pengguna">
                <a href="<?php echo base_url('pendataan/pengguna') ?>">
                    <i class="fa fa-users"></i> <span>Kelola Pengguna</span>
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
                    <li><a href="<?php echo base_url('pendataan/profile') ?>"><i class="fa fa-circle-o"></i> Profile</a></li>
                    <li><a href="<?php echo base_url('pendataan/logout') ?>"><i class="fa fa-circle-o"></i> Logout</a></li>
                </ul>
            </li>

        </ul>
    </section>
</aside>