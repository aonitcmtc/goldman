<?php

namespace App\Controllers;

class Adminpage extends BaseController
{
    public function __construct()
    {

        $this->session = session();

        $group = $this->session->get('group');
        // print_r($group); die();
        if($group != 'admin') {
            header('Location: /login'); exit;
        }

    }

    public function index(): string
    {

        

        // die("aaaaaaa123");


        // return view('index');
        return view('adminpage/index', [
            'title' => 'Admin page'
        ]);
        
        // return view('welcome_message'); // default
    }
}
