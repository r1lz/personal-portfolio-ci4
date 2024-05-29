<?php

namespace App\Models;

use CodeIgniter\Model;

class PesanModel extends Model
{
    protected $table = 'tablepesan';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['nama', 'email', 'subjek', 'pesan', 'tanggal'];

    protected $useTimestamps = false;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];
    public function getAllComments($searchValue = '', $order = 'asc')
    {
        $db = \Config\Database::connect();
        $query = $db->table('tablepesan')
            ->select('id, nama, email, subjek, pesan, tanggal')
            ->like('id', $searchValue)
            ->orLike('nama', $searchValue)
            ->orLike('email', $searchValue)
            ->orLike('subjek', $searchValue)
            ->orLike('pesan', $searchValue)
            ->orLike('tanggal', $searchValue)
            ->orderBy('tanggal', $order)
            ->get();

        $results = $query->getResultArray();

        // Ubah waktu menjadi waktu Indonesia
        foreach ($results as &$row) {
            $waktu = strtotime($row['tanggal']); // Mengubah waktu menjadi timestamp
            $waktuIndonesia = date('Y-m-d H:i:s', $waktu); // Mengubah timestamp menjadi waktu Indonesia
            $row['tanggal'] = $waktuIndonesia;
        }

        return $results;
    }
}
