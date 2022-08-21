<?= $this->extend('pengecekan/layout/pengecekan_layout') ?>

<?= $this->section('content') ?>

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Profile
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('pengecekan') ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
                <li class="active">Profile</li>
            </ol>
        </section>

        <section class="content">

            <div class="row">
                <div class="col-md-3">

                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('_img/icon/thumbnail.png') ?>" alt="User profile picture">

                            <h3 class="profile-username text-center">
                                <?php echo $pengguna['nama_pengguna']; ?>
                            </h3>

                            <p class="text-muted text-center">
                                Role : Pengecekan
                            </p>

                            <a href="<?php echo base_url('pengecekan/logout') ?>" class="btn btn-primary btn-block"><b>Log Out</b></a>
                        </div>
                    </div>

                </div>

                <div class="col-md-9">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#profile" data-toggle="tab">Profile</a></li>
                            <li><a href="#rpassword" data-toggle="tab">Ubah Password</a></li>
                        </ul>

                        <div class="tab-content">
                            <div class="active tab-pane" id="profile">
                                <form id="edit_pengguna" class="edit_pengguna form-horizontal">
                                    
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Username</label>
                                        <div class="col-sm-10">
                                            <input id="username" name="username" type="text" value="<?php echo $pengguna['username']; ?>" class="form-control" placeholder="Masukkan Username" onfocus="this.placeholder = 'Hanya Boleh Memasukkan Huruf & Angka'" onblur="this.placeholder = 'Masukkan Username'" required="" pattern="[a-zA-Z0-9]{1,}" oninvalid="this.setCustomValidity('Username Pengguna Tidak Boleh Kosong dan Hanya Boleh Memasukkan Huruf & Angka')" oninput="setCustomValidity('')">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Nama Pengguna</label>
                                        <div class="col-sm-10">
                                            <input type="text" value="<?php echo $pengguna['nama_pengguna']; ?>" class="form-control" required="" readonly disabled>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Role</label>
                                        <div class="col-sm-10">
                                            <input type="text" value="<?php echo $pengguna['deskripsi']; ?>" class="form-control" required="" readonly disabled>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Email</label>
                                        <div class="col-sm-10">
                                            <input id="email" name="email" type="email" value="<?php echo $pengguna['email']; ?>" class="form-control" placeholder="Masukkan Email" onfocus="this.placeholder = 'Masukkan Email'" onblur="this.placeholder = 'Masukkan Email'" required="" oninvalid="this.setCustomValidity('Format Email Yang Anda Masukkan Salah')" oninput="setCustomValidity('')">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" class="btn btn-primary">Perbaharui</button>
                                            <button type="reset" class="btn btn-danger">Reset</button>
                                        </div>
                                    </div>

                                </form>
                            </div>

                            <div class="tab-pane" id="rpassword">
                                <form id="edit_password" class="edit_password form-horizontal">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Password Baru (*)</label>
                                        <div class="col-sm-9">
                                            <input id="password" name="password" type="password" class="form-control" placeholder="Masukkan Password" onfocus="this.placeholder = 'Gunakan Kombinasi Password Yang Mudah Diingat'" onblur="this.placeholder = 'Masukkan Password'" required="" oninvalid="this.setCustomValidity('Password Baru Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Ulangi Password (*)</label>
                                        <div class="col-sm-9">
                                            <input id="password_ulang" name="password_ulang" type="password" class="form-control" placeholder="Masukkan Password" onfocus="this.placeholder = 'Masukkan Kembali Password Yang Diisi'" onblur="this.placeholder = 'Masukkan Password'" required="" oninvalid="this.setCustomValidity('Password Ulang Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-3 col-sm-9">
                                            <button type="submit" class="btn btn-primary">Ubah Password</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

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
            $('#menu-profile').addClass('active');
        })
    </script>
    
    <script type="text/javascript">
        $('.edit_pengguna').submit(function(e){
            e.preventDefault();     

            $.ajax({
                type: "post",
                url: "<?=base_url('pengecekan/edit_profile')?>",
                data: new FormData(this),
                processData:false,
                contentType:false,
                cache:false,
                async:false,
                success: function (data) {
                    if (data == "sukses") {
                        Swal.fire({
                            icon: 'success',
                            text: 'Data Berhasil di Perbaharui',
                            showConfirmButton: false,
                            timer: 2000
                        })
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
                                window.location.assign('<?=base_url('pengecekan/profile')?>');
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
                            window.location.assign('<?=base_url('pengecekan/profile')?>');
                        }
                    }) 
                }
            })              

            return false; 
        });

        $('.edit_password').submit(function(e){
            e.preventDefault();     

            var username = $('#username').val();
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
                    url: "<?=base_url('pengecekan/edit_password_pengguna')?>",
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
                            
                            $('#password').val('');
                            $('#password_ulang').val('');
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
                                    window.location.assign('<?=base_url('pengecekan/profile')?>');
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
                                window.location.assign('<?=base_url('pengecekan/profile/')?>');
                            }
                        }) 
                    }
                })
            }               

            return false; 
        });
    </script>

<?= $this->endSection() ?>