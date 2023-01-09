<?php 

namespace App\Controllers;
use App\Models\Order;
use App\Models\OrderDetail;

class OrderController extends BaseController {

    protected $order; 
    protected $orderDetail;

    public function __construct()
    {
        $this->order = new Order;
        $this->orderDetail = new OrderDetail;
    }

    public function index()
    {
        $data = [
            'title' => 'My Orders',
            'orders' => $this->order->getOrderByUserId(user_id())
        ];

        return view('pages/orders', $data);
    }

    public function orderDetail($slug)
    {
        $data = [
            'title' => 'Order',
            'order' => $this->order->getOrderDetailById($slug),
            'orderTotal' => $this->order->getTotal($slug),
            'orderStatus' => $this->order->getStatus($slug),
            'orderId' => $this->order->getOrderID($slug)
        ];

        if ($data['orderStatus']->status == 'Already received') {
            return redirect('/');
        }

        return view('pages/orderDetail', $data);
    }

    public function delete($orderId)
    {
        // Delete Order Detail
        $this->orderDetail->where('order_id', $orderId)->delete();

        // Delete Order
        $this->order->where('id', $orderId)->delete();

        return redirect()->to('/orders');
    }

    public function updateStatus($id)
    {
        $status = $this->request->getVar('status');

        $this->order->save([
            'id' => $id,
            'status' => $status
        ]);

        return redirect('orders');
    }

    public function history($username)
    {
        $data = [
            'title' => 'Order History',
            'order' => $this->order->getOrderAlreadyReceived($username)
        ];

        return view('pages/history', $data);
    }

    public function historyDetail($slug)
    {
        $data = [
            'title' => 'Order',
            'order' => $this->order->getOrderAlreadyReceivedDetail($slug),
            'orderTotal' => $this->order->getTotal($slug),
        ];

        return view('pages/historyDetail', $data);
    }

}