<?= $this->extend('umum/layout/umum_layout') ?>

<?= $this->section('content') ?>

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Dashboard
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('umum') ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-lg-4 col-xs-6">
                    <div class="small-box bg-aqua">
                        <div class="inner">
                        <h3>
                            <?php echo $jd_barang ?>
                        </h3>
                        <p>Data Barang</p>
                        </div>
                        <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="<?php echo base_url('umum/barang') ?>" class="small-box-footer">Selengkapnya... <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-xs-6">
                    <div class="small-box bg-green">
                        <div class="inner">
                        <h3>
                            <?php echo $jd_pengecekan ?>
                        </h3>
                        <p>Periode Pengecekan</p>
                        </div>
                        <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="<?php echo base_url('umum/pengecekan') ?>" class="small-box-footer">Selengkapnya... <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-xs-6">
                    <div class="small-box bg-yellow">
                        <div class="inner">
                        <h3>
                            <?php echo $jd_pengadaan ?>
                        </h3>
                        <p>Data Pengadaan</p>
                        </div>
                        <div class="icon">
                        <i class="fa fa-shopping-cart"></i>
                        </div>
                        <a href="<?php echo base_url('umum/pengadaan') ?>" class="small-box-footer">Selengkapnya... <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>

        </section>
    </div>

<?= $this->endSection() ?>