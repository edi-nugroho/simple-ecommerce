<?php

namespace App\Controllers;

use App\Models\Users;
use App\Models\AuthGroupsUsers;
use App\Models\AuthGroups;
use Myth\Auth\Password;

class StaffController extends BaseController {
    protected $user;
    protected $auth_groups_users;
    protected $auth_groups;

    public function __construct()
    {
        $this->user = new Users();
        $this->auth_groups_users = new AuthGroupsUsers();
        $this->auth_groups = new AuthGroups();
    }

    public function index()
    {
        $request = \Config\Services::request();

        $data = [
            'title' => 'Eazy Store | Staff',
            'user'  => $this->user->getUserById(user_id()),
            'request' => $request,
            'users' => $this->user->getStaff()
        ];

        return view('pages/admin/staff/index', $data);
    }

    public function insert()
    {
        $request = \Config\Services::request();

        $data = [
            'title' => 'Eazy Store | Add Staff',
            'user'  => $this->user->getUserById(user_id()),
            'validation' => \Config\Services::validation(),
            'roles' => $this->auth_groups->findAll(),
            'request' => $request
        ];

        return view('pages/admin/staff/addStaff', $data);
    }

    public function save()
    {
        $name = $this->request->getVar('name');
        $username = $this->request->getVar('username');
        $email = $this->request->getVar('email');
        $phone_number = $this->request->getVar('phone_number');
        $password = $this->request->getVar('password');

        // Validasi Input
		if(!$this->validate([
			'name' => 'required',
			'username' => 'required|is_unique[users.username]',
			'email' => 'required|is_unique[users.email]',
			'phone_number' => 'required|numeric',
            'password' => 'required|is_unique[users.password_hash]'
		])){
			return redirect()->to('/staff/insert')->withInput();
		}

        $this->user->save([
            'name' => $name,
            'username' => $username,
            'email' => $email,
            'phone_number' => $phone_number,
            'active' => 1,
            'password_hash' => Password::hash($password),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        // Insert to auth groups users
        $user_id = $this->user->getInsertID();

        $this->auth_groups_users->save([
            'group_id' => 2,
            'user_id' => $user_id
        ]);

        session()->setFlashdata('pesan', 'Staff has been added!');

        return redirect('staff');
    }

    public function delete($id)
    {
        $this->auth_groups_users->deleteUser($id);

        $this->user->delete($id);

        session()->setFlashdata('pesan', 'Staff has been deleted!');

        return redirect('staff');
    }
}

?>