<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\KebakaranModel;

class Kebakaran extends BaseController
{
    public function index()
    {
        $model = new KebakaranModel();
        $data ["ins_kebakaran"] = $model->findAll();

        return view("form_kebakaran", $data);
        // $query = 'SELECT * FROM users';
    }

    public function tambah()
    {
        helper(["form", "url"]);

        $validation = \Config\Services::validation();
        $validation->setRules([
            'name' => 'required|min_length[3]',
            'email'=> 'required|valid_email|is_unique[users.email]',
            'gender' => 'required',
        ]);

        if(!$validation->withRequest($this->request)->run()) {
            return redirect()->to('/kebakaran');
        }

        $model = new KebakaranModel();
        $model->save([
            'name'=> $this->request->getPost('name'),
            'email'=> $this->request->getPost('email'),
            'gender'=> $this->request->getPost('gender'),
            'hobbies' => implode(',', $this->request->getPost('hobbies') ?? []),
            'country' => $this->request->getPost('country'),
            'status' => $this->request->getPost('status') ? 1:0,
        ]);

        return redirect()->to('/kebakaran');
    }    

}
