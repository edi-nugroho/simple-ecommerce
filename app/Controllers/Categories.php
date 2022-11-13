<?php

namespace App\Controllers;
use App\Models\Category;
use App\Models\Users;

class Categories extends BaseController {

    protected $category;
    protected $user;

    public function __construct()
    {
        $this->category = new Category();
        $this->user = new Users();
    }

    public function index()
    {
        $data = [
            'title' => 'Categories List | Eazy Store',
            'user'  => $this->user->getUserById(user_id()),
            'categories' => $this->category->getCategories()
        ];

        return view('pages/admin/categories/index', $data);
    }

    public function insert()
    {
        $category_name = $this->request->getVar('category_name');

        $this->category->save([
            'category_name' => $category_name
        ]);

        session()->setFlashdata('pesan', 'Data Category berhasil ditambahkan');

        return redirect('categories');
    }

    public function delete($id)
    {
        $this->category->delete($id);

        session()->setFlashdata('pesan', 'Data berhasil dihapus');

        return redirect()->to('/categories');
    }
}

