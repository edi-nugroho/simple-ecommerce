<?php 

namespace App\Controllers;
use App\Models\Order;
use App\Models\Users;
use App\Models\OrderDetail;
use App\Models\InventoryModel;

class OrderAdminController extends BaseController {

    protected $order; 
    protected $user;
    protected $orderDetail;
    protected $inventoryModel;

    public function __construct()
    {
        $this->order = new Order;
        $this->user = new Users();
        $this->orderDetail = new OrderDetail();
        $this->inventoryModel = new InventoryModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Order Lists',
            'user'  => $this->user->getUserById(user_id()),
            'request' => \Config\Services::request(),
            'orders' => $this->order->getAll()
        ];

        return view('pages/admin/orders/index', $data);
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Order Detail',
            'user'  => $this->user->getUserById(user_id()),
            'request' => \Config\Services::request(),
            'order' => $this->order->getOrderDetailBySlug($slug),
            'orderTotal' => $this->order->getTotal($slug),
            'orderStatus' => $this->order->getStatus($slug),
            'orderId' => $this->order->getOrderID($slug)
        ];

        return view('pages/admin/orders/detail', $data);
    }

    public function updateStatus($id)
    {
        $status = $this->request->getVar('status');

        $orderDetail = $this->orderDetail->getByOrderId($id);

        if(!$this->validate([
			'status' => 'required'
		])){
            session()->setFlashdata('fail', 'Status failed to updated!');

			return redirect()->to('/orderLists')->withInput();
		}

        $i = 0;
        foreach ($orderDetail as $order) {
            // Ambil Stok Produk
            $stock[$i] = $this->inventoryModel->getStock($order->product_id, $order->option_id);
            $qty[$i] = $order->qty;

            $hasil[$i] = $stock[$i]->stock - $qty[$i];

            $this->inventoryModel->updateStock($order->product_id, $order->option_id, $hasil[$i]);

            $i++;
        }

        $this->order->save([
            'id' => $id,
            'status' => $status
        ]);

        session()->setFlashdata('pesan', 'Status has been updated');

        return redirect('orderLists');
    }

}