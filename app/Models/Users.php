<?php

namespace App\Models;

use CodeIgniter\Model;

class Users extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'id';

    public function getUserById($id)
    {
        return $this->select('auth_groups.description as description')
                    ->join('auth_groups_users', 'users.id = auth_groups_users.user_id')
                    ->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id')
                    ->where(['users.id' => $id])->get()->getRow();
    }
}