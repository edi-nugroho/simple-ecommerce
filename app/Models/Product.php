<?php

namespace App\Models;

use CodeIgniter\Model;

class Product extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'products';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['category_id', 'name', 'price', 'is_discount'];

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
    
    public function getProducts()
    {
        return $this->join('category', 'category.id = products.category_id')
                    ->get()
                    ->getResult();
    }

    public function getProduct($id)
    {
        return $this->join('category', 'category.id = products.category_id')
                    ->where(['products.id' => $id])->get()->getRowArray();
    }

    public function getProductLimit()
    {
        return $this->join('category', 'category.id = products.category_id')
                    ->limit(3)
                    ->get()
                    ->getResult();
    }

    public function getProductByKeyword($keyword)
    {
        return $this->join('category', 'category.id = products.category_id')
                    ->like('name', $keyword)
                    ->orLike('category_name', $keyword)
                    ->get()
                    ->getResult();
    }

}
