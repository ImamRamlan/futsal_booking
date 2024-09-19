<?php

namespace App\Models;

use CodeIgniter\Model;

class LapanganModel extends Model
{
    protected $table = 'tbl_Lapangan_212359';
    protected $primaryKey = 'id_lapangan';
    protected $allowedFields = ['212359_nama_lapangan', '212359_gambar', '212359_harga_per_jam','212359_deskripsi','212359_digunakan'];

    public function isLapanganAvailable($id_lapangan, $tanggal_pemesanan, $lama_waktu)
    {
        $pemesanan = $this->db->table('tbl_pemesanan_212359')
            ->where('id_lapangan', $id_lapangan)
            ->where('tanggal_pemesanan <=', $tanggal_pemesanan)
            ->where('tanggal_pemesanan + INTERVAL 1 HOUR * lama_waktu >', $tanggal_pemesanan)
            ->get()
            ->getResultArray();

        return empty($pemesanan);
    }
}
