<?php

class Home extends Controller
{
    public function index()
    {
        $head = [
            "judul" => "Halaman home",
        ];

        $data = [
            "nama"  => $this->model('User_model')->getUser()
        ];
        $this->view('templates/header', $head);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}
