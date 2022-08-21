<?= $this->extend('umum/layout/umum_layout') ?>

<?= $this->section('content') ?>

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Laporan Data Pengecekan
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('pengecekan') ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
                <li class="title-data active">Laporan Data Pengecekan</li>
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

                            <form action="<?php echo base_url('umum/pengecekan') ?>" method="post">
                                <div class="form-group">
                                    <select id="id_pengecekan" name="id_pengecekan" class="form-control">
                                        <option value="">Pilih Periode</option>

                                        <?php foreach ($pengecekan_es as $pengecekan) : ?>
                                            <option value=<?php echo $pengecekan['id_pengecekan'] ?> <?php echo ($pengecekan['id_pengecekan'] == $id_pengecekan_filter)? "selected": ""; ?>><?php echo $pengecekan['_periode'] ?></option>
                                        <?php endforeach; ?>   

                                    </select>
                                </div>

                                <div class="form-group">
                                    <select id="id_kriteria" name="id_kriteria" class="form-control" >
                                        <option value="">Pilih Kondisi</option>
 
                                        <?php foreach ($kriteria_es as $kriteria) : ?>
                                            <option value=<?php echo $kriteria['id_kriteria'] ?> <?php echo ($kriteria['id_kriteria'] == $id_kriteria_filter)? "selected": ""; ?>><?php echo $kriteria['nama_kriteria'] ?></option>
                                        <?php endforeach; ?>    

                                    </select>
                                </div>

                                <button type="submit" class="btn btn-block btn-primary">Filter</button>
                                <a href="<?php echo base_url('umum/pengecekan') ?>" class="btn btn-block btn-danger">
                                    Reset
                                </a>
                            </form>
                            
                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Anda dapat melihat data Pengecekan disini</h3>
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
                                        <th>Kondisi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php 
                                        $i = 1;
                                        foreach ($pengecekan_detail_es as $pengecekan_detail) : ?>

                                        <tr>
                                            <td><?php echo $i++ ?></td>
                                            <td><?php echo $pengecekan_detail['kode_barang'] ?></td>
                                            <td><?php echo $pengecekan_detail['nup'] ?></td>
                                            <td><?php echo $pengecekan_detail['nama_barang'] ?></td>
                                            <td><?php echo $pengecekan_detail['merk'] ?></td>
                                            <td><?php echo $pengecekan_detail['nama_kriteria'] ?></td>
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
                                        <th>Kondisi</th>
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

<?= $this->endSection() ?>