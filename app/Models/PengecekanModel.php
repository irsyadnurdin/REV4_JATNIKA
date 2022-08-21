<?php

namespace App\Models;

use CodeIgniter\Model;

class PengecekanModel extends Model
{
    protected $table      = 'pengecekan';
    protected $primaryKey = 'id_pengecekan';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['periode'];
}