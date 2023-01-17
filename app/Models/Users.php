<?php

namespace App\Models;

use CodeIgniter\Model;

class Users extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'id';

    protected $allowedFields  = [
        'email', 'name', 'username', 'user_image', 'address', 'phone_number', 'password_hash', 'reset_hash', 'reset_at', 'reset_expires', 'activate_hash',
        'status', 'status_message', 'active', 'force_pass_reset', 'permissions', 'created_at', 'updated_at'
    ];

    public function getUserById($id)
    {
        return $this->select('auth_groups.description as description')
                    ->join('auth_groups_users', 'users.id = auth_groups_users.user_id')
                    ->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id')
                    ->where(['users.id' => $id])->get()->getRow();
    }

    public function getUserByUsername($username)
    {
        return $this->where(['username' => $username])->get()->getRow();
    }

    public function updatePassword($id, $password)
    {
        return $this->set('password_hash', $password)
                    ->where(['id' => $id])
                    ->update();
    }

    public function getStaff()
    {
        return $this->select('*, users.name as user_name, users.id as userId')
                    ->join('auth_groups_users', 'users.id = auth_groups_users.user_id')
                    ->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id')
                    ->where('auth_groups.name', 'staff')
                    ->get()
                    ->getResult();
    }
}