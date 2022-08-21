<?= $this->extend('pengadaan/layout/pengadaan_layout') ?>

<?= $this->section('content') ?>

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Data Pengadaan
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('pengadaan') ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
                <li class="active">Data Pengadaan</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            
                            <?php 
                                $i = 1;
                                foreach ($status_es as $status) : ?>
                                
                                <?php echo (($i == 1)? '<li class="active">' : '<li>'); $i++; ?>
                                    <a href="#tab_<?php echo $status['id_status']; ?>" data-toggle="tab">
                                        <?php echo $status['deskripsi_status']; ?>
                                    </a>
                                </li>

                            <?php endforeach ?>

                        </ul>

                        <div class="tab-content">
                            
                            <div class="active tab-pane" id="tab_0">
                                <?= view_cell('\App\Libraries\Widget::pengadaan', ['id_tabel' => 'pengadaan_0', 'status' => 0, 'tambah' => true]) ?>
                            </div>

                            <div class="tab-pane" id="tab_1">
                                <?= view_cell('\App\Libraries\Widget::pengadaan', ['id_tabel' => 'pengadaan_1', 'status' => 1, 'tambah' => true]) ?>
                            </div>

                            <div class="wtf tab-pane" id="tab_2">
                                <?= view_cell('\App\Libraries\Widget::pengadaan', ['id_tabel' => 'pengadaan_2', 'status' => 2, 'tambah' => true]) ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade in" id="Modal-Detail">
                <div class="modal-dialog" style="width: 50%;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                            <h4 class="modal-title">Detail Pengadaan</h4>
                        </div>

                        <div class="modal-body">
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">ID Pengadaan</label>
                                    <div class="col-sm-9">
                                        <input id="id_pengadaan" class="form-control" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Nama Barang</label>
                                    <div class="col-sm-9">
                                        <input id="nama_barang_pengadaan" class="form-control" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Merk/Type</label>
                                    <div class="col-sm-9">
                                        <input id="merk_pengadaan" class="form-control" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Jumlah</label>
                                    <div class="col-sm-9">
                                        <input id="jumlah_pengadaan" class="form-control" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Harga Satuan</label>
                                    <div class="col-sm-9">
                                        <input id="harga_satuan" class="form-control" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Total Harga</label>
                                    <div class="col-sm-9">
                                        <input id="total_harga" class="form-control" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Status</label>
                                    <div class="col-sm-9">
                                        <input id="status" class="form-control" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Keterangan</label>
                                    <div class="col-sm-9">
                                        <textarea id="keterangan" class="form-control" readonly></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Tanggal Konfirmasi</label>
                                    <div class="col-sm-9">
                                        <input id="tanggal_konfirmasi" class="form-control" readonly>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
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
            $('#menu-pengadaan').addClass('active');

            $('#pengadaan_0').DataTable({
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
            $('#pengadaan_1').DataTable({
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
            $('#pengadaan_2').DataTable({
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

    <script>
        $('.detail_pengadaan').on('click', function (e) {
            e.preventDefault();

            var id_pengadaan = $(this).parent().find('.detail_pengadaan').attr("value");

            $('#id_pengadaan').val(id_pengadaan);

            $.ajax({
                type : 'POST',
                url : '<?=base_url('pengadaan/get_detail_pengadaan')?>',
                dataType:'json',
                data: {
                    id_pengadaan:id_pengadaan,
                }, 
                success: function (data) {
                    $('#id_pengadaan').val(data.id_pengadaan);
                    $('#nama_barang_pengadaan').val(data.nama_barang_pengadaan);
                    $('#merk_pengadaan').val(data.merk_pengadaan);
                    $('#jumlah_pengadaan').val(data.jumlah_pengadaan);
                    $('#harga_satuan').val(data.harga_satuan);
                    $('#total_harga').val(data.total_harga);
                    $('#status').val(data.status);
                    $('#keterangan').html(data.keterangan);

                    if (data.key == 0) {
                        $('#tanggal_konfirmasi').val("-");
                    } else {
                        $('#tanggal_konfirmasi').val(data.tanggal_konfirmasi);
                    }

                    $('#Modal-Detail').modal('toggle');
                    $('.detail_pengadaan').tooltip('hide');
                },
                error: function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Kesalahan tidak diketahui. Halaman akan dimuat ulang!',
                    }).then((result) => {
                        if (result.value) {
                            window.location.assign('<?=base_url('pengadaan/pengadaan')?>');
                        }
                    }) 
                }	
            });

            return false;
        })
    </script>

<?= $this->endSection() ?>