<?= $this->extend('pengadaan/layout/pengadaan_layout') ?>

<?= $this->section('content') ?>

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Data Pengecekan
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('pengecekan') ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
                <li class="active">Data Pengecekan</li>
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

                                <?php 
                                    $i = 0;
                                    foreach ($kriteria_es as $kriteria) : ?>
                                    
                                    <?php echo (($i == 0)? '<li class="active">' : '<li>'); $i++; ?>
                                        <a href="#tab_<?php echo $kriteria['id_kriteria']; ?>" data-toggle="tab">
                                            <?php echo $kriteria['nama_kriteria']; ?> 
                                            <span class="pull-right badge bg-blue" id="jumlah_<?php echo $kriteria['id_kriteria'] ?>">
                                                <?php echo $jumlah[$i-1] ?>
                                            </span>
                                        </a>
                                    </li>

                                <?php endforeach ?>

                            </ul>
                            
                        </div>
                    </div>
                </div>

                <div class="col-md-9 col-xs-9">
                    <div class="nav-tabs-custom">
                        <div class="tab-content">

                            <div class="tab-pane active" id="tab_0">
                                <?= view_cell('\App\Libraries\Widget::pengecekan', ['id_tabel' => 'pengecekan_0', 'id_pengecekan' => $id_pengecekan, 'kondisi' => 0]) ?>
                            </div>
                            
                            <div class="tab-pane" id="tab_1">
                                <?= view_cell('\App\Libraries\Widget::pengecekan', ['id_tabel' => 'pengecekan_1', 'id_pengecekan' => $id_pengecekan, 'kondisi' => 1]) ?>
                            </div>
                            
                            <div class="tab-pane" id="tab_2">
                                <?= view_cell('\App\Libraries\Widget::pengecekan', ['id_tabel' => 'pengecekan_2', 'id_pengecekan' => $id_pengecekan, 'kondisi' => 2]) ?>
                            </div>

                            <div class="tab-pane" id="tab_3">
                                <?= view_cell('\App\Libraries\Widget::pengecekan', ['id_tabel' => 'pengecekan_3', 'id_pengecekan' => $id_pengecekan, 'kondisi' => 3]) ?>
                            </div>

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
            $('#menu-master').addClass('active');

            $('#pengecekan_0').DataTable({
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

            $('#pengecekan_1').DataTable({
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

            $('#pengecekan_2').DataTable({
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

<?= $this->endSection() ?>