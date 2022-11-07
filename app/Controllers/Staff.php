<?php

namespace App\Controllers;

class Staff extends BaseController {

    public function index()
    {
        $data = [
            'title' => 'Staff | Eazy Store'
        ];

        return view('pages/staff/index', $data);
    }
}

?>