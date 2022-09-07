<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;

class ClientModel extends Model{
    protected $table = 'client';
    protected $allowedFields = [
        'name',
        'email',
        'token',
    ];
    protected $updatedField = 'updated_at';


    public function vefiryClientToken($token)
    {
        $client = $this
            ->asArray()
            ->where(['token' => $token])
            ->first();

        if (!$client) 
            throw new Exception('Access Denied, Invalid Token');

        return $client;
    }
}   