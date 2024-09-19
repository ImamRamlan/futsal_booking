<?php

namespace App\Controllers;

class berandapelanggan extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Beranda Utama'
        ];
        // Tambahkan pengecekan session flash data untuk notifikasi
        if (session()->getFlashdata('success')) {
            $data['success'] = session()->getFlashdata('success');
        }
        
        return view('pelanggan/index',$data);
    }
}
