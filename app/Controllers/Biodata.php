<?php

namespace App\Controllers;

use App\Models\Model_Biodata;

class Biodate extends BaseController
{
    public function index()
    {
        $biodata = new Model_Biodata();
        $data = $biodata->getBiodata();
        return view('/', compact('data'));
    }
}
