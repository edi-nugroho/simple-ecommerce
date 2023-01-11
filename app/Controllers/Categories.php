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
            'request' => \Config\Services::request(),
            'categories' => $this->category->getCategories()
        ];

        return view('pages/admin/categories/index', $data);
    }

    public function insert()
    {
        $category_name = $this->request->getVar('category_name');

        if(!$this->validate([
			'category_name' => 'required'
		])){
            session()->setFlashdata('fail', 'Category failed to added!');
            
			return redirect()->to('/categories')->withInput();
		}

        $this->category->save([
            'category_name' => $category_name
        ]);

        session()->setFlashdata('pesan', 'Category has been added!');

        return redirect('categories');
    }

    public function delete($id)
    {
        $this->category->delete($id);

        session()->setFlashdata('pesan', 'Category has been deleted!');

        return redirect()->to('/categories');
    }
}

