<?= $this->extend('umum/layout/umum_layout') ?>

<?= $this->section('content') ?>

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Kelola Pengajuan
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('umum') ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
                <li class="active">Kelola Pengajuan</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            
                            <?php 
                                $i = 1;
                                foreach ($status_es as $status) : ?>
                                
                                <?php echo (($i == 1)? '<li class="active">' : '<li>'); $i++; ?>
                                    <a href="#tab_<?php echo $status['id_status']; ?>" data-toggle="tab">
                                        <?php echo $status['deskripsi_status']; ?>
                                    </a>
                                </li>

                            <?php endforeach ?>

                        </ul>

                        <div class="tab-content">
                            
                            <div class="active tab-pane" id="tab_0">
                                <?= view_cell('\App\Libraries\Widget::pengadaan_umum', ['id_tabel' => 'pengadaan_0', 'status' => 0]) ?>
                            </div>

                            <div class="tab-pane" id="tab_1">
                                <?= view_cell('\App\Libraries\Widget::pengadaan_umum', ['id_tabel' => 'pengadaan_1', 'status' => 1]) ?>
                            </div>

                            <div class="wtf tab-pane" id="tab_2">
                                <?= view_cell('\App\Libraries\Widget::pengadaan_umum', ['id_tabel' => 'pengadaan_2', 'status' => 2]) ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="Modal-Keterangan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" style="width: 70%;" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title">
                                Tambah Keterangan
                            </h4>
                        </div>
                        
                        <form class="act_tambah_keterangan" id="act_tambah_keterangan">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="box-body">
                                            
                                            <div class="form-group" style="display:none">
                                                <input id="id_pengadaan" name="id_pengadaan" type="text" class="form-control" required="">
                                            </div>

                                            <div class="form-group">
                                                <label>Keterangan</label>
                                                <textarea name="keterangan" id="keterangan" class="form-control" rows="5" placeholder="Masukkan Keterangan" onfocus="this.placeholder = 'Masukkan Keterangan'" onblur="this.placeholder = 'Masukkan Keterangan'" oninvalid="this.setCustomValidity('Keterangan Harus Diisi')" oninput="setCustomValidity('')" spellcheck="false" ></textarea>
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
            $('#menu-pengajuan').addClass('active');

            $('#pengadaan_0').DataTable({
                'autoWidth'   : true, 
                "pageLength"  : 25, 
                dom: 'Blfrtip',
                buttons: [
                    {
                        extend: 'colvis',
                        text: 'Filter Data',
                        collectionLayout: 'fixed two-column',
                        postfixButtons: [ 'colvisRestore' ]
                    },
                ],
            });

            $('#pengadaan_1').DataTable({
                'autoWidth'   : true, 
                "pageLength"  : 25, 
                dom: 'Blfrtip',
                buttons: [
                    {
                        extend: 'colvis',
                        text: 'Filter Data',
                        collectionLayout: 'fixed two-column',
                        postfixButtons: [ 'colvisRestore' ]
                    },
                ],
            });
            $('#pengadaan_2').DataTable({
                'autoWidth'   : true, 
                "pageLength"  : 25, 
                dom: 'Blfrtip',
                buttons: [
                    {
                        extend: 'colvis',
                        text: 'Filter Data',
                        collectionLayout: 'fixed two-column',
                        postfixButtons: [ 'colvisRestore' ]
                    },
                ],
            });
        })        
    </script>

    <script>
        $('.act_tambah_keterangan').submit(function(e){
            e.preventDefault();     

            $.ajax({
                type: "post",
                url: "<?=base_url('umum/tambah_keterangan')?>",
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
                                window.location.assign('<?=base_url('umum/pengajuan')?>');
                            }
                        }) 
                    } else if (data == "gagal") {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Terjadi Kesalahan Saat Mengirim Data. Silahkan Coba Lagi!'
                        }).then((result) => {
                            if (result.value) {
                                window.location.assign('<?=base_url('umum/pengajuan')?>');
                            }
                        }) 
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Kesalahan tidak diketahui. Halaman akan dimuat ulang!',
                        }).then((result) => {
                            if (result.value) {
                                window.location.assign('<?=base_url('umum/pengajuan')?>');
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
                            window.location.assign('<?=base_url('umum/pengajuan')?>');
                        }
                    }) 
                }
            })              

            return false; 
        });

        $('.terima_pengajuan').on('click', function (e) {
            e.preventDefault();

            var id_pengadaan = $(this).parent().find('.terima_pengajuan').attr("value");

            $('#id_pengadaan').val(id_pengadaan);

            Swal.fire({
                title: 'Terima Pengajuan Pengadaan',
                text: "Apakah Kamu Yakin?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Terima Pengadaan!'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type : 'POST',
                        url : '<?=base_url('umum/terima_pengajuan')?>',
                        data: {
                            id_pengadaan:id_pengadaan,
                        }, 
                        success: function (data) {
                            if (data == "sukses") {
                                $('#Modal-Keterangan').modal('toggle');
                            } else if (data == "gagal") {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Data Gagal Diubah. Halaman akan dimuat ulang!',
                                }).then((result) => {
                                    if (result.value) {
                                        window.location.assign('<?=base_url('umum/pengajuan')?>');
                                    }
                                })
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Kesalahan tidak diketahui. Halaman akan dimuat ulang!',
                                }).then((result) => {
                                    if (result.value) {
                                        window.location.assign('<?=base_url('umum/pengajuan')?>');
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
                                    window.location.assign('<?=base_url('umum/pengajuan')?>');
                                }
                            }) 
                        }	
                    });
                }
            });
        })

        $('.tolak_pengajuan').on('click', function (e) {
            e.preventDefault();

            var id_pengadaan = $(this).parent().find('.tolak_pengajuan').attr("value");

            $('#id_pengadaan').val(id_pengadaan);

            Swal.fire({
                title: 'Tolak Pengajuan Pengadaan',
                text: "Apakah Kamu Yakin?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Tolak Pengadaan!'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type : 'POST',
                        url : '<?=base_url('umum/tolak_pengajuan')?>',
                        data: {
                            id_pengadaan:id_pengadaan,
                        }, 
                        success: function (data) {
                            if (data == "sukses") {
                                $('#Modal-Keterangan').modal('toggle');
                            } else if (data == "gagal") {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Data Gagal Diubah. Halaman akan dimuat ulang!',
                                }).then((result) => {
                                    if (result.value) {
                                        window.location.assign('<?=base_url('umum/pengajuan')?>');
                                    }
                                })
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Kesalahan tidak diketahui. Halaman akan dimuat ulang!',
                                }).then((result) => {
                                    if (result.value) {
                                        window.location.assign('<?=base_url('umum/pengajuan')?>');
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
                                    window.location.assign('<?=base_url('umum/pengajuan')?>');
                                }
                            }) 
                        }	
                    });
                }
            });
        })
    </script> 



<?= $this->endSection() ?>