<?php

namespace App\Controllers;

class Cats extends BaseController
{
    public function index()
    {
        return view('cats/index');
        // return view('index', [
        //     'title' => 'Hello Page'
        // ]);
    }

    public function greet($name = 'World')
    {
        return "Hello, $name!";
    }

}
