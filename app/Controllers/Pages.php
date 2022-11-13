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
            'products' => $this->productModel->getProducts()
        ];

        return view('pages/products', $data);
    }

    public function product($slug)
    {
        $product = $this->productModel->getProduct($slug);

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
            'title' => $title,
            'config' => config('Auth'),
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
            'products' => $this->productModel->getProductByKeyword($keyword)
        ];

        return view('pages/products', $data);
    }
}
