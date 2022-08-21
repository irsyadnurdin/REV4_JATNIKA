<?= $this->extend('pendataan/layout/pendataan_layout') ?>

<?= $this->section('content') ?>

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Data Pengguna
                <!-- <small>advanced tables</small> -->
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('admin') ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
                <li class="active">Data Pengguna</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Anda dapat melihat seluruh data Pengguna disini</h3>
                            <a href="<?php echo base_url('pendataan/pengguna_tambah') ?>" type="button" class="btn btn-block btn-primary" style="width: auto;float: right;">
                                Tambah Data Pengguna
                            </a>
                        </div>

                        <div class="box-body">
                            <table id="temp_tabel2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Nama Pengguna</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                        <th>Modified</th>
                                        <th>Created</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php 
                                    $i = 1;
                                    foreach ($pengguna_es as $pengguna) : ?>

                                        <tr>
                                            <td><?php echo $i++ ?></td>
                                            <td><?php echo $pengguna['username'] ?></td>
                                            <td><?php echo $pengguna['nama_pengguna'] ?></td>
                                            <td><?php echo $pengguna['email'] ?></td>
                                            <td><?php echo $pengguna['deskripsi'] ?></td>
                                            <td>
                                                <a href="<?php echo base_url('pendataan/pengguna/'.$pengguna['id_pengguna']) ?>" data-toggle="tooltip" data-original-title="Edit Data" style="margin-right:10px">
                                                    <i class="fa fa-edit"></i>
                                                </a> 

                                                <a class="reset_password" value="<?php echo $pengguna['id_pengguna'] ?>" href="" data-toggle="tooltip" data-original-title="Reset Password" style="margin-right:10px">
                                                    <i class="fa fa-repeat"></i>
                                                </a>
                                                
                                                <a class="hapus_pengguna" value="<?php echo $pengguna['id_pengguna'] ?>" href="" data-toggle="tooltip" data-original-title="Hapus Data">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                            <td><?php echo $pengguna['modified'] ?></td>
                                            <td><?php echo $pengguna['created'] ?></td>
                                        </tr>

                                    <?php endforeach; ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Nama Pengguna</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                        <th>Modified</th>
                                        <th>Created</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="Modal-Reset">
                <div class="modal-dialog" style="width: 70%;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Reset Password</h4>
                        </div>
                        
                        <section class="content">
                            <div class="row">
                                <div class="col-xs-12">

                                    <div class="">
                                        <form class="act_reset_password" id="act_reset_password">
                                            <div class="box-body">
                                                
                                                <div class="form-group" style="display:none;">
                                                    <label>ID Pengguna (*)</label>
                                                    <input id="id_pengguna" name="id_pengguna" type="text" class="form-control" required="">
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Password (*)</label>
                                                            <input id="password" name="password" type="password" class="form-control" placeholder="Masukkan Password" onfocus="this.placeholder = 'Gunakan Kombinasi Password Yang Mudah Diingat'" onblur="this.placeholder = 'Masukkan Password'" required="" oninvalid="this.setCustomValidity('Password Baru Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Konfirmasi Password (*)</label>
                                                            <input id="password_ulang" name="password_ulang" type="password" class="form-control" placeholder="Masukkan Password" onfocus="this.placeholder = 'Masukkan Kembali Password Yang Diisi'" onblur="this.placeholder = 'Masukkan Password'" required="" oninvalid="this.setCustomValidity('Password Ulang Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                                                        </div>
                                                    </div>
                                                </div>

                                                <p class="help-block">
                                                    Catatan : <br>
                                                    - Tanda dengan (*) wajib diisi! <br>
                                                </p>
                                            </div>
                                            <div class="box-footer">
                                                <button type="submit" class="btn btn-primary">Reset Password</button>
                                                <button type="reset" class="btn btn-danger">Reset</button>
                                            </div>
                                        </form>
                                    </div>
                                
                                </div>
                            </div>
                        </section>
                        
                    </div>
                </div>
            </div>
        </section>
    </div>

<?= $this->endSection() ?>


<?= $this->section('javascript') ?>

    <script type="text/javascript" language="javascript" >
        $(document).ready(function(){
            $('#menu-pengguna').addClass('active');
        })
    </script>

    <script>
        $('.reset_password').on('click', function (e) {
            e.preventDefault();

            var id_pengguna = $(this).parent().find('.reset_password').attr("value");

            $('#id_pengguna').val(id_pengguna);

            $('#Modal-Reset').modal('toggle');
            $('.reset_password').tooltip('hide');
        })

        $('.act_reset_password').submit(function(e){
            e.preventDefault();     

            var password = $('#password').val();
            var password_ulang = $('#password_ulang').val();

            if (password != password_ulang) {
                $('#password_ulang').val("");
                $('#password_ulang').focus();  

                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Pengulangan Pengetikan Password Tidak Sesuai!',
                    showConfirmButton: false,
                    timer: 2000
                })                  
            } else {
                $.ajax({
                    type: "post",
                    url: "<?=base_url('pendataan/reset_password')?>",
                    data: new FormData(this),
                    processData:false,
                    contentType:false,
                    cache:false,
                    async:false,
                    success: function (data) {
                        if (data == "sukses") {
                            Swal.fire({
                                icon: 'success',
                                text: 'Data Berhasil Diperbaharui',
                                showConfirmButton: false,
                                timer: 2000
                            })
                            
                            $('#id_pengguna').val('');
                            $('#password').val('');
                            $('#password_ulang').val('');
                            $('#Modal-Reset').modal('toggle'); 
                        } else if (data == "gagal") {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Terjadi Kesalahan Saat Mengirim Data. Silahkan Coba Lagi!',
                                showConfirmButton: false,
                                timer: 2000
                            })
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Kesalahan tidak diketahui. Halaman akan dimuat ulang!',
                            }).then((result) => {
                                if (result.value) {
                                    window.location.assign('<?=base_url('pendataan/pengguna')?>');
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
                                window.location.assign('<?=base_url('pendataan/pengguna')?>');
                            }
                        }) 
                    }
                })
            }               

            return false; 
        });
    </script> 

    <script>
        $('.hapus_pengguna').on('click', function (e) {
            e.preventDefault();

            var id_pengguna = $(this).parent().find('.hapus_pengguna').attr("value");

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
                        url : '<?=base_url('pendataan/hapus_pengguna')?>',
                        data: {
                            id_pengguna:id_pengguna,
                        }, 
                        success: function (data) {
                            if (data == "sukses") {
                                Swal.fire({
                                    icon: 'success',
                                    text: 'Data Berhasil Dihapus!',
                                    showConfirmButton: false,
                                    timer: 2000
                                });

                                window.location.assign('<?=base_url('pendataan/pengguna')?>');
                            } else if (data == "gagal") {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Data Gagal Dihapus, Halaman akan dimuat ulang!',
                                }).then((result) => {
                                    if (result.value) {
                                        window.location.assign('<?=base_url('pendataan/pengguna')?>');
                                    }
                                }) 
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Kesalahan tidak diketahui. Halaman akan dimuat ulang!',
                                }).then((result) => {
                                    if (result.value) {
                                        window.location.assign('<?=base_url('pendataan/pengguna')?>');
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
                                    window.location.assign('<?=base_url('pendataan/pengguna')?>');
                                }
                            }) 
                        }	
                    });
                }
            });
        })
    </script> 

<?= $this->endSection() ?>