<div class="box-header">
    <h3 class="box-title">Anda Dapat Melihat Data Pengajuan Pengadaan</h3>
    
    <?php if ($tambah != false): ?> 
        <a href="<?php echo base_url('pengadaan/pengajuan') ?>" type="button" class="btn btn-block btn-primary" style="width: auto;float: right;">
            Tambah Pengajuan
        </a>
    <?php endif; ?>
    
</div>
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
                        <a class="detail_pengadaan" value="<?php echo $pengadaan['id_pengadaan'] ?>" href="" data-toggle="tooltip" data-original-title="Detail Pengadaan" style="margin-right:10px">
                            <i class="fa fa-eye"></i>
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
                <th>Harga Satuan</th>
                <th>Total Harga</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
</div>