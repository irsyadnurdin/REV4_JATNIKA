<?php

namespace App\Models;

use CodeIgniter\Model;

class RoleModel extends Model
{
    protected $table      = 'role';
    protected $primaryKey = 'id_role';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['deskripsi'];
}