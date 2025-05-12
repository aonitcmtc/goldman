<?php

namespace App\Controllers;

class Apiv1 extends BaseController
{
    public function index()
    {
        return view('apiv1/index');
        // return view('index', [
        //     'title' => 'Hello Page'
        // ]);
    }

    // service
    public function service($table_name = 'dashboad')
    {
        // print_r("v1 Service");
        // die();

        return "Hello, $table_name!";
    }
}
