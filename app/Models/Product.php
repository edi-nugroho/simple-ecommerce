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
    protected $allowedFields    = ['category_id', 'name', 'slug', 'description', 'price', 'discount', 'image'];

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
        return $this->select('*, products.id as p_id, products.name as p_name')
                    ->join('category', 'category.id = products.category_id');
    }

    public function findByProductsId($id)
    {
        return $this->select('*, products.id as p_id, products.name as p_name')
                    ->join('category', 'category.id = products.category_id')
                    ->where(['products.id' => $id])
                    ->get()
                    ->getRow();
    }

    public function getProduct($slug)
    {
        return $this->select('*, products.id as p_id, products.name as p_name')
                    ->join('category', 'category.id = products.category_id')
                    ->where(['products.slug' => $slug])->get()->getRow();
    }

    public function getProductLimit()
    {
        return $this->select('*, products.name as p_name')
                    ->join('category', 'category.id = products.category_id')
                    ->limit(3)
                    ->get()
                    ->getResult();
    }

    public function getProductByKeyword($keyword)
    {
        return $this->select('*, products.name as p_name')
                    ->join('category', 'category.id = products.category_id')
                    ->like('name', $keyword)
                    ->orLike('category_name', $keyword);
    }

    public function getDiscount($id)
    {
        return $this->select('discount')
                    ->where('id', $id)
                    ->get()
                    ->getRow();
    }

}
