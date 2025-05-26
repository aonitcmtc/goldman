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
        if($group==null || $group != 'lfdrive') {
            header('Location: '.base_url('/lfdrive/login')); exit;
        }

        // print_r($this->session);
        // die();
    }

    public function index()
    {
        print_r("LFDRIVE::INDEX"); die();
        // return view('lfdrive/index');
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
        // $image_name = 'animal_toy_stuffedanimal_doll_cat_dog_2744.ico';
        // $s3_path = 'image/'.$image_name;

        // $s3 = new S3Service();
        // $data['img_url'] = $s3->show($s3_path);
        // $data['key'] = $s3_path;
        // print_r($data['img_url']); die();

        $model = new LfimageModel();
        $data['group_name'] = $model->getGroupImgAll();
        
        $arr_img = [];
        if (isset($data['group_name'])){
            $select_alabum = $data['group_name'][0]['alabum'];
            // print_r($data['group_name'][0]['alabum']); die();
            $getImage = $model->getImageByGroup($select_alabum);
            // print_r($getImage); die();
            if(!empty($getImage)){
                foreach ($getImage as $key => $value) {
                    $s3 = new S3Service();
                    $arr_img[$key]['img_url'] = $s3->show($value['path_img']);
                    $arr_img[$key]['path_img'] = $value['path_img'];
                }
            }
        }
        // print_r($arr_img);  die();

        $data['arr_img'] = $arr_img;
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
        // print_r($alabum_name); die();

        $s3 = new S3Service();

        if ($file->isValid() && !$file->hasMoved() && $file->getSize() > 2) {
            $filePath = $file->getTempName();
            $fileName = $file->getName();

            $arr_name = explode(".",$fileName);
            $is_name = sizeof($arr_name) >= 2 ? $arr_name[0]:"lfupload";
            $fileName = date('Ymd').$is_name.time().'.'.$arr_name[1];
            // print_r($fileName); die();

            $s3Path = 'image/'.$fileName;
            $url = $s3->upload($filePath, $s3Path);
            // print_r($url); die();

            if ($url) {
                // update image table
                $model = new LfimageModel();
                // $data_all = $model->getDataAll();
                // print_r($data_all); die();
                $insert_id = $model->addImage($alabum_name, $fileName, $s3Path, $url, $file->getMimeType());
                // print_r($insert); die();

                if ($insert_id > 0) {
                    $upload_status['msg'] = "successfully";
                    $upload_status['url'] = $url;
                    $upload_status['ID'] = $insert_id;
                    echo json_encode($upload_status);
                    // return view('lfdrive/uploadimg',$upload_status);
                } else {
                    $upload_status['msg'] = "Image Error plese recheck Image before Upload![1]";
                    echo json_encode($upload_status);
                    // return view('lfdrive/uploadimg',$upload_status);
                }
            } else {
                $upload_status['msg'] = "Image Error plese recheck Image before Upload![2]";
                echo json_encode($upload_status);
                // return view('lfdrive/uploadimg',$upload_status);
            }
        } else {
            $upload_status['msg'] = "Image Error plese recheck Image before Upload![3]";
            echo json_encode($upload_status);
            // return view('lfdrive/uploadimg',$upload_status);
        }
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
