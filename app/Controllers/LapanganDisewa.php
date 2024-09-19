<?php

namespace App\Controllers;

use App\Models\LapanganDisewaModel;
use App\Models\LapanganModel;

class LapanganDisewa extends BaseController
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

        return view('/lapangan/sewa', $data);
    }
}
