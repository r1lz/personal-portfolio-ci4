<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PesanModel;
use App\Models\AdminModel;
use CodeIgniter\Session\Session;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class AdminController extends BaseController
{

    public function getAllCommentsOrdered($order = 'asc')
    {
        $commentModel = new PesanModel();
        return $commentModel->getAllCommentsOrdered($order);
    }



    public function __construct()
    {
        // Check if the user is logged in
        $session = session();
        if (!$session->has('admin')) {
            return redirect()->to('/login');
        }
    }

    public function index()
    {
        $searchValue = $this->request->getPost('search') ?? '';
        $commentModel = new PesanModel();
        $data['comments'] = $commentModel->getAllComments($searchValue, 'desc');

        return view('admin', $data);
    }

    public function loginView()
    {
        return view('login');
    }

    public function login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $adminModel = new AdminModel();
        $admin = $adminModel->where('username', $username)->first();

        if ($admin == null) {
            return $this->response->setJSON(['message' => 'Username tidak terdaftar'])->setStatusCode(404);
        }

        // Periksa apakah password yang dimasukkan cocok dengan password yang ada
        if ($password === $admin['password']) {
            // Password cocok
            $session = session();
            $session->set('admin', $admin);

            return $this->response->setJSON(['message' => "Selamat datang {$admin['username']}"])->setStatusCode(200);
        } else {
            // Password tidak cocok
            return $this->response->setJSON(['message' => 'Username dan Password tidak cocok'])->setStatusCode(403);
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login')->with('success', 'Anda telah keluar.');
    }

    public function delete($id)
    {
        $commentModel = new PesanModel();
        $commentModel->delete($id);

        return redirect()->to('/admin')->with('success', 'Pesan berhasil dihapus.');
    }

    public function exportExcel()
    {
        $commentModel = new PesanModel();
        $comments = $commentModel->getAllComments();

        // Create new Spreadsheet object
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set header row
        $sheet->setCellValue('A1', 'Nama');
        $sheet->setCellValue('B1', 'Email');
        $sheet->setCellValue('C1', 'Subjek');
        $sheet->setCellValue('D1', 'Pesan');
        $sheet->setCellValue('E1', 'Tanggal');

        // Set data rows
        $row = 2;
        foreach ($comments as $comment) {
            $sheet->setCellValue('A' . $row, $comment['nama']);
            $sheet->setCellValue('B' . $row, $comment['email']);
            $sheet->setCellValue('C' . $row, $comment['subjek']);
            $sheet->setCellValue('D' . $row, $comment['pesan']);
            $sheet->setCellValue('E' . $row, $comment['tanggal']);
            $row++;
        }

        // Create Excel file
        $writer = new Xlsx($spreadsheet);
        $filename = 'comments.xlsx';
        $writer->save($filename);

        // Download Excel file
        return $this->response->download($filename, null)->setFileName($filename);
    }
}
