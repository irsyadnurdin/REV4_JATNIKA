<?= $this->extend('umum/layout/umum_layout') ?>

<?= $this->section('content') ?>

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Laporan Data Pengadaan
                <!-- <small>advanced tables</small> -->
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('umum') ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
                <li class="title-data active">Laporan Data Pengadaan</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">

                <div class="col-md-3">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Filter Data (Spesifik)</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="box-body">

                            <form action="<?php echo base_url('umum/pengadaan') ?>" method="post">
                                <div class="form-group">
                                    <label>Rekap Pengadaan (Perbulan) </label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input id="periode" name="periode" value="<?php echo $periode_filter ?>" type="text" class="form-control pull-right" autocomplete="off" readonly="">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-block btn-primary">Filter</button>
                                <a href="<?php echo base_url('umum/pengadaan') ?>" class="btn btn-block btn-danger">
                                    Reset
                                </a>
                            </form>
                            
                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Anda dapat melihat data Pengadaan disini</h3>
                        </div>
                        <div class="box-body">
                            <table id="print_tabel2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Merk/Type</th>
                                        <th>Jumlah</th>
                                        <th>Harga Satuan</th>
                                        <th>Total Harga</th>
                                        <th>Status</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php 
                                        $i = 1;
                                        foreach ($pengadaan_es as $pengadaan) : ?>

                                        <tr>
                                            <td><?php echo $i++ ?></td>
                                            <td><?php echo $pengadaan['nama_barang_pengadaan'] ?></td>
                                            <td><?php echo $pengadaan['merk_pengadaan'] ?></td>
                                            <td><?php echo $pengadaan['jumlah_pengadaan'] ?></td>
                                            <td><?php echo "Rp " . number_format($pengadaan['harga_satuan'], 2, ',', '.') ?></td>
                                            <td><?php echo "Rp " . number_format($pengadaan['total_harga'], 2, ',', '.') ?></td>
                                            <td><?php echo $pengadaan['deskripsi_status'] ?></td>
                                            <td><?php echo $pengadaan['keterangan'] ?></td>
                                        </tr>
                                    
                                    <?php endforeach ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Merk/Type</th>
                                        <th>Jumlah</th>
                                        <th>Harga Satuan</th>
                                        <th>Total Harga</th>
                                        <th>Status</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

<?= $this->endSection() ?>


<?= $this->section('javascript') ?>

    <script type="text/javascript" language="javascript" >
        $(document).ready(function(){
            $('#menu-laporan').addClass('active');
        })
    </script>

    <script>
        $(function () {
            $("#periode").datepicker( {
                format: "yyyy-mm",
                startView: "years", 
                minViewMode: "months"
            });
        })
    </script> 

<?= $this->endSection() ?>