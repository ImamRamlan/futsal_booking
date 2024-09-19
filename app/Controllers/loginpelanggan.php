<?php

namespace App\Controllers;

use App\Models\PelangganModel;

class Loginpelanggan extends BaseController
{
    protected $pelangganModel;

    public function __construct()
    {
        $this->pelangganModel = new PelangganModel();
    }

    public function index()
    {
        return view('pelanggan/login');
    }

    public function log()
    {
        $email = $this->request->getPost('212359_email');
        $password = $this->request->getPost('212359_password');

        $cek_pelanggan = $this->pelangganModel->auth_pelanggan($email, $password);

        if ($cek_pelanggan) {
            session()->set([
                'log' => true,
                'id' => $cek_pelanggan['id_pelanggan'],
                'email' => $cek_pelanggan['212359_email'],
                'password' => $cek_pelanggan['212359_password'],
                'nama' => $cek_pelanggan['212359_nama_lengkap']
            ]);
            return redirect()->to('/berandapelanggan');
        } else {
            session()->setFlashdata('gagal', 'Login Gagal');
            session()->setFlashdata('salah', 'Email atau Password salah');
            return redirect()->to('/loginpelanggan');
        }
    }

    public function logout()
    {
        session()->remove('log');
        session()->remove('id');
        session()->remove('email');
        session()->remove('password');
        session()->remove('nama');
        return redirect()->to('/loginpelanggan');
    }
}
