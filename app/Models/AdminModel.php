<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'tbl_Admin_212359';
    protected $primaryKey = 'id_admin';
    protected $allowedFields = ['212359_username', '212359_password', '212359_nama_lengkap', '212359_email'];

    public function loginAdmin($username, $password)
    {
        $admin = $this->where('212359_username', $username)
                      ->where('212359_password', $password)
                      ->first();

        return $admin;
    }
}
