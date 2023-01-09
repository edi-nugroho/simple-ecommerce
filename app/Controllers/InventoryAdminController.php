<?php 

namespace App\Controllers;
use App\Models\Users;
use App\Models\Product;
use App\Models\Options;
use App\Models\InventoryModel;

class InventoryAdminController extends BaseController {

    protected $user;
    protected $product;
    protected $options;
    protected $inventoryModel;

    public function __construct()
    {
        $this->user = new Users();
        $this->product = new Product();
        $this->options = new Options();
        $this->inventoryModel = new InventoryModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Inventory Product',
            'user'  => $this->user->getUserById(user_id()),
            'products' => $this->product->findAll(),
            'request' => \Config\Services::request(),
            'options' => $this->options->findAll(),
            'inventory' => $this->inventoryModel->getAll()
        ];

        return view('pages/admin/inventory/index', $data);
    }

    public function insert()
    {
        $product_id = $this->request->getVar('product_id');
        $option_id = $this->request->getVar('option_id');
        $stock = $this->request->getVar('stock');

        $this->inventoryModel->save([
            'product_id' => $product_id,
            'option_id' => $option_id,
            'stock' => $stock
        ]);

        return redirect('inventory');
    }
}