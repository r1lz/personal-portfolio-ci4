<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Biodata extends Model
{
    protected $table = 'biodata';

    public function getBiodata()
    {
        return $this->findAll();
    }
}
