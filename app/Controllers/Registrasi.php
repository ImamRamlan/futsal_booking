<?php

namespace App\Controllers;

use App\Models\PelangganModel;
use CodeIgniter\Controller;

class Registrasi extends Controller
{
    public function index()
    {
        return view('pelanggan/registrasi');
    }

    public function save()
    {
        $pelangganModel = new PelangganModel();

        $validation = \Config\Services::validation();

        if (!$this->validate($pelangganModel->getValidationRules(), $pelangganModel->getValidationMessages())) {
            session()->setFlashdata('validation', $validation);
            return redirect()->to('/register')->withInput();
        }

        $data = [
            '212359_nama_lengkap' => $this->request->getPost('212359_nama_lengkap'),
            '212359_email' => $this->request->getPost('212359_email'),
            '212359_password' => $this->request->getPost('212359_password'),
            '212359_nomor_telepon' => $this->request->getPost('212359_nomor_telepon'),
        ];

        $pelangganModel->insert($data);

        session()->setFlashdata('success', 'Registrasi berhasil! Silakan login.');
        return redirect()->to('/registrasi');
    }
}
