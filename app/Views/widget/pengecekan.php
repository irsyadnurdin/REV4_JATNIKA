<div class="box-body">
    <table id="<?php echo $id_tabel ?>" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>NUP</th>
                <th>Nama Barang</th>
                <th>Merk/Type</th>
                <th>Catatan</th>
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
                    <td><?php echo $pengecekan_detail['catatan'] ?></td>
                    <td>
                        <?php if ($pengecekan_detail['foto'] != ""): ?>
                            <a class="image-popup-vertical-fit" href="<?= base_url('_img/pengecekan/'.$pengecekan_detail['foto']) ?>" data-toggle="tooltip" data-original-title="Lihat Foto">
                                <i class="fa fa-image"></i>
                            </a>
                        <?php endif; ?>
                    </td>                        
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
                <th>Catatan</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
</div>