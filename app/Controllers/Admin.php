<?php

namespace App\Controllers;
use App\Models\Users;

class Admin extends BaseController {
    protected $user;

    public function __construct()
    {
        $this->user = new Users();
    }

    public function index()
    {
        $users = new \Myth\Auth\Models\UserModel();

        $data = [
            'title' => 'Eazy Store | Admin',
            'user'  => $this->user->getUserById(user_id()),
            'users' => $users->findAll()
        ];

        return view('pages/admin/index', $data);
    }
}

?>