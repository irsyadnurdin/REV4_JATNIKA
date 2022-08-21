<?= $this->extend('login/layout/login_layout') ?>

<?= $this->section('content') ?>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-form-title" style="background-image: url(<?php echo base_url('_img/administrator2.jpg') ?>);">
                    <span class="login100-form-title-1">
                        Reset Password
                    </span>
                </div>

                <form class="reset_password">
                    <div class="login100-form validate-form" style="padding-bottom:0 !important;"> 
                        <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required" style="display:none;">
                            <span class="label-input100">ID Pengguna</span>
                            <input id="id_pengguna" name="id_pengguna" class="input100" type="text" value="<?php echo $pengguna['id_pengguna'] ?>" readonly="">
                            <span class="focus-input100"></span>
                        </div>

                        <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
                            <span class="label-input100">Password Baru (*)</span>
                            <input id="password" name="password" type="password" class="input100" placeholder="Masukkan Password" onfocus="this.placeholder = 'Gunakan Kombinasi Password Yang Mudah Diingat'" onblur="this.placeholder = 'Masukkan Password'" required="" oninvalid="this.setCustomValidity('Password Tidak Boleh Kosong.')" oninput="setCustomValidity('')">
                            <span class="focus-input100"></span>
                        </div>

                        <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
                            <span class="label-input100">Ulangi Password (*)</span>
                            <input id="password_ulang" name="password_ulang" type="password" class="input100" placeholder="Masukkan Password" onfocus="this.placeholder = 'Masukkan Kembali Password Yang Diisi'" onblur="this.placeholder = 'Masukkan Password'" required="" oninvalid="this.setCustomValidity('Password Tidak Boleh Kosong.')" oninput="setCustomValidity('')">
                            <span class="focus-input100"></span>
                        </div>

                        <div class="flex-sb-m w-full p-b-20" style="justify-content: flex-end;">
                            <div>
                                <a href="<?php echo base_url('login') ?>" class="txt1">
                                    Kembali ke Halaman Login?
                                </a>
                            </div>
                        </div>    
                    </div>

                    <div class="container-login100-form-btn p-b-100" style="justify-content: center;">
                        <button class="login100-form-btn">
                            Reset Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
    <script>
        $('.reset_password').submit(function(e){
            e.preventDefault();  

            var password = $('#password').val();
            var password_ulang = $('#password_ulang').val();

            if (password != password_ulang) {
                $('#password_ulang').val("");
                $('#password_ulang').focus();  

                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Pengulangan Pengetikan Password Tidak Sesuai.',
                    showConfirmButton: false,
                    timer: 2000
                })                  
            } else {
                $.ajax({
                    type: "post",
                    url: "<?=base_url('login/auth_reset_password')?>",
                    data: new FormData(this),
                    processData:false,
                    contentType:false,
                    cache:false,
                    async:false,
                    success: function (data) {
                        if (data == "sukses") {
                            Swal.fire({
                                icon: 'success',
                                title: "Selamat :)",
                                text: 'Password anda berhasil direset.',
                            }).then((result) => {
                                if (result.value) {
                                    window.location.assign('<?=base_url('login')?>');
                                }
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
                                    window.location.assign('<?=base_url('login/reset_password/'.$token)?>');
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
                                window.location.assign('<?=base_url('login/reset_password/'.$token)?>');
                            }
                        }) 
                    }
                })
            }               

            return false; 
        });
    </script>
<?= $this->endSection() ?>
     