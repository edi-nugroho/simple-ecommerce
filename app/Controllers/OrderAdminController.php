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

    public function updateStatus($id)
    {
        $status = $this->request->getVar('status');

        $orderDetail = $this->orderDetail->getByOrderId($id);

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

        return redirect('orderLists');
    }

}