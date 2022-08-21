<?= $this->extend('pendataan/layout/pendataan_layout') ?>

<?= $this->section('content') ?>

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Edit Pengguna
                <small>
                    <?php echo $pengguna['nama_pengguna']; ?>
                </small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('pendataan') ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
                <li><a href="<?php echo base_url('pendataan/pengguna') ?>"> Data Pengguna</a></li>
                <li class="active">Edit Pengguna</li>
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
                        <form class="edit_pengguna" id="edit_pengguna">
                            <div class="box-body">

                                <div class="form-group">
                                    <label>ID Pengguna</label>
                                    <input id="id_pengguna" name="id_pengguna" type="text" value="<?php echo $pengguna['id_pengguna']; ?>" class="form-control" required="" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Username (*)</label>
                                    <input id="username" name="username" type="text" value="<?php echo $pengguna['username']; ?>" class="form-control" placeholder="Masukkan Username" onfocus="this.placeholder = 'Hanya Boleh Memasukkan Huruf & Angka'" onblur="this.placeholder = 'Masukkan Username'" required="" pattern="[a-zA-Z0-9]{1,}" oninvalid="this.setCustomValidity('Username Pengguna Tidak Boleh Kosong dan Hanya Boleh Memasukkan Huruf & Angka')" oninput="setCustomValidity('')">
                                </div>

                                <div class="form-group">
                                    <label>Nama Pengguna (*)</label>
                                    <input id="nama_pengguna" name="nama_pengguna" type="text" value="<?php echo $pengguna['nama_pengguna']; ?>" class="form-control" placeholder="Masukkan Nama Pengguna" onfocus="this.placeholder = 'Hanya Boleh Memasukkan Huruf'" onblur="this.placeholder = 'Masukkan Nama Pengguna'" required="" pattern="[a-zA-Z ]{1,}" oninvalid="this.setCustomValidity('Nama Pengguna Tidak Boleh Kosong dan Hanya Boleh Memasukkan Huruf')" oninput="setCustomValidity('')">
                                </div>

                                <div class="form-group">
                                    <label>Email (*)</label>
                                    <input id="email" name="email" type="email" value="<?php echo $pengguna['email']; ?>" class="form-control" placeholder="Masukkan Email" onfocus="this.placeholder = 'Masukkan Email'" onblur="this.placeholder = 'Masukkan Email'" required="" oninvalid="this.setCustomValidity('Format Email Yang Anda Masukkan Salah')" oninput="setCustomValidity('')">
                                </div>
                                
                                <div class="form-group">
                                    <label>Role (*)</label>
                                    <select id="role" name="role" class="form-control" required="" oninvalid="this.setCustomValidity('Role Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                                        <option value="">Pilih Kategori</option>

                                        <?php foreach ($role_es as $role) : ?>
                                            <option value=<?php echo $role['id_role'] ?> <?php echo ($pengguna['role'] == $role['id_role'])? "selected": ""; ?>><?php echo $role['deskripsi'] ?></option>
                                        <?php endforeach; ?>   

                                    </select>
                                </div>

                                <p class="help-block">
                                    Catatan : <br>
                                    - Tanda dengan (*) wajib diisi! <br>
                                    - <b>ID Pengguna</b> tidak dapat diubah! <br>
                                </p>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Edit Pengguna</button>
                                <button type="Reset" class="btn btn-danger">Reset</button>
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
        $('.edit_pengguna').submit(function(e){
            e.preventDefault();     

            var id_pengguna = $('#id_pengguna').val();

            $.ajax({
                type: "post",
                url: "<?=base_url('pendataan/edit_pengguna')?>",
                data: new FormData(this),
                processData:false,
                contentType:false,
                cache:false,
                async:false,
                success: function (data) {
                    if (data == "sukses") {
                        Swal.fire({
                            icon: 'success',
                            text: 'Data Berhasil di Perbaharui.',
                            showConfirmButton: false,
                            timer: 2000
                        })
                        
                        document.getElementById("alert-sukses").style.display = "block";
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
                                window.location.assign('<?=base_url('pendataan/pengguna')?>'+'/'+id_pengguna);
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
                            window.location.assign('<?=base_url('pendataan/pengguna')?>'+'/'+id_pengguna);
                        }
                    }) 
                }
            })       

            return false; 
        });   
    </script>

<?= $this->endSection() ?>