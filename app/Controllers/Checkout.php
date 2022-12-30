<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\CartModel;
use App\Models\Order;
use App\Models\OrderDetail;

class Checkout extends BaseController {

    protected $cartModel;
    protected $orderModel;
    protected $orderDetailModel;

    public function __construct()
    {
        $this->cartModel = new CartModel();
        $this->orderModel = new Order();
        $this->orderDetailModel = new OrderDetail();
    }

    public function index()
    {
        $data = [
            'title' => 'Checkout',
            'product' => $this->cartModel->getCart(user_id()),
            'priceTotal' => $this->cartModel->getTotal(user_id())
        ];

        return view('pages/checkout', $data);
    }

    public function insert()
    {
        $userId = $this->request->getVar('user_id');
        $payment = $this->request->getVar('payment');
        $total = $this->request->getVar('total');
        $status = $this->request->getVar('status');

        // Insert For Order
        $this->orderModel->save([
            'user_id' => $userId,
            'payment' => $payment,
            'total' => $total,
            'status' => $status
        ]);

        $orderId = $this->orderModel->getInsertID();
        $productId = $this->request->getVar('product_id');
        $qty = $this->request->getVar('qty');

        $i = 0;
        foreach ($productId as $p) {
            // Insert For Detail Order
            $this->orderDetailModel->save([
                'order_id' => $orderId,
                'product_id' => $p,
                'qty' => $qty[$i]
            ]);
            $i++;
        }

        // Delete Cart
        $this->cartModel->deleteByUserId(user_id());
        
        return redirect('/');
    }
}