<?= $this->extend('pendataan/layout/pendataan_layout') ?>

<?= $this->section('content') ?>

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Data Barang
                <!-- <small>advanced tables</small> -->
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('pendataan') ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
                <li class="title-data active">Data Barang</li>
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

                            <form action="<?php echo base_url('pendataan/barang') ?>" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tanggal Rekap (Perbulan) </label>
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
                                            <label>Tanggal Perolehan (Perbulan)  </label>
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
                                        <a href="<?php echo base_url('pendataan/barang') ?>" class="btn btn-block btn-danger">
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
                            <a href="<?php echo base_url('pendataan/barang_tambah') ?>" type="button" class="btn btn-block btn-primary" style="width: auto;float: right;">
                                Tambah Data Barang
                            </a>

                            <div class="btn-group" style="width: auto;float: right; margin-right: 15px;">
                                <a href="<?php echo base_url('pendataan/barang_hapus') ?>" type="button" class="btn btn-block btn-primary">
                                    Histori Penghapusan Data
                                </a>
                            </div>

                            <div class="btn-group" style="width: auto;float: right; margin-right: 15px;">
                                <button type="button" class="import_excel_barang btn btn-primary">Import (Excel)</button>
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="" class="download_template">Download Template Excel</a></li>
                                </ul>
                            </div>
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
                                        <th>Action</th>
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
                                            <td>
                                                <a href="<?php echo base_url('pendataan/barang/'.$barang['id_barang']) ?>" style="margin-right:10px">
                                                    <i class="fa fa-edit"></i>
                                                </a> 
                                                <a class="hapus_barang" value="<?php echo $barang['id_barang'] ?>" href="">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
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
                                        <th>Action</th>
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

    <script>
        $('.import_excel_barang').on('click', function (e) {
            e.preventDefault();

            $('#Modal-UploadExcel').modal('toggle');
        })

        $('.act_import_excel_barang').submit(function(e){
            e.preventDefault();     

            $.ajax({
                type: "post",
                url: "<?=base_url('pendataan/tambah_barang_excel')?>",
                data: new FormData(this),
                processData:false,
                contentType:false,
                cache:false,
                async:false,
                success: function (data) {
                    if (data == "gagal") {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Terjadi Kesalahan Saat Mengirim Data. Silahkan Coba Lagi!'
                        })
                    }  
                },
                error: function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Data Berhasil Di Simpan',
                    }).then((result) => {
                        if (result.value) {
                            window.location.assign('<?=base_url('pendataan/barang')?>');
                        }
                    }) 
                }
            })              

            return false; 
        });
    </script> 

    <script>
        $('.download_template').on('click', function (e) {
            e.preventDefault();

            window.open('<?=base_url('pendataan/download_template')?>', '_blank');
        })
    </script> 

    <script>
        $('.hapus_barang').on('click', function (e) {
            e.preventDefault();

            var id_barang = $(this).parent().find('.hapus_barang').attr("value");

            Swal.fire({
                title: 'Hapus Data',
                text: "Apakah Kamu Yakin?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Hapus Data!'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type : 'POST',
                        url : '<?=base_url('pendataan/hapus_barang')?>',
                        data: {
                            id_barang:id_barang,
                        }, 
                        success: function (data) {
                            if (data == "sukses") {
                                Swal.fire({
                                    icon: 'success',
                                    text: 'Data Berhasil Dihapus!',
                                    showConfirmButton: false,
                                    timer: 2000
                                });

                                window.location.assign('<?=base_url('pendataan/barang')?>');
                            } else if (data == "gagal") {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Data Gagal Dihapus, Halaman akan dimuat ulang!',
                                }).then((result) => {
                                    if (result.value) {
                                        window.location.assign('<?=base_url('pendataan/barang')?>');
                                    }
                                }) 
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Kesalahan tidak diketahui. Halaman akan dimuat ulang!',
                                }).then((result) => {
                                    if (result.value) {
                                        window.location.assign('<?=base_url('pendataan/barang')?>');
                                    }
                                }) 
                            } 
                        },
                        error: function() {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Kesalahan tidak diketahui. Halaman akan dimuat ulang!',
                            }).then((result) => {
                                if (result.value) {
                                    window.location.assign('<?=base_url('pendataan/barang')?>');
                                }
                            }) 
                        }	
                    });
                }
            });
        })
    </script> 

<?= $this->endSection() ?>