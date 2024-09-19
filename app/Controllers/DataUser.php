<?php

namespace App\Controllers;

use App\Models\PelangganModel;

class DataUser extends BaseController
{
    protected $PelangganModel;

    public function __construct()
    {
        $this->PelangganModel = new PelangganModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Data Pelanggan',
            'pelanggan' => $this->PelangganModel->findAll(),
        ];
        return view('admin/pelanggan/index', $data);
    }
    public function delete($id)
    {
        $this->PelangganModel->delete($id);

        return redirect()->to('/DataUser')->with('success', 'Data Pelanggan berhasil dihapus');
    }

}