<?php

namespace App\Models;

use CodeIgniter\Model;

class InventoryModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'inventory';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['product_id', 'option_id', 'stock'];

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
        return $this->select('*, inventory.id as inventory_id')
                    ->join('products', 'products.id = inventory.product_id')
                    ->join('options', 'options.id = inventory.option_id')
                    ->get()
                    ->getResult();
    }

    public function getOptions($id)
    {
        return $this->join('options', 'options.id = inventory.option_id')
                    ->where(['product_id' => $id])->get()->getResult();
    }

    public function getStock($product_id, $option_id)
    {
        return $this->select('stock')
                    ->join('options', 'options.id = inventory.option_id')
                    ->where('product_id', $product_id)
                    ->where('option_id', $option_id)
                    ->get()
                    ->getRow();
    }

    public function updateStock($product_id, $option_id, $stock)
    {
        return $this->set('stock', $stock)
                    ->where('product_id', $product_id)
                    ->where('option_id', $option_id)
                    ->update();
    }
}
