<?php

namespace Modules\Auth\Models;

use CodeIgniter\Model;

class LoginHistoryModel extends Model
{
    protected $table         = 'login_history';
    protected $primaryKey    = 'id';
    protected $allowedFields = ['user_id', 'logged_in_at'];
    protected $useTimestamps = false; 
}