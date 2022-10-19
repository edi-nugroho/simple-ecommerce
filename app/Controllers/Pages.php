<?php

namespace App\Controllers;

use App\Models\Product;

class Pages extends BaseController
{
    protected $productModel;

    public function __construct()
    {
        $this->productModel = new Product();
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
            'products' => $this->productModel->getProduct()
        ];

        return view('pages/products', $data);
    }

    public function product($id)
    {
        $product = $this->productModel->getProductById($id);
        $title =  $product['name'] . " - Eazy Store";

        $data = [
            'title' => $title,
            'product' => $product
        ];

        return view('pages/product', $data);
    }

    public function cart()
    {
        $title = "Keranjang Belanja";

        $data = [
            'title' => $title
        ];

        return view('pages/cart', $data);
    }

    public function login()
    {
        $title = "Login Page";

        $data = [
            'title' => $title
        ];

        return view('pages/auth/login', $data);
    }

    public function register()
    {
        $title = "Register Page";

        $data = [
            'title' => $title
        ];

        return view('pages/auth/register', $data);
    }
}
