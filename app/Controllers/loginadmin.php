<?php

namespace App\Controllers;

use App\Models\AdminModel;

class Loginadmin extends BaseController
{
    protected $adminModel;

    public function __construct()
    {
        $this->adminModel = new AdminModel();
    }

    public function index()
    {
        if (session()->get('log') == true) {
            return redirect()->to('/admin');
        }

        return view('loginadmin/login');
    }

    public function log()
    {
        $username = $this->request->getPost('212359_username');
        $password = $this->request->getPost('212359_password');

        $cek_admin = $this->adminModel->loginAdmin($username, $password);

        if ($cek_admin) {
            session()->set([
                'log' => true,
                'username' => $cek_admin['212359_username'],
                'password' => $cek_admin['212359_password'],
				'nama' => $cek_admin['212359_nama_lengkap'],
            ]);

            return redirect()->to('/admin');
        } else {
            session()->setFlashdata('gagal', 'Login Gagal');
            session()->setFlashdata('salah', 'Username atau Password salah ');
            return redirect()->to('/loginadmin');
        }
    }

    public function logout()
    {
        session()->remove(['log', 'username', 'password','nama']);
        return redirect()->to('/loginadmin');
    }
}
