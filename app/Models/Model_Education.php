<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Education extends Model
{
    protected $table = 'education';
    public function getEducation()
    {
        return $this->findAll();
    }
}
