<?= $this->extend('login/layout/login_layout') ?>

<?= $this->section('content') ?>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-form-title" style="background-image: url(<?php echo base_url('_img/administrator2.jpg') ?>);">
                    <span class="login100-form-title-1">
                        Lupa Password
                    </span>
                </div>

                <form class="lupa_password">
                    <div class="login100-form validate-form" style="padding-bottom:0 !important;"> 
                        <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                            <span class="label-input100">Username</span>
                            <input id="username" name="username" class="input100" type="text" placeholder="Masukkan Username">
                            <span class="focus-input100"></span>
                        </div>

                        <div class="flex-sb-m w-full p-b-20" style="justify-content: flex-end;">
                            <div>
                                <a href="<?php echo base_url('login') ?>" class="txt1">
                                    Kembali ke Login?
                                </a>
                            </div>
                        </div>    
                    </div>

                    <div class="container-login100-form-btn p-b-100" style="justify-content: center;">
                        <button class="login100-form-btn">
                            Reset
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?= $this->endSection() ?>


<?= $this->section('javascript') ?>

    <script>
        $('.lupa_password').submit(function(e){
            e.preventDefault();
        
            var username = $('#username').val();
            
            if (username != "") {
                $.ajax({
                    type : 'POST',
                    url : '<?=base_url('login/auth_lupa_password')?>',
                    data: new FormData(this),
                    processData:false,
                    contentType:false,
                    cache:false,
                    async:false,
                    success: function (data) {
                        if (data == "sukses") {
                            Swal.fire({
                                icon: 'success',
                                title: 'Halo ' + username + " :)",
                                text: "Silahkan cek email anda untuk mereset password.", 
                            }).then((result) => {
                                if (result.value) {
                                    $('#username').val('');
                                }
                            }) 
                        } else if (data == "username_tidak_terdaftar") {
                            $('#username').focus();	

                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: "Username tidak terdaftar.", 
                                showConfirmButton: false,
                                timer: 2000
                            })
                        } else if (data == "gagal_mengirim_email") {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Terjadi Kesalahan Saat Mengirim Email. Silahkan Coba Lagi.',
                                showConfirmButton: false,
                                timer: 2000
                            })
                        } else if (data == "gagal") {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Terjadi Kesalahan Saat Mengirim Data. Silahkan Coba Lagi.',
                                showConfirmButton: false,
                                timer: 2000
                            })
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Kesalahan tidak diketahui. Halaman akan dimuat ulang.',
                            }).then((result) => {
                                if (result.value) {
                                    window.location.assign('<?=base_url('login/lupa_password')?>');
                                }
                            }) 
                        }   
                    },
                    error: function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Kesalahan tidak diketahui. Halaman akan dimuat ulang.',
                        }).then((result) => {
                            if (result.value) {
                                window.location.assign('<?=base_url('login/lupa_password')?>');
                            }
                        }) 
                    }	
                }); 	 
            } else {
                $('#username').focus();
        
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: "Username tidak boleh kosong.", 
                    showConfirmButton: false,
                    timer: 2000
                })
            } 
            
            return false; 
        });
    </script>

<?= $this->endSection() ?>
          