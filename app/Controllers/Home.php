<?php

namespace App\Controllers;

use App\Models\Model_Biodata;
use App\Models\Model_Education;
use App\Controllers\BaseController;
use App\Models\PesanModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Home extends BaseController
{
    public function index()
    {
        $biodata = new Model_Biodata();
        $education = new Model_Education(); // Menambahkan inisialisasi model baru

        $data = $biodata->getBiodata();
        $data2 = $education->getEducation(); // Mengambil data menggunakan model baru

        return view('personal/home', compact('data', 'data2'));
    }



    public function all()
    {
        $model = new PesanModel();

        return $this->datatables->setTable($model->table)
            ->select(['id', 'nama', 'email', 'subjek', 'pesan', 'tanggal'])
            ->setFilter(['nama', 'email', 'subjek', 'pesan', 'tanggal'])
            ->create();
    }

    public function show($id)
    {
        $model = new PesanModel();
        $result = $model->find($id);

        if ($result === null) {
            throw new PageNotFoundException();
        }

        return $this->response->setJSON($result);
    }

    public function store()
    {
        $model = new PesanModel();

        $data = [
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'subjek' => $this->request->getVar('subjek'),
            'pesan' => $this->request->getVar('pesan'),
            'tanggal' => date('Y-m-d H:i:s')
        ];

        $id = $model->insert($data);

        if ($id) {
            return redirect()->to('http://localhost:8080/')->with('success', 'Pesan berhasil dikirim!');
        } else {
            return redirect()->to('http://localhost:8080/')->with('error', 'Terjadi kesalahan saat mengirim pesan.');
        }
    }

    public function update()
    {
        $model = new PesanModel();
        $id = (int)$this->request->getVar('id');

        $result = $model->find($id);
        if ($result === null) {
            throw new PageNotFoundException();
        }

        $data = [
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'subjek' => $this->request->getVar('subjek'),
            'pesan' => $this->request->getVar('pesan'),
            'tanggal' => $result['tanggal']
        ];

        $model->update($id, $data);

        return $this->response->setJSON(['result' => 'success']);
    }

    public function delete($id)
    {
        $model = new PesanModel();
        $model->delete($id);

        return $this->response->setJSON(['result' => 'success']);
    }
}
