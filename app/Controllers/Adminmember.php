<?php

namespace App\Controllers;

use App\Models\MemberModel;

class Adminmember extends BaseController
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


    public function index()
    {
        // if (!session()->get('isLoggedIn')) return redirect()->to('/');
        // die("Adminmember::123456789");
        $model = new MemberModel();
        // $data['members'] = $model->findAll();
        $data['members'] = $model->getDataAll();

        // print_r($data); die();

        //  $data['title'] = "catss";

        return view('adminmember/index', $data);
    }

    public function manage()
    {
        // if (!session()->get('isLoggedIn')) return redirect()->to('/');
        // die("Adminmember::123456789");
        $model = new MemberModel();
        // $data['members'] = $model->findAll();
        $data['members'] = $model->getDataAll();

        // print_r($data); die();

        //  $data['title'] = "catss";

        return view('adminmember/manage_member', $data);
    }

    public function detail($id)
    {
        $model = new MemberModel();

        // Use custom method to get one record
        $data['member'] = $model->getById($id);

        return view('member/detail', $data);
    }
}
