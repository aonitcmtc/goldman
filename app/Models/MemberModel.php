<?php

namespace App\Models;

use CodeIgniter\Model;

class MemberModel extends Model
{
    protected $table = 'member';
    protected $primaryKey = 'member_id';
    protected $allowedFields = ['first_name', 'email', 'phone'];

    // Custom method to get one member by ID
    public function getById($id)
    {
        return $this->find($id);
    }

    // Custom method to get all members
    public function getDataAll()
    {
        // die('getDataAll');
        return $this->findAll();
    }

    public function getUserByUsername($username)
    {
        return $this->where('first_name', $username)->first();
    }

}