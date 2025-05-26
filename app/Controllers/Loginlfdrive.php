<?php

namespace App\Controllers;

use App\Models\MemberModel;

class Loginlfdrive extends BaseController
{
    public function index()
    {
        return view('loginlfdrive/index');
    }

    public function auth()
    {
        $session = session();
        $model = new MemberModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $out_site = $this->request->getPost('out_site');

        // echo "password :: ".$password;
        // echo "user['password'] :: ".$user['password'];
        // print_r($user['status']); die();

        // $hash_pass = password_hash("123456", PASSWORD_DEFAULT);
        // print_r($hash_pass); die();

        $user = $model->getUserByUsername($username);

        // check statis and group & hash password tt/
        if ($user && $user['status'] && password_verify($password, $user['hash_password'])) {
            
            $is_group = $user['member_group'];
            // print_r($out_site); die();

            if ($out_site == 'lfdrive') {
                if ($is_group == 'lfdrive') {

                    $session->set([
                        'username' => $username,
                        'group' => 'lfdrive',
                        'isLoggedIn' => true,
                    ]);
                    // return redirect()->to('/dashboard');
                    return redirect()->to('/lfdrive/page');
                } else {
                    // return redirect()->to('/lfdrive');
                    return redirect()->back()->with('error', 'Invalid username or password');
                }
            } else {
               return redirect()->back()->with('error', 'Invalid username or password');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid username or password');
        }
    }

    public function logout()
    {
        session()->destroy();
        print_r(session()); die();
        return redirect()->to('lfdrive/login');
    }
}
