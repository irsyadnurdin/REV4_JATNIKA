<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table      = 'barang';
    protected $primaryKey = 'id_barang';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['kode_barang', 'nup', 'nama_barang', 'merk', 'tgl_rekap', 'tgl_perolehan', 'pemegang', 'asal_perolehan', 'active'];

    
}