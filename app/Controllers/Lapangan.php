<?php

namespace App\Controllers;

use App\Models\LapanganModel;

class Lapangan extends BaseController
{
    protected $lapanganModel;

    public function __construct()
    {
        $this->lapanganModel = new LapanganModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Lapangan',
            'lapangan' => $this->lapanganModel->findAll(),
        ];

        return view('lapangan/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data Lapangan',
        ];

        return view('lapangan/create', $data);
    }

    public function store()
    {

        $gambar = $this->request->getFile('212359_gambar');
        $gambarName = $gambar->getRandomName();
        $gambar->move('uploads/lapangan', $gambarName);

        $data = [
            '212359_nama_lapangan' => $this->request->getPost('212359_nama_lapangan'),
            '212359_gambar' => $gambarName,
            '212359_harga_per_jam' => $this->request->getPost('212359_harga_per_jam'),
            '212359_deskripsi' => $this->request->getPost('212359_deskripsi'),
        ];

        $this->lapanganModel->insert($data);

        return redirect()->to('/lapangan')->with('success', 'Data Lapangan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data Lapangan',
            'lapangan' => $this->lapanganModel->find($id),
        ];

        return view('lapangan/edit', $data);
    }

    public function update($id)
    {
        $validationRules = [
            '212359_nama_lapangan' => 'required',
            '212359_harga_per_jam' => 'required|numeric',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->to("/lapangan/edit/$id")->withInput()->with('validation', $this->validator);
        }

        $data = [
            '212359_nama_lapangan' => $this->request->getPost('212359_nama_lapangan'),
            '212359_harga_per_jam' => $this->request->getPost('212359_harga_per_jam'),
            '212359_deskripsi' => $this->request->getPost('212359_deskripsi'),
            '212359_digunakan' => $this->request->getPost('212359_digunakan'),
        ];

        $this->lapanganModel->update($id, $data);

        return redirect()->to('/lapangan')->with('success', 'Data Lapangan berhasil diupdate');
    }

    public function delete($id)
    {
        $this->lapanganModel->delete($id);

        return redirect()->to('/lapangan')->with('success', 'Data Lapangan berhasil dihapus');
    }
}
