<?php

namespace App\Models;

use CodeIgniter\Model;

class PengadaanModel extends Model
{
    protected $table      = 'pengadaan';
    protected $primaryKey = 'id_pengadaan';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['nama_barang_pengadaan', 'merk_pengadaan', 'jumlah_pengadaan', 'harga_satuan', 'total_harga', 'status', 'keterangan'];
}