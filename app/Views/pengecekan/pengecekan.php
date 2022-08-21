<?= $this->extend('pengecekan/layout/pengecekan_layout') ?>

<?= $this->section('content') ?>

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Data Pengecekan
                <!-- <small>advanced tables</small> -->
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('pengecekan') ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
                <li class="active">Data Pengecekan</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Anda dapat melihat data Pengecekan disini</h3>
                            <a href="" type="button" class="tambah_pengecekan btn btn-block btn-primary" style="width: auto;float: right;">
                                Tambah Data Pengecekan
                            </a>
                        </div>
                        <div class="box-body">
                            <table id="temp_tabel1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Periode Pengecekan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php 
                                        $i = 1;
                                        foreach ($pengecekan_es as $pengecekan) : ?>

                                        <tr>
                                            <td><?php echo $i++ ?></td>
                                            <td><?php echo $pengecekan['_periode'] ?></td>
                                            <td>
                                                <a href="<?php echo base_url('pengecekan/pengecekan_detail/'.$pengecekan['id_pengecekan']) ?>" style="margin-right:10px" data-toggle="tooltip" data-original-title="Edit Detail Pengecekan">
                                                    <i class="fa fa-bar-chart"></i>
                                                </a> 
                                                <a class="hapus_pengecekan" value="<?php echo $pengecekan['id_pengecekan'] ?>" style="margin-right:10px" data-toggle="tooltip" data-original-title="Hapus Pengecekan">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    
                                    <?php endforeach ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Periode Pengecekan</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="Modal-TambahPengecekan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" style="width: 70%;" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title">
                                Tambah Pengecekan
                            </h4>
                        </div>
                        
                        <form class="act_tambah_pengecekan" id="act_tambah_pengecekan">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="box-body">
                                            
                                            <div class="form-group">
                                                <label>Periode Pengecekan (*) </label>
                                                <div class="input-group date">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <input autocomplete="off" id="periode" name="periode" type="text" class="form-control pull-right" required="">
                                                </div>
                                            </div>

                                            <p class="help-block">
                                                Catatan : <br>
                                                - Tanda dengan (*) wajib diisi! <br>
                                            </p>
                                        </div>                                    
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Tambah Pengecekan</button>
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
            $('#menu-pengecekan').addClass('active');
        })
    </script>

    <script>
        $(function () {
            $("#periode").datepicker( {
                format: "yyyy-mm-dd",
                startView: "years", 
            });
        })
    </script> 

    <script>
        $('.tambah_pengecekan').on('click', function (e) {
            e.preventDefault();

            $('#Modal-TambahPengecekan').modal('toggle');
        })

        $('.act_tambah_pengecekan').submit(function(e){
            e.preventDefault();     

            $.ajax({
                type: "post",
                url: "<?=base_url('pengecekan/tambah_pengecekan')?>",
                data: new FormData(this),
                processData:false,
                contentType:false,
                cache:false,
                async:false,
                success: function (data) {
                    if (data == "sukses") {
                        Swal.fire({
                            icon: 'success',
                            title: 'Data Berhasil Disimpan',
                        }).then((result) => {
                            if (result.value) {
                                window.location.assign('<?=base_url('pengecekan/pengecekan')?>');
                            }
                        }) 
                    } else if (data == "gagal") {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Terjadi Kesalahan Saat Mengirim Data. Silahkan Coba Lagi!'
                        })
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Kesalahan tidak diketahui. Halaman akan dimuat ulang!',
                        }).then((result) => {
                            if (result.value) {
                                window.location.assign('<?=base_url('pengecekan/pengecekan')?>');
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
                            window.location.assign('<?=base_url('pengecekan/pengecekan')?>');
                        }
                    }) 
                }
            })              

            return false; 
        });
    </script> 

    <script>
        $('.hapus_pengecekan').on('click', function (e) {
            e.preventDefault();

            var id_pengecekan = $(this).parent().find('.hapus_pengecekan').attr("value");

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
                        url : '<?=base_url('pengecekan/hapus_pengecekan')?>',
                        data: {
                            id_pengecekan:id_pengecekan,
                        }, 
                        success: function (data) {
                            if (data == "sukses") {
                                Swal.fire({
                                    icon: 'success',
                                    text: 'Data Berhasil Dihapus!',
                                    showConfirmButton: false,
                                    timer: 2000
                                });

                                window.location.assign('<?=base_url('pengecekan/pengecekan')?>');
                            } else if (data == "gagal") {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Data Gagal Dihapus, Halaman akan dimuat ulang!',
                                }).then((result) => {
                                    if (result.value) {
                                        window.location.assign('<?=base_url('pengecekan/pengecekan')?>');
                                    }
                                }) 
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Kesalahan tidak diketahui. Halaman akan dimuat ulang!',
                                }).then((result) => {
                                    if (result.value) {
                                        window.location.assign('<?=base_url('pengecekan/pengecekan')?>');
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
                                    window.location.assign('<?=base_url('pengecekan/pengecekan')?>');
                                }
                            }) 
                        }	
                    });
                }
            });
        })
    </script>

<?= $this->endSection() ?>