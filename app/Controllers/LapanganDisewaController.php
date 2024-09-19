<?php

namespace App\Controllers;

use App\Models\LapanganDisewaModel;
use App\Models\LapanganModel;

class LapanganDisewaController extends BaseController
{
    protected $lapanganDisewaModel;
    protected $LapanganModel;

    public function __construct()
    {
        $this->lapanganDisewaModel = new LapanganDisewaModel();
        $this->LapanganModel = new LapanganModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Lapangan Disewa',
            'lapanganDisewa' => $this->lapanganDisewaModel->getLapanganDisewaWithLapangan(),
        ];

        return view('admin/lapangan_disewa/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data Lapangan Disewa',
            'lapangan' => $this->LapanganModel->findAll()
        ];

        return view('admin/lapangan_disewa/create', $data);
    }

    public function store()
    {
        $this->lapanganDisewaModel->save([
            'id_lapangan' => $this->request->getPost('id_lapangan'),
            '212359_tanggal_sewa' => $this->request->getPost('tanggal_sewa'),
            '212359_waktu_mulai' => $this->request->getPost('waktu_mulai'),
            '212359_waktu_selesai' => $this->request->getPost('waktu_selesai'),
            '212359_status_sewa' => $this->request->getPost('status_sewa'),
        ]);

        return redirect()->to('/lapangandisewacontroller')->with('success', 'Data Lapangan Disewa berhasil ditambahkan');
    }

    public function edit($id)
    {
        $lapanganDisewa = $this->lapanganDisewaModel->find($id);

        $data = [
            'title' => 'Edit Data Lapangan Disewa',
            'lapanganDisewa' => $lapanganDisewa,
        ];

        return view('admin/lapangan_disewa/edit', $data);
    }

    public function update($id)
    {
        $this->lapanganDisewaModel->update($id, [
            'id_lapangan' => $this->request->getPost('id_lapangan'),
            '212359_tanggal_sewa' => $this->request->getPost('tanggal_sewa'),
            '212359_waktu_mulai' => $this->request->getPost('waktu_mulai'),
            '212359_waktu_selesai' => $this->request->getPost('waktu_selesai'),
            '212359_status_sewa' => $this->request->getPost('status_sewa'),
        ]);

        return redirect()->to('/lapangan-disewa')->with('success', 'Data Lapangan Disewa berhasil diupdate');
    }

    public function delete($id)
    {
        $this->lapanganDisewaModel->delete($id);

        return redirect()->to('/lapangan-disewa')->with('success', 'Data Lapangan Disewa berhasil dihapus');
    }
}
