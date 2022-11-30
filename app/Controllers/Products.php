<?php

namespace App\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Users;

class Products extends BaseController {
    protected $product;
    protected $category;
    protected $user;

    public function __construct()
    {
        $this->product = new Product();
        $this->category = new Category();
        $this->user = new Users();
    }
    
    public function index()
    {
        $data = [
            'title' => 'Products List | Eazy Store',
            'products' => $this->product->getProducts(),
            'user'  => $this->user->getUserById(user_id()),
            'categories' => $this->category->getCategories()
        ];

        return view('pages/admin/product/index', $data);
    }

    public function insert()
    {
        $data = [
            'title' => 'Input Data Product | Eazy Store',
            'user'  => $this->user->getUserById(user_id()),
            'categories' => $this->category->getCategories()
        ];

        return view('pages/admin/product/addProduct', $data);
    }

    public function save()
    {
        $category_id = $this->request->getVar('category_id');
        $name = $this->request->getVar('name');
        $slug = url_title($this->request->getVar('name'), '-', 'true');
        $price = $this->request->getVar('price');
        $description = $this->request->getVar('description');
        $discount = $this->request->getVar('discount');

        // Remove '%' From Discount
        $discount = trim($discount, "%");
        $discount = intval($discount);

        // Discount
        $price = discount($price, $discount);

        $this->product->save([
            'name' => $name,
            'slug' => $slug,
            'description' => $description,
            'price' => $price,
            'discount' => $discount,
            'category_id' => $category_id
        ]);

        session()->setFlashdata('pesan', 'Data Product berhasil ditambahkan');

        return redirect('products');
    }

    public function edit($slug)
    {
        $data = [
            'title'      => 'Edit Data Product | Eazy Store',
            'product'    => $this->product->getProduct($slug),
            'user'       => $this->user->getUserById(user_id()),
            'categories' => $this->category->getCategories()
        ];

        return view('pages/admin/product/editProduct', $data);
    }

    public function update($id)
    {
        $category_id = $this->request->getVar('category_id');
        $name = $this->request->getVar('name');
        $slug = url_title($this->request->getVar('name'), '-', 'true');
        $description = $this->request->getVar('description');
        $price = $this->request->getVar('price');
        $discount = $this->request->getVar('discount');

        // Remove '%' From Discount
        $discount = trim($discount, "%");
        $discount = intval($discount);

        // Discount
        $price = discount($price, $discount);

        $this->product->save([
            'id' => $id,
            'name' => $name,
            'slug' => $slug,
            'description' => $description,
            'price' => $price,
            'discount' => $discount,
            'category_id' => $category_id
        ]);

        session()->setFlashdata('pesan', 'Data Product berhasil diupdate');

        return redirect('products');        
    }

    public function delete($id)
    {
        $this->product->delete($id);

        session()->setFlashdata('pesan', 'Data product berhasil dihapus');

        return redirect()->to('/products');
    }
}

