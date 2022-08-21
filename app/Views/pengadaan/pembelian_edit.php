<?= $this->extend('pengadaan/layout/pengadaan_layout') ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
        <section class="content-header">
            <h1>
                Edit Pembelian
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('pengadaan') ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
                <li><a href="<?php echo base_url('pengadaan/pembelian') ?>"> Data Pembelian</a></li>
                <li class="active">Edit Pembelian</li>
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
                        <form class="edit_pembelian" id="edit_pembelian">
                            <div class="box-body">

                                <div class="form-group">
                                    <label>ID Pembelian</label>
                                    <input id="id_pembelian" name="id_pembelian" type="text" value="<?php echo $pembelian['id_pembelian']; ?>" class="form-control" required="" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Nama Barang (*)</label>
                                    <input id="nama_barang" name="nama_barang" type="text" value="<?php echo $pembelian['nama_barang']; ?>" class="form-control" placeholder="Masukkan Nama Barang" onfocus="this.placeholder = 'Masukkan Nama Barang'" onblur="this.placeholder = 'Masukkan Nama Barang'" required="" oninvalid="this.setCustomValidity('Nama Barang Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                                </div>

                                <div class="form-group">
                                    <label>Merk/Type (*)</label>
                                    <input id="merk" name="merk" type="text" value="<?php echo $pembelian['merk']; ?>" class="form-control" placeholder="Masukkan Merk/Type" onfocus="this.placeholder = 'Masukkan Merk/Type'" onblur="this.placeholder = 'Masukkan Merk/Type'" required="" oninvalid="this.setCustomValidity('Merk/Type Harus Diisi')" oninput="setCustomValidity('')">
                                </div>

                                <div class="form-group">
                                    <label>Jumlah (*)</label>
                                    <input id="jumlah" name="jumlah" min="1" type="number" value="<?php echo $pembelian['jumlah']; ?>" class="form-control" placeholder="Masukkan Jumlah Barang" onfocus="this.placeholder = 'Jumlah Barang Tidak Boleh Kosong dan Hanya Boleh Memasukkan Angka'" onblur="this.placeholder = 'Masukkan Jumlah Barang'" required="" pattern="[0-9]{1,}" oninvalid="this.setCustomValidity('Hanya Boleh Memasukkan Angka')" oninput="setCustomValidity('')">
                                </div>

                                <div class="form-group">
                                    <label>Harga (*)</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">Rp</span>
                                        <input id="harga" name="harga" min="1" type="number" value="<?php echo $pembelian['harga']; ?>" class="form-control" placeholder="Masukkan Harga Barang" onfocus="this.placeholder = 'Harga Barang Tidak Boleh Kosong dan Hanya Boleh Memasukkan Angka'" onblur="this.placeholder = 'Masukkan Harga Barang'" required="" pattern="[0-9]{1,}" oninvalid="this.setCustomValidity('Hanya Boleh Memasukkan Angka')" oninput="setCustomValidity('')">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Tanggal Pembelian (*) </label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input id="tgl_pembelian" name="tgl_pembelian" type="text" value="<?php echo $pembelian['tgl_pembelian']; ?>" class="form-control pull-right" required="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Asal Perolehan</label>
                                    <input id="asal_perolehan" name="asal_perolehan" type="text" value="<?php echo $pembelian['asal_perolehan']; ?>" class="form-control" placeholder="Masukkan Asal Perolehan" onfocus="this.placeholder = 'Masukkan Asal Perolehan'" onblur="this.placeholder = 'Masukkan Asal Perolehan'">
                                </div>

                                <div class="form-group">
                                    <label>Foto</label>
                                    <input id="foto" name="foto" type="file">
                                </div>

                                <p class="help-block">
                                    Catatan : <br>
                                    - Tanda dengan (*) wajib diisi! <br>
                                    - <b>ID Pembelian</b> tidak dapat diubah! <br>
                                </p>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Edit Pembelian</button>
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
            $('#menu-pembelian').addClass('active');
        })
    </script>

    <script>
        $(function () {
            $("#tgl_pembelian").datepicker( {
                format: "yyyy-mm-dd",
                startView: "years", 
            });
        })
    </script> 

    <script type="text/javascript">
        $('.edit_pembelian').submit(function(e){
            e.preventDefault();     

            var id_pembelian = $('#id_pembelian').val();

            $.ajax({
                type: "post",
                url: "<?=base_url('pengadaan/edit_pembelian')?>",
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
                    } else if (data == "kode_produk_sudah_terdaftar") {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Kode Produk Sudah Terdaftar. Silahkan Coba Lagi!',
                            showConfirmButton: false,
                            timer: 2000
                        })

                        $('#kode_produk').val('');
                        $('#kode_produk').focus();
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
                                window.location.assign('<?=base_url('pengadaan/pembelian')?>'+'/'+id_pembelian);
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
                            window.location.assign('<?=base_url('pengadaan/pembelian')?>'+'/'+id_pembelian);
                        }
                    }) 
                }
            })       

            return false; 
        });   
    </script>

<?= $this->endSection() ?>