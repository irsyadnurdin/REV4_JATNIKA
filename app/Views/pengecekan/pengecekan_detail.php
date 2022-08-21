<?= $this->extend('pengecekan/layout/pengecekan_layout') ?>

<?= $this->section('content') ?>

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Data Pengecekan Detail
                <!-- <small>advanced tables</small> -->
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('pengecekan') ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
                <li class="active">Data Pengecekan Detail</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                
                <div class="col-md-3">
                    <div class="box box-primary box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title">Detail Pengecekan</h3>
                        </div>
                        <div class="box-footer no-padding">
                            <ul class="nav nav-stacked">
                                
                                <?php 
                                    $i = 0;
                                    foreach ($kriteria_es as $kriteria) : ?>
                                    
                                    <li>
                                        <a href="#">
                                            <?php echo $kriteria['nama_kriteria']; ?> 
                                            <span class="pull-right badge bg-blue" id="jumlah_<?php echo $kriteria['id_kriteria'] ?>">
                                                <?php echo $jumlah[$i]; ?>
                                            </span>
                                        </a>
                                    </li>

                                <?php $i++; endforeach ?>
                            </ul>
                            
                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Anda dapat melihat data Pengecekan Detail disini</h3>
                        </div>
                        <div class="box-body">
                            <table id="temp_tabel3" class="table table-bordered table-striped display nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Barang</th>
                                        <th>NUP</th>
                                        <th>Nama Barang</th>
                                        <th>Merk/Type</th>
                                        <th>Kondisi</th>
                                        <th>Catatan</th>
                                        <th>Upload</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php 
                                        $i = 1;
                                        foreach ($pengecekan_detail_es as $pengecekan_detail) : ?>

                                        <tr>
                                            <td><?php echo $i++ ?></td>
                                            <td><?php echo $pengecekan_detail['kode_barang'] ?></td>
                                            <td><?php echo $pengecekan_detail['nup'] ?></td>
                                            <td><?php echo $pengecekan_detail['nama_barang'] ?></td>
                                            <td><?php echo $pengecekan_detail['merk'] ?></td>

                                            <!-- <div class="form-group"> -->
                                            <form class="edit_pengecekan_detail" id="edit_pengecekan_detail"> 
                                                <input type="hidden" id="id_pengecekan_detail" name="id_pengecekan_detail" value="<?php echo $pengecekan_detail['id_pengecekan_detail'] ?>">

                                                <td>
                                                    <div class="form-group">

                                                        <?php foreach ($kriteria_es as $kriteria) : ?>
                                                            <div class="radio">
                                                                <label>
                                                                    <?php if (($kriteria['id_kriteria']) == ($pengecekan_detail['kondisi'])): ?>
                                                                        <input type="radio" name="kondisi" id="kondisi" value="<?php echo $kriteria['id_kriteria'] ?>" id_pengecekan_detail="<?php echo $pengecekan_detail['id_pengecekan_detail'] ?>" checked="">
                                                                    <?php endif; ?>
                                                                    
                                                                    <?php if (($kriteria['id_kriteria']) != ($pengecekan_detail['kondisi'])): ?>
                                                                        <input type="radio" name="kondisi" id="kondisi" value="<?php echo $kriteria['id_kriteria'] ?>" id_pengecekan_detail="<?php echo $pengecekan_detail['id_pengecekan_detail'] ?>">
                                                                    <?php endif; ?>

                                                                    <?php echo $kriteria['nama_kriteria'] ?>
                                                                </label>
                                                            </div>
                                                        <?php endforeach ?>

                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="form-group" style="width:300px">
                                                        <textarea id="catatan" name="catatan" class="form-control" rows="3" placeholder="Masukkan Catatan (Opsional)"><?php echo $pengecekan_detail['catatan'] ?></textarea>
                                                    </div>
                                                </td>
                                                
                                                <td>
                                                    <div class="form-group">
                                                        <?php if ($pengecekan_detail['foto'] != ""): ?>
                                                            <a class="image-popup-vertical-fit" href="<?= base_url('_img/pengecekan/'.$pengecekan_detail['foto']) ?>">
                                                                <i class="fa fa-check"></i> Sudah Upload
                                                            </a>
                                                        <?php endif; ?>
                                                
                                                        <input id="foto" name="foto" type="file" required="">
                                                    </div>
                                                </td>

                                                <td>
                                                    <button type="submit" >
                                                        <i class="fa fa-save"></i>
                                                    </button>
                                                </td>
                                            </form> 
                                                
                                        </tr>
                                    
                                    <?php endforeach ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Barang</th>
                                        <th>NUP</th>
                                        <th>Nama Barang</th>
                                        <th>Merk/Type</th>
                                        <th>Kondisi</th>
                                        <th>Catatan</th>
                                        <th>Upload</th>
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
            $('#menu-pengecekan').addClass('active');
        })
    </script>

    <script type="text/javascript">
        $('.edit_pengecekan_detail').submit(function(e){
            e.preventDefault();     

            var id_pengecekan = "<?=$id?>";
            
            $.ajax({
                type: "post",
                url: "<?=base_url('pengecekan/edit_pengecekan_detail')?>",
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
                            timer: 1000
                        })

                        $.ajax({
                            type: "post",
                            url: "<?=base_url('pengecekan/get_jumlah_pengecekan')?>",
                            dataType:'json',
                            data: {
                                id_pengecekan:id_pengecekan,
                            },
                            success: function (data) {
                                $('#jumlah_0').html(data.kondisi_0);
                                $('#jumlah_1').html(data.kondisi_1);
                                $('#jumlah_2').html(data.kondisi_2);
                                $('#jumlah_3').html(data.kondisi_3);
                            },
                            error: function() {
                                // 
                            }
                        }) 
                    } else if (data == "gagal") {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Terjadi Kesalahan Saat Mengirim Data. Silahkan muat ulang halaman!',
                        })
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Kesalahan tidak diketahui. Silahkan muat ulang halaman!',
                        })
                    }   
                },
                error: function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Kesalahan tidak diketahui. Silahkan muat ulang halaman!',
                    })
                }
            })    

            return false; 
        });
    </script>

<?= $this->endSection() ?>