<?= $this->extend('pengecekan/layout/pengecekan_layout') ?>

<?= $this->section('content') ?>

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Data Barang
                <!-- <small>advanced tables</small> -->
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('pengecekan') ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
                <li class="active">Data Barang</li>
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

                            <form action="<?php echo base_url('pengecekan/barang') ?>" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tanggal Rekap </label>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input id="tgl_rekap" name="tgl_rekap" value="<?php echo $tgl_rekap_filter ?>" type="text" class="form-control pull-right" autocomplete="off" readonly="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tanggal Perolehan </label>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input id="tgl_perolehan" name="tgl_perolehan" value="<?php echo $tgl_perolehan_filter ?>" type="text" class="form-control pull-right" autocomplete="off" readonly="">
                                            </div>
                                        </div>
                                    </div>
                                
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-block btn-primary">Filter</button>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="<?php echo base_url('pengecekan/barang') ?>" class="btn btn-block btn-danger">
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
                            <h3 class="box-title">Anda dapat melihat data Barang disini</h3>
                        </div>
                        <div class="box-body">
                            <table id="print_tabel2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Barang</th>
                                        <th>NUP</th>
                                        <th>Nama Barang</th>
                                        <th>Merk/Type</th>
                                        <th>Tanggal Rekap</th>
                                        <th>Tanggal Perolehan</th>
                                        <th>Pemegang</th>
                                        <th>Asal Perolehan</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php 
                                        $i = 1;
                                        foreach ($barang_es as $barang) : ?>

                                        <tr>
                                            <td><?php echo $i++ ?></td>
                                            <td><?php echo $barang['kode_barang'] ?></td>
                                            <td><?php echo $barang['nup'] ?></td>
                                            <td><?php echo $barang['nama_barang'] ?></td>
                                            <td><?php echo $barang['merk'] ?></td>
                                            <td><?php echo $barang['_tgl_rekap'] ?></td>
                                            <td><?php echo $barang['_tgl_perolehan'] ?></td>
                                            <td><?php echo $barang['pemegang'] ?></td>
                                            <td><?php echo $barang['asal_perolehan'] ?></td>
                                        </tr>
                                    
                                    <?php endforeach ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Barang</th>
                                        <th>NUP</th>
                                        <th>Nama Barang</th>
                                        <th>Merk/Type</th>
                                        <th>Tanggal Rekap</th>
                                        <th>Tanggal Perolehan</th>
                                        <th>Pemegang</th>
                                        <th>Asal Perolehan</th>
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
            $("#tgl_rekap").datepicker( {
                format: "yyyy-mm-dd",
                startView: "years", 
                // minViewMode: "months"
            });

            $("#tgl_perolehan").datepicker( {
                format: "yyyy-mm-dd",
                startView: "years", 
                // minViewMode: "months"
            });
        })
    </script> 

<?= $this->endSection() ?>