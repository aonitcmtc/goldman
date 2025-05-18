<?php

namespace App\Controllers;

use App\Models\MemberModel;

class Login extends BaseController
{
    public function index()
    {
        return view('login/index');
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

        $user = $model->getUserByUsername($username);

        // check statis and group & hash password tt/
        if ($user && $user['status'] && password_verify($password, $user['hash_password'])) {
            
            $is_group = $user['member_group'];
            // print_r($user); die();

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
                    return redirect()->to('/lfdrive');
                }
                
            } else if ($is_group == 'admin') {

                $session->set([
                    'username' => $username,
                    'group' => 'admin',
                    'isLoggedIn' => true,
                ]);
                // return redirect()->to('/dashboard');
                return redirect()->to('/adminpage');
            } else {
                $session->set([
                    'username' => $username,
                    'group' => 'user',
                    'isLoggedIn' => true,
                ]);
                // return redirect()->to('/dashboard');
                return redirect()->to('/members');
            }

        } else {
            return redirect()->back()->with('error', 'Invalid username or password');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
