<?= $this->extend('pengecekan/layout/pengecekan_layout') ?>

<?= $this->section('content') ?>

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Dashboard
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('pengecekan') ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-lg-6 col-xs-6">
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
                        <a href="<?php echo base_url('pengecekan/barang') ?>" class="small-box-footer">Selengkapnya... <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-6 col-xs-6">
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
                        <a href="<?php echo base_url('pengecekan/pengecekan') ?>" class="small-box-footer">Selengkapnya... <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>

        </section>
    </div>

<?= $this->endSection() ?>