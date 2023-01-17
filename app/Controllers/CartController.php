<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\CartModel;

class CartController extends BaseController {
    protected $cartModel;

    public function __construct()
    {
        $this->cartModel = new CartModel();
    }

    public function index()
    {
        $title = "Keranjang Belanja";

        if(logged_in()){
            $cart = $this->cartModel->getCart(user()->id);
        }else{
            $cart = null;
        }

        $data = [
            'title' => $title,
            'cart'  => $cart
        ];

        return view('pages/cart', $data);
    }

    public function insert()
    {
        $user_id = $this->request->getVar('user_id');
        $product_id = $this->request->getVar('product_id');
        $option_id = $this->request->getVar('option_id');
        $qty = $this->request->getVar('qty');

        // Total Process
        $price = $this->request->getVar('price');
        $total = $qty * $price;

        // Validasi Input
		if(!$this->validate([
            'option_id' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'The size is required',
                    'numeric' => 'The size is required'
                ]
            ],
			'qty' => 'required|numeric'
		])){
            // Slug
            $slug = $this->request->getVar('slug');

			return redirect()->to('/product/' . $slug)->withInput();
		}
        
        $this->cartModel->save([
            'user_id' => $user_id,
            'product_id' => $product_id,
            'option_id' => $option_id,
            'qty' => $qty,
            'total' => $total
        ]);

        return redirect('cart');
    }

    public function update($id)
    {
        $qty = $this->request->getVar('qty');

        // Total
        $price = $this->request->getVar('price');
        $total = $qty * $price;

        $this->cartModel->save([
            'id' => $id,
            'qty' => $qty,
            'total' => $total
        ]);

        return redirect('cart');
    }

    public function delete($id)
    {
        $this->cartModel->delete($id);

        session()->setFlashdata('pesan', 'Data berhasil dihapus');

        return redirect('cart');
    }
}