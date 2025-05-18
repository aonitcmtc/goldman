<?php

namespace App\Controllers;

use App\Models\MemberModel;

class Dashboard extends BaseController
{
    

    public function __construct()
    {
        // helper(['url', 'form']);
        // $this->session = session();

        $this->session = session();

        if (!$this->session->get('isLoggedIn')) {
            header('Location: /');
            exit;
        }

        // print_r($this->session);
        // die();
    }


    public function index()
    {
        // if (!session()->get('isLoggedIn')) return redirect()->to('/');

        $model = new MemberModel();
        // $data['members'] = $model->findAll();
        $data['members'] = $model->getDataAll();

        // print_r($data); die();

        //  $data['title'] = "catss";

        return view('member/index', $data);
    }

    public function detail($id)
    {
        $model = new MemberModel();

        // Use custom method to get one record
        $data['member'] = $model->getById($id);

        return view('member/detail', $data);
    }
}
