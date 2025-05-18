<?php

namespace App\Controllers;

use App\Models\MemberModel;

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
        return view('lfdrive/uploadimg');
    }

    public function showimg()
    {
        // print_r("dev9998"); die();
        return view('lfdrive/showimg');
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
