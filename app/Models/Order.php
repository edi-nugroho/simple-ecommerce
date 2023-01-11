<?php

namespace App\Models;

use CodeIgniter\Model;

class Order extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'order';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['user_id', 'payment', 'total', 'status', 'slug'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getAll()
    {
        return $this->select('*, products.name as product_name, order.id as orderId, users.name as nameUser, order.status as orderStatus, options.id as option_id, products.id as product_id, order.slug as order_slug')
                    ->join('orderdetail', 'order.id = orderdetail.order_id')
                    ->join('products', 'orderdetail.product_id = products.id')
                    ->join('category', 'products.category_id = category.id')
                    ->join('users', 'order.user_id = users.id')
                    ->join('options', 'orderDetail.option_id = options.id')
                    ->whereNotIn('order.status', ['Already received'])
                    ->groupBy('order_id')
                    ->get()
                    ->getResult();
    }

    public function getOrderAlreadyReceived($username)
    {
        return $this->select('*, products.name as product_name, order.id as orderId, users.name as nameUser, order.status as orderStatus, options.id as option_id, products.id as product_id, order.slug as order_slug')
                    ->join('orderdetail', 'order.id = orderdetail.order_id')
                    ->join('products', 'orderdetail.product_id = products.id')
                    ->join('category', 'products.category_id = category.id')
                    ->join('users', 'order.user_id = users.id')
                    ->join('options', 'orderDetail.option_id = options.id')
                    ->groupBy('order_id')
                    ->where('order.status', 'Already received')
                    ->where('username', $username)
                    ->get()
                    ->getResult();
    }

    public function getOrderAlreadyReceivedDetail($slug)
    {
        return $this->select('*, products.name as product_name')
                    ->join('orderdetail', 'order.id = orderdetail.order_id')
                    ->join('products', 'orderdetail.product_id = products.id')
                    ->join('category', 'products.category_id = category.id')
                    ->join('options', 'orderDetail.option_id = options.id')
                    ->where(['order.slug' => $slug])
                    ->get()
                    ->getResult();
    }

    public function getOrderByUserId($id)
    {
        return $this->where(['user_id' => $id])
                    ->whereNotIn('status', ['Already received'])
                    ->get()
                    ->getResult();
    }

    public function getOrderDetailBySlug($slug)
    {
        return $this->select('*, products.name as product_name')
                    ->join('orderdetail', 'order.id = orderdetail.order_id')
                    ->join('products', 'orderdetail.product_id = products.id')
                    ->join('category', 'products.category_id = category.id')
                    ->join('options', 'orderDetail.option_id = options.id')
                    ->where(['order.slug' => $slug])
                    ->whereNotIn('status', ['Already received'])
                    ->get()
                    ->getResult();
    }

    public function getTotal($slug)
    {
        return $this->select('total')
                    ->where(['slug' => $slug])
                    ->get()
                    ->getRow();
    }
    
    public function getStatus($slug)
    {
        return $this->select('status')
                    ->where(['slug' => $slug])
                    ->get()
                    ->getRow();
    }

    public function getOrderID($slug)
    {
        return $this->select('id')
                    ->where(['slug' => $slug])
                    ->get()
                    ->getRow();
    }

    public function updateStatus($id, $status)
    {
        return $this->set('status', $status)
                    ->where('id', $id)
                    ->update();
    }

}
