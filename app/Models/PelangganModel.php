<?php

namespace App\Models;

use CodeIgniter\Model;

class PelangganModel extends Model
{
    protected $table = 'tbl_Pelanggan_212359';
    protected $primaryKey = 'id_pelanggan';
    protected $allowedFields = ['212359_nama_lengkap','212359_email', '212359_password', '212359_nomor_telepon'];

    protected $validationRules = [
        '212359_nama_lengkap' => 'required',
        '212359_email' => 'required|valid_email|is_unique[tbl_Pelanggan_212359.212359_email]',
        '212359_password' => 'required',
        '212359_nomor_telepon' => 'required|numeric'
    ];

    protected $validationMessages = [
        '212359_email' => [
            'is_unique' => 'Email sudah digunakan.'
        ]
    ];
    public function auth_pelanggan($email, $password)
    {
        return $this->where('212359_email', $email)
            ->where('212359_password', $password)
            ->first();
    }
}
