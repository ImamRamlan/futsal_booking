<?php

namespace App\Models;

use CodeIgniter\Model;

class PemesananModel extends Model
{
    protected $table = 'tbl_Pemesanan_212359';
    protected $primaryKey = 'id_pemesanan';
    protected $allowedFields = ['id_pelanggan', 'id_lapangan', '212359_tanggal_pemesanan', '212359_mulai','212359_selesai', '212359_total_harga', '212359_status_pemesanan'];

    // Menyertakan informasi pelanggan dalam hasil query
    public function getPemesananWithPelanggan()
    {
        return $this->join('tbl_Pelanggan_212359', 'tbl_Pelanggan_212359.id_pelanggan = tbl_Pemesanan_212359.id_pelanggan')
            ->findAll();
    }

    // Menyertakan informasi lapangan dalam hasil query
    public function getPemesananWithLapangan()
    {
        return $this->join('tbl_Lapangan_212359', 'tbl_Lapangan_212359.id_lapangan = tbl_Pemesanan_212359.id_lapangan')
            ->findAll();
    }

    // Menyertakan informasi pelanggan dan lapangan dalam hasil query
    public function getPemesananWithPelangganAndLapangan()
    {
        return $this->join('tbl_Pelanggan_212359', 'tbl_Pelanggan_212359.id_pelanggan = tbl_Pemesanan_212359.id_pelanggan')
            ->join('tbl_Lapangan_212359', 'tbl_Lapangan_212359.id_lapangan = tbl_Pemesanan_212359.id_lapangan')
            ->findAll();
    }
    public function getPenawaranByDateRange($start_date, $end_date)
    {
        return $this->db->table('tbl_Pemesanan_212359')
            ->join('tbl_Pelanggan_212359', 'tbl_Pelanggan_212359.id_pelanggan = tbl_Pemesanan_212359.id_pelanggan','left')
            ->join('tbl_Lapangan_212359', 'tbl_Lapangan_212359.id_lapangan = tbl_Pemesanan_212359.id_lapangan','left')
            ->where('tbl_Pemesanan_212359.212359_tanggal_pemesanan >=', $start_date)
            ->where('tbl_Pemesanan_212359.212359_tanggal_pemesanan <=', $end_date)
            ->get()
            ->getResultArray();
    }
    public function getRiwayatPemesananByIdPelanggan($idPelanggan)
    {
        return $this->where('id_pelanggan', $idPelanggan)
            ->orderBy('id_pemesanan', 'DESC')
            ->findAll();
    }
    public function konfirmasiPemesanan($idPemesanan)
    {
        // Lakukan peng-updatean status di sini
        $data = [
            '212359_status_pemesanan' => 'Dikonfirmasi',
        ];

        $this->update($idPemesanan, $data);
    }
    public function getPemesananAktifByIdPelanggan($idPelanggan)
    {
        return $this->where('id_pelanggan', $idPelanggan)
            ->where('212359_status_pemesanan', 'Menunggu Konfirmasi') // Gantilah sesuai status pemesanan aktif yang Anda gunakan
            ->findAll();
    }
}
