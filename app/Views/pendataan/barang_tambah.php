<?= $this->extend('pendataan/layout/pendataan_layout') ?>

<?= $this->section('content') ?>

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Tambah Data Barang
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('pendataan') ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
                <li><a href="<?php echo base_url('pendataan/barang') ?>">Data Barang</a></li>
                <li class="active">Tambah Data Barang</li>
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
                        <form class="tambah_barang" id="tambah_barang">
                            <div class="box-body">

                                <div class="form-group">
                                    <label>Kode Barang (*)</label>
                                    <input id="kode_barang" name="kode_barang" type="text" class="form-control" placeholder="Masukkan Kode Barang" onfocus="this.placeholder = 'Hanya Boleh Memasukkan Huruf, Angka, Titik & Spasi (16 Digit)'" onblur="this.placeholder = 'Masukkan Kode Barang'" required="" pattern="[a-zA-Z0-9 .]{16,16}" oninvalid="this.setCustomValidity('Kode Barang Tidak Boleh Kosong dan Hanya Boleh Memasukkan Huruf, Angka, Titik & Spasi (16 Digit)')" oninput="setCustomValidity('')">
                                </div>

                                <div class="form-group">
                                    <label>NUP (*)</label>
                                    <input id="nup" name="nup" type="text" class="form-control" placeholder="Masukkan NUP" onfocus="this.placeholder = 'Hanya Boleh Memasukkan Angka'" onblur="this.placeholder = 'Masukkan NUP'" required="" pattern="[0-9]{1,}" oninvalid="this.setCustomValidity('NUP Tidak Boleh Kosong dan Hanya Boleh Memasukkan Angka')" oninput="setCustomValidity('')">
                                </div>

                                <div class="form-group">
                                    <label>Nama Barang (*)</label>
                                    <input id="nama_barang" name="nama_barang" type="text" class="form-control" placeholder="Masukkan Nama Barang" onfocus="this.placeholder = 'Masukkan Nama Barang'" onblur="this.placeholder = 'Masukkan Nama Barang'" required="" oninvalid="this.setCustomValidity('Nama Barang Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                                </div>

                                <div class="form-group">
                                    <label>Merk/Type (*)</label>
                                    <input id="merk" name="merk" type="text" class="form-control" placeholder="Masukkan Merk/Type" onfocus="this.placeholder = 'Masukkan Merk/Type'" onblur="this.placeholder = 'Masukkan Merk/Type'" required="" oninvalid="this.setCustomValidity('Merk/Type Harus Diisi')" oninput="setCustomValidity('')">
                                </div>

                                <div class="form-group">
                                    <label>Tanggal Rekap Pertama (*) </label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input id="tgl_rekap" name="tgl_rekap" type="text" class="form-control pull-right" required="" autocomplete="off" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Tanggal Perolehan (*) </label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input id="tgl_perolehan" name="tgl_perolehan" type="text" class="form-control pull-right" required="" autocomplete="off" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Pemegang</label>
                                    <input id="pemegang" name="pemegang" type="text" class="form-control" placeholder="Masukkan Pemegang" onfocus="this.placeholder = 'Masukkan Pemegang'" onblur="this.placeholder = 'Masukkan Pemegang'">
                                </div>

                                <div class="form-group">
                                    <label>Asal Perolehan</label>
                                    <input id="asal_perolehan" name="asal_perolehan" type="text" class="form-control" placeholder="Masukkan Asal Perolehan" onfocus="this.placeholder = 'Masukkan Asal Perolehan'" onblur="this.placeholder = 'Masukkan Asal Perolehan'">
                                </div>

                                <p class="help-block">
                                    Catatan : <br>
                                    - Tanda dengan (*) wajib diisi! <br>
                                </p>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Tambah Barang</button>
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
            $('#menu-master').addClass('active');
        })
    </script>

    <script>
        $(function () {
            $("#tgl_rekap").datepicker( {
                format: "yyyy-mm-dd",
                startView: "years", 
            });
        })

        $(function () {
            $("#tgl_perolehan").datepicker( {
                format: "yyyy-mm-dd",
                startView: "years", 
            });
        })
    </script> 

    <script type="text/javascript">
        $('.tambah_barang').submit(function(e){
            e.preventDefault();     

            $.ajax({
                type: "post",
                url: "<?=base_url('pendataan/tambah_barang')?>",
                data: new FormData(this),
                processData:false,
                contentType:false,
                cache:false,
                async:false,
                success: function (data) {
                    if (data == "sukses") {
                        Swal.fire({
                            icon: 'success',
                            title: 'Data Berhasil Di Simpan',
                            showConfirmButton: false,
                            timer: 1500
                        })

                        $('#kode_barang').val('');
                        $('#nup').val('');
                        $('#nama_barang').val('');
                        $('#merk').val('');
                        $('#tgl_rekap').val('');
                        $('#tgl_perolehan').val('');
                        $('#pemegang').val('');
                        $('#asal_perolehan').val('');

                        document.getElementById("alert-sukses").style.display = "block";
                    } else if (data == "kode_barang_sudah_terdaftar") {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Kode Barang Sudah Terdaftar. Silahkan Coba Lagi!',
                            showConfirmButton: false,
                            timer: 2000
                        })

                        $('#kode_barang').val('');
                        $('#kode_barang').focus();
                    } else if (data == "nup_sudah_terdaftar") {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'NUP Sudah Terdaftar. Silahkan Coba Lagi!',
                            showConfirmButton: false,
                            timer: 2000
                        })

                        $('#nup').val('');
                        $('#nup').focus();
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
                                window.location.assign('<?=base_url('pendataan/barang_tambah')?>');
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
                            window.location.assign('<?=base_url('pendataan/barang_tambah')?>');
                        }
                    }) 
                }
            })              

            return false; 
        });
    </script>

<?= $this->endSection() ?>