<?= $this->extend('pengadaan/layout/pengadaan_layout') ?>

<?= $this->section('content') ?>

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Data Pembelian
                <!-- <small>advanced tables</small> -->
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('pendataan') ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
                <li class="title-data active">Data Pembelian</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Filter Data (Spesifik)</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="box-body">

                            <form action="<?php echo base_url('pengadaan/pembelian') ?>" method="post">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Tanggal Pembelian </label>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input id="tgl_pembelian" name="tgl_pembelian" value="<?php echo $tgl_pembelian_filter ?>" type="text" class="form-control pull-right" autocomplete="off" readonly="">
                                            </div>
                                        </div>
                                    </div>
                                
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-block btn-primary">Filter</button>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="<?php echo base_url('pengadaan/pembelian') ?>" class="btn btn-block btn-danger">
                                            Reset
                                        </a>
                                    </div>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Anda dapat melihat data Pembelian disini</h3>
                            <a href="<?php echo base_url('pengadaan/pembelian_tambah') ?>" type="button" class="btn btn-block btn-primary" style="width: auto;float: right;">
                                Tambah Data Pembelian
                            </a>
                        </div>
                        <div class="box-body">
                            <table id="print_tabel2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Merk/Type</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                        <th>Tanggal Pembelian</th>
                                        <th>Asal Perolehan</th>
                                        <th>Bukti Pembelian</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php 
                                        $i = 1;
                                        foreach ($pembelian_es as $pembelian) : ?>

                                        <tr>
                                            <td><?php echo $i++ ?></td>
                                            <td><?php echo $pembelian['nama_barang'] ?></td>
                                            <td><?php echo $pembelian['merk'] ?></td>
                                            <td><?php echo $pembelian['jumlah'] ?></td>
                                            <td>Rp <?php echo number_format($pembelian['harga'], 2, ',', '.') ?></td>
                                            <td><?php echo $pembelian['_tgl_pembelian'] ?></td>
                                            <td><?php echo $pembelian['asal_perolehan'] ?></td>
                                            <td>
                                                <a class="image-popup-vertical-fit" href="<?= base_url('_img/pembelian/'.$pembelian['foto']) ?>" data-toggle="tooltip" data-original-title="Lihat Foto">
                                                    <i class="fa fa-image"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url('pengadaan/pembelian/'.$pembelian['id_pembelian']) ?>" style="margin-right:10px">
                                                    <i class="fa fa-edit"></i>
                                                </a> 
                                                <a class="hapus_pembelian" value="<?php echo $pembelian['id_pembelian'] ?>" href="">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    
                                    <?php endforeach ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Merk/Type</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                        <th>Tanggal Pembelian</th>
                                        <th>Asal Perolehan</th>
                                        <th>Bukti Pembelian</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
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
            $('#menu-pembelian').addClass('active');
        })
    </script>

    <script>
        $(function () {
            $("#tgl_pembelian").datepicker( {
                format: "yyyy-mm-dd",
                startView: "years", 
                // minViewMode: "months"
            });
        })
    </script> 

    <script>
        $('.hapus_pembelian').on('click', function (e) {
            e.preventDefault();

            var id_pembelian = $(this).parent().find('.hapus_pembelian').attr("value");

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
                        url : '<?=base_url('pengadaan/hapus_pembelian')?>',
                        data: {
                            id_pembelian:id_pembelian,
                        }, 
                        success: function (data) {
                            if (data == "sukses") {
                                Swal.fire({
                                    icon: 'success',
                                    text: 'Data Berhasil Dihapus!',
                                    showConfirmButton: false,
                                    timer: 2000
                                });

                                window.location.assign('<?=base_url('pengadaan/pembelian')?>');
                            } else if (data == "gagal") {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Data Gagal Dihapus, Halaman akan dimuat ulang!',
                                }).then((result) => {
                                    if (result.value) {
                                        window.location.assign('<?=base_url('pengadaan/pembelian')?>');
                                    }
                                }) 
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Kesalahan tidak diketahui. Halaman akan dimuat ulang!',
                                }).then((result) => {
                                    if (result.value) {
                                        window.location.assign('<?=base_url('pengadaan/pembelian')?>');
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
                                    window.location.assign('<?=base_url('pengadaan/pembelian')?>');
                                }
                            }) 
                        }	
                    });
                }
            });
        })
    </script> 

<?= $this->endSection() ?>