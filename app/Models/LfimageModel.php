<?php

namespace App\Models;

use CodeIgniter\Model;

class LfimageModel extends Model
{
    protected $table = 'image_lf';
    protected $primaryKey = 'lf_id';
    // protected $allowedFields = ['lf_id', 'image_name', 'alabum', 'path_img', 'status', 'updated', 'created'];


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