<?php

namespace App\Controllers;

use App\Models\LapanganModel;
use App\Models\PemesananModel;

class PesanLapangan extends BaseController
{
    protected $lapanganModel;
    protected $pemesananModel;

    public function __construct()
    {
        $this->lapanganModel = new LapanganModel();
        $this->pemesananModel = new PemesananModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Beranda Utama',
            'lapangan' => $this->lapanganModel->findAll(),
        ];
        return view('pelanggan/lapangan/index', $data);
    }

    public function riwayatPemesanan()
    {
        // Ambil ID pelanggan dari sesi atau data pengguna yang terautentikasi
        $idPelanggan = session()->get('id');

        // Panggil model untuk mendapatkan riwayat pemesanan
        $riwayatPemesanan = $this->pemesananModel->getRiwayatPemesananByIdPelanggan($idPelanggan);

        $data = [
            'title' => 'Riwayat Pemesanan',
            'riwayatPemesanan' => $riwayatPemesanan,
        ];

        return view('pelanggan/riwayat_pemesanan', $data);
    }

    // Pada PesanLapangan.php
    public function pesan($id_lapangan)
    {
        // Ambil ID pelanggan dari sesi atau data pengguna yang terautentikasi
        $idPelanggan = session()->get('id');

        // Cek apakah pelanggan memiliki pemesanan aktif
        $pemesananAktif = $this->pemesananModel->getPemesananAktifByIdPelanggan($idPelanggan);

        // Jika ada pemesanan aktif, tampilkan pesan kesalahan


        // Jika tidak ada pemesanan aktif, lanjutkan dengan menampilkan formulir pemesanan
        $lapangan = $this->lapanganModel->find($id_lapangan);

        $data = [
            'title' => 'Pesan Lapangan',
            'lapangan' => $lapangan,
        ];

        return view('pelanggan/pemesanan/pesan', $data);
    }
    public function prosesPesan()
    {
        $id_lapangan = $this->request->getPost('id_lapangan');
        $tanggal_pemesanan = $this->request->getPost('tanggal_pemesanan');
        $mulai = $this->request->getPost('mulai');
        $selesai = $this->request->getPost('selesai');
        $total_harga = $this->request->getPost('total_harga');

        // Get existing reservations for the selected field and date
        $existingReservations = $this->pemesananModel
            ->where('id_lapangan', $id_lapangan)
            ->where('212359_tanggal_pemesanan', $tanggal_pemesanan)
            ->findAll();

        // Check for overlapping reservations
        foreach ($existingReservations as $reservation) {
            $existingMulai = $reservation['212359_mulai'];
            $existingSelesai = $reservation['212359_selesai'];

            // Check if the new reservation overlaps with any existing reservation
            if (($mulai >= $existingMulai && $mulai < $existingSelesai) || ($selesai > $existingMulai && $selesai <= $existingSelesai)) {
                return redirect()->to('/PesanLapangan')->with('error', 'Waktu pemesanan bertabrakan dengan pemesanan yang sudah ada.');
            }
        }

        // Continue with the reservation if there are no overlaps
        $status_pemesanan = 'Menunggu Konfirmasi';

        $data = [
            'id_pelanggan' => session()->get('id'),
            'id_lapangan' => $id_lapangan,
            '212359_tanggal_pemesanan' => $tanggal_pemesanan,
            '212359_mulai' => $mulai,
            '212359_selesai' => $selesai,
            '212359_total_harga' => $total_harga,
            '212359_status_pemesanan' => $status_pemesanan,
        ];

        $this->pemesananModel->insert($data);

        return redirect()->to('/PesanLapangan')->with('success', 'Pemesanan berhasil! Menunggu konfirmasi.');
    }
}
