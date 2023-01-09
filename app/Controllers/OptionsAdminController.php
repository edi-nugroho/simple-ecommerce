<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Users;
use App\Models\Options;

class OptionsAdminController extends BaseController
{
    protected $user;
    protected $options;

    public function __construct()
    {
        $this->user = new Users();
        $this->options = new Options();
    }

    public function index()
    {
        $data = [
            'title' => 'Options Product',
            'user'  => $this->user->getUserById(user_id()),
            'request' => \Config\Services::request(),
            'options' => $this->options->findAll()
        ];

        return view('pages/admin/options/index', $data);
    }

    public function insert()
    {
        $option = $this->request->getVar('option');

        $this->options->save([
            'option' => $option
        ]);

        session()->setFlashdata('pesan', 'Option have been added');

        return redirect('options');
    }

    public function delete($id)
    {
        $this->options->delete($id);

        session()->setFlashdata('pesan', 'Option have been deleted');

        return redirect('options');
    }
}
