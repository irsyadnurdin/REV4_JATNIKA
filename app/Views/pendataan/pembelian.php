<?= $this->extend('pendataan/layout/pendataan_layout') ?>

<?= $this->section('content') ?>

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Data Pembelian
                <!-- <small>advanced tables</small> -->
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('pendataan') ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
                <li class="title-data active">Data Pembelian</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Filter Data (Spesifik)</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="box-body">

                            <form action="<?php echo base_url('pendataan/pembelian') ?>" method="post">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Tanggal Pembelian </label>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input id="tgl_pembelian" name="tgl_pembelian" value="<?php echo $tgl_pembelian_filter ?>" type="text" class="form-control pull-right" autocomplete="off" readonly="">
                                            </div>
                                        </div>
                                    </div>
                                
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-block btn-primary">Filter</button>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="<?php echo base_url('pendataan/pembelian') ?>" class="btn btn-block btn-danger">
                                            Reset
                                        </a>
                                    </div>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Anda dapat melihat data Pembelian disini</h3>
                        </div>
                        <div class="box-body">
                            <table id="print_tabel2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Merk/Type</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                        <th>Tanggal Pembelian</th>
                                        <th>Asal Perolehan</th>
                                        <th>Bukti Pembelian</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php 
                                        $i = 1;
                                        foreach ($pembelian_es as $pembelian) : ?>

                                        <tr>
                                            <td><?php echo $i++ ?></td>
                                            <td><?php echo $pembelian['nama_barang'] ?></td>
                                            <td><?php echo $pembelian['merk'] ?></td>
                                            <td><?php echo $pembelian['jumlah'] ?></td>
                                            <td>Rp <?php echo number_format($pembelian['harga'], 2, ',', '.') ?></td>
                                            <td><?php echo $pembelian['_tgl_pembelian'] ?></td>
                                            <td><?php echo $pembelian['asal_perolehan'] ?></td>
                                            <td>
                                                <a class="image-popup-vertical-fit" href="<?= base_url('_img/pembelian/'.$pembelian['foto']) ?>" data-toggle="tooltip" data-original-title="Lihat Foto">
                                                    <i class="fa fa-image"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    
                                    <?php endforeach ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Merk/Type</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                        <th>Tanggal Pembelian</th>
                                        <th>Asal Perolehan</th>
                                        <th>Bukti Pembelian</th>
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
            $('#menu-master').addClass('active');
        })
    </script>

    <script>
        $(function () {
            $("#tgl_pembelian").datepicker( {
                format: "yyyy-mm-dd",
                startView: "years", 
                // minViewMode: "months"
            });
        })
    </script> 

<?= $this->endSection() ?>