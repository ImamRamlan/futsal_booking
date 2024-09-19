<?php

namespace App\Controllers;

use App\Models\PemesananModel;

class Pesanan extends BaseController
{
    protected $PemesananModel;

    public function __construct()
    {
        $this->PemesananModel = new PemesananModel();
        helper('auth'); // Load the helper file if 'auth_helper.php' is the file where is_admin function is defined.
    }

    public function index(): string
    {
        $data = [
            'title' => 'Data Pesanan',
            'pemesanan' => $this->PemesananModel->getPemesananWithPelangganAndLapangan()
        ];
        return view('admin/datapesanan/index', $data);
    }

    public function edit(): string
    {
        $data = [
            'title' => 'Edit Data Pesanan',
            'pemesanan' => $this->PemesananModel->getPemesananWithPelangganAndLapangan()
        ];
        return view('admin/datapesanan/edit', $data);
    }

    public function konfirmasi($idPemesanan)
    {
        // Panggil method konfirmasiPemesanan dari model
        $this->PemesananModel->konfirmasiPemesanan($idPemesanan);

        // Ambil id_pelanggan dari data pemesanan
        $idPelanggan = $this->PemesananModel->find($idPemesanan)['id_pelanggan'];

        // Cek apakah pengguna sudah login
        if (session()->has('id')) {
            // Ambil id_pelanggan dari data pengguna yang sudah login
            $idPelangganLogin = session()->get('id');

            // Set notifikasi dalam session jika id_pelanggan sesuai
            if ($idPelanggan == $idPelangganLogin) {
                session()->setFlashdata('success', 'Pemesanan berhasil dikonfirmasi!');
            }
        }

        // Redirect kembali ke halaman index atau halaman yang diinginkan
        return redirect()->to('/Pesanan');
    }
    public function printPDF()
    {
        // Load the Dompdf library
        $dompdf = new \Dompdf\Dompdf();

        // Fetch data needed for the PDF
        $start_date = $this->request->getPost('start_date');
        $end_date = $this->request->getPost('end_date');
        
        // Fetch data for the PDF content (replace with your logic)
        $data = [
            'title' => 'Laporan Pemesanan',
            'pesanan' => $this->PemesananModel->getPenawaranByDateRange($start_date, $end_date), // Replace with your method to get data by date range
        ];

        // Load the view file into Dompdf
        $html = view('admin/datapesanan/pdf', $data);

        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // Set paper size (A4)
        $dompdf->setPaper('A4', 'portrait');

        // Render PDF (first render to check for errors, then stream to browser)
        $dompdf->render();

        // Output PDF to browser
        $dompdf->stream('laporan_penawaran.pdf', ['Attachment' => 0]);
    }
}
