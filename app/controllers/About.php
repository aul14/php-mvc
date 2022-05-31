<?php

class About extends Controller
{
    public function index($nama = "Aulia Rahman", $pekerjaan = "IT", $umur = 23)
    {
        $head = [
            "judul" => "Halaman about",
        ];
        $data = [
            "nama"  => $nama,
            "pekerjaan"  => $pekerjaan,
            "umur"  => $umur,
        ];
        $this->view('templates/header', $head);
        $this->view('about/index', $data);
        $this->view('templates/footer');
    }
    public function page()
    {
        $head = [
            "judul" => "Halaman about page",
        ];
        $this->view('templates/header', $head);
        $this->view('about/page');
        $this->view('templates/footer');
    }
}
