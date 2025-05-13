<?php

namespace App\Controllers;

class Adminpage extends BaseController
{
    public function index(): string
    {
        // return view('index');
        return view('adminpage/index', [
            'title' => 'Admin page'
        ]);
        
        // return view('welcome_message'); // default
    }
}
