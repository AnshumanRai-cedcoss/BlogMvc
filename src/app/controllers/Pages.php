<?php
class Pages extends Controller {
    public function __construct() {
        $this->userModel = $this->model('User');
    }

    public function index() {
        // $this->view('index');
        $users = $this->userModel->getUsers();
        $data = [
            'title' => 'Good home page ',
             'users' => $users
        ];

        $this->view('pages/index', $data);
    }
    public function login()
    {
       $users = $this->userModel->getUsers();
        $data = [
            'TITLE' => 'All Users',
            'user' => $users
        ];
         $this->view('pages/login', $data);
    }
    
}