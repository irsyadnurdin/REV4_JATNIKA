<?= $this->extend('pendataan/layout/pendataan_layout') ?>

<?= $this->section('content') ?>

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Data Penghapusan Barang
                <!-- <small>advanced tables</small> -->
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('pendataan') ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
                <li><a href="<?php echo base_url('pendataan/barang') ?>">Data Barang</a></li>
                <li class="title-data active">Data Penghapusan Barang</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Anda dapat melihat data penghapusan barang disini</h3>
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
                                        <th>Periode Penghapusan</th>
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
                                            <td><?php echo $barang['_modified'] ?></td>
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
                                        <th>Periode Penghapusan</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="Modal-UploadExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" style="width: 40%;" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title">
                                Upload Excel
                            </h4>
                        </div>
                        
                        <form class="act_import_excel_barang" id="act_import_excel_barang">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="box-body">
                                            
                                            <div class="form-group">
                                                <label for="exampleInputFile">Excel (*)</label>
                                                <input id="excel" name="excel" type="file" required="">
                                            </div>

                                            <!-- <p class="help-block">
                                                Catatan : <br>
                                                - Tanda dengan (*) wajib diisi! <br>
                                            </p> -->
                                        </div>                                    
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Tambah Barang</button>
                            </div>
                        </form>
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

<?= $this->endSection() ?>