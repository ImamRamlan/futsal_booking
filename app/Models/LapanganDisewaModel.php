<?php

namespace App\Models;

use CodeIgniter\Model;

class LapanganDisewaModel extends Model
{
    protected $table = 'tbl_LapanganDisewa_212359';
    protected $primaryKey = 'id_sewa_212359';
    protected $allowedFields = ['id_lapangan', '212359_tanggal_sewa', '212359_waktu_mulai', '212359_waktu_selesai', '212359_status_sewa'];

    public function getLapanganDisewaWithLapangan()
    {
        return $this->db->table('tbl_LapanganDisewa_212359')
            ->join('tbl_Lapangan_212359', 'tbl_Lapangan_212359.id_lapangan=tbl_LapanganDisewa_212359.id_lapangan', 'left')
            ->get()->getResultArray();
    }

}
