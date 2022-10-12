<?php

namespace App\Controllers;

use App\Models\Product;

class Home extends BaseController
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
}
