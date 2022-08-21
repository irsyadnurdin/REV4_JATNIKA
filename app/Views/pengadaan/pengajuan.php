<?= $this->extend('pengadaan/layout/pengadaan_layout') ?>

<?= $this->section('content') ?>

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Pengajuan Pengadaan
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('pengadaan') ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
                <li><a href="<?php echo base_url('pengadaan/pengadaan') ?>">Lihat Data</a></li>
                <li class="active">Pengajuan Pengadaan</li>
            </ol>
        </section>

        <section class="content">

            <div class="row">
                <div class="col-md-3">
                    <div class="box box-primary box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title">Cari Periode Pengecekan</h3>
                        </div>
                        <div class="box-body">

                            <form class="cari_pengecekan" id="cari_pengecekan" method="post">
                                <div class="form-group">
                                    <select id="id_pengecekan" name="id_pengecekan" class="form-control" required="" oninvalid="this.setCustomValidity('Periode Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                                        <option value="">Pilih Periode</option>

                                        <?php foreach ($pengecekan_es as $pengecekan) : ?>
                                            <option value=<?php echo $pengecekan['id_pengecekan'] ?>> <?php echo $pengecekan['_periode'] ?></option>
                                        <?php endforeach; ?>   

                                    </select>
                                </div>

                                <button type="submit" class="btn btn-block btn-primary">Cari</button>
                            </form>
                            
                        </div>
                    </div>

                    <div class="box box-primary box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title">Detail Pengecekan</h3>
                        </div>
                        <div class="box-footer no-padding">
                            <ul class="nav nav-stacked">
                                <li class="active">
                                    <a href="#tab_2" data-toggle="tab">
                                        Masih Bisa Diperbaiki
                                        <span class="pull-right badge bg-blue" id="jumlah_2"><?php echo $jumlah[2] ?></span>
                                    </a>
                                </li>

                                <li>
                                    <a href="#tab_3" data-toggle="tab">
                                        Rusak
                                        <span class="pull-right badge bg-blue" id="jumlah_3"><?php echo $jumlah[3] ?></span>
                                    </a>
                                </li>
                            </ul>
                            
                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="box box-primary box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title">Data Pengecekan </h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="nav-tabs-custom">
                                <div class="tab-content">

                                    <div class="tab-pane active" id="tab_2">
                                        <?= view_cell('\App\Libraries\Widget::pengecekan', ['id_tabel' => 'pengecekan_2', 'id_pengecekan' => $id_pengecekan, 'kondisi' => 2]) ?>
                                    </div>

                                    <div class="tab-pane" id="tab_3">
                                        <?= view_cell('\App\Libraries\Widget::pengecekan', ['id_tabel' => 'pengecekan_3', 'id_pengecekan' => $id_pengecekan, 'kondisi' => 3]) ?>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div id="alert-sukses" class="bg-light-blue alert alert-dismissible" style="display:none">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-check"></i> Data Berhasil Disimpan!</h4>
                    </div>

                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Lengkapi Semua Data!</h3>
                        </div>
                        <form class="tambah_pengadaan" id="tambah_pengadaan">
                            <div class="box-body">

                                <div class="form-group">
                                    <label>Nama Barang (*)</label>
                                    <input id="nama_barang" name="nama_barang" type="text" class="form-control" placeholder="Masukkan Nama Barang" onfocus="this.placeholder = 'Masukkan Nama Barang'" onblur="this.placeholder = 'Masukkan Nama Barang'" required="" oninvalid="this.setCustomValidity('Nama Barang Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                                </div>

                                <div class="form-group">
                                    <label>Merk/Type (*)</label>
                                    <input id="merk" name="merk" type="text" class="form-control" placeholder="Masukkan Merk/Type" onfocus="this.placeholder = 'Masukkan Merk/Type'" onblur="this.placeholder = 'Masukkan Merk/Type'" required="" oninvalid="this.setCustomValidity('Merk/Type Harus Diisi')" oninput="setCustomValidity('')">
                                </div>

                                <div class="form-group">
                                    <label>Jumlah (*)</label>
                                    <input id="jumlah" name="jumlah" min="1" type="number" class="form-control" placeholder="Masukkan Jumlah Barang" onfocus="this.placeholder = 'Jumlah Barang Tidak Boleh Kosong dan Hanya Boleh Memasukkan Angka'" onblur="this.placeholder = 'Masukkan Jumlah Barang'" required="" pattern="[0-9]{1,}" oninvalid="this.setCustomValidity('Hanya Boleh Memasukkan Angka')" oninput="setCustomValidity('')">
                                </div>

                                <div class="form-group">
                                    <label>Harga Satuan (*)</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">Rp</span>
                                        <input id="harga_satuan" name="harga_satuan" min="1" type="number" class="form-control" placeholder="Masukkan Harga Satuan Barang" onfocus="this.placeholder = 'Harga Satuan Barang Tidak Boleh Kosong dan Hanya Boleh Memasukkan Angka'" onblur="this.placeholder = 'Masukkan Harga Satuan Barang'" required="" pattern="[0-9]{1,}" oninvalid="this.setCustomValidity('Hanya Boleh Memasukkan Angka')" oninput="setCustomValidity('')">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Total Harga (*)</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">Rp</span>
                                        <input id="total_harga" name="total_harga" min="1" type="number" class="form-control" placeholder="Masukkan Total Harga" onfocus="this.placeholder = 'Total Harga Tidak Boleh Kosong dan Hanya Boleh Memasukkan Angka'" onblur="this.placeholder = 'Masukkan Total Harga'" required="" pattern="[0-9]{1,}" oninvalid="this.setCustomValidity('Hanya Boleh Memasukkan Angka')" oninput="setCustomValidity('')">
                                    </div>
                                </div>

                                <p class="help-block">
                                    Catatan : <br>
                                    - Tanda dengan (*) wajib diisi! <br>
                                </p>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Tambah Pengadaan</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
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
            $('#menu-pengadaan').addClass('active');

            $('#pengecekan_2').DataTable({
                'autoWidth'   : false,
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

            $('#pengecekan_3').DataTable({
                'autoWidth'   : false,
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

    <script type="text/javascript">
        $('.tambah_pengadaan').submit(function(e){
            e.preventDefault();     

            $.ajax({
                type: "post",
                url: "<?=base_url('pengadaan/tambah_pengadaan')?>",
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
                            showConfirmButton: false,
                            timer: 1500
                        })

                        $('#nama_barang').val('');
                        $('#merk').val('');
                        $('#jumlah').val('');
                        $('#harga_satuan').val('');
                        $('#total_harga').val('');

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
                                window.location.assign('<?=base_url('pengadaan/pengadaan_tambah')?>');
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
                            window.location.assign('<?=base_url('pengadaan/pengadaan_tambah')?>');
                        }
                    }) 
                }
            })              

            return false; 
        });
    </script>


<?= $this->endSection() ?>