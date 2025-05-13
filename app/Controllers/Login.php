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

        $user = $model->getUserByUsername($username);

        // echo "password :: ".$password;
        // echo "user['password'] :: ".$user['password'];
        // print_r($user); die();

        $user_password = password_hash($user['password'], PASSWORD_DEFAULT);


        // if ($user && password_verify($password, $user['password'])) {
        if ($user && password_verify($password, $user_password)) {
            $session->set([
                'username' => $username,
                'isLoggedIn' => true,
            ]);
            // return redirect()->to('/dashboard');
            return redirect()->to('/members');
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
