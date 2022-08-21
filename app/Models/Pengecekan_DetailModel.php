<?php

namespace App\Models;

use CodeIgniter\Model;

class Pengecekan_DetailModel extends Model
{
    protected $table      = 'pengecekan_detail';
    protected $primaryKey = 'id_pengecekan_detail';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['kondisi', 'catatan', 'foto'];
}