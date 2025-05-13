<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        // return view('index');
        return view('home/index', [
            'title' => 'Hello Page'
        ]);
        
        // return view('welcome_message'); // default
    }
}
