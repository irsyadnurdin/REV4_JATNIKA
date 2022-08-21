<?php

namespace App\Models;

use CodeIgniter\Model;

class PembelianModel extends Model
{
    protected $table      = 'pembelian';
    protected $primaryKey = 'id_pembelian';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['nama_barang', 'merk', 'asal_perolehan', 'jumlah', 'harga', 'tgl_pembelian', 'foto'];

    
}