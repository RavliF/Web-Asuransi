<?php

namespace App\Models;

use CodeIgniter\Model;

class KebakaranModel extends Model
{
    protected $table            = 'ins_kebakaran';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['id', 'name', 'email', 'gender', 'hobbies', 'country', 'status'];
}
