<?php

namespace Modules\Auth\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
  protected $table = 'users';
    
  protected $primaryKey = 'id';
  //protected $useAutoIncrement = true;

    protected $allowedFields = [
        'name', 'email', 'password_hash', 'role', 'active', 'created_at', 'updated_at'
    ];

    protected $useTimestamps = true;
    //protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField = 'updated_at';
}
