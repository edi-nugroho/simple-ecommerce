<?php

namespace App\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Users;
use App\Models\InventoryModel;

class Products extends BaseController {
    protected $product;
    protected $category;
    protected $user;
    protected $inventoryModel;

    public function __construct()
    {
        $this->product = new Product();
        $this->category = new Category();
        $this->user = new Users();
        $this->inventoryModel = new InventoryModel();
    }
    
    public function index()
    {
        $data = [
            'title' => 'Products List | Eazy Store',
            'products' => $this->product->getProducts()->get()->getResult(),
            'user'  => $this->user->getUserById(user_id()),
            'request' => \Config\Services::request(),
            'validation' => \Config\Services::validation(),
            'categories' => $this->category->getCategories()
        ];

        return view('pages/admin/product/index', $data);
    }

    public function insert()
    {
        $data = [
            'title' => 'Input Data Product | Eazy Store',
            'user'  => $this->user->getUserById(user_id()),
            'request' => \Config\Services::request(),
            'validation' => \Config\Services::validation(),
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
        $image = $this->request->getFile('image');
        $discount = $this->request->getVar('discount');

        if($discount) {
            // Remove '%' From Discount
            $discount = trim($discount, "%");
            $discount = intval($discount);
    
            // Discount
            $price = discount($price, $discount);
        }else {
            $discount = 0;

            $price = $price;
        }

        // Validasi Input
		if(!$this->validate([
			'name' => 'required',
			'description' => 'required',
            'category_id' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'numeric' => 'The category field is required'
                ]
            ],
            'image' => 'uploaded[image]',
			'price' => 'required'
		])){
			// $validation = \Config\Services::validation();

			return redirect()->to('/products/insert')->withInput();
		}

        // Image Configuration
        $image->move('uploads');

        $imageName = $image->getName();

        $this->product->save([
            'name' => $name,
            'slug' => $slug,
            'description' => $description,
            'price' => $price,
            'discount' => $discount,
            'image' => $imageName,
            'category_id' => $category_id
        ]);

        session()->setFlashdata('pesan', 'Product has been added');

        return redirect('products');
    }

    public function edit($slug)
    {
        $data = [
            'title'      => 'Edit Data Product | Eazy Store',
            'product'    => $this->product->getProduct($slug),
            'request' => \Config\Services::request(),
            'user'       => $this->user->getUserById(user_id()),
            'validation' => \Config\Services::validation(),
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

        if($discount) {
            // Remove '%' From Discount
            $discount = trim($discount, "%");
            $discount = intval($discount);

            // Check Discount
            $oldDiscount = $this->product->getDiscount($id);

            if($oldDiscount->discount == $discount) {
                $price = $price;
            }else {
                // Discount
                $price = discount($price, $discount);
            }
    
        }else {
            $discount = 0;

            $price = $price;
        }

        if(!$this->validate([
			'name' => 'required',
			'description' => 'required',
            'category_id' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'numeric' => 'The category field is required'
                ]
            ],
            'image' => 'mime_in[image,image/jpg,image/jpeg,image/png]',
			'price' => 'required'
		])){
			return redirect()->to('/products/edit/' . $slug)->withInput();
		}

        $image = $this->request->getFile('image');
        $oldImage = $this->request->getVar('oldImage');

        // Validasi Image
        if($image->getError() == 4) {
            $imageName = $oldImage;
        }else {
             // Delete Old Image
             unlink('uploads/' . $oldImage);

             // Image Configuration
             $image->move('uploads');
 
             $imageName = $image->getName();
        }

        $this->product->save([
            'id' => $id,
            'name' => $name,
            'slug' => $slug,
            'description' => $description,
            'image' => $imageName,
            'price' => $price,
            'discount' => $discount,
            'category_id' => $category_id
        ]);

        session()->setFlashdata('pesan', 'Product has been updated');

        return redirect('products');        
    }

    public function delete($id)
    {
        // Cari Gambar Berdasarkan Id
        $image = $this->product->findByProductsId($id);
        
        $this->product->delete($id);
        unlink('uploads/' . $image->image);

        session()->setFlashdata('pesan', 'Product has been deleted');

        return redirect()->to('/products');
    }

    public function checkStock($product_id, $option_id)
    {
        $product = $this->inventoryModel->getStock($product_id, $option_id);
        if ($product) {
            $response = array('stock' => $product->stock);
            
            return $this->response->setJSON($response);
        } else {
            // jika produk tidak ditemukan, kirim pesan 'Product not found' sebagai respon
            $response = array('error' => 'Product not found');

            return $this->response->setJSON($response);
          }
          
    }
}

