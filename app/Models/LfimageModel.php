<?php

namespace App\Models;

use CodeIgniter\Model;

class LfimageModel extends Model
{
    protected $table = 'image_lf';
    protected $primaryKey = 'lf_id';
    protected $allowedFields = ['lf_id', 'image_name', 'alabum', 'comment', 'path_img', 'url_img', 'status', 'updated', 'created']; // insert detech


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

    // getImageByGroup
    public function getImageByGroup($alabum_name)
    {
        // die($alabum_name);
        return $this->where('alabum', $alabum_name)->get()->getResultArray();
        // $query = $this->groupBy('alabum')->get();
        // $result = $query->getResultArray();
        // print_r($result); die();

        // return $result;
    }

    // getGroupImgAll
    public function getGroupImgAll()
    {
        $this->select('alabum, COUNT(*) as total');
        $query = $this->groupBy('alabum')->get();
        $result = $query->getResultArray();
        // print_r($result); die();

        return $result;
    }

    // Custom method to get one member by ID
    public function addImage($alabumName, $fileName, $s3Path, $url, $mimeType)
    {
        $data = [
            'image_name' => $fileName,
            'alabum'     => $alabumName,
            'comment'    => 'mimeType:' . $mimeType,
            'path_img'   => $s3Path,
            'url_img'    => $url,
            'status'     => 1,
            'updated'    => date('Y-m-d H:i:s'),  // datetime format
            'created'    => date('Y-m-d H:i:s'),  // timestamp format
        ];
        // print_r($data); die();

        $inserted = $this->insert($data);
        if ($inserted) {
            // echo "Data inserted successfully! Insert ID: " . $this->getInsertID();
            return $this->insertID();
        } else {
            // echo "Error inserting data.";
            // print_r($this->errors()); die();
            return 0;
        }
        return 0;
    }

}