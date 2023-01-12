<?php

namespace App\Controllers;

use App\Models\Product;
use App\Models\Users;
use App\Models\Options;
use App\Models\InventoryModel;

class Pages extends BaseController
{
    protected $productModel;
    protected $userModel;
    protected $options;
    protected $inventoryModel;

    public function __construct()
    {
        $this->productModel = new Product();
        $this->userModel = new Users;
        $this->options = new Options();
        $this->inventoryModel = new InventoryModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Home - Eazy Store',
            'products' => $this->productModel->getProductLimit()
        ];

        return view('pages/home', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About - Eazy Store'
        ];

        return view('pages/about', $data);
    }

    public function allProducts()
    {
        $data = [
            'title' => 'All products - Eazy Store',
            'products' => $this->productModel->getProducts()->paginate(6, 'products'),
            'pager' => $this->productModel->getProducts()->pager
        ];

        return view('pages/products', $data);
    }

    public function product($slug)
    {
        $product = $this->productModel->getProduct($slug);
        $beforeDiscount = beforeDiscount($product->price, $product->discount);
            
        $title =  $product->p_name . " - Eazy Store";

        $data = [
            'title' => $title,
            'product' => $product,
            'options' => $this->inventoryModel->getOptions($product->p_id),
            'beforeDiscount' => $beforeDiscount
        ];

        return view('pages/product', $data);
    }

    public function search()
    {
        $keyword = $this->request->getvar('q');
        
        $title = "Pencarian - ";

        if($keyword == NULL)
        {
            $title .= "All Products";
        }else{
            $title .= $keyword;
        }

        $data = [
            'title' => $title,
            'products' => $this->productModel->getProductByKeyword($keyword)->paginate(6, 'products'),
            'pager' => $this->productModel->getProducts()->pager,
            'keyword' => $keyword
        ];

        return view('pages/products', $data);
    }

    // Profile Page
    public function myprofile()
    {
        $data = [
            'title' => "Profile"
        ];

        return view('pages/profile', $data);
    }

    // Update Profile Page
    public function updateProfile($username)
    {   
        $data = [
            'title' => 'Update Profile | ' . $username,
            'user' => $this->userModel->getUserByUsername(user()->username)
        ];

        return view('pages/updateProfile', $data);
    }

    // Change Password Page
    public function changePassword()
    {
        $data = [
            'title' => 'Change Password'
        ];

        return view('pages/changePassword', $data);
    }
}
