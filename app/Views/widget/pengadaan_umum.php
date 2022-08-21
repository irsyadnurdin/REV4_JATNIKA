<div class="box-body">
    <table id="<?php echo $id_tabel ?>" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Merk/Type</th>
                <th>Jumlah</th>
                <th>Harga Satuan</th>
                <th>Total Harga</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $i = 1;
                foreach ($pengadaan_es as $pengadaan) : ?>

                <tr>
                    <td><?php echo $i++ ?></td>
                    <td><?php echo $pengadaan['nama_barang_pengadaan'] ?></td>
                    <td><?php echo $pengadaan['merk_pengadaan'] ?></td>
                    <td><?php echo $pengadaan['jumlah_pengadaan'] ?></td>
                    <td><?php echo "Rp " . number_format($pengadaan['harga_satuan'], 2, ',', '.') ?></td>
                    <td><?php echo "Rp " . number_format($pengadaan['total_harga'], 2, ',', '.') ?></td>
                    <td><?php echo $pengadaan['deskripsi_status'] ?></td>
                    <td>

                        <?php if ($pengadaan['status'] == 0): ?>
                            <a class="terima_pengajuan" value="<?php echo $pengadaan['id_pengadaan'] ?>" href="" data-toggle="tooltip" data-original-title="Terima Pengadaan" style="margin-right:10px">
                                <i class="fa fa-check-circle" style="color:#1cc88a"></i>
                            </a>
                            <a class="tolak_pengajuan" value="<?php echo $pengadaan['id_pengadaan'] ?>" href="" data-toggle="tooltip" data-original-title="Tolak Pengadaan" style="margin-right:10px">
                                <i class="fa fa-times-circle" style="color:#e74a3b"></i>
                            </a>
                        <?php endif; ?>

                        <!-- <a class="reset_password" value="<?php echo $pengadaan['id_pengadaan'] ?>" href="" data-toggle="tooltip" data-original-title="Tambah Catatan" style="margin-right:10px">
                            <i class="fa fa-commenting-o"></i>
                        </a> -->

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
                <th>Harga Satuan</th>
                <th>Total Harga</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
</div>