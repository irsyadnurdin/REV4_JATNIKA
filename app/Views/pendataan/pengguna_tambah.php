<?= $this->extend('pendataan/layout/pendataan_layout') ?>

<?= $this->section('content') ?>

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Tambah Data Pengguna
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('admin') ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
                <li><a href="<?php echo base_url('pendataan/pengguna') ?>">Data Pengguna</a></li>
                <li class="active">Tambah Data Pengguna</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div id="alert-sukses" class="bg-light-blue alert alert-dismissible" style="display:none">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-check"></i> Data Berhasil Disimpan!</h4>
                    </div>

                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Lengkapi Semua Data!</h3>
                        </div>
                        <form class="tambah_pengguna" id="tambah_pengguna">
                            <div class="box-body">
                                
                                <div class="form-group">
                                    <label>Username (*)</label>
                                    <input id="username" name="username" type="text" class="form-control" placeholder="Masukkan Username" onfocus="this.placeholder = 'Hanya Boleh Memasukkan Huruf & Angka'" onblur="this.placeholder = 'Masukkan Username'" required="" pattern="[a-zA-Z0-9]{1,}" oninvalid="this.setCustomValidity('Username Pengguna Tidak Boleh Kosong dan Hanya Boleh Memasukkan Huruf & Angka')" oninput="setCustomValidity('')">
                                </div>

                                <div class="form-group">
                                    <label>Nama Pengguna (*)</label>
                                    <input id="nama_pengguna" name="nama_pengguna" type="text" class="form-control" placeholder="Masukkan Nama Pengguna" onfocus="this.placeholder = 'Hanya Boleh Memasukkan Huruf'" onblur="this.placeholder = 'Masukkan Nama Pengguna'" required="" pattern="[a-zA-Z ]{1,}" oninvalid="this.setCustomValidity('Nama Pengguna Tidak Boleh Kosong dan Hanya Boleh Memasukkan Huruf')" oninput="setCustomValidity('')">
                                </div>

                                <div class="form-group">
                                    <label>Email (*)</label>
                                    <input id="email" name="email" type="email" class="form-control" placeholder="Masukkan Email" onfocus="this.placeholder = 'Masukkan Email'" onblur="this.placeholder = 'Masukkan Email'" required="" oninvalid="this.setCustomValidity('Format Email Yang Anda Masukkan Salah')" oninput="setCustomValidity('')">
                                </div>

                                <div class="form-group">
                                    <label>Role (*)</label>
                                    <select id="role" name="role" class="form-control" required="" oninvalid="this.setCustomValidity('Role Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                                        <option value="">Pilih Kategori</option>

                                        <?php foreach ($role_es as $role) : ?>
                                            <option value=<?php echo $role['id_role'] ?>> <?php echo $role['deskripsi'] ?></option>
                                        <?php endforeach; ?>   

                                    </select>
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
                                <button type="submit" class="btn btn-primary">Tambah Pengguna</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?= $this->endSection() ?>


<?= $this->section('javascript') ?>

<script type="text/javascript" language="javascript" >
        $(document).ready(function(){
            $('#menu-pengguna').addClass('active');
        })
    </script>

    <script type="text/javascript">
        $('.tambah_pengguna').submit(function(e){
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
                    url: "<?=base_url('pendataan/tambah_pengguna')?>",
                    data: new FormData(this),
                    processData:false,
                    contentType:false,
                    cache:false,
                    async:false,
                    success: function (data) {
                        if (data == "sukses") {
                            Swal.fire({
                                icon: 'success',
                                title: 'Data Berhasil Si Simpan',
                                showConfirmButton: false,
                                timer: 1500
                            })

                            $('#username').val('');
                            $('#nama_pengguna').val('');
                            $('#email').val('');
                            $('#role').val('');
                            $('#password').val('');
                            $('#password_ulang').val('');

                            document.getElementById("alert-sukses").style.display = "block";
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
                                    window.location.assign('<?=base_url('pendataan/pengguna_tambah')?>');
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
                                window.location.assign('<?=base_url('pendataan/pengguna_tambah')?>');
                            }
                        }) 
                    }
                })              
            }

            return false; 
        });
    </script>

<?= $this->endSection() ?>