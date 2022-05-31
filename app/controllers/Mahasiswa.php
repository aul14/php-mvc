<?php

class Mahasiswa extends Controller
{
    public function index()
    {
        $head = [
            "judul" => "Halaman mahasiswa",
        ];

        $data = [
            "mhs"   => $this->model('Mahasiswa_model')->getAllMahasiswa()
        ];
        $this->view('templates/header', $head);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $head = [
            "judul" => "Detail mahasiswa",
        ];

        $data = [
            "mhs"   => $this->model('Mahasiswa_model')->getMahasiswaById($id)
        ];


        $this->view('templates/header', $head);
        $this->view('mahasiswa/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if ($this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0) {
            Flasher::setFlash('Sukses', 'Data mahasiswa berhasil di tambahkan', 'primary');
            header('Location: ' . BASE_URL . '/mahasiswa');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Data mahasiswa gagal di tambahkan', 'danger');
            header('Location: ' . BASE_URL . '/mahasiswa');
            exit;
        }
    }

    public function ubah()
    {
        if ($this->model('Mahasiswa_model')->updateDataMahasiswa($_POST) > 0) {
            Flasher::setFlash('Sukses', 'Data mahasiswa berhasil di ubah', 'primary');
            header('Location: ' . BASE_URL . '/mahasiswa');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Data mahasiswa gagal di ubah', 'danger');
            header('Location: ' . BASE_URL . '/mahasiswa');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('Mahasiswa_model')->hapusDataMahasiswa($id) > 0) {
            Flasher::setFlash('Sukses', 'Data mahasiswa berhasil di hapus', 'primary');
            header('Location: ' . BASE_URL . '/mahasiswa');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Data mahasiswa gagal di hapus', 'danger');
            header('Location: ' . BASE_URL . '/mahasiswa');
            exit;
        }
    }

    public function getUbahData()
    {
        $data = $this->model('Mahasiswa_model')->getMahasiswaById($_POST['id']);
        echo json_encode($data);
        exit;
    }

    public function cari()
    {
        $head = [
            "judul" => "Halaman mahasiswa",
        ];

        $data = [
            "mhs"   => $this->model('Mahasiswa_model')->cariDataMahasiswa()
        ];
        $this->view('templates/header', $head);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }
}
