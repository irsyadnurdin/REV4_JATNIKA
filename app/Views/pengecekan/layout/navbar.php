<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">
                NAVIGASI MENU
            </li>

            <!-- BERANDA -->
            <li id="menu-beranda">
                <a href="<?php echo base_url('pengecekan') ?>">
                    <i class="fa fa-dashboard"></i> <span>Beranda</span>
                </a>
            </li>

            <!-- PRODUK -->
            <li id="menu-master" class="treeview">
                <a href="#">
                    <i class="fa fa-table"></i> <span>Data Master</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url('pengecekan/barang') ?>"><i class="fa fa-circle-o"></i> Data Barang</a></li>
                    <!-- <li><a href="<?php echo base_url('pengecekan/produk_kategori') ?>"><i class="fa fa-circle-o"></i> Data Kategori Produk</a></li> -->
                </ul>
            </li>

            <!-- PENGECEKAN -->
            <li id="menu-pengecekan">
                <a href="<?php echo base_url('pengecekan/pengecekan') ?>">
                    <i class="fa fa-cogs"></i> <span>Kelola Pengecekan</span>
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
                    <li><a href="<?php echo base_url('pengecekan/profile') ?>"><i class="fa fa-circle-o"></i> Profile</a></li>
                    <li><a href="<?php echo base_url('pengecekan/logout') ?>"><i class="fa fa-circle-o"></i> Logout</a></li>
                </ul>
            </li>

        </ul>
    </section>
</aside>