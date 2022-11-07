<?php

namespace App\Controllers;

class Admin extends BaseController {

    public function index()
    {
        $users = new \Myth\Auth\Models\UserModel();

        $data = [
            'title' => 'Eazy Store | Admin',
            'users' => $users->findAll()
        ];

        return view('pages/admin/index', $data);
    }
}

?>