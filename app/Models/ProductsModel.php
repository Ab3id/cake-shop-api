<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;

class ProductsModel extends Model
{
    protected $table = 'product';
    protected $allowedFields = [
        'name',
        'recipe',
        'type',
        'price'
    ];
    protected $updatedField = 'updated_at';

    public function findProductByID($id)
    {
        $client = $this
            ->asArray()
            ->where(['id' => $id])
            ->first();

        if (!$client) throw new Exception('Could not find product for specified ID');

        return $client;
    }

    public function findProductByName($val)
    {
        $client = $this
            ->asArray()
            ->like(['name' => $val])
            ->findAll();

        if (!$client) throw new Exception('Could not find product for specified Name');

        return $client;
    }

    public function findProductByCategory($val)
    {
        $client = $this
            ->asArray()
            ->like(['type' => $val])
            ->findAll();

        if (!$client) throw new Exception('Could not find product for specified Name');

        return $client;
    }
}