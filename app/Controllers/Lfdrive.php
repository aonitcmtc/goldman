<?php

namespace App\Controllers;

use App\Models\LfimageModel;
use App\Libraries\S3Service;

class Lfdrive extends BaseController
{

    public function __construct()
    {
        $this->session = session();

        $group = $this->session->get('group');
        // print_r($group); die();
        if($group != 'lfdrive') {
            $this->index();
        }

        // print_r($this->session);
        // die();
    }

    public function index()
    {
        // print_r("dev9998"); die();
        return view('lfdrive/index');
    }

    public function page()
    {
        // print_r("dev9998"); die();
        return view('lfdrive/page');
    }

    public function uploadimg()
    {
        // print_r("dev9998"); die();
        $data['msg'] = "";

        return view('lfdrive/uploadimg',$data);
    }

    public function showimg()
    {
        // print_r("dev9998"); die();
        $image_name = 'animal_toy_stuffedanimal_doll_cat_dog_2744.ico';
        $s3_path = 'image/'.$image_name;

        $s3 = new S3Service();
        $data['img_url'] = $s3->show($s3_path);
        $data['key'] = $s3_path;

        // print_r($data['img_url']); die();

        return view('lfdrive/showimg',$data);
    }

    public function uploadimgtobucket()
    {

        $alabum_name = $this->request->getPost('alabum');

        // $json = file_get_contents("php://input");
        // $data = json_decode($json, true);

        $file = $this->request->getFile('upload_img'); // 'userfile' is the name of the input field

        // $file->getName(); // Original file name
        // $file->getSize(); // File size in bytes
        // $file->getMimeType(); // MIME type of the file
        // print_r($file->getSize()); die();
        print_r($alabum_name); die();

        $s3 = new S3Service();

        if ($file->isValid() && !$file->hasMoved() && $file->getSize() > 2) {
            $filePath = $file->getTempName();
            $fileName = $file->getName();

            $s3Path = 'image/'.$fileName;
            $url = $s3->upload($filePath, $s3Path);

            // echo "Url";
            // print_r($url); die();

            if ($url) {
                // update image table
                $model = new LfimageModel();
                $test_model = $model->getDataAll();
                // print_r($test_model); die();


                // echo "File uploaded successfully: " . $url;
                // return "File uploaded successfully: " . $url;
                $upload_status['msg'] = "successfully";
                $upload_status['url'] = $url;
                return view('lfdrive/uploadimg',$upload_status);
            } else {
                // echo "File upload failed.";
                // return "File upload failed.";
                $upload_status['msg'] = "Image Error plese recheck Image before Upload!";
                return view('lfdrive/uploadimg',$upload_status);
            }
        } else {
            $upload_status['msg'] = "Image Error plese recheck Image before Upload!";
            return view('lfdrive/uploadimg',$upload_status);
        }
        // return view('lfdrive/showimg');
    }

    public function auth()
    {
        $session = session();
        $model = new MemberModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // echo "password :: ".$password;
        // echo "user['password'] :: ".$user['password'];
        // print_r($user['status']); die();

        $user = $model->getUserByUsername($username);
        // print_r($user); die();


        // check statis and group & hash password tt/
        if ($user && $user['status'] && password_verify($password, $user['hash_password'])) {
            
            $is_group = $user['member_group'];
        //     // print_r($user); die();

            if ($is_group == 'user') {

                $session->set([
                    'username' => $username,
                    'group' => 'user',
                    'isLoggedIn' => true,
                ]);
                // return redirect()->to('/dashboard');
                return redirect()->to('/lfdrive/page');
            } 
            
            // else if ($is_group == 'admin') {

        //         $session->set([
        //             'username' => $username,
        //             'group' => 'admin',
        //             'isLoggedIn' => true,
        //         ]);
        //         // return redirect()->to('/dashboard');
        //         return redirect()->to('/adminpage');
        //     }

        } else {
            return redirect()->back()->with('error', 'Invalid username or password');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('lfdrive');
    }
}
