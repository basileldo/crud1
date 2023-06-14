<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\User_model;
class User extends Controller {

    public function index() {

        helper(['form', 'url']);
        $this->User_model = new User_model();
        $data['users'] = $this->User_model->get_all_user();
        return view('user_view', $data);
    }

    public function user_add() {

        helper(['form', 'url']);
        $this->User_model = new User_model();

        $data = array(
            'firstname' => $this->request->getPost('firstname'),
            'lastname' => $this->request->getPost('lastname'),
            'email' => $this->request->getPost('email'),
            'mobile' => $this->request->getPost('mobile'),
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
        );
        $insert = $this->User_model->user_add($data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_edit($id) {
        
        $this->User_model = new User_model();
        $data = $this->User_model->get_by_id($id);
        echo json_encode($data);
    }

    public function user_update() {
        helper(['form', 'url']);
        $this->User_model = new User_model();

        $data = array(
            'firstname' => $this->request->getPost('firstname'),
            'lastname' => $this->request->getPost('lastname'),
            'email' => $this->request->getPost('email'),
            'mobile' => $this->request->getPost('mobile'),
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
        );

        $this->User_model->user_update(array('user_id' => $this->request->getPost('user_id')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function user_delete($id) {

        helper(['form', 'url']);
        $this->User_model = new User_model();
        $this->User_model->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }

}